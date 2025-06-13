<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;


class ProfileController extends Controller
{
 
    public function show(User $profile)
    {
        return view('profiles.show', [
            'profile' => $profile,
        ]);
    }

    public function edit(User $profile)
    {
        return view('profiles.edit', [
            'profile' => $profile,
        ]);
    }

 
    public function update(UpdateUserRequest $request, User $profile)
    {
         $profile->update($request->all());

         return redirect()->route('profile.show', $profile);
    }

  
    public function destroy(User $user)
    {
        //
    }
}
