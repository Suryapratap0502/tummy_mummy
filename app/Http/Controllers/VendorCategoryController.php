<?php

namespace App\Http\Controllers;

use App\Models\VendorCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorCategoryController extends Controller
{
    public function index()
    {
        return view('vendor/category/list');
    }

    public function list()
    {
        $data['vc_data'] = VendorCategoryModel::where('flag', '!=', '2')->get();
        return view('vendor/category/list_ajax',$data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        
        
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            $images = $request->file('image');
            $names = $request->name;
            $fssai_req = $request->fssai_req;
            for ($y = 0; $y < count($names); ++$y) { 

                $data = [
                    'name' => $names[$y],
                    'is_fssai_req' => $fssai_req[$y],
                ];
                if (!empty($images[$y])) {
                    $file = $images[$y];
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/vendor_category'), $filename);
                    $data['image'] = $filename;
                }
                $insert_data = VendorCategoryModel::insert($data);
            }

            if ($insert_data) {
                return response()->json(['code' => 200, 'message' => 'Category Added']);
            } else {
                return response()->json(['code' => 201, 'message' => 'Something Went Wrong']);
            }
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['vc_data'] = VendorCategoryModel::where('id', $id)->first();
        return view('vendor/category/edit', $data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        
        
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
        $data['name'] = $request->name;
        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            date_default_timezone_set('Asia/Kolkata');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/vendor_category'), $filename);
            $data['image'] = $filename;
        }
        $update_data = VendorCategoryModel::where('id', $id)->update($data);
        if ($update_data) {
            return response()->json(['code' => 200, 'message' => 'Category Updated']);
        } else {
            return response()->json(['code' => 400, 'message' => 'Something Went Wrong']);
        }
    }
    }
}
