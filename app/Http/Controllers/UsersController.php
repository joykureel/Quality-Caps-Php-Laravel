<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
class UsersController extends Controller
{
    public function index(){
        $users=User::all();
        return view('users',['users'=>$users]);
    }
    public function status($id){
        $users=User::find($id);
        if($users->status=="enable"){
            $users->status="disable";
        }else{
            $users->status="enable";
        }
        $users->save();
        return Redirect::back();

    }
}
