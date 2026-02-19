<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show()
    {
        $lecturer = Auth::guard('lecturer')->user();
        return view('lecturer.profile.show', compact('lecturer'));
    }

    public function edit()
    {
        $lecturer = Auth::guard('lecturer')->user();
        return view('lecturer.profile.edit', compact('lecturer'));
    }

    public function update(Request $request)
    {
        $lecturer = Lecturer::find(Auth::guard('lecturer')->user()->id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:lecturers,email,' . $lecturer->id,
            'nip' => 'required|string|unique:lecturers,nip,' . $lecturer->id,
            'department' => 'required|string|max:255',
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
        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        $lecturer->nip = $request->nip;
        $lecturer->department = $request->department;

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($lecturer->profile_photo && Storage::disk('public')->exists('profile-photos/lecturer/' . $lecturer->profile_photo)) {
                Storage::disk('public')->delete('profile-photos/lecturer/' . $lecturer->profile_photo);
            }

            $photo = $request->file('profile_photo');
            $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            
            // Store in storage
            $path = $photo->storeAs('profile-photos/lecturer', $filename, 'public');
            $lecturer->profile_photo = $filename;
        }

        // Handle password change
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $lecturer->password)) {
                return redirect()->back()
                    ->withErrors(['current_password' => 'Current password is incorrect.'])
                    ->withInput();
            }

            $lecturer->password = Hash::make($request->new_password);
        }

        $lecturer->save();

        return redirect()->route('lecturer.profile.show')
            ->with('success', 'Profile updated successfully!');
    }

    public function deletePhoto()
    {
        $lecturer = Lecturer::find(Auth::guard('lecturer')->user()->id);
        
        if ($lecturer->profile_photo && Storage::disk('public')->exists('profile-photos/lecturer/' . $lecturer->profile_photo)) {
            Storage::disk('public')->delete('profile-photos/lecturer/' . $lecturer->profile_photo);
            $lecturer->profile_photo = null;
            $lecturer->save();
        }

        return redirect()->route('lecturer.profile.edit')
            ->with('success', 'Profile photo removed successfully!');
    }
}