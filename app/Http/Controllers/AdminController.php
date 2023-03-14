<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function userlist(){
        return view('admin.userlist');
    }
    
    public function fetchall(Request $request){
        $user = User::select('id','username','email');
        if($request->ajax()){
            return DataTables::of($user)->addIndexColumn()->addColumn('action',function($row){
                $btn = '    <button class="btn btn-success-outline btn-sm btnUserView">View</button>
                            <button class="btn btn-warning-outline btn-sm btnUserView">Edit</button>
                            <button class="btn btn-danger-outline btn-sm btnUserView">Delete</button>';
                return $btn;
            })->rawColumns(['action'])->make('true');
        }

        return view('admin.userlist');
    }

    public function view_leave_application(Request $request){
        //
    }

    public function view_leave_application_id(Request $request){
        return response()->json([
            'id' =>$request->user_id,
        ]);
    }
}
