<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total counts
        $totalStudents = Student::count();
        $totalLecturers = Lecturer::count();
        $totalUsers = $totalStudents + $totalLecturers;
        
        // New users this month
        $newStudentsThisMonth = Student::whereMonth('created_at', now()->month)
                                      ->whereYear('created_at', now()->year)
                                      ->count();
        $newLecturersThisMonth = Lecturer::whereMonth('created_at', now()->month)
                                       ->whereYear('created_at', now()->year)
                                       ->count();
        $newUsersThisMonth = $newStudentsThisMonth + $newLecturersThisMonth;
        
        // Active users (simplified - users created in last 30 days)
        $activeStudents = Student::where('created_at', '>=', now()->subDays(30))->count();
        $activeLecturers = Lecturer::where('created_at', '>=', now()->subDays(30))->count();
        $activeUsers = $activeStudents + $activeLecturers;
        
        // Top faculties (students)
        $topFaculties = Student::select('faculty', DB::raw('count(*) as count'))
                              ->whereNotNull('faculty')
                              ->groupBy('faculty')
                              ->orderBy('count', 'desc')
                              ->limit(3)
                              ->get();
        
        // Top departments (lecturers)
        $topDepartments = Lecturer::select('department', DB::raw('count(*) as count'))
                                 ->whereNotNull('department')
                                 ->groupBy('department')
                                 ->orderBy('count', 'desc')
                                 ->limit(3)
                                 ->get();
        
        // Recent users (mix of students and lecturers)
        $recentStudents = Student::select('id', 'name', 'email', 'profile_photo', 'created_at')
                                ->latest()
                                ->limit(5)
                                ->get()
                                ->map(function($student) {
                                    $student->type = 'student';
                                    $student->profile_photo_url = $student->profile_photo_url;
                                    return $student;
                                });
        
        $recentLecturers = Lecturer::select('id', 'name', 'email', 'profile_photo', 'created_at')
                                  ->latest()
                                  ->limit(5)
                                  ->get()
                                  ->map(function($lecturer) {
                                      $lecturer->type = 'lecturer';
                                      $lecturer->profile_photo_url = $lecturer->profile_photo_url;
                                      return $lecturer;
                                  });
        
        // Combine and sort recent users
        $recentUsers = $recentStudents->concat($recentLecturers)
                                     ->sortByDesc('created_at')
                                     ->take(5)
                                     ->values();
        
        return view('admin.dashboard', compact(
            'totalStudents',
            'totalLecturers',
            'totalUsers',
            'newStudentsThisMonth',
            'newLecturersThisMonth',
            'newUsersThisMonth',
            'activeUsers',
            'topFaculties',
            'topDepartments',
            'recentUsers'
        ));
    }
}