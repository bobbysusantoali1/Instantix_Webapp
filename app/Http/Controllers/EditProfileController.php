<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function view(){
        return view('Components.ViewEditProfile', [
            'title' => 'Edit Profile',
            'user' => Auth::user()
        ]);
    }

    public function edit(Request $request){
        $curr_user = Auth::user();
        $rules = [
            'phone_number' => ['required','digits_between:10,13'],
            'address' => ['required','min:3'],
            'dob' => ['required'],
            'gender' => ['required'],
            'confirmPassword' => ['required', 'min:5','max:20']
        ];

        if (!Hash::check('confirmPassword', $curr_user->password)) {
            return redirect()->route('view-edit-profile')->with('alert', "Password is not correct!");
        }

        if ($request->full_name != $curr_user->full_name){
            $rules['full_name'] = ['required','min:5','max:20','unique:users'];
        }

        if ($request->email != $curr_user->email){
            $rules['email'] = ['required','email:rfc,dns','unique:users'];
        }
        $validatedData = $request->validate($rules);

        user::where('id', $curr_user->id)->update($validatedData);

        return redirect()->route('view-profile')->with('alert', "Update Succesful!");
    }
}
