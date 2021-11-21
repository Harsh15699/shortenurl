<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
class AdminController extends Controller
{
    public function adminLogin(){
        return view('BackEnd/login');
    }
    public function dashboard(Request $request){
        $admin=Admin::all();
        if($admin[0]['username']===$request['username'] && $admin[0]['password']===$request['password']){
            return redirect(route('getDashboard'));
        }
        return view('BackEnd/login');
    }

    public function getDashboard(){
            $urls=Url::all();
            return view('BackEnd/dashboard')->with('urls',$urls);
    }
}
