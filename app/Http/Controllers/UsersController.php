<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreatedNotification;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    public function users()
    {
        return view('backend.user.add_user');
    }

    public function user_list()
    {
        $users = User::where('role', 'vendor')
            ->orWhere('role', 'admin')
            ->latest()
            ->get();


        return view('backend.user.index', compact('users'));
    }

    public function add_user(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'role' => 'required',
            'phone' => 'required',
        ]);



        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $file_name = time() . '.' . $photo->getClientOriginalExtension();

            $path = public_path('image/profile_photo/' . $file_name);
            Image::make($photo)->fit(400, 400)->save($path);
        } else {
            $file_name = null;
        }

        $password = (Str::random(8));

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($password),
            'role' => $request->role,
            'photo' => $file_name,
            'created_at' => Carbon::now(),
        ]);


        $info = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role' => $request->role,
        ];

        Mail::to($request->email)->send(new AccountCreatedNotification($info));


        return back()->with('success', 'Account created successfully.');
    }
}
