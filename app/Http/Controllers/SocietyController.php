<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;

class SocietyController extends Controller
{
    public function index()
    {
        $title = "Daftar Masyarakat";
        return view('contents.societies.index', compact('title'));
    }

    public function detail($uuid)
    {
        // dd($uuid);
        $title = "Detail Masyarakat";
        $societies  =  User::where('uuid', $uuid)->get();
        return view('contents.societies.detail', compact('title', 'societies'));
    }

    public function create()
    {
        $title = "Tambah Masyarakat";
        $provinces = Province::get();
        return view('contents.societies.create', compact('title', 'provinces'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik'               =>  'required|max:16|unique:users',
            'full_name'         =>  'required',
            'email'             =>  'required|email:dns',
            'phone_number'      =>  'required|min:10|numeric',
            'gender'            =>  'required',
            'sub_district_id'   =>  'required',
            'postal_code'       =>  'required|numeric',
            'full_address'      =>  'required',
        ]);
        
        $user = User::create([
            'nik'               =>  $validatedData['nik'],
            'full_name'         =>  $validatedData['full_name'],
            'email'             =>  $validatedData['email'],
            'phone_number'      =>  $validatedData['phone_number'],
            'gender'            =>  $validatedData['gender'],
            'sub_district_id'   =>  $validatedData['sub_district_id'],
            'postal_code'       =>  $validatedData['postal_code'],
            'full_address'      =>  $validatedData['full_address'],
            'password'          =>  Hash::make(Str::random(16)),
            'email_verified_at' =>  Carbon::now(),
            'role_id'           =>  3,
        ]);

        $user->assignRole('society');

        $generateToken = Str::random(16);
        DB::table('password_resets')->insert([
            'email' =>  $user['email'],
            'token' =>  $generateToken
        ]);
        
        Mail::send('contents.mail.createpassword', ['token' => $generateToken, 'name' => $user->full_name], function($message) use($request){
            $message->to($request->email)->subject('Buat Password Akun Youbid!');
        });

        toast()->success('Berhasil','Masyarakat '.$user->full_name.' Berhasil Ditambahkan!');
        return redirect('/societies');
    }

    public function edit($uuid)
    {
        $title      =  'Edit Masyarakat';
        $societies  =  User::where('uuid', $uuid)->get();
        $province_select   =  Province::get();
        foreach($societies as $society){
        $districts   = District::where('id', $society->SubDistrict->district_id)->get();
        }
        foreach($districts as $district){
            $cities = City::where('id', $district->city_id)->get();
        }
        foreach($cities as $city){
            $provinces = Province::where('id', $city->province_id)->get();
        }
        return view('contents.societies.edit', compact('title', 'societies','provinces', 'province_select', 'cities', 'districts'));
    }

    public function update(Request $request, $uuid)
    {
        $validatedData = $request->validate([
            'nik'               =>  'required|max:16',
            'full_name'         =>  'required',
            'email'             =>  'required|email:dns',
            'phone_number'      =>  'required|min:10|numeric',
            'gender'            =>  'required',
            'sub_district_id'   =>  'required',
            'postal_code'       =>  'required|numeric',
            'full_address'      =>  'required',
        ]);

        $societies = User::where('uuid', $uuid)->get();
        foreach($societies as $society)
        if($request->full_name == $society->full_name)
        {
            User::where('uuid', $uuid)->update([
                'full_name'         =>  $validatedData['full_name'],
                'email'             =>  $validatedData['email'],
                'phone_number'      =>  $validatedData['phone_number'],
                'gender'            =>  $validatedData['gender'],
                'sub_district_id'   =>  $validatedData['sub_district_id'],
                'postal_code'       =>  $validatedData['postal_code'],
                'full_address'      =>  $validatedData['full_address']
            ]);
        }else{
            User::where('uuid', $uuid)->update($validatedData);
        }
        toast()->success('Berhasil','Masyarakat '.$request->full_name.' Berhasil Dirubah!');    
        return redirect('/societies');
    }

    public function delete($uuid)
    {
        User::where('uuid', $uuid)->delete();
        toast()->success('Berhasil','Masyarakat Berhasil Dihapus!');
        return redirect('/societies');
    }
}
