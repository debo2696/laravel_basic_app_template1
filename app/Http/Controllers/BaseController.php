<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //Required for calling User model
use Session; //Required for using Session class
use Illuminate\Support\Facades\DB; //Required for using DB class
use Illuminate\Pagination\Paginator; //Required for using Laravel's paginator
use Illuminate\Support\Facades\Hash; //For using password hash
use Symfony\Component\HttpFoundation\Cookie; //For attaching a new Cookie to a response
use Illuminate\Http\Response; //Response for sending and accepting cookie

class BaseController extends Controller
{
    //
    public function getlogin()
    {
        return view('sign-in');
    }
    public function getsignup()
    {
        return view('sign-up');
    }
    public function postsignup(Request $req)
    {
        
        //print_r($req->all());die();
    
        $validated = $req->validate([
            'sup_username' => 'required',
            'sup_email' => 'required',
            'sup_pass' => 'required'
        ]);
        $user=new User;
        $user->name=$req->sup_username;
        $user->email=$req->sup_email;
        $user->password=Hash::make($req->sup_pass);
        $result=$user->save();
        
        if($result)
        {
            return view('sign-up');
        }
        
    }
    public function postlogin(Request $req)
    {
        
        if (Hash::check($req->sin_pass, DB::table('users')->where('name',$req->sin_username)->value('password'))) 
        {
            // The passwords match...
            User::select ('*')->where
            (
                [
                    ['name','=',$req->sin_username],
                    ['password','=',$req->sin_pass],    
                ]
            )->get();
        }
        else{ echo "Password mismatch"; die();}
        
        $user=User::all();
        $req->session()->put('creds',[$req->input()]);
        return redirect()->route('list');
    }
    public function list(Request $req)
    {
        $user = DB::table('users')->simplePaginate(2);
        
        Paginator::useBootstrap();
        $value=$req->session()->get('creds');
        //print_r($value);die();
        $sesname=$value[0]['sin_username'];
        return view('list',['user'=>$user],['usrname'=>$sesname]); //Dashboard page
    }
    public function logout(Request $req)
    {
        echo "Session Destroyed";
        Session::flush();
    }
    
    public function fetch(Request $req)
    {
        $cookieActiveTime = 1; //means 1 minute
        $response = new Response();
        //Call the withCookie() method with the response method
        $response->withCookie(cookie('name', $req->mflg, $cookieActiveTime));
        $response->withCookie(cookie('theme', $req->tflg, $cookieActiveTime));
        //$response->withCookie(cookie()->forever('name', $val));    
        return $response;
    }
    public function getCookie(Request $req) 
    {
        echo "This is cookie response page.";
        $value = $req->cookie('name');
        $value = $req->cookie('theme');
        echo $value;
    }
    public function fileread()
    {
        echo "File read";
        echo $_SERVER['DOCUMENT_ROOT'];
        $mydir="random_files/";
        $myfiles = scandir($mydir);  
        //displaying the files in the directory
        echo ($myfiles[3]);
        $fpath="random_files/sm1.txt";
        $myfile = fopen($fpath, "r") or die("Unable to open file!");
        echo fread($myfile,filesize($fpath));
        fclose($myfile);
    }
    public function sesCheck(Request $req)
    {
        print_r($req->session()->all());
        //print_r (session()->get('nw'));
        die();
    }

    public function getFlash()
    {        
        return view('basic-form-elements');
    }
    public function postFlash(Request $req)
    {
        $req->session()->put('nw',[$req->input()]);
        $validated = $req->validate([
            'tbox' => 'required|max:3'
        ]);
        echo $request->flash();
    }
}