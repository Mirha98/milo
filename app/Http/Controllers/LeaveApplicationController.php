<?php

namespace App\Http\Controllers;

use App\Models\leave_application;
use App\Models\User;
use App\Models\user_detail;
use Illuminate\Http\Request;
use Carbon\carbon;
use DataTables;
use Illuminate\Support\Facades\Auth;

class LeaveApplicationController extends Controller
{
    public function index(){
        //
    }

    public function store(Request $request){

        $start_date = Carbon::parse($request->leave_start_date);
        $end_date = Carbon::parse($request->leave_end_date);
        $duration = $start_date->diffInDays($end_date);


        $user = User::where('id',$request->user_id)->first();

        $file = $request->file('leave_file');
        $filename = $user->username.now().'.'.$file->getClientOriginalExtension();
        $file->storeAs('/storage/file/',$filename);

        $leave_data = [
            'user_id' => $request->user_id,
            'category_id' => $request->leave_category,
            'name' => $request->leave_name,
            'description' => $request->leave_description,
            'file' => $filename,
            'start_date' => $request->leave_start_date,
            'end_date' => $request->leave_end_date,
            'duration' => $duration,
        ];
        leave_application::create($leave_data);

        return response()->json([
            'status' => 200,
            'message' => 'Application submitted...'
        ]);
    }

    public function application_listing(Request $requets){
        if(Auth::user()->role == '0'){
            return view('user.application_listing');
        }
        else{

            return view('admin.application_listing');
        }
    }

    public function application_listing_all(Request $request){
        if(Auth::user()->role == '0'){
            $leave = leave_application::select('id','category_id','name','file','duration','status')->where('user_id',Auth::user()->id)->get();
        }
        else{
            $leave = leave_application::select('id','category_id','name','file','duration','status')->get();
        }
        return DataTables::of($leave)->addIndexColumn()->addColumn('action',function($row){
            $btn = '<button class="btn btn-success btn-sm btnViewLeaveApplication" data-bs-toggle="modal" data-bs-target="#view_leave_application_Modal" value="'.$row->id.'">View</button>
            <button class="btn btn-warning btn-sm">Edit</button>
            <button class="btn btn-danger btn-sm">Delete</button>';
            return $btn;
        })->rawColumns(['action'])->make(true);
    }

    public function view_application_user(Request $request){
        // $leave_application = leave_application::where('id',$request->user_id)->first();
        $leave_application = leave_application::find($request->user_id);
        $category = $leave_application->leave_category;
        // $user = User::where('id',$leave_application->user_id)->first();
        $user = leave_application::find($request->user_id)->User;
        $user_detail = $user->user_detail;
        return response()->json([
            'leave_application' => $leave_application,
            'user' => $user,
            'user_detail' => $user_detail,
            'category' => $category
        ]);
    }

    public function leave_status(Request $request){
        $leave_application = leave_application::where('id', $request->view_application_id);
        $leave_data = [
            'status' => 1
        ];

        $leave_application->update($leave_data);
        return response()->json([
            'status' => 200,
            'message' => 'The application have been apporved !'
        ]);
    }
}
