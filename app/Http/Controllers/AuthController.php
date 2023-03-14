<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function dashboard(){
        if(Auth()->check()){
            return view('user.dashboard');
        }
        else{
            return redirect()->route('home.index');
        }
    }

    public function register(Request $request){
        $file = $request->file('register_photo');
        $filename = now().'.'.$file->getClientOriginalExtension();
        $file->storeAs('/storage/images/',$filename);

        $this->validate($request,[
            'register_username' => 'required',
            'register_email' => 'required',
            'register_password' => 'required|min:8',
        ]);
        
        $user_data = [
            'username' => $request->register_username,
            'email' => $request->register_email,
            'password' => Hash::make($request->register_password),
        ];
        $user = User::create($user_data);

        $user_details_data = [
            'user_id' => $user->id,
            'first_name' => $request->register_fname,
            'last_name' => $request->register_lname,
            'address' => $request->register_address,
            'photo' => $filename,
        ];

        user_detail::create($user_details_data);
        
        return redirect()->route('home.index')->with('message','Welcome on board !...Now login.');

    }

    public function login(Request $request){
        $this->validate($request,[
            'login_email' => 'required',
            'login_password' => 'required',
        ]);

        $credential = [
            'email' => $request->login_email,
            'password' => $request->login_password,
        ];

        if(Auth::attempt($credential)){
            if(Auth::user()->role == '1'){
                return redirect()->route('admin.index');
            }
            return redirect()->route('user.index');
        }
        else{
            return redirect()->route('home.index');
        }
    }

    public function logout(Request $request){
        session()->flush();
        Auth::logout();
        return redirect()->route('home.index');
    }
}
