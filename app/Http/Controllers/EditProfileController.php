<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    public function view(){
        return view('pages.profile.view-edit-profile');
    }

    public function edit(Request $request){
        $rules = [
            'phone_number' => 'required|digits_between:10,13',
            'address' => 'required|min:5'
        ];

        if ($request->username != Auth::user()->username){
            $rules['username'] = 'required|min:5|max:20|unique:users';
        }

        if ($request->email != Auth::user()->email){
            $rules['email'] = 'required|email|unique:users';
        }
        $validatedData = $request->validate($rules);

        User::where('id', Auth::user()->id)->update($validatedData);

        return redirect()->route('view-profile')->with('alert', "Update Succesful!");
    }
}
