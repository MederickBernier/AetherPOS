<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagementController extends Controller
{
    public function index(){
        $users = User::all();
        return view('management.users.index',compact('users'));
    }

    public function create(){
        $servers = serversArray();
        return view('management.users.create',compact('servers'));
    }

    public function store(Request $request){
        // Validate incoming request
        $date = $request->validate([
            'character_first_name' => 'required|string|max:255',
            'character_last_name' => 'required|string|max:255',
            'character_server' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Capitalize the first character of first name and last name
        $characterFirstName = ucfirst($request->character_first_name);
        $characterLastName = ucfirst($request->character_last_name);

        // Create a new user instance and save it to the database
        $user = new User([
            'character_first_name' => $characterFirstName,
            'character_last_name' => $characterLastName,
            'character_server' => $request->character_server,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        return redirect()->route('management.users.index')->with('success','User created successfully');
    }

    public function show(User $user){
        return view('management.users.show',compact('user'));
    }
    public function edit(User $user){
        $servers = serversArray();
        return view('management.users.edit',compact('user','servers'));
    }

    public function update(Request $request, User $user){
        // Validate incoming request
        $data = $request->validate([
            'character_first_name' => 'required|string|max:255',
            'character_last_name' => 'required|string|max:255',
            'character_server' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Capitalize the first character of first_name and last_name
        $characterFirstName = ucfirst($request->character_first_name);
        $characterLastName = ucfirst($request->character_last_name);

        // Update the user's informations
        $user->update([
            'character_first_name' => $characterFirstName,
            'character_last_name' => $characterLastName,
            'character_server' => $request->character_server,
            'email' => $request->email,
        ]);

        // Update the password if provided
        if($request->password){
            $user->update([
                'password' => $request->password,
            ]);
        }

        return redirect()->route('management.users.index')->with('success','User updated successfully');
    }

    public function destroy(User $user){
        if(!$user){
            return redirect()->route('management.users.index')->with('error','User not found');
        }

        $user->delete();
        return redirect()->route('management.users.index')->with('success','User deleted successfully');
    }
}
