<?php

namespace App\Http\Controllers;

use App\Models\leave_application;
use App\Models\leave_category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = Auth()->user();
        // $user_detail = User::where('id',$user->id)->user_detail;
        return view('user.dashboard',compact('user'));
    }

    public function view_user(){
        $user = Auth()->user();
        return view('user.view_user_detail',compact('user'));
    }

    public function leave_category(Request $request){
        $leave_category = leave_category::all();
        // if($request->user_id){
        //     $user = User::;
        // }
        return response()->json([
            'leave_category' => $leave_category,
            // 'user' => $user,
        ]);
    }
}
