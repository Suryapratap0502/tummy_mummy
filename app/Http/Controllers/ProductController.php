<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product/list');
    }

    public function list()
    {
        // $data['vendor_data'] = ProductModel::with('vendor_business_1','admin')->where('flag', '!=', '2')->where('vendor_type', 'Individual')->orWhere('vendor_type','Business Entity')->get();
        return view('product/list_ajax');
    }

    public function add_form()
    {
        return view('product/add_form');
    }
}
