<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar = Image::make($avatar)->save('storage/avatars/'.$request->name.'.jpg', 60);
            $user->avatar = 'storage/avatars/'.$request->name.'.jpg';
        }
        $user->save();

        return back()->with('success', 'Your profile have been updated!');
    }
}
