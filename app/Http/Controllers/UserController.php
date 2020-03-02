<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\User;
use App\UserGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
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

    //init $email_global global variable
    // protected $email_global = "";


    public function login(Request $req) {
        $this->validate($req,[
        'email' => 'required',
        'password' => 'required'
        ]);

        $email = $req->email;
        $password = $req->password;
        $data = ['email'=>$email, 'password'=>$password];
        if (Auth::attempt($data)) {
            return redirect()->route('home');
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

    //change avatar
    public function changeAvatar(Request $req)
    {
        $filename = $req->file("inputAvt")->getClientOriginalName("inputAvt");
        $extend = $req->file("inputAvt")->getClientOriginalExtension("inputAvt");
        if ($extend == 'jpg' || $extend == 'jpeg' || $extend == 'png' ) {
            // unlink(public_path("\store\avt-1583141098.jpg"));

            //delete old file
            $user = Auth::user();
            $avatar = $user->avatar;
            if ($avatar != "") {
                // $base = trim(' \store\ ');
                unlink(public_path($avatar));
            }
            //store
            $req->file("inputAvt")->move("store", 'avt-'.time().'.'.$extend);
            $path = "store\avt-".time().'.'.$extend;
            //update avatar column in users table
            $user->avatar = $path;
            $user->save();
            return redirect()->route('home');
        }
    }
}
