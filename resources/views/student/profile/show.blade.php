@extends('student.layouts.app')

@section('title', 'Student Profile')
@section('page-title', 'My Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Profile Header - Responsif -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 h-32 sm:h-40 md:h-48 relative">
            <div class="absolute -bottom-12 sm:-bottom-16 left-4 sm:left-8">
                <div class="w-20 h-20 sm:w-24 sm:h-24 md:w-32 md:h-32 rounded-full border-4 border-white overflow-hidden bg-white shadow-lg">
                    <img src="{{ $student->profile_photo_url }}"
                         alt="{{ $student->name }}"
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Profile Content - Responsif -->
        <div class="pt-16 sm:pt-20 px-4 sm:px-6 md:px-8 pb-4 sm:pb-6 md:pb-8">
            <!-- Header dengan action buttons yang responsif -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div class="w-full sm:w-auto">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 break-words">{{ $student->name }}</h1>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">Student</p>
                    <div class="flex items-center mt-2 text-gray-500 text-sm sm:text-base">
                        <i class="fas fa-envelope mr-2"></i>
                        <span class="break-all">{{ $student->email }}</span>
                    </div>
                </div>

                <!-- Action buttons - Stack di mobile, horizontal di desktop -->
                <div class="flex flex-col sm:flex-row w-full sm:w-auto gap-2 sm:gap-3">
                    <a href="{{ route('student.profile.edit') }}"
                       class="bg-green-500 hover:bg-green-600 text-white px-3 sm:px-4 py-2 rounded-lg flex items-center justify-center text-sm sm:text-base transition duration-150 ease-in-out">
                        <i class="fas fa-edit mr-2"></i>
                        <span class="whitespace-nowrap">Edit Profile</span>
                    </a>
                    <a href="{{ route('student.dashboard') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 sm:px-4 py-2 rounded-lg flex items-center justify-center text-sm sm:text-base transition duration-150 ease-in-out">
                        <i class="fas fa-arrow-left mr-2"></i>
                        <span class="whitespace-nowrap">Back</span>
                    </a>
                </div>
            </div>

            <!-- Profile Details Grid - Responsif -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mt-6 sm:mt-8">
                <!-- Student Information Card -->
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                        <i class="fas fa-user-graduate text-green-500 mr-2 text-sm sm:text-base"></i>
                        Student Information
                    </h3>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Student ID:</span>
                            <span class="font-medium text-sm sm:text-base">{{ $student->student_id }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Faculty:</span>
                            <span class="font-medium text-sm sm:text-base">{{ $student->faculty }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Member Since:</span>
                            <span class="font-medium text-sm sm:text-base">{{ $student->created_at->format('F d, Y') }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Last Updated:</span>
                            <span class="font-medium text-sm sm:text-base">{{ $student->updated_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Academic Information Card -->
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                        <i class="fas fa-graduation-cap text-blue-500 mr-2 text-sm sm:text-base"></i>
                        Academic Information
                    </h3>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                            <span class="text-gray-600 text-sm sm:text-base">GPA:</span>
                            <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-green-100 text-green-800 w-fit mt-1 sm:mt-0">
                                3.75
                            </span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Current Semester:</span>
                            <span class="font-medium text-sm sm:text-base">6</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Total Credits:</span>
                            <span class="font-medium text-sm sm:text-base">108</span>
                        </div>
                        <div class="pt-2 sm:pt-3">
                            <a href="#"
                               class="text-green-500 hover:text-green-700 text-xs sm:text-sm font-medium inline-flex items-center">
                                <i class="fas fa-file-alt mr-1"></i> View Academic Transcript
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Courses - Responsif -->
            <div class="mt-6 sm:mt-8">
                <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                    <i class="fas fa-book-open text-purple-500 mr-2 text-sm sm:text-base"></i>
                    Current Courses
                </h3>
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                        <!-- Course Card 1 -->
                        <div class="bg-white rounded-lg p-3 sm:p-4 border border-gray-200 hover:shadow-md transition-shadow">
                            <div class="flex items-start mb-2 sm:mb-3">
                                <div class="bg-blue-100 p-1.5 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                    <i class="fas fa-code text-blue-500 text-xs sm:text-sm"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="font-semibold text-gray-800 text-sm sm:text-base truncate">Web Development</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">CS301</p>
                                </div>
                            </div>
                            <div class="flex justify-between text-xs sm:text-sm text-gray-500">
                                <span class="truncate">Dr. Smith</span>
                                <span class="text-green-600 font-medium">A-</span>
                            </div>
                        </div>

                        <!-- Course Card 2 -->
                        <div class="bg-white rounded-lg p-3 sm:p-4 border border-gray-200 hover:shadow-md transition-shadow">
                            <div class="flex items-start mb-2 sm:mb-3">
                                <div class="bg-purple-100 p-1.5 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                    <i class="fas fa-database text-purple-500 text-xs sm:text-sm"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="font-semibold text-gray-800 text-sm sm:text-base truncate">Database Systems</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">CS302</p>
                                </div>
                            </div>
                            <div class="flex justify-between text-xs sm:text-sm text-gray-500">
                                <span class="truncate">Prof. Johnson</span>
                                <span class="text-yellow-600 font-medium">B+</span>
                            </div>
                        </div>

                        <!-- Course Card 3 -->
                        <div class="bg-white rounded-lg p-3 sm:p-4 border border-gray-200 hover:shadow-md transition-shadow">
                            <div class="flex items-start mb-2 sm:mb-3">
                                <div class="bg-green-100 p-1.5 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                    <i class="fas fa-mobile-alt text-green-500 text-xs sm:text-sm"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="font-semibold text-gray-800 text-sm sm:text-base truncate">Mobile App Dev</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">CS303</p>
                                </div>
                            </div>
                            <div class="flex justify-between text-xs sm:text-sm text-gray-500">
                                <span class="truncate">Dr. Williams</span>
                                <span class="text-gray-600">In Progress</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Mobile-friendly touch targets */
    @media (max-width: 640px) {
        button,
        a {
            min-height: 44px;
        }
    }
</style>
@endsection