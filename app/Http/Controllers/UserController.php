<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'character_first_name' => ucfirst(strtolower($request->character_first_name)),
            'character_last_name' => ucfirst(strtolower($request->character_last_name)),
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            // Authentication passed

            $user = Auth::user();
            $user->is_active = true;
            $user->last_active = now();
            $user->save();

            date_default_timezone_set('America/New_York');
            $date = date('m/d/Y h:i:s a', time());
            $msg = "User ".$credentials['character_first_name']." ".$credentials['character_last_name']." at ".$date;
            sendToLog($msg);
            return redirect()->route('dashboard.index')->with('success', 'Welcome ' . $credentials['character_first_name'] . ' ' . $credentials['character_last_name'] . ' , you are successfully logged in.');
        }
        return back()->withErrors([
            'error' => 'Invalid Credentials',
        ])->withInput($request->except('password'));
    }

    public function show_login()
    {
        return view('login');
    }

    public function logout()
    {
        $user = Auth::user();
        $user->is_active = false;
        $user->save();

        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully');
    }

    public function register(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'characterFirstName' => 'required|string|max:255',
            'characterLastName' => 'required|string|max:255',
            'characterServer' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user instance and save it to the database
        $user = new User([
            'character_first_name' => $request->characterFirstName,
            'character_last_name' => $request->characterLastName,
            'character_server' => $request->characterServer,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful, please login');
    }

    public function show_register()
    {
        $servers = serversArray();
        return view('register',compact('servers'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'character_first_name' => 'required|string|max:255',
            'character_last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->fill($data);
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
}
