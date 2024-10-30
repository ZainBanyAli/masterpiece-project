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
    // Show login form
    public function login()
    {
        return view('admin.login');
    }

    // Show profile page
    public function profile()
    {
        return view('admin.profile');
    }

    // Show edit profile form
    public function editProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    // Handle profile update submission with validation for image format
    public function updateProfile(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . Auth::guard('admin')->id(),
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Only jpg, png, jpeg allowed (2MB max)
            'new_password' => 'nullable|min:6|confirmed',
        ]);

        // Fetch the authenticated admin
        $admin = Auth::guard('admin')->user();

        // Update profile details
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($admin->photo && Storage::exists('uploads/' . $admin->photo)) {
                Storage::delete('uploads/' . $admin->photo);
            }

            // Store the new photo
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $fileName);
            $admin->photo = $fileName;
        }

        // Update password if provided
        if ($request->new_password) {
            $admin->password = bcrypt($request->new_password);
        }

        $admin->save();

        return redirect()->route('admin_profile')->with('success', 'Profile updated successfully!');
    }

    // Handle forget password form submission
    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->with('error', 'Email is not found');
        }

        $token = Str::random(64);

        // Store token in the password_resets table
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        // Generate the reset link
        $reset_link = url('admin/reset-password/' . $token . '/' . $request->email);
        $subject = "Password Reset";
        $body = "To reset your password, please click the link below:<br>";
        $body .= "<a href='" . $reset_link . "'>Reset Password</a>";

        // Send email
        Mail::to($request->email)->send(new Websitemail($subject, $body));

        return redirect()->back()->with('success', 'A password reset link has been sent to your email.');
    }

    // Handle reset password submission
    public function reset_password_submit(Request $request, $token, $email)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $reset = DB::table('password_resets')->where([
            ['email', '=', $email],
            ['token', '=', $token],
        ])->first();

        if (!$reset) {
            return redirect()->back()->with('error', 'Invalid token.');
        }

        $admin = Admin::where('email', $email)->first();
        if (!$admin) {
            return redirect()->back()->with('error', 'Admin not found.');
        }

        $admin->password = bcrypt($request->password);
        $admin->save();

        DB::table('password_resets')->where('email', $email)->delete();

        return redirect()->route('admin_login')->with('success', 'Your password has been reset. Please log in.');
    }

    // Handle login submission
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

    // Handle admin logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success', 'Logout successful.');
    }

    // Handle password reset form display
    public function reset_password($token, $email)
    {
        $admin = Admin::where('email', $email)->where('token', $token)->first();
        if (!$admin) {
            return redirect()->route('admin_login')->with('error', 'Token or email is not correct!');
        }
        return view('admin.reset-password', compact('token', 'email'));
    }

    // Handle profile update (duplicate of updateProfile, removed the extra one)
    public function profile_submit(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
        ]);

        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();

        // Handle photo upload
        if ($request->photo) {
            $request->validate([
                'photo' => ['mimes:jpg,jpeg,png,gif', 'max:2024'],
            ]);
            $final_name = 'admin_' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            unlink(public_path('uploads/' . $admin->photo));
            $admin->photo = $final_name;
        }

        // Handle password update
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

    // Handle forget password form display
    public function forget_password()
    {
        return view('admin.forget-password');
    }
}
