<?php

namespace App\Http\Controllers;

use App\Models\WarehouseModel;
use App\Models\WareTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WareTypeController extends Controller
{
    public function index()
    {
        return view('warehouse/type/list');
    }

    public function list()
    {
        $data['warehouse_type'] = WareTypeModel::where('flag', '!=', '2')->get();
        return view('warehouse/type/list_ajax',$data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'w_type' => 'required',
            'w_unit' => 'required',
        ]);
        
        
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            $w_type = $request->w_type;
            $w_unit = $request->w_unit;
            for ($y = 0; $y < count($w_type); ++$y) { 

                $data = [
                    'warehouse_type' => $w_type[$y],
                    'unit' => $w_unit[$y],
                ];
                $insert_data = WareTypeModel::insert($data);
            }

            if ($insert_data) {
                return response()->json(['code' => 200, 'message' => 'Warehouse Type Added']);
            } else {
                return response()->json(['code' => 201, 'message' => 'Something Went Wrong']);
            }
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['warehouse_type'] = WareTypeModel::where('id', $id)->first();
        return view('warehouse/type/edit', $data);
    }
}
