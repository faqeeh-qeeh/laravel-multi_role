@extends('lecturer.layouts.app')

@section('title', 'Lecturer Profile')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-48 relative">
            <div class="absolute -bottom-16 left-8">
                <div class="w-32 h-32 rounded-full border-4 border-white overflow-hidden bg-white">
                    <img src="{{ $lecturer->profile_photo_url }}" 
                         alt="{{ $lecturer->name }}" 
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>
        
        <!-- Profile Content -->
        <div class="pt-20 px-8 pb-8">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Dr. {{ $lecturer->name }}</h1>
                    <p class="text-gray-600 mt-1">Lecturer</p>
                    <div class="flex items-center mt-2 text-gray-500">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>{{ $lecturer->email }}</span>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('lecturer.profile.edit') }}" 
                       class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-edit mr-2"></i> Edit Profile
                    </a>
                    <a href="{{ route('lecturer.dashboard') }}" 
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
                    </a>
                </div>
            </div>
            
            <!-- Profile Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <!-- Lecturer Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-chalkboard-teacher text-purple-500 mr-2"></i>
                        Lecturer Information
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">NIP:</span>
                            <span class="font-medium">{{ $lecturer->nip }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Department:</span>
                            <span class="font-medium">{{ $lecturer->department }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Member Since:</span>
                            <span class="font-medium">{{ $lecturer->created_at->format('F d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Last Updated:</span>
                            <span class="font-medium">{{ $lecturer->updated_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Teaching Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-book-open text-blue-500 mr-2"></i>
                        Teaching Information
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Active Courses:</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                4 Courses
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Students:</span>
                            <span class="font-medium">120</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Years of Service:</span>
                            <span class="font-medium">8 Years</span>
                        </div>
                        <div class="pt-3">
                            <a href="#" 
                               class="text-purple-500 hover:text-purple-700 text-sm font-medium">
                                <i class="fas fa-calendar-alt mr-1"></i> View Teaching Schedule
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Teaching Schedule -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-calendar-day text-green-500 mr-2"></i>
                    Teaching Schedule
                </h3>
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Course
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Day & Time
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Room
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Students
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Web Development</div>
                                        <div class="text-sm text-gray-500">CS301</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Monday, 09:00 - 11:00</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Room 301</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">35</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Database Systems</div>
                                        <div class="text-sm text-gray-500">CS302</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Tuesday, 13:00 - 15:00</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Lab 205</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">28</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Mobile App Development</div>
                                        <div class="text-sm text-gray-500">CS303</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Wednesday, 10:00 - 12:00</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Room 402</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">42</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Software Engineering</div>
                                        <div class="text-sm text-gray-500">CS304</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Thursday, 14:00 - 16:00</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Room 310</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">30</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection