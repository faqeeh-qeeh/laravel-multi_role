<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    /**
     * Display list of students
     */
    public function students(Request $request)
    {
        $query = Student::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('student_id', 'like', "%{$search}%")
                  ->orWhere('faculty', 'like', "%{$search}%");
            });
        }

        // Filter by faculty
        if ($request->has('faculty') && $request->faculty != '') {
            $query->where('faculty', $request->faculty);
        }

        $students = $query->orderBy('name')->paginate(10);
        
        // Get unique faculties for filter
        $faculties = Student::distinct('faculty')->pluck('faculty');

        return view('admin.users.students', compact('students', 'faculties'));
    }

    /**
     * Display list of lecturers
     */
    public function lecturers(Request $request)
    {
        $query = Lecturer::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%");
            });
        }

        // Filter by department
        if ($request->has('department') && $request->department != '') {
            $query->where('department', $request->department);
        }

        $lecturers = $query->orderBy('name')->paginate(10);
        
        // Get unique departments for filter
        $departments = Lecturer::distinct('department')->pluck('department');

        return view('admin.users.lecturers', compact('lecturers', 'departments'));
    }

    /**
     * Show student details
     */
    public function showStudent($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.users.show-student', compact('student'));
    }

    /**
     * Show lecturer details
     */
    public function showLecturer($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        return view('admin.users.show-lecturer', compact('lecturer'));
    }

    /**
     * Delete student
     */
    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        // Delete profile photo if exists
        if ($student->profile_photo) {
            Storage::disk('public')->delete('profile-photos/student/' . $student->profile_photo);
        }
        $student->delete();

        return redirect()->route('admin.users.students')
            ->with('success', 'Student deleted successfully.');
    }

    /**
     * Delete lecturer
     */
    public function deleteLecturer($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        // Delete profile photo if exists
        if ($lecturer->profile_photo) {
            Storage::disk('public')->delete('profile-photos/lecturer/' . $lecturer->profile_photo);
        }
        $lecturer->delete();

        return redirect()->route('admin.users.lecturers')
            ->with('success', 'Lecturer deleted successfully.');
    }
}