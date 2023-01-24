<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterPage extends Controller
{
    public function view(){
        return view('Components.RegisterPage', [
            'title' => 'Register'
        ]);
    }

    public function insert(Request $request){
        $validate = $request->validate([
            'role' => ['required'],
            'fullName' => ['required','min:5','max:20','unique:Users'],
            'email' => ['required','email:rfc,dns','unique:Users'],
            'password' => ['required','min:5','max:20'],
            'confirmPassword' => ['required_with:password','same:password','min:5','max:20'],
            'address' => ['required','min:3'],
            'dob' => ['required'],
            'gender' => ['required'],
            'phoneNumber' => ['numeric','required','digits_between:10,13' ]
        ]);
        $validate['password'] = Hash::make($validate['password']);

        if(user::create($validate)){
            return redirect('/Login')->with('status', 'Register Success');
        }else{
            return redirect()->back()->with('status', 'Register Fail');
        }
    }
}
