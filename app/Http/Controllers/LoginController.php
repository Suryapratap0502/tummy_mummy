<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if (Session::get('admin_login')) {
            return redirect('dashboard');
        } else {
            return view('welcome');
        }
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => ['required', 'email', 'min:10'],
            'password' => 'required|min:6'
        ]);

        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {

            $username = $request->username;
            $check = UserModel::where('email', $username)->first();

            if ($check) {

                $pass_verify = Hash::check($request->password, $check->password);

                if ($pass_verify) {

                    $session['admin_login'] = ['id' => $check->id, 'name' => $check->name, 'email' => $check->email, 'role' => $check->role];
                    Session::put($session);
                    Cookie::queue('login_email', $check->email, time() + 60 * 60 * 24 * 100);
                    Cookie::queue('login_pass', $check->password, time() + 60 * 60 * 24 * 100);

                    return response()->json(['code' => 200, 'message' => 'Login Successfully']);
                } else {
                    return response()->json(['code' => 402, 'message' => 'Incorrect Password']);
                }
            } else {
                return response()->json(['code' => 403, 'message' => 'Email Address is not registered']);
            }
        }
    }
}
