<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\User;
use App\Models\Province;
use App\Models\BankAccount;
use Illuminate\Support\Str;
use App\Models\UserActivate;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function register()
    {
        $title = "Registrasi";
        return view('contents.auth.register', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name'         => 'required',
            'email'             =>  'required|email:dns',
            'password'          =>  'required|min:8',
            'confirm_password'  =>  'required|same:password',
        ]);

        $data = User::create([
            'full_name' =>  $validatedData['full_name'],
            'email'     =>  $validatedData['email'],
            'password'  =>  Hash::make($validatedData['confirm_password']),
        ]);

        $data->assignRole('society');

        if($data == true)
        {
            $otp = rand(4000,8000);
            $generateToken = UserActivate::create([
                'user_id'   =>  $data->id,
                'token'     =>  Str::random(16),
                'otp'       =>  $otp,
            ]);

            $token = $generateToken->token;
            Mail::send('contents.mail.activation', ['token' => $token, 'name' => $request->full_name, 'otp' => $generateToken->otp], function($message) use($request){
                $message->to($request->email)->subject('Aktivasi Akun Youbid!');
            });

            return redirect('/login')->with('success', 'Registrasi Berhasil Silahkan Cek Email Untuk Melakukan Aktivasi!');
        }else{
            return back();
        }

    }

    public function login()
    {
        $title = "Login";
        return view('contents.auth.login', compact('title'));
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email'     => 'required',
            'password'  =>  'required'
        ]);

        if(Auth::attempt($validatedData))
        {
            
            $checks = User::where('email', $validatedData['email'])->get();
            foreach ($checks as $check)
            if($check['email_verified_at'] == null) {
                $request->session()->regenerate();
                return redirect()->intended('/resend-activation');
            }else if ($check['is_complete'] == 0 && 1) {
                $request->session()->regenerate();
                return redirect()->intended('/complete-data');
            }else{
                if($request->user()->hasRole('society')){
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                }else{
                    $request->session()->regenerate();
                    return redirect()->intended('/dashboard');
                }
            }
            
        }else{
            return redirect('/login')->with('failed', 'Email Atau Kata Sandi Salah!');
        }
    }

    public function activation($token)
    {
        $title      = "Aktivasi Akun";
        $mytoken    = $token;
        $getData    = UserActivate::where('token', $mytoken)->get();
        foreach($getData as $data)
        if($data->token == $mytoken){
            return view('contents.auth.activation', compact('title', 'mytoken'));
        }
            return abort(404);
    }

    public function activate(Request $request)
    {
        $validatedData = $request->validate([
            'otp'   =>  'required'
        ]);

        $checkToken = UserActivate::where('token', $request->token)->get();
        foreach($checkToken as $data)
        if($data->otp == $validatedData['otp'])
        {
            $update = User::where('id', $data->user_id)->update([
                'email_verified_at' =>  Carbon::now(),
            ]);
            $getUser = User::where('id', $data->user_id)->get();
            foreach($getUser as $user)
            if($update == true){
                UserActivate::where('user_id', $user->id)->delete();
            }
            return redirect('/login')->with('success', 'Aktivasi Berhasil Silahkan Login!');
        }
        return back()->with('failed', 'Ada Kesalahan Silahkan Coba Lagi!');

    }

    public function resendActivation()
    {
        $title = "Aktivasi Akun";
        return view('contents.auth.resendactivation', compact('title'));
    }

    public function newActivation()
    {
        $otp = rand(4000,8000);
            $generateToken = UserActivate::create([
                'user_id'   =>  Auth::user()->id,
                'token'     =>  Str::random(16),
                'otp'       =>  $otp,
            ]);

            $token = $generateToken->token;
            Mail::send('contents.mail.activation', ['token' => $token, 'name' => Auth::user()->full_name, 'otp' => $generateToken->otp], function($message){
                $message->to(Auth::user()->email)->subject('Aktivasi Akun Youbid!');
            });
            Alert::success('Berhasil', 'Tautan Aktivasi Berhasil Dikirim Ulang!');
            return redirect('/login');
    }

    public function completeData()
    {
        $title = "Lengkapi Data";
        $users = User::where('id', Auth::user()->id)->get();
        $provinces = Province::get();
        $banks  = Bank::get();
        return view('contents.auth.complete', compact('title', 'provinces', 'banks', 'users'));
    }

    public function sendCompleteData(Request $request)
    {
        $validatedData = $request->validate([
            'nik'               =>  'required|max:16',
            'phone_number'      =>  'required|min:10|numeric',
            'gender'            =>  'required',
            'sub_district_id'   =>  'required',
            'postal_code'       =>  'required|numeric',
            'full_address'      =>  'required',
            'image'             =>  'file|image|max:5120',
            'id_card_image'     =>  'required|file|image|max:5120',
            'account_owner'     =>  'required',
            'account_number'    =>  'required',
            'bank_id'           =>  'required',
        ]);

        $bankAccount = BankAccount::create([
            'bank_id'           =>  $validatedData['bank_id'],
            'account_owner'     =>  $validatedData['account_owner'],
            'account_number'    =>  $validatedData['account_number']
        ]);

        if($request->image && $request->id_card_image != null)
        {
            $image = $request->file('image');
            $validatedData['image'] = time().'.'.$image->extension();
        
            $destinationPath = public_path('/img/thumbnail');
            $img = Image::make($image->path());
            $img->resize(200, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$validatedData['image']);
    
            $destinationPath = public_path('/img/profile-images');
            $image->move($destinationPath, $validatedData['image']);

            $image = $request->file('id_card_image');
            $validatedData['id_card_image'] = time().'.'.$image->extension();
        
            $destinationPath = public_path('/img/thumbnail');
            $img = Image::make($image->path());
            $img->resize(1080, 720, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$validatedData['id_card_image']);
    
            $destinationPath = public_path('/img/id_card_image');
            $image->move($destinationPath, $validatedData['id_card_image']);

            $cekNik = User::where('nik', $validatedData['nik'])->get();
            foreach($cekNik as $data)
            if($bankAccount == true && $data->nik == $validatedData['nik']){
                User::where('id', Auth::user()->id)->update([
                'phone_number'      =>  $validatedData['phone_number'],
                'gender'            =>  $validatedData['gender'],
                'sub_district_id'   =>  $validatedData['sub_district_id'],
                'postal_code'       =>  $validatedData['postal_code'],
                'full_address'      =>  $validatedData['full_address'],
                'image'             =>  $validatedData['image'],
                'id_card_image'     =>  $validatedData['id_card_image'],
                'bank_account_id'   =>  $bankAccount->id,
                'is_complete'       =>  1
            ]);
            }elseif($bankAccount == true){
                User::where('id', Auth::user()->id)->update([
                    'nik'               =>  $validatedData['nik'],
                    'phone_number'      =>  $validatedData['phone_number'],
                    'gender'            =>  $validatedData['gender'],
                    'sub_district_id'   =>  $validatedData['sub_district_id'],
                    'postal_code'       =>  $validatedData['postal_code'],
                    'full_address'      =>  $validatedData['full_address'],
                    'image'             =>  $validatedData['image'],
                    'id_card_image'     =>  $validatedData['id_card_image'],
                    'bank_account_id'   =>  $bankAccount->id,
                    'is_complete'       =>  1
                ]);
            }
            return redirect('/');
        }
        return back();
    }

    public function forgotPassword()
    {
        $title = "Lupa Password";
        return view('contents.auth.forgotpassword', compact('title'));
    }

    public function mailReset(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:dns'
        ]);

        $checkData = User::where('email', $validatedData['email'])->get();
        foreach($checkData as $data)
        if($data['email'] != null)
        {
        $generateToken = Str::random(16);
        DB::table('password_resets')->insert([
            'email' =>  $validatedData['email'],
            'token' =>  $generateToken
        ]);

        Mail::send('contents.mail.resetpassword', ['token' => $generateToken, 'name' => $data->full_name], function($message) use($request){
            $message->to($request->email)->subject('Atur Ulang Password Akun Youbid!');
        });

        return redirect('/login')->with('success', 'Tautan Atur Ulang Password Berhasil Dikirim Silahkan Cek Email Anda!');

        }
        return back()->with('failed', 'Email Tidak Terdaftar!');
    }

    public function resetPassword($token)
    {
        $title = "Ubah Password";
        $myToken = $token;
        $getData = DB::table('password_resets')->where('token', $token)->get();
        foreach($getData as $data)
        if($data->token == $myToken)
        {
            return view('contents.auth.resetpassword', compact('title','myToken'));
        }
        return abort(404);
    }

    public function changePassword(Request $request, $myToken)
    {
        $validatedData = $request->validate([
            'password'          =>  'required|min:8',
            'confirm_password'  =>  'same:password'
        ]);

        $getData = DB::table('password_resets')->where('token', $myToken)->get();
        foreach($getData as $data)
        User::where('email', $data->email)->update([
            'password'  =>  Hash::make($validatedData['confirm_password'])
        ]);
        DB::table('password_resets')->where('email', $data->email)->delete();
        return redirect('/login')->with('success', 'Password Berhasil Diatur Ulang, Silahkan Login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
