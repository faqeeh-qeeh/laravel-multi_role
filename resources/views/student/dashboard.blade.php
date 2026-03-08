@extends('student.layouts.app')

@section('title', 'Student Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">

    {{-- Welcome Section - Responsive (Mirip dengan Admin) --}}
    <div class="mb-6 sm:mb-8">
        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg shadow-lg overflow-hidden">
            <div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                    <div class="flex items-center mb-3 sm:mb-0">
                        <div class="bg-white bg-opacity-20 p-2 sm:p-3 rounded-full mr-3 sm:mr-4">
                            <i class="fas fa-user-graduate text-white text-xl sm:text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white">Dashboard</h1>
                            <p class="text-green-100 text-sm sm:text-base mt-1">
                                Welcome back, <span class="font-semibold">{{ auth()->guard('student')->user()->name }}</span>
                            </p>
                        </div>
                    </div>

                    {{-- Student Info Card - Hidden on mobile, visible on sm --}}
                    <div class="hidden sm:block bg-white bg-opacity-20 px-4 py-2 rounded-lg">
                        <p class="text-white text-sm">
                            <i class="fas fa-id-card mr-2"></i>
                            {{ auth()->guard('student')->user()->student_id }} | {{ auth()->guard('student')->user()->faculty ?? 'Faculty' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Cards - Grid Responsif --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
        {{-- Active Courses Card --}}
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-100 p-3 sm:p-4 rounded-full mr-3 sm:mr-4">
                        <i class="fas fa-book-open text-blue-600 text-lg sm:text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500 uppercase">Active Courses</p>
                        <div class="flex items-baseline">
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mr-2">5</p>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Current semester</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 sm:px-6 py-2 sm:py-3">
                <div class="flex justify-between items-center text-xs sm:text-sm">
                    <span class="text-gray-600">Credit: 18 SKS</span>
                    <span class="text-gray-400">75% completed</span>
                </div>
            </div>
        </div>

        {{-- Assignments Due Card --}}
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-100 p-3 sm:p-4 rounded-full mr-3 sm:mr-4">
                        <i class="fas fa-tasks text-yellow-600 text-lg sm:text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500 uppercase">Assignments Due</p>
                        <div class="flex items-baseline">
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mr-2">3</p>
                            <span class="text-xs sm:text-sm text-red-600">
                                <i class="fas fa-exclamation-circle"></i> 2 are late
                            </span>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">This week</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 sm:px-6 py-2 sm:py-3">
                <div class="flex flex-wrap gap-2 text-xs">
                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Web Dev: 1</span>
                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">DB: 2</span>
                </div>
            </div>
        </div>

        {{-- GPA Card --}}
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-100 p-3 sm:p-4 rounded-full mr-3 sm:mr-4">
                        <i class="fas fa-chart-line text-purple-600 text-lg sm:text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500 uppercase">Current GPA</p>
                        <div class="flex items-baseline">
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mr-2">3.75</p>
                            <span class="text-xs sm:text-sm text-green-600">
                                <i class="fas fa-arrow-up"></i> +0.05
                            </span>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Cumulative</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 sm:px-6 py-2 sm:py-3">
                <div class="flex justify-between items-center text-xs sm:text-sm">
                    <span class="text-gray-600">Dean's List</span>
                    <span class="text-green-600 font-medium">Eligible</span>
                </div>
            </div>
        </div>
    </div>

    {{-- My Courses Section (Menggantikan tabel dengan card grid) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
        {{-- Course List --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                            <i class="fas fa-book text-green-500 mr-2"></i>
                            My Courses
                        </h3>
                        <a href="#" class="text-xs sm:text-sm text-green-600 hover:text-green-800">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <div class="divide-y divide-gray-200">
                    {{-- Course 1 --}}
                    <div class="px-4 sm:px-6 py-3 sm:py-4 hover:bg-gray-50 transition-colors duration-150">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0 flex-1">
                                <div class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-code text-blue-600"></i>
                                </div>
                                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                                    <div class="flex items-center flex-wrap gap-2">
                                        <p class="text-sm sm:text-base font-medium text-gray-900 truncate">
                                            Web Development
                                        </p>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            In Progress
                                        </span>
                                    </div>
                                    <div class="flex items-center text-xs sm:text-sm text-gray-500">
                                        <i class="fas fa-chalkboard-teacher mr-1"></i>
                                        <span class="truncate">Dr. Smith</span>
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-user-graduate mr-1"></i>
                                        <span>Grade: A-</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-2 text-right text-xs text-gray-400 whitespace-nowrap">
                                75%
                            </div>
                        </div>
                    </div>
                    {{-- Course 2 --}}
                    <div class="px-4 sm:px-6 py-3 sm:py-4 hover:bg-gray-50 transition-colors duration-150">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0 flex-1">
                                <div class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-database text-green-600"></i>
                                </div>
                                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                                    <div class="flex items-center flex-wrap gap-2">
                                        <p class="text-sm sm:text-base font-medium text-gray-900 truncate">
                                            Database Systems
                                        </p>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            In Progress
                                        </span>
                                    </div>
                                    <div class="flex items-center text-xs sm:text-sm text-gray-500">
                                        <i class="fas fa-chalkboard-teacher mr-1"></i>
                                        <span class="truncate">Prof. Johnson</span>
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-user-graduate mr-1"></i>
                                        <span>Grade: B+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-2 text-right text-xs text-gray-400 whitespace-nowrap">
                                60%
                            </div>
                        </div>
                    </div>
                    {{-- Course 3 --}}
                    <div class="px-4 sm:px-6 py-3 sm:py-4 hover:bg-gray-50 transition-colors duration-150">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0 flex-1">
                                <div class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-mobile-alt text-purple-600"></i>
                                </div>
                                <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                                    <div class="flex items-center flex-wrap gap-2">
                                        <p class="text-sm sm:text-base font-medium text-gray-900 truncate">
                                            Mobile App Dev
                                        </p>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                            In Progress
                                        </span>
                                    </div>
                                    <div class="flex items-center text-xs sm:text-sm text-gray-500">
                                        <i class="fas fa-chalkboard-teacher mr-1"></i>
                                        <span class="truncate">Dr. Williams</span>
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-user-graduate mr-1"></i>
                                        <span>Grade: -</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-2 text-right text-xs text-gray-400 whitespace-nowrap">
                                40%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Info & Schedule --}}
        <div class="lg:col-span-1 space-y-4 sm:space-y-6">
            {{-- Schedule Card --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                        <i class="fas fa-calendar-alt text-green-500 mr-2"></i>
                        Today's Schedule
                    </h3>
                </div>
                <div class="p-4 sm:p-6 space-y-3">
                    <div class="flex items-center p-2 bg-gray-50 rounded-lg">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <i class="fas fa-laptop-code text-blue-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Web Development</p>
                            <p class="text-xs text-gray-500">09:00 - 11:00 • Room 301</p>
                        </div>
                    </div>
                    <div class="flex items-center p-2 bg-gray-50 rounded-lg">
                        <div class="bg-green-100 p-2 rounded-full mr-3">
                            <i class="fas fa-database text-green-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Database Systems</p>
                            <p class="text-xs text-gray-500">13:00 - 15:00 • Lab 205</p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 text-center pt-2">No more classes today</p>
                </div>
            </div>

            {{-- Upcoming Deadlines --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                        <i class="fas fa-clock text-orange-500 mr-2"></i>
                        Deadlines
                    </h3>
                </div>
                <div class="p-4 sm:p-6 space-y-3">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-red-500 rounded-full mr-2"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-700">DB: ERD Assignment</p>
                            <p class="text-xs text-gray-500">Tomorrow, 23:59</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-700">Web: CSS Framework</p>
                            <p class="text-xs text-gray-500">Fri, 18:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection