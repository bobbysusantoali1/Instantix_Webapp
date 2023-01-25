<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditPasswordController extends Controller
{
    public function view(){
        return view('pages.profile.view-edit-password');
    }

    public function edit(Request $request){
        $rules = ['password' => 'required|min:5|max:20'];

        if (!Hash::check($request->old_password, Auth::user()->password)){
            return redirect()->route('view-edit-password')->with('alert', "The old password does not match our record");
        } else if ($request->old_password != $request->password) {
            $validatedData = $request->validate($rules);
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            return redirect()->route('view-edit-password')->with('alert', "The new password can not be the same as the old password");
        }

        User::where('id', Auth::user()->id)->update($validatedData);

        return redirect()->route('view-profile')->with('alert', "Update Succesful!");
    }
}
