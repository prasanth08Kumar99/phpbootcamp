<?php

namespace Tests\Unit;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class createUserTest extends TestCase
{

    use RefreshDatabase;

    public function test_createUserErrorEmailRequired()
    {

        $response = $this->json('POST','/api/users',['userName'=>'prasanth', 'phone'=>'8309078466']);

        $response
            -> assertStatus(422)
            ->assertJSON(["errors" => ["email" => [
                "The email field is required."
            ]]]);
    }

    public function test_createUserErrorNameRequired()
    {

        $response = $this->json('POST','/api/users',[ 'phone'=>'8309078466', 'mail'=>'prasanth@gmail.com']);

        $response
            -> assertStatus(422)
            ->assertJSON(["errors" => ["name" => [
                "The name field is required."
            ]]]);
    }

    public function test_createUserErrorPhoneNoRequired()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST','/api/users',[ 'userName'=>'prasanth', 'mail'=>'prasanth@gmail.com']);

        $response
            -> assertStatus(422)
            ->assertJSON(["errors" => ["phone" => [
                "The phone no field is required."
            ]]]);
    }

    public function test_createUser()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST','/api/users',['userName'=>'prasanth', 'phone'=>'8309078466', 'mail' =>'prasanth@gmail.com']);

        $response
            -> assertStatus(200)
            ->assertJSON([
                "msg" => "User prasanth is created successfully!"
            ]);
    }

    public function test_deleteUserByEmail()
    {
        Customer::create(['userName'=>'prasanth', 'phone'=>'8309078466', 'mail' =>'prasanth@gmail.com']);
        $response = $this->json('DELETE', '/api/users/mail/prasanth@gmail.com');

        $response
            ->assertStatus(200);
    }

    public function test_deleteUserByEmailError()
    {
        $response = $this->json('DELETE', '/api/users/mail/prasanth@gmail.com');

        $response
            ->assertStatus(404);
    }
    public function test_deleteUserByName()
    {
        Customer::create(['userName'=>'prasanth', 'phone'=>'8309078466', 'mail' =>'prasanth@gmail.com']);
        $response = $this->json('DELETE', '/api/users/name/prasanth');

        $response
            ->assertStatus(200);
    }

    public function test_deleteUserByNameError()
    {
        $response = $this->json('DELETE', '/api/users/name/prasanth');

        $response
            ->assertStatus(404);
    }
    public function test_deleteUserByPhoneNo()
    {
        Customer::create(['userName'=>'prasanth', 'phone'=>'8309078466', 'mail' =>'prasanth@gmail.com']);
        $response = $this->json('DELETE', '/api/users/phone/8309078466');

        $response
            ->assertStatus(200);
    }

    public function test_deleteUserByPhoneNoError()
    {
        $response = $this->json('DELETE', '/api/users/phone/8309078466');

        $response
            ->assertStatus(404);
    }

    public function test_getUsers()
    {

        $response = $this->json('GET', '/api/users');

        $response
            ->assertStatus(200);
    }

    public function test_getUserByEmail()
    {

        $user = Customer::create(['userName'=>'prasanth', 'phone'=>'8309078466', 'email' =>'prasanth@gmail.com']);
        $response = $this->json('GET', '/api/users/search/mail/prasanth@gmail.com');

        $response
            ->assertStatus(200);
    }

    public function test_getUserByEmailError()
    {

        $response = $this->json('GET', '/api/users/search/mail/prasanth@gmail.com');

        $response
            ->assertStatus(404);
    }
    public function test_getUserByName()
    {

        Customer::create(['userName'=>'prasanth', 'phoneNo'=>'8309078466', 'email' =>'prasanth@gmail.com']);
        $response = $this->json('GET', '/api/users/search/name/prasanth');

        $response
            ->assertStatus(200);
    }

    public function test_getUserByNameError()
    {

        $response = $this->json('GET', '/api/users/search/name/prasanth');

        $response
            ->assertStatus(404);
    }
    public function test_getUserByPhoneNo()
    {

        $user= Customer::create(['userName'=>'prasanth', 'phone'=>'8309078466', 'mail' =>'prasanth@gmail.com']);
        $response = $this->json('GET', '/api/users/search/phone/8309078466');

        $response
            ->assertStatus(200);
    }

    public function test_getUserByPhoneNoError()
    {

        $response = $this->json('GET', '/api/users/search/phone/8309078466');

        $response
            ->assertStatus(404);
    }

}


