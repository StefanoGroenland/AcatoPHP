<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registerUser(Request $request){
        $data = array(
            'email'                 =>  $request['email'],
            'username'              =>  $request['username'],
            'password'              =>  $request['password'],
            'password_confirmation' =>  $request['password_confirmed'],
            'streetname'            =>  $request['streetname'],
            'postalcode'            =>  $request['postalcode'],
            'city'                  =>  $request['city']
        );

        $rules = array(
            'email'                 =>  'required|unique:users|email',
            'username'              =>  'required|unique:users',
            'password'              =>  'required|min:6|confirmed',
            'password_confirmation' =>  'required|min:6',
            'streetname'            =>  'required',
            'postalcode'            =>  'required',
            'city'                  =>  'required'
        );

        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            return redirect('/registeren')->withErrors($validator);
        }
        array_forget($data, 'password_confirmation');
        User::create($data);
        return redirect('/registeren-gelukt');
    }
}
