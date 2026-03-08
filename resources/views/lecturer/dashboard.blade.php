@extends('lecturer.layouts.app')

@section('title', 'Lecturer Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">

    {{-- Welcome Section - Responsive (Mirip dengan Admin) --}}
    <div class="mb-6 sm:mb-8">
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg shadow-lg overflow-hidden">
            <div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                    <div class="flex items-center mb-3 sm:mb-0">
                        <div class="bg-white bg-opacity-20 p-2 sm:p-3 rounded-full mr-3 sm:mr-4">
                            <i class="fas fa-chalkboard-teacher text-white text-xl sm:text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white">Dashboard</h1>
                            <p class="text-purple-100 text-sm sm:text-base mt-1">
                                Welcome back, <span class="font-semibold">Dr. {{ auth()->guard('lecturer')->user()->name }}</span>
                            </p>
                        </div>
                    </div>

                    {{-- Lecturer Info Card - Hidden on mobile, visible on sm --}}
                    <div class="hidden sm:block bg-white bg-opacity-20 px-4 py-2 rounded-lg">
                        <p class="text-white text-sm">
                            <i class="fas fa-id-card mr-2"></i>
                            NIP: {{ auth()->guard('lecturer')->user()->nip }} | {{ auth()->guard('lecturer')->user()->department ?? 'Department' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Cards - Grid Responsif --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
        {{-- Teaching Courses Card --}}
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-100 p-3 sm:p-4 rounded-full mr-3 sm:mr-4">
                        <i class="fas fa-chalkboard text-blue-600 text-lg sm:text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500 uppercase">Teaching Courses</p>
                        <div class="flex items-baseline">
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mr-2">4</p>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Active this semester</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 sm:px-6 py-2 sm:py-3">
                <div class="flex justify-between items-center text-xs sm:text-sm">
                    <span class="text-gray-600">Total students: 135</span>
                    <span class="text-gray-400">8 credits</span>
                </div>
            </div>
        </div>

        {{-- Assignments to Grade Card --}}
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-orange-100 p-3 sm:p-4 rounded-full mr-3 sm:mr-4">
                        <i class="fas fa-clipboard-check text-orange-600 text-lg sm:text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500 uppercase">To Grade</p>
                        <div class="flex items-baseline">
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mr-2">24</p>
                            <span class="text-xs sm:text-sm text-red-600">
                                <i class="fas fa-exclamation-circle"></i> 5 overdue
                            </span>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Pending submissions</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 sm:px-6 py-2 sm:py-3">
                <div class="flex flex-wrap gap-2 text-xs">
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full">Web: 15</span>
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full">DB: 9</span>
                </div>
            </div>
        </div>

        {{-- Total Students Card --}}
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-100 p-3 sm:p-4 rounded-full mr-3 sm:mr-4">
                        <i class="fas fa-users text-green-600 text-lg sm:text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500 uppercase">Total Students</p>
                        <div class="flex items-baseline">
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mr-2">135</p>
                            <span class="text-xs sm:text-sm text-green-600">
                                <i class="fas fa-arrow-up"></i> +15
                            </span>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Across all courses</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 sm:px-6 py-2 sm:py-3">
                <div class="flex justify-between items-center text-xs sm:text-sm">
                    <span class="text-gray-600">Web: 35</span>
                    <span class="text-gray-400">DB: 28</span>
                    <span class="text-gray-400">Mobile: 42</span>
                </div>
            </div>
        </div>
    </div>

    {{-- My Teaching Schedule & Quick Actions --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
        {{-- Schedule Section --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                            <i class="fas fa-calendar-alt text-purple-500 mr-2"></i>
                            My Teaching Schedule
                        </h3>
                        <span class="text-xs sm:text-sm text-gray-500">Week 8</span>
                    </div>
                </div>

                {{-- Mobile View (Card Layout) - hidden on sm and above --}}
                <div class="block sm:hidden divide-y divide-gray-200">
                    {{-- Schedule Card 1 --}}
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-laptop-code text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Web Development</h4>
                                <p class="text-xs text-gray-500">Mon, 09:00 - 11:00</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <div class="bg-gray-50 p-2 rounded">
                                <span class="text-gray-500">Room</span>
                                <p class="font-medium">301</p>
                            </div>
                            <div class="bg-gray-50 p-2 rounded">
                                <span class="text-gray-500">Students</span>
                                <p class="font-medium">35</p>
                            </div>
                        </div>
                    </div>
                    {{-- Schedule Card 2 --}}
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="bg-green-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-database text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Database Systems</h4>
                                <p class="text-xs text-gray-500">Tue, 13:00 - 15:00</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <div class="bg-gray-50 p-2 rounded">
                                <span class="text-gray-500">Room</span>
                                <p class="font-medium">Lab 205</p>
                            </div>
                            <div class="bg-gray-50 p-2 rounded">
                                <span class="text-gray-500">Students</span>
                                <p class="font-medium">28</p>
                            </div>
                        </div>
                    </div>
                    {{-- Schedule Card 3 --}}
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="bg-purple-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-mobile-alt text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Mobile App Dev</h4>
                                <p class="text-xs text-gray-500">Wed, 10:00 - 12:00</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <div class="bg-gray-50 p-2 rounded">
                                <span class="text-gray-500">Room</span>
                                <p class="font-medium">402</p>
                            </div>
                            <div class="bg-gray-50 p-2 rounded">
                                <span class="text-gray-500">Students</span>
                                <p class="font-medium">42</p>
                            </div>
                        </div>
                    </div>
                    {{-- Schedule Card 4 --}}
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="bg-orange-100 p-2 rounded-lg mr-3">
                                <i class="fas fa-cogs text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Software Engineering</h4>
                                <p class="text-xs text-gray-500">Thu, 14:00 - 16:00</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <div class="bg-gray-50 p-2 rounded">
                                <span class="text-gray-500">Room</span>
                                <p class="font-medium">310</p>
                            </div>
                            <div class="bg-gray-50 p-2 rounded">
                                <span class="text-gray-500">Students</span>
                                <p class="font-medium">30</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Desktop View (Table) - hidden on mobile, visible on sm and above --}}
                <div class="hidden sm:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Students</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Web Development</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mon, 09:00 - 11:00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">301</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">35</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Database Systems</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Tue, 13:00 - 15:00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Lab 205</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">28</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Mobile App Dev</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Wed, 10:00 - 12:00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">402</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">42</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Software Engineering</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Thu, 14:00 - 16:00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">310</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Quick Actions & Info --}}
        <div class="lg:col-span-1 space-y-4 sm:space-y-6">
            {{-- Quick Actions Card --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                        <i class="fas fa-bolt text-purple-500 mr-2"></i>
                        Quick Actions
                    </h3>
                </div>
                <div class="p-4 sm:p-6 space-y-3">
                    <a href="#" class="flex items-center p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors duration-150">
                        <div class="bg-purple-100 p-2 rounded-full mr-3">
                            <i class="fas fa-clipboard-list text-purple-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Grade Assignments</p>
                            <p class="text-xs text-gray-500">24 pending</p>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </a>
                    <a href="#" class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-150">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <i class="fas fa-plus-circle text-blue-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Upload Material</p>
                            <p class="text-xs text-gray-500">For Web Development</p>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </a>
                    <a href="#" class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors duration-150">
                        <div class="bg-green-100 p-2 rounded-full mr-3">
                            <i class="fas fa-calendar-plus text-green-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Schedule Meeting</p>
                            <p class="text-xs text-gray-500">Office hours</p>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </a>
                </div>
            </div>

            {{-- Today's Overview --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                        <i class="fas fa-chart-pie text-purple-500 mr-2"></i>
                        Today's Overview
                    </h3>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Classes today</span>
                            <span class="font-medium text-gray-800">2</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Office hours</span>
                            <span class="font-medium text-gray-800">13:00 - 15:00</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Pending reviews</span>
                            <span class="font-medium text-gray-800">8</span>
                        </div>
                        <div class="pt-3 mt-3 border-t border-gray-200">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                <p class="text-xs text-gray-500">Next class in 2 hours</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection