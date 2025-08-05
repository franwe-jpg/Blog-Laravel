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
    // Actualizamos los campos normales excepto el archivo
    $profile->update($request->except('avatar'));

    if ($request->hasFile('avatar')) {
        // Guarda la imagen en public/avatars
        $file = $request->file('avatar');
        $path = $file->store('avatars', 'public'); // guarda en storage/app/public/avatars

        // Actualiza el campo avatar con la ruta relativa
        $profile->avatar = $path;
        $profile->save();
    }
        return redirect()->route('profile.show', $profile);
    }

  
    public function destroy(User $user)
    {
        //
    }
}
