<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditPasswordController extends Controller
{
    public function view(){
        return view('Components.ViewEditPassword', [
            'title' => 'Edit Password'
        ]);
    }

    public function edit(Request $request){
        $rules = ['password' => 'required|min:5|max:20'];
        $curr_user = Auth::user();
        if (!Hash::check($request->old_password, $curr_user->password)){
            return redirect()->route('view-edit-password')->with(['alert' => "The old password does not match our record"]);
        } else if ($request->old_password != $request->password) {
            $validatedData = $request->validate($rules);
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            return redirect()->route('view-edit-password')->with(['alert' => "The new password can not be the same as the old password"]);
        }

        user::where('id', $curr_user->id)->update($validatedData);

        return redirect()->route('view-profile')->with(['alert' => "Update Succesful!"]);
    }
}
