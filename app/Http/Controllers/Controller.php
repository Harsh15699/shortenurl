<?php

namespace App\Http\Controllers;
use App\Models\Url;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
session_start();
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function landingPage(){
        if(Auth::check()){
        return view('FrontEnd/url');}
        else{
            return redirect(route('login'));
        }
    }

    public function index(){
        return view('FrontEnd/index');
    }

    public function signup(){
        if(Auth::check()){
            return redirect(route('landingPage'));
        }
        return view('FrontEnd/signup');
    }

    public function Login(){
        if(Auth::check()){
            return redirect(route('landingPage'));
        }
        return view('FrontEnd/login');
    }

    public function checkUser(Request $request){
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect(route('landingPage'));
        }
        else{
            $_SESSION['error']="Email Id or Password is incorrect";
            return redirect(route('login'));
        }
    }

    public function saveUser(Request $request){
        $data=[
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password'])
        ];
            $user=User::where('email',$request['email'])->get();
            if(!$user->isEmpty()){
                $_SESSION['error']="Email Id already exist";
                return redirect(route('signup'));
            }
            User::create($data);
        return redirect(route('login'));
    }

    public function userDashboard(){
        if(Auth::check()){
        $urls=Url::where('user_id',Auth::user()->id)->get();
        return view('FrontEnd/dashboard')->with('urls',$urls);
        }
        else{
            return redirect(route('landingPage'));
        }
    }

    public function saveUrl(Request $request){
        $unique=URL::where('actual_url',$request['url'])->get();
        if(!$unique->isEmpty()){
            $_SESSION['error']="Shortened Url already present";
            $_SESSION['actual_url']=$request['url'];
            $_SESSION['shortened_url']=$request->getSchemeAndHttpHost().'/su/'.$unique[0]['shortened_url'];
            return redirect(route('landingPage'));
        }
        $randomString = '';
        while(1){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            for ($i = 0; $i < 8; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $unique1=URL::where('shortened_url',$randomString)->get();
                if($unique1->isEmpty()){
                    break;
                }
        }
        $id=Auth::user()->id;
        $data=[
            'actual_url'=>$request['url'],
            'shortened_url'=>$randomString,
            'total_visit'=>0,
            'user_id'=>$id
        ];
        $url=Url::create($data);
        if($url=null){
            $_SESSION['error']="Something went wrong,Please try again";
            return redirect(route('landingPage'));
        }
        $_SESSION['actual_url']=$request['url'];
        $_SESSION['shortened_url']=$request->getSchemeAndHttpHost().'/su/'.$randomString;
        return redirect(route('landingPage'));
    }

    public function findActualUrl($keyword){
        $actual=Url::where('shortened_url',$keyword)->first();
        if($actual==null){
            $_SESSION['error']="Something went wrong,Please try again";
            return redirect(route('landingPage'));
        }
        Url::where('shortened_url',$keyword)->update(['total_visit'=>$actual['total_visit']+1]);
        return redirect($actual['actual_url']);
    }
}
