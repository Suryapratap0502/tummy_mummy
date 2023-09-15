<?php

namespace App\Http\Controllers;

use App\Models\AreaTypeModel;
use App\Models\BankModel;
use App\Models\City;
use App\Models\RoleModel;
use App\Models\State;
use App\Models\UserModel;
use App\Models\VendorBusinessModel;
use App\Models\VendorCategoryModel;
use App\Models\VendorInCatModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function index()
    {
        return view('vendor/list');
    }

    public function add_form()
    {
        $data['area_type'] = AreaTypeModel::where('flag', '!=', '2')->get();
        $data['state'] = State::all();
        $data['role'] = RoleModel::where('flag','1')->where('name','Vendor')->first();
        $data['category'] = VendorCategoryModel::where('flag', '!=', '2')->get();
        return view('vendor/add_form',$data);
    }

    public function list()
    {
        $data['vendor_data'] = VendorModel::with('vendor_business_1','admin')->where('flag', '!=', '2')->where('vendor_type', 'Individual')->orWhere('vendor_type','Business Entity')->get();
        return view('vendor/list_ajax',$data);
    }

    public function get_city(Request $request)
    {
        $id = $request->id;
        $city_data = City::where('state_id',$id)->get();
        $output = '<option value="" selected>Select</option>';
        foreach ($city_data as $value) {
            $output .= '<option value="' . $value['id'] . '">' . $value['city'] . '</option>';
        }
        $response = array('status' => true, 'output' => $output);
        echo json_encode($response);
    }

    public function view_details()
    {
        return view('vendor/view');
    }

    public function add(Request $request)
    {
        if($request->vendor_type == 'Individual')
        {
            $validate = Validator::make($request->all(), [
                'in_type' => 'required',
                // 'pan' => 'string|regex:/[A-Z]{5}[0-9]{4}[A-Z]{1}/',
                // 'business_pan' => 'required|string|regex:/[A-Z]{5}[0-9]{4}[A-Z]{1}/',
                // 'aadhar' => 'required|numeric|digits:12|regex:/^\d{12}$/',
                // 'udyog_aadhar' => 'required|numeric|digits:12|regex:/^\d{12}$/',
                // 'contact' => 'required|numeric|digits:10|regex:/^[1-9]\d{9}$/',
                // 'gstin' => 'string|regex:/^\d{2}[A-Z]{5}\d{4}[A-Z]{1}\d{1}$/',
            ]);

            if($request->in_type == 'Armed Force Dependent')
            {
                $validate = Validator::make($request->all(), [
                    'arm_type' => 'required',
                ]);
            }
        }else if($request->vendor_type == 'Business Entity'){
            
            $validate = Validator::make($request->all(), [
                'business_type' => 'required',
                'entity_name' => 'required',
                'establishment' => 'required',
                'reg_year' => 'required',
                'reg_number' => 'required',
                'office_addr' => 'required',
                'entity_email' => 'required',
                'business_pan' => 'required',
                'business_desc' => 'required',
            ]);

            if($request->business_type == 'Other')
            {
                $validate = Validator::make($request->all(), [
                    'other_bus_type' => 'required',
                ]);
            }
        }

        
        $validate = Validator::make($request->all(), [
            
            'vendor_type' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'bank_holder_name' => 'required',
            'ac_no' => 'required',
            'ifsc' => 'required',
            'upi_id' => 'required',
            'micr_no' => 'required',
            'mob_bank' => 'required',
            'area_type' => 'required',
            'image' => 'required',
            'category' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'contact' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'pan' => 'string',
            'pan_docs' => 'required',
            'aadhar' => 'required',
            'aadhar_docs' => 'required',
            'is_approved_fssai' => 'required',
            'is_member_warehouse' => 'required',
            'is_del_part' => 'required',
            'vendor_lat' => 'required',
            'vendor_long' => 'required',
            'vendor_desc' => 'required',
            'gstin' => 'required',
        ]);

        
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {

            // Data insert in Admin table for login
            $data_admin['name'] = $request->name;
            $data_admin['email'] = $request->email;
            $data_admin['password'] = Hash::make($request->password);
            $data_admin['role'] = $request->role;
            $data_admin['designation'] = 'Vendor';
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
            $data['vendor_type'] = $request->vendor_type;
            $data['area_type'] = $request->area_type;
            if (!empty($request->file('image'))) {
                $file = $request->file('image');
                date_default_timezone_set('Asia/Kolkata');
                $filename_vendor = date('YmdHi') . $file->getClientOriginalName();  
                $data['image'] = $filename_vendor;
            }
            if(!empty($request->in_type))
            {
                $data['vendor_type_individual'] = $request->in_type;
            }
            if(!empty($request->arm_type))
            {
                $data['vendor_type_armed'] = $request->arm_type;
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
            $data['is_delivery_boy'] = $request->is_del_part;
            $data['vendor_description'] = $request->vendor_desc;
            $data['fssai_registration_status'] = $request->is_approved_fssai;

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

            if($request->is_approved_fssai == 'Yes')
            {
                if (!empty($request->file('fssai_docs'))) {
                    $file = $request->file('fssai_docs');
                    date_default_timezone_set('Asia/Kolkata');
    
                    $filename_fssai_docs = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/vendors/fssai_docs'), $filename_fssai_docs);
                    $data['fssai_registration_docs'] = $filename_fssai_docs;
                }

                $data['fssai_registration_number'] = $request->fssai_reg_no;
            }

            $data['warehouse_member'] = $request->is_member_warehouse;
            if($request->is_member_warehouse == 'Yes')
            {
                $data['warehouse_id'] = $request->warehouse;
            }

            $insert_data = VendorModel::insert($data);
           $lastId_vendor = DB::getPdo()->lastInsertId();

           // Bank details add in db

           $data_bank_details['user_type'] = 'Vendor';
           $data_bank_details['user_type_id'] = $lastId_vendor;
           $data_bank_details['bank_name'] = $request->bank_name;
           $data_bank_details['branch_name'] = $request->branch_name;
           $data_bank_details['bank_holder_name'] = $request->bank_holder_name;
           $data_bank_details['account_no'] = $request->ac_no;
           $data_bank_details['ifsc_code'] = $request->ifsc;
           $data_bank_details['upi_id'] = $request->upi_id;
           $insert_data = BankModel::insert($data_bank_details);

           // $lastId_vendor = VendorModel::insertGetId($data);

            if($insert_data && $request->vendor_type == 'Business Entity')
            {
                // Category data stored in DB
                
                for ($y = 0; $y < count($request->category); ++$y) { 

                    $data_catgory = [
                        'category_id' => $request->category[$y],
                    ];
                    $data_catgory['vendor_id'] = $lastId_vendor;
                    $insert_data = VendorInCatModel::insert($data_catgory);
                }

                // business details store data in DB

                $data_business_details['vendor_id'] = $lastId_vendor;
                $data_business_details['business_type'] = $request->business_type;
                if($request->business_type == 'Other')
                {
                    $data_business_details['other_business'] = $request->other_bus_type;
                }
                $data_business_details['business_name'] = $request->entity_name;
                $data_business_details['est_year'] = $request->establishment;
                $data_business_details['registration_year'] = $request->reg_year;
                $data_business_details['registration_no'] = $request->reg_number;
                $data_business_details['office_address'] = $request->office_addr;
                $data_business_details['business_email'] = $request->entity_email;
                $data_business_details['business_pan'] = $request->business_pan;
                $data_business_details['udyog_aadhar'] = $request->udyog_aadhar;
                $data_business_details['website'] = $request->website;
                $data_business_details['is_exp_imp'] = $request->exp_imp;

                $insert_data = VendorBusinessModel::insert($data_business_details);

            }
            return response()->json(['code' => 200, 'message' => 'Vendor Added']);
        }else{
            return response()->json(['code' => 201, 'message' => 'Something Went Wrong']);
        }
        
        }
    }
}
