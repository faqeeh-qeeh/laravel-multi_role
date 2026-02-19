<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show()
    {
        $student = Auth::guard('student')->user();
        return view('student.profile.show', compact('student'));
    }

    public function edit()
    {
        $student = Auth::guard('student')->user();
        return view('student.profile.edit', compact('student'));
    }

    public function update(Request $request)
    {
        $student = Student::find(Auth::guard('student')->user()->id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
            'student_id' => 'required|string|unique:students,student_id,' . $student->id,
            'faculty' => 'required|string|max:255',
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
        $student->name = $request->name;
        $student->email = $request->email;
        $student->student_id = $request->student_id;
        $student->faculty = $request->faculty;

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($student->profile_photo && Storage::disk('public')->exists('profile-photos/student/' . $student->profile_photo)) {
                Storage::disk('public')->delete('profile-photos/student/' . $student->profile_photo);
            }

            $photo = $request->file('profile_photo');
            $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            
            // Store in storage
            $path = $photo->storeAs('profile-photos/student', $filename, 'public');
            $student->profile_photo = $filename;
        }

        // Handle password change
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $student->password)) {
                return redirect()->back()
                    ->withErrors(['current_password' => 'Current password is incorrect.'])
                    ->withInput();
            }

            $student->password = Hash::make($request->new_password);
        }

        $student->save();

        return redirect()->route('student.profile.show')
            ->with('success', 'Profile updated successfully!');
    }

    public function deletePhoto()
    {
        $student = Student::find(Auth::guard('student')->user()->id);
        
        if ($student->profile_photo && Storage::disk('public')->exists('profile-photos/student/' . $student->profile_photo)) {
            Storage::disk('public')->delete('profile-photos/student/' . $student->profile_photo);
            $student->profile_photo = null;
            $student->save();
        }

        return redirect()->route('student.profile.edit')
            ->with('success', 'Profile photo removed successfully!');
    }
}