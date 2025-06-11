<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return view('users.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProfileRequest $request, User $user)
    {
        $data = $request->safe()->collect();

        if($data['password'] == '') {
            unset ($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        if($data->has('image')) {
            $path = $request->file('image')->store('users', 'public');
            $data['image'] = '/' . $path;
        }
    
        $data['private_account'] = $request->has('private_account');
        $user->update($data->toArray());
        session()->flash('success', 'Profile updated successfully.');
        return redirect()->route('user_profile', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
