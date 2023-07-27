<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);

        $prolie_photo = User::find(auth()->user()->id);



        if ($prolie_photo->photo) {
            $previousPhotoPath = public_path('image/profile_photo/' .  $prolie_photo->photo);
            if (file_exists($previousPhotoPath)) {
                unlink($previousPhotoPath);
            }
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $file_name = time() . "." . $photo->getClientOriginalExtension();
        }
        $path = public_path('image/profile_photo/' . $file_name);
        Image::make($photo)->fit(400, 400)->save($path);

        $prolie_photo->photo = $file_name;
        $prolie_photo->save();




        return back()->with('success', 'Profile information updated successfully!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function password_change(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();


        if (Hash::check($request->current_password, $user->password)) {
          user::find($user->id)->update(['password' => Hash::make($request->password)]);
            return back()->with('success', 'Password updated successfully!');
           //
        }else{
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }




    }
}
