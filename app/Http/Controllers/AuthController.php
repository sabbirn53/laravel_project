<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function storeregister(Request $req){
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;
        $confirm_pass = $req->confirm;
        if($password != $confirm_pass){
            return redirect()->back()->with('err', 'Password Mismatch');
        }
        else {
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'role' => 'student'
            ]);
            return redirect()->back()->with('success', 'Registration Success. Waiting for admin approval');
        }
    }
    public function login(){
        return view('auth.login');
    }
    public function storelogin(Request $req){
        $email = $req->email;
        $password = $req->password;
        // SELECT * from users where email ='' and password = ''
        $user = DB::table('users')
        ->where('email', '=', $email)
        ->where('password','=', md5($password))->first();
        if($user){
            if($user->is_approved==0){
                return redirect()->back()->with('err', 'Not Approved');
            }
            else {
                Session::put('username', $user->name);
                Session::put('userrole', $user->role);

                // $request->session()->put('')
                return redirect('dashboard');
            }
        }
    }

    public function dashboard(){
       return view('auth.dashboard');
    }
}
