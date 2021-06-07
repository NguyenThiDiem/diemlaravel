<?php

namespace App\Http\Controllers;

use App\Http\Requests\signupRequest;
use Illuminate\Http\Request;

class signupController extends Controller
{
    //
    public function index (){
        return view('signup');
    }
    public function displayInfor(signupRequest $request){
        $user=[
            'name'=>$request->input("name"),
            'age'=>$request->input("age"),
            'date'=>$request->input("date"),
            'phone'=>$request->input("phone"),
            'web'=>$request->input("web"),
            'address'=>$request->input("address")

        ];
        return view('signup')->with('user',$user);
    }
}
