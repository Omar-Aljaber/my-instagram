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
        // if (auth()->id() !== $user->id) {
        //    abort(403, 'You are not authorized to see this page');
        // }
    //    abort_if(auth()->id() !== $user->id, 403, 'You are not authorized to see this page');
    //    abort_if(auth()->user()->cannot('edit-update-profile', $user), 403);
    //    $this->authorize('edit-update-profile', $user);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, UpdateUserProfileRequest $request)
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
     * Follow a user.
     */
    public function follow(User $user)
    {
        auth()->user()->follow($user);

        return back();
    }

    /**
     * Unfollow a user.
     */
    public function unfollow(User $user)
    {
        auth()->user()->unfollow($user);

        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
