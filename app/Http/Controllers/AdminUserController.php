<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('admin.users.home', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:8',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        $newUser = User::create($data);

        return redirect(route('admin.users.index'))->with('status', 'User has been succesfully saved!');
    }

    public function modify(User $user)
    {
        return view('admin.users.modify', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|min:8',
        ]);

        $user->update($data);

        return redirect(route('admin.users.modify', ['user' => $user]))->with('status', 'User has been successfully updated!');
    }

    public function delete(User $user)
    {
        return view('admin.users.delete', ['user' => $user]);
    }

    public function destroy(User $user)
    {
       $user->delete();

       return redirect(route('admin.users.index'))->with('status', 'User has been succesfully deleted!');
    }

    public function reset(User $user)
    {
        return view('admin.users.reset', ['user' => $user]);
    }

    public function resetOk(User $user)
    {
       $user->update(['password' => Hash::make('P@ssw0rd')]);

       return redirect(route('admin.users.index'))->with('status', 'User password has been succesfully reset!');
    }
}

