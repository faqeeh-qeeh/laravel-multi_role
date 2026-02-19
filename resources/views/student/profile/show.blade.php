@extends('student.layouts.app')

@section('title', 'Student Profile')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 h-48 relative">
            <div class="absolute -bottom-16 left-8">
                <div class="w-32 h-32 rounded-full border-4 border-white overflow-hidden bg-white">
                    <img src="{{ $student->profile_photo_url }}" 
                         alt="{{ $student->name }}" 
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>
        
        <!-- Profile Content -->
        <div class="pt-20 px-8 pb-8">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">{{ $student->name }}</h1>
                    <p class="text-gray-600 mt-1">Student</p>
                    <div class="flex items-center mt-2 text-gray-500">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>{{ $student->email }}</span>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('student.profile.edit') }}" 
                       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-edit mr-2"></i> Edit Profile
                    </a>
                    <a href="{{ route('student.dashboard') }}" 
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
                    </a>
                </div>
            </div>
            
            <!-- Profile Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <!-- Student Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-user-graduate text-green-500 mr-2"></i>
                        Student Information
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Student ID:</span>
                            <span class="font-medium">{{ $student->student_id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Faculty:</span>
                            <span class="font-medium">{{ $student->faculty }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Member Since:</span>
                            <span class="font-medium">{{ $student->created_at->format('F d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Last Updated:</span>
                            <span class="font-medium">{{ $student->updated_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Academic Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-graduation-cap text-blue-500 mr-2"></i>
                        Academic Information
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">GPA:</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                3.75
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Current Semester:</span>
                            <span class="font-medium">6</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Credits:</span>
                            <span class="font-medium">108</span>
                        </div>
                        <div class="pt-3">
                            <a href="#" 
                               class="text-green-500 hover:text-green-700 text-sm font-medium">
                                <i class="fas fa-file-alt mr-1"></i> View Academic Transcript
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Current Courses -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-book-open text-purple-500 mr-2"></i>
                    Current Courses
                </h3>
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <div class="flex items-start mb-3">
                                <div class="bg-blue-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-code text-blue-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Web Development</h4>
                                    <p class="text-sm text-gray-600">CS301</p>
                                </div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Dr. Smith</span>
                                <span class="text-green-600">A-</span>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <div class="flex items-start mb-3">
                                <div class="bg-purple-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-database text-purple-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Database Systems</h4>
                                    <p class="text-sm text-gray-600">CS302</p>
                                </div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Prof. Johnson</span>
                                <span class="text-yellow-600">B+</span>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <div class="flex items-start mb-3">
                                <div class="bg-green-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-mobile-alt text-green-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Mobile App Dev</h4>
                                    <p class="text-sm text-gray-600">CS303</p>
                                </div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Dr. Williams</span>
                                <span class="text-gray-600">In Progress</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection