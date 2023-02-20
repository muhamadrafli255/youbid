<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use Illuminate\Support\Str;
use App\Models\UserActivate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        $data->assignRole('user');

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
            }else if ($check['is_complete'] == 0) {
                $request->session()->regenerate();
                return redirect()->intended('/complete-data');
            }else{
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
            
        }else{
            return redirect('/login');
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
            return abort(401);
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

    public function completeData()
    {
        $title = "Lengkapi Data";
        $provinces = Province::get();
        return view('contents.auth.complete', compact('title', 'provinces'));
    }

    public function sendCompleteData(Request $request)
    {
        $validatedData = $request->validate([
            'nik'               =>  'required|max:16',
            'phone_number'      =>  'required|min:10|max:13|numeric',
            'gender'            =>  'required',
            'sub_district_id'   =>  'required',
            'postal_code'       =>  'required|numeric',
            'full_address'      =>  'required',

        ]);
    }

    public function forgotpassword()
    {
        $title = "Lupa Password";
        return view('contents.auth.forgotpassword', compact('title'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
