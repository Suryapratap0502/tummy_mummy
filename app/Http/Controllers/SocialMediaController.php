<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        return view('social_media/list');
    }

    public function list()
    {
        //$data['driver_data'] = WareTypeModel::with('admin_table')->where('flag', '!=', '2')->get();
        return view('social_media/list_ajax');
    }
}
