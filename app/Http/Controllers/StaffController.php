<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index()
    {
        $data['role'] = RoleModel::where('flag', '!=', '2')->where('id', '!=', '1')->get();
        return view('staff/list', $data);
    }

    public function list()
    {
        $data['staff_data'] = UserModel::with('role_data')->where('flag', '!=', '2')->where('role','!=','1')->where('role','22')->where('added_by',getuserdetail('id'))->get();
        return view('staff/list_ajax',$data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'unique:admin|required',
            'password' => 'required',
            'contact' => 'required',
            'designation' => 'required',

        ]);

        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            $data['name'] = $request->name;
            $data['role'] = $request->role;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $data['contact'] = $request->contact;
            $data['designation'] = $request->designation;
            if (!empty($request->file('image'))) {
                $file = $request->file('image');
                date_default_timezone_set('Asia/Kolkata');

                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/staff'), $filename);
                $data['image'] = $filename;
            }

            $insert_data = UserModel::insert($data);
            if ($insert_data) {
                return response()->json(['code' => 200, 'message' => 'Staff Added']);
            } else {
                return response()->json(['code' => 201, 'message' => 'Something Went Wrong']);
            }
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['staff_data'] = UserModel::where('id', $id)->first();
        return view('staff/edit', $data);
    }

    public function change_pass(Request $request)
    {
        $data['id'] = $request->id;
        return view('staff/change_password', $data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['contact'] = $request->contact;
        $data['designation'] = $request->designation;
        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            date_default_timezone_set('Asia/Kolkata');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/staff'), $filename);
            $data['cat_image'] = $filename;
        }
        $update_data = UserModel::where('id', $id)->update($data);
        if ($update_data) {
            return response()->json(['code' => 200, 'message' => 'Staff Updated']);
        } else {
            return response()->json(['code' => 400, 'message' => 'Something Went Wrong']);
        }
    }

    public function update_pass(Request $request)
    {
       echo $id = $request->id;
    }

    public function side(Request $request)
    {
        $id = $request->id;
        $data['staff_data'] = UserModel::with('role_data')->where('id', $id)->first();
        return view('staff/staff_side_details', $data);
    }
}
