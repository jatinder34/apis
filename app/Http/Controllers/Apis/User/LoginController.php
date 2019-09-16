<?php

namespace App\Http\Controllers\Apis\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function loginAuthentication(Request $request)
    {
        $parameters = $request->all();
        $validation = Validator::make($parameters, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ( $validation->fails() ) {
            $message = array('success'=> false, 'message' => $validation->messages()->first(), 'data'=>null);
            return json_encode($message);
        }else{
            $dataCheck = array('email' => $parameters['email'],'password' => $parameters['password']);
            $user = User::where('email',$parameters['email'])->first();
            if($user){
                if(Auth::attempt($dataCheck)){
                    $message = array('success'=> true, 'message' => 'Loged in successfully!', 'data'=>$user->toArray());
                    return json_encode($message);
                }else{
                    $message = array('success'=> false, 'message' => 'Please enter valid credentials!', 'data'=>null);
                    return json_encode($message);
                }
            }else{
                $message = array('success'=> false, 'message' => 'Account is not found!', 'data'=>null);
                return json_encode($message);
            }
        }
    }
}
