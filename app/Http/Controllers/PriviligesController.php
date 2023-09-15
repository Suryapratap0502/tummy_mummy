<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriviligesController extends Controller
{
    public function index($id)
    {
        $data['id'] = $id;
        return view('privileges/list');
    }
}
