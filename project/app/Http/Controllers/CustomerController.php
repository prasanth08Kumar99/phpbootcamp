<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function createUser(Request $request)
    {
        $rules = array(
            "userName"=> "required|min:2|max:25",
            "mail" => "required|email",
            "phone" => "required|unique:customers|digits:10",
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }

        $user = Customer::create(['userName'=>$request->userName, 'phone'=>$request->phone, 'mail' =>$request->mail]);

        return response()->json([
            "msg" => "User $request->userName is created successfully!"
        ], 200);
    }

    public function getUserByName($name)
    {
        $name = strtolower($name);
        if (Customer::where('userName', $name)->exists()) {
            $user = Customer::where('userName', $name)->get();
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "Username doesn't exist!"
            ], 404);
        }

    }

    public function getUserByMail($mail)
    {
        $mail = strtolower($mail);
        if (Customer::where('mail', $mail)->exists()) {
            $user = Customer::where('mail', $mail)->get();
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "User email doesn't exist!"
            ], 404);
        }
    }

    public function getUserByPhone($phone)
    {
        if (Customer::where('phone', $phone)->exists()) {
            $user = Customer::where('phone', $phone)->get();
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "User phone doesn't exist!"
            ], 404);
        }
    }

    public function getUsers()
    {
        $users = Customer::get();
        return response($users, 200);
    }

    public function deleteUserByMail($mail)
    {
        $mail = strtolower($mail);
        if(Customer::where('mail', $mail)->exists()){
            DB::table('customers')->where('mail',$mail)->delete();
            return response()->json([
                "message" => "User successfully deleted!"
            ], 200);
        } else {
            return response()->json([
                "message" => "User mail doesn't exist!!"
            ], 404);
        }
    }

    public function deleteUserByPhone($phone)
    {
        if(Customer::where('phone', $phone)->exists()){
            DB::table('customers')->where('phone',$phone)->delete();
            return response()->json([
                "message" => "User successfully deleted!"
            ], 200);
        } else {
            return response()->json([
                "message" => "User phone doesn't exist!!"
            ], 404);
        }
    }

    public function deleteUserByName($name)
    {
        $name = strtolower($name);
        if(Customer::where('userName', $name)->exists()){
            DB::table('customers')->where('userName',$name)->delete();
            return response()->json([
                "message" => "User successfully deleted!"
            ], 200);
        } else {
            return response()->json([
                "message" => "User name doesn't exist!!"
            ], 404);
        }
    }

}
