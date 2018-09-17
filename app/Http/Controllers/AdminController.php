<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Auth;

class AdminController extends Controller
{
    public function  getLogin()
    {
        return view('admin.login');
    }
    public function postLogin(AdminRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return "cc";
        }
        else
            return "qq";
    }
    public function index()
    {
        return Auth::user();
    }
}
