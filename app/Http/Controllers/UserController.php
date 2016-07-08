<?php

namespace App\Http\Controllers;

use App\User as User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail as Mail;

class UserController extends Controller
{

    /**
     * Method for creating an user in the DB after checking the Input values.
     *
     * @param Request $request
     * @author Stefano Groenland
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function registerUser(Request $request){
        //data array with all input values from the request.
        $data = array(
            'email'                 =>  $request['email'],
            'username'              =>  $request['username'],
            'password'              =>  $request['password'],
            'password_confirmation' =>  $request['password_confirmation'],
            'streetname'            =>  $request['streetname'],
            'postalcode'            =>  $request['postalcode'],
            'city'                  =>  $request['city']
        );
        //validation rules array.
        $rules = array(
            'email'                 =>  'required|unique:users|email',
            'username'              =>  'required|unique:users',
            'password'              =>  'required|min:6|confirmed',
            'password_confirmation' =>  'required|min:6',
            'streetname'            =>  'required',
            'postalcode'            =>  'required',
            'city'                  =>  'required'
        );
        //make the validator and check if it fails.
        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            //return to registration page with errors and old input.
            return redirect('/')->withErrors($validator)->withInput($data);
        }
        //forget password_confirmed value, we don't store an confirmation in the db :)
        array_forget($data, 'password_confirmation');
        //bcrypt the password
        $data['password'] = bcrypt($data['password']);
        //create the database row with filled in information.
        User::create($data);
        //Send an e-mail to confirm the user has registered.
        $this->sendMail($data);
        //return to the register success page.
        return redirect('/registeren-gelukt');
    }

    /**
     * Method for sending the registered user an e-mail to confirm their registration.
     *
     * @author Stefano Groenland
     * @param $data
     */
    public function sendMail($data)
    {
        Mail::send('emails.registered', $data, function ($msg) use ($data) {
            $msg->from('noreply@acato.nl', 'No-reply Acato');
            $msg->to($data['email'], $data['username']);
            $msg->replyTo('no-reply@moodles.nl', $name = null);
            $msg->subject('Welkom bij Acato!');
        });
    }
}
