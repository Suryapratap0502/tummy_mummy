<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        return view('role/list');
    }

    public function list()
    {
        if(getuserdetail('id') == 1)
        {
            $data['role_data'] = RoleModel::where('flag', '!=', '2')->where('id','!=','1')->get();
            return view('role/list_ajax', $data);
        }else{
            $data['role_data'] = RoleModel::where('flag', '!=', '2')->where('id','!=','1')->where('added_by',getuserdetail('id'))->get();
            return view('role/list_ajax', $data);
        }
        
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'role_name' => 'required',
        ]);
        
        
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            for ($y = 0; $y < count($request->role_name); ++$y) {

                $data['name'] = $request->role_name[$y];
                $insert_data = RoleModel::insert($data);
            }

            if ($insert_data) {
                return response()->json(['code' => 200, 'message' => 'Role Added']);
            } else {
                return response()->json(['code' => 201, 'message' => 'Something Went Wrong']);
            }
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['role_data'] = RoleModel::where('id', $id)->first();
        return view('role/edit', $data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $data['name'] = $request->role_name;
        $update_data = RoleModel::where('id', $id)->update($data);
        if ($update_data) {
            return response()->json(['code' => 200, 'message' => 'Role Updated']);
        } else {
            return response()->json(['code' => 400, 'message' => 'Something Went Wrong']);
        }
    }
}
