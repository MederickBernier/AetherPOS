<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RecoveryController extends Controller
{
    public function index(){
        return view('recovery.index');
    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'character_first_name' => 'required|string|max:255',
            'character_last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::where('character_first_name', $data['character_first_name'])
                    ->where('character_last_name', $data['character_last_name'])
                    ->where('email', $data['email'])
                    ->first();

        if (!$user) {
            return back()->withErrors(['message' => 'No user found with the provided details.']);
        }

        // If user exists, show the form to update the password
        return view('recovery.password', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find($request->input('user_id'));
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('login.show')->with('success', 'Password updated successfully. Please login.');
    }
}
