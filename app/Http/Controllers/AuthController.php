<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Models\Staff;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        if(Session::has('logged')){
            if(Session::get('logged') == 'staff') return redirect('/buku');
            else return redirect('/pesan');

        }else{
            return view('login');
        }
    }

    public function register(){
        return view('register');
    }

    public function authenticate(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');        

        if($username == "admin" && $password == "admin"){
            Session::put('logged', 'staff');
            return redirect('/konfirmasi');
        }else{
            $user = User::where('username', $username)
                ->where('password', $password)
                ->where('soft_delete', 0)
                ->first();

            if($user){
                Session::put('logged', 'user');
                Session::put('id_user', $user->id_user);
                return redirect('/pesan');

            }else{
                return redirect()->back()->with('error', 'Data user tidak ditemukan');
            }
        }
    }

    public function tambahUser(Request $request){
        $nama = $request->input('nama');
        $email = $request->input('email');        
        $alamat = $request->input('alamat');
        $username = $request->input('username');
        $password = $request->input('password');        

        $data = new User();
        $data->nama = $nama;
        $data->email = $email;        
        $data->alamat = $alamat;
        $data->username = $username;
        $data->password = $password;        

        $data->save();
        return redirect('/');
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
