<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }


    public function profile()
    {
        return view('admin.profile');
    }


    public function editProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }


    public function updateProfile(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . Auth::guard('admin')->id(),
            'photo' => 'nullable|image|mimes:jpg,png,j

            peg|max:2048', // Only jpg, png, jpeg allowed (2MB max)
            'new_password' => 'nullable|',
        ]);

        // Fetch the authenticated admin
        $admin = Auth::guard('admin')->user();


        $admin->name = $request->name;
        $admin->email = $request->email;


        if ($request->hasFile('photo')) {

            if ($admin->photo && Storage::exists('uploads/' . $admin->photo)) {
                Storage::delete('uploads/' . $admin->photo);
            }

            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $fileName);
            $admin->photo = $fileName;
        }

        if ($request->new_password) {
            $admin->password = bcrypt($request->new_password);
        }

        $admin->save();
        return redirect()->route('admin_profile')->with('success', 'Profile updated successfully!');
    }


    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->with('error', 'Email is not found');
        }

        $newPassword = Str::random(10);

        $admin->password = Hash::make($newPassword);
        $admin->save();

        $subject = "Your New Admin Panel Password";
        $body = "Your password has been reset. Here is your new password: <strong>" . $newPassword . "</strong><br>Please log in and change this password immediately.";

        Mail::to($request->email)->send(new Websitemail($subject, $body));

        return redirect()->back()->with('success', 'A new password has been sent to your email.');
    }



    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin_dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->route('admin_login')->with('error', 'Invalid login credentials.');
        }
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success', 'Logout successful.');
    }


    public function reset_password($token, $email)
    {
        $admin = Admin::where('email', $email)->where('token', $token)->first();
        if (!$admin) {
            return redirect()->route('admin_login')->with('error', 'Token or email is not correct!');
        }
        return view('admin.reset-password', compact('token', 'email'));
    }


    public function profile_submit(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
        ]);

        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();


        if ($request->photo) {
            $request->validate([
                'photo' => ['mimes:jpg,jpeg,png,gif', 'max:2024'],
            ]);
            $final_name = 'admin_' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            unlink(public_path('uploads/' . $admin->photo));
            $admin->photo = $final_name;
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required'],
                'confirm_password' => ['required', 'same:password'],
            ]);
            $admin->password = Hash::make($request->password);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();

        return redirect()->back()->with('success', 'Profile is updated!');
    }


    public function forget_password()
    {
        return view('admin.forget-password');
    }
}
