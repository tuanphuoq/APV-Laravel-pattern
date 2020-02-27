<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\User;
use App\UserGroup;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    //working with database
    //insert user on USERS table
    public function register(Request $req)
    {
       
        $lastName = $req->last_name;
        $firstName = $req->first_name;
        $data['name'] = $lastName." ".$firstName;
        $data['email'] = $req->email;
        $data['password'] = Hash::make($req->password); 
        $data['dob'] = $req->date;
        $data['gender'] = $req->gender;
        //insert object to users table
        User::create($data);

        //insert object to user_group table
        $user_email =$req->email;
        $this->createUserGroup($user_email, 2);
    }

    public function getIdUser($email)
    {
    	$data = DB::table('users')->where('email', $email)->value('id');
    	return $data;
    }

    public function createUserGroup($email, $role)
    {
    	$data = DB::table('users')->where('email', $email)->value('id');
    	$user_group['id_user'] = $data;
        $user_group['id_group'] = $role;
        //insert object to user_group table
        UserGroup::create($user_group);
    }

    public function getRoleUser($email)
    {
        $data = DB::table('users')->join('user_group', 'users.id', '=', 'user_group.id')
        ->where('email', $email)->value('id_group');
        return $data;
    }

    public function getUsername($email)
    {
        $username = DB::table('users')->where('email', $email)->value('name');
        return $username;
    }

    public function login(Request $req) {
        $this->validate($req,[
        'email' => 'required',
        'password' => 'required'
        ]);

        $email = $req->email;
        $password = $req->password;
        $data = ['email'=>$email, 'password'=>$password];
        if (Auth::attempt($data)) {
            // return redirect()->route('home');
            $username = $this->getUsername($email);
            return view('layouts.home', compact('username'));
        }
        return redirect()->route('login')
        ->with('error','Email đăng ký hoặc mật khẩu sai');
    }

    //check for duplicate email
    public function checkEmail(Request $req)
    {
        $email = $req->email;
        $data = DB::table('users')->where('email', $email)->value('email');
        if ($data == null) {
            return response()->json(['result'=>'true']);
        }
        else return response()->json(['result'=>'false']);
    }
}
