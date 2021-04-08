<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //Required for calling User model
use Session; //Required for using Session class
use Illuminate\Support\Facades\DB; //Required for using DB class
use Illuminate\Pagination\Paginator; //Required for using Laravel's paginator
use Illuminate\Support\Facades\Hash; //For using password hash

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
        return view('list');
    }
}
