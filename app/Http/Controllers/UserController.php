<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $req){
        if($req->isMethod('post')){
            $email = $req->get('email');
            $password = $req->get('password');
            $user = User::where('email',$email)->first();
            if($user){
                if(password_verify($password,$user->password)){
                    $req->session()->put('user_id',$user->id);
                    $req->session()->put('login','true');
                    return redirect()->to('/');
                }else{
                    return redirect()->back()->with('message','Wrong password.');
                }
            }else{
                return redirect()->back()->with('message','Email is wrong!');
            }
        }
        return view('user.login');
    }

    public function signup(UserRequest $req): RedirectResponse{

        //  You can safely access the validated data
            $data = $req->validated();
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password']
            ]);
            return redirect()->to('/user/signup')->with('message','User Created Successfully, You can now Login!.');
        
    }

    public function signup_get(){
        return view('user.signup');
    }

    public function logout(Request $req){
        $req->session()->remove('user_id');
        $req->session()->remove('login');
        return redirect('/user/login');
    }
}
