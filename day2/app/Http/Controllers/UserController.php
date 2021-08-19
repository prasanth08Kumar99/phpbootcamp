<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function createUser(Request $request){

        DB::table('users')->insert([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
        ]);

        echo "User $request->firstName $request->lastName is created successfully!";

    }

    public function fetchAllUsers(){
        $users = DB::table('users')->get() ;
        return $users;
    }

    public function fetchUserById($id){

        $user = DB::table('users')->where('id', $id)->first();
        return $user;
    }

    public function deleteUser($id){
        DB::table('users')->where('id',$id)->delete();

        echo "User $id is deleted successfully!";

    }

}
