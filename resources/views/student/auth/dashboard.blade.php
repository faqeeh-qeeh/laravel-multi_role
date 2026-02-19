@extends('student.layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center mb-8">
                    <div class="bg-green-100 p-3 rounded-full mr-4">
                        <i class="fas fa-user-graduate text-green-600 text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Student Dashboard</h2>
                        <p class="text-gray-600">Welcome back, {{ $user->name }}</p>
                        <p class="text-gray-500 text-sm">Student ID: {{ $user->student_id }} | Faculty: {{ $user->faculty }}</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-book text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Active Courses</h3>
                                <p class="text-3xl font-bold text-blue-600">5</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="bg-yellow-100 p-3 rounded-full mr-4">
                                <i class="fas fa-tasks text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Assignments Due</h3>
                                <p class="text-3xl font-bold text-yellow-600">3</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-full mr-4">
                                <i class="fas fa-chart-line text-purple-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">GPA</h3>
                                <p class="text-3xl font-bold text-purple-600">3.75</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">My Courses</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-white border border-gray-300 rounded-lg p-4">
                            <div class="flex items-center mb-3">
                                <div class="bg-blue-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-code text-blue-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Web Development</h4>
                                    <p class="text-sm text-gray-600">Dr. Smith</p>
                                </div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Progress: 75%</span>
                                <span>Grade: A-</span>
                            </div>
                        </div>
                        
                        <div class="bg-white border border-gray-300 rounded-lg p-4">
                            <div class="flex items-center mb-3">
                                <div class="bg-green-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-database text-green-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Database Systems</h4>
                                    <p class="text-sm text-gray-600">Prof. Johnson</p>
                                </div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Progress: 60%</span>
                                <span>Grade: B+</span>
                            </div>
                        </div>
                        
                        <div class="bg-white border border-gray-300 rounded-lg p-4">
                            <div class="flex items-center mb-3">
                                <div class="bg-purple-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-mobile-alt text-purple-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Mobile App Dev</h4>
                                    <p class="text-sm text-gray-600">Dr. Williams</p>
                                </div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Progress: 40%</span>
                                <span>Grade: In Progress</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection