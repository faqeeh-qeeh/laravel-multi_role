<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.show', compact('admin'));
    }

    public function edit()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update basic info
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($admin->profile_photo && Storage::disk('public')->exists('profile-photos/admin/' . $admin->profile_photo)) {
                Storage::disk('public')->delete('profile-photos/admin/' . $admin->profile_photo);
            }

            $photo = $request->file('profile_photo');
            $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            
            // Store in storage
            $path = $photo->storeAs('profile-photos/admin', $filename, 'public');
            $admin->profile_photo = $filename;
        }

        // Handle password change
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $admin->password)) {
                return redirect()->back()
                    ->withErrors(['current_password' => 'Current password is incorrect.'])
                    ->withInput();
            }

            $admin->password = Hash::make($request->new_password);
        }

        $admin->save();

        return redirect()->route('admin.profile.show')
            ->with('success', 'Profile updated successfully!');
    }

    public function deletePhoto()
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        
        if ($admin->profile_photo && Storage::disk('public')->exists('profile-photos/admin/' . $admin->profile_photo)) {
            Storage::disk('public')->delete('profile-photos/admin/' . $admin->profile_photo);
            $admin->profile_photo = null;
            $admin->save();
        }

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Profile photo removed successfully!');
    }
}