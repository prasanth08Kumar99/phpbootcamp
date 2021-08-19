<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    public function createUser(Request $request)
    {
        DB::table('customers')->insert([
            'userName' => $request->userName,
            'phone' => $request->phone,
            'mail' => $request->mail,
        ]);

        echo "User Created Successfully";
    }

    public function getUserByName($name)
    {
        return DB::table('customers')->where('userName', $name).get();
    }

    public function getUserByMail($mail)
    {
        return DB::table('customers')->where('mail', $mail).get();
    }

    public function getUserByPhone($phone)
    {
        return DB::table('customers')->where('phone', $phone).get();
    }

    public function getUsers()
    {
        return DB::table('customers').get();
    }

    public function deleteUserByMail($mail)
    {
        DB::table('customers')->where('mail', $mail)->delete();
    }

    public function deleteUserByPhone($phone)
    {
        DB::table('customers')->where('phone', $phone)->delete();
    }

    public function deleteUserByName($name)
    {
        DB::table('customers')->where('userName', $name)->delete();
    }

}
