<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('lecturer.auth.register');
    }

    public function showLoginForm()
    {
        return view('lecturer.auth.login');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:lecturers',
            'nip' => 'required|string|unique:lecturers',
            'department' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'department' => $request->department,
            'password' => Hash::make($request->password),
        ];

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $photo = $request->file('profile_photo');
            $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            
            // Store in storage
            $path = $photo->storeAs('profile-photos/lecturer', $filename, 'public');
            $data['profile_photo'] = $filename;
        }

        $lecturer = Lecturer::create($data);

        return redirect()->route('lecturer.login')->with('success', 'Registration successful! Please login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('lecturer')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('lecturer.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('lecturer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('lecturer.login');
    }
}