<?php

namespace App\Http\Controllers;

use App\Models\AreaTypeModel;
use App\Models\DriverModel;
use App\Models\RoleModel;
use App\Models\BankModel;
use App\Models\State;
use App\Models\UserModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function index()
    {
        return view('driver/list');
    }

    public function add_form()
    {
        $data['area_type'] = AreaTypeModel::where('flag', '!=', '2')->get();
        $data['state'] = State::all();
        $data['role'] = RoleModel::where('flag','1')->where('name','Driver')->first();
        return view('driver/add_form',$data);
    }

    public function list()
    {
        $data['driver_data'] = DriverModel::with('admin_table', 'vendor')->where(function ($query) {
            $query->whereHas('vendor', function ($subquery) {
                $subquery->where('vendor_type', '=', 'Driver');
            });
        })->where('flag', '!=', '2')->get();
        return view('driver/list_ajax',$data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            
            'area_type' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'contact' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'pin' => 'required',
            'pin' => 'required',
            'pan' => 'string',
            'pan_docs' => 'required',
            'aadhar' => 'required',
            'aadhar_docs' => 'required',
            'is_member_warehouse' => 'required',
            'vendor_lat' => 'required',
            'vendor_long' => 'required',
            'vendor_desc' => 'required',
            'image' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'bank_holder_name' => 'required',
            'ac_no' => 'required',
            'ifsc' => 'required',
            'upi_id' => 'required',
            'micr_no' => 'required',
            'mob_bank' => 'required',
            // vehicle details
            'vehicle_type'=> 'required',
            'vehicle_no'=> 'required',
            'rc_no'=> 'required',
            'rc_expiry'=> 'required',
            'rc_copy'=> 'required',
            'dl_no'=> 'required',
            'dl_expiry'=> 'required',
            'dl_copy'=> 'required',
            'is_bag_avl'=> 'required',
            'sut_time'=> 'required',
            

            
        ]);

        
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {

            // Data insert in Admin table for login
            $data_admin['name'] = $request->name;
            $data_admin['email'] = $request->email;
            $data_admin['password'] = Hash::make($request->password);
            $data_admin['role'] = $request->role;
            $data_admin['designation'] = 'Driver';
            $data_admin['contact'] = $request->contact;
            $data_admin['added_by'] = getuserdetail('id');

            if (!empty($request->file('image'))) {
                $file = $request->file('image');
                date_default_timezone_set('Asia/Kolkata');

                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/vendors'), $filename);
                $data_admin['image'] = $filename;
            }

            $insert_data = UserModel::insert($data_admin);
            if($insert_data)
            {
            $lastId_admin = DB::getPdo()->lastInsertId();
            $data['admin_id'] = $lastId_admin;
            $data['vendor_type'] = 'Driver';
            $data['area_type'] = $request->area_type;
            if (!empty($request->file('image'))) {
                $file = $request->file('image');
                date_default_timezone_set('Asia/Kolkata');
                $filename_vendor = date('YmdHi') . $file->getClientOriginalName();  
                $data['image'] = $filename_vendor;
            }
            
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = $request->password;
            $data['gender'] = $request->gender;
            $data['mobile_communication'] = $request->contact;
            $data['gst_in'] = $request->gstin;
            $data['pan'] = $request->pan;
            $data['aadhar'] = $request->aadhar;
            $data['state'] = $request->state;
            $data['city'] = $request->city;
            $data['address'] = $request->address;
            $data['pin'] = $request->pin;
            $data['dob'] = $request->dob;
            $data['age'] = $request->age;
            $data['vendor_lat'] = $request->vendor_lat;
            $data['vendor_long'] = $request->vendor_long;
            $data['vendor_description'] = $request->vendor_desc;
            $data['warehouse_member'] = $request->is_member_warehouse;
            

            if (!empty($request->file('aadhar_docs'))) {
                $file = $request->file('aadhar_docs');
                date_default_timezone_set('Asia/Kolkata');

                $filename_aadhar_docs = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/vendors/aadhar_docs'), $filename_aadhar_docs);
                $data['aadhar_docs'] = $filename_aadhar_docs;
            }

            if (!empty($request->file('pan_docs'))) {
                $file = $request->file('pan_docs');
                date_default_timezone_set('Asia/Kolkata');

                $filename_pan_docs = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/vendors/pan_docs'), $filename_pan_docs);
                $data['pan_docs'] = $filename_pan_docs;
            }

           

            $data['warehouse_member'] = $request->is_member_warehouse;
            if($request->is_member_warehouse == 'Yes')
            {
                $data['warehouse_id'] = $request->warehouse;
            }

            $insert_data = VendorModel::insert($data);
           $lastId_vendor = DB::getPdo()->lastInsertId();

            // driver details
            $driver_data['admin_id'] = $lastId_admin;
            $driver_data['area_type'] = $request->area_type;
            $driver_data['vendor_id'] = $lastId_vendor;
            $driver_data['vehicle_type'] = $request->vehicle_type;
            $driver_data['vehicle_no'] = $request->vehicle_no;
            $driver_data['rc_no'] = $request->rc_no;
            $driver_data['rc_expiry_date'] = $request->rc_expiry;
            $driver_data['rc_docs'] = $request->rc_copy;
            $driver_data['dl_no'] = $request->dl_no;
            $driver_data['dl_expiry'] = $request->dl_expiry;
            $driver_data['dl_docs'] = $request->dl_copy;
            $driver_data['is_bag_avl'] = $request->is_bag_avl;
            $driver_data['suitable_time'] = $request->sut_time;
            $driver_data['pan_no'] = $request->pan;
            $driver_data['aadhar_no'] = $request->aadhar;
            if($request->sut_time == 'Flexible Time')
            {
                $driver_data['from_time'] = $request->from_time;
                $driver_data['to_time'] = $request->to_time;
            }

            // if (!empty($request->file('aadhar_docs'))) {
            //     $file_dr = $request->file('aadhar_docs');
            //     date_default_timezone_set('Asia/Kolkata');

            //     $filename_aadhar_docs_dr = date('YmdHi') . $file_dr->getClientOriginalName();
            //     $file_dr->move(public_path('upload/vendors/aadhar_docs'), $filename_aadhar_docs_dr);
            //     $driver_data['aadhar_docs'] = $filename_aadhar_docs_dr;
            // }

            // if (!empty($request->file('pan_docs'))) {
            //     $file = $request->file('pan_docs');
            //     date_default_timezone_set('Asia/Kolkata');

            //     $filename_pan_docs_dr = date('YmdHi') . $file->getClientOriginalName();
            //     $file->move(public_path('upload/vendors/pan_docs'), $filename_pan_docs_dr);
            //     $driver_data['pan_docs'] = $filename_pan_docs_dr;
            // }
            $insert_data = DriverModel::insert($driver_data);

           // Bank details add in db

           $data_bank_details['user_type'] = 'Driver';
           $data_bank_details['user_type_id'] = $lastId_vendor;
           $data_bank_details['bank_name'] = $request->bank_name;
           $data_bank_details['branch_name'] = $request->branch_name;
           $data_bank_details['bank_holder_name'] = $request->bank_holder_name;
           $data_bank_details['account_no'] = $request->ac_no;
           $data_bank_details['ifsc_code'] = $request->ifsc;
           $data_bank_details['upi_id'] = $request->upi_id;
           $data_bank_details['micr_no'] = $request->micr_no;
           $data_bank_details['mob_link_bank'] = $request->mob_bank;
           $insert_data = BankModel::insert($data_bank_details);

            return response()->json(['code' => 200, 'message' => 'Delhivery Vendor Added']);
        }else{
            return response()->json(['code' => 201, 'message' => 'Something Went Wrong']);
        }
        
        }
    }
}
