@extends('admin.layouts.app')

@section('title', 'Admin Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Profile Header - Responsif -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-32 sm:h-40 md:h-48 relative">
            <div class="absolute -bottom-12 sm:-bottom-16 left-4 sm:left-8">
                <div class="w-20 h-20 sm:w-24 sm:h-24 md:w-32 md:h-32 rounded-full border-4 border-white overflow-hidden bg-white shadow-lg">
                    <img src="{{ $admin->profile_photo_url }}" 
                         alt="{{ $admin->name }}" 
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>
        
        <!-- Profile Content - Responsif -->
        <div class="pt-16 sm:pt-20 px-4 sm:px-6 md:px-8 pb-4 sm:pb-6 md:pb-8">
            <!-- Header dengan action buttons yang responsif -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div class="w-full sm:w-auto">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 break-words">{{ $admin->name }}</h1>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">Administrator</p>
                    <div class="flex items-center mt-2 text-gray-500 text-sm sm:text-base">
                        <i class="fas fa-envelope mr-2"></i>
                        <span class="break-all">{{ $admin->email }}</span>
                    </div>
                </div>
                
                <!-- Action buttons - Stack di mobile, horizontal di desktop -->
                <div class="flex flex-col sm:flex-row w-full sm:w-auto gap-2 sm:gap-3">
                    <a href="{{ route('admin.profile.edit') }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 sm:px-4 py-2 rounded-lg flex items-center justify-center text-sm sm:text-base transition duration-150 ease-in-out">
                        <i class="fas fa-edit mr-2"></i> 
                        <span class="whitespace-nowrap">Edit Profile</span>
                    </a>
                    <a href="{{ route('admin.dashboard') }}" 
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 sm:px-4 py-2 rounded-lg flex items-center justify-center text-sm sm:text-base transition duration-150 ease-in-out">
                        <i class="fas fa-arrow-left mr-2"></i> 
                        <span class="whitespace-nowrap">Back</span>
                    </a>
                </div>
            </div>
            
            <!-- Profile Details Grid - Responsif -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mt-6 sm:mt-8">
                <!-- Account Information Card -->
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                        <i class="fas fa-info-circle text-blue-500 mr-2 text-sm sm:text-base"></i>
                        Account Information
                    </h3>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Account Type:</span>
                            <span class="font-medium text-sm sm:text-base">Administrator</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Member Since:</span>
                            <span class="font-medium text-sm sm:text-base">{{ $admin->created_at->format('F d, Y') }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Last Updated:</span>
                            <span class="font-medium text-sm sm:text-base">{{ $admin->updated_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Security Status Card -->
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                        <i class="fas fa-shield-alt text-green-500 mr-2 text-sm sm:text-base"></i>
                        Security Status
                    </h3>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                            <span class="text-gray-600 text-sm sm:text-base">Password Security:</span>
                            <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-green-100 text-green-800 w-fit mt-1 sm:mt-0">
                                <i class="fas fa-check-circle mr-1"></i> Strong
                            </span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Two-Factor Auth:</span>
                            <span class="text-yellow-600 text-sm sm:text-base">Not Enabled</span>
                        </div>
                        <div class="pt-2 sm:pt-3">
                            <a href="{{ route('admin.profile.edit') }}#password" 
                               class="text-blue-500 hover:text-blue-700 text-xs sm:text-sm font-medium inline-flex items-center">
                                <i class="fas fa-key mr-1"></i> Change Password
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity - Responsif -->
            <div class="mt-6 sm:mt-8">
                <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                    <i class="fas fa-history text-purple-500 mr-2 text-sm sm:text-base"></i>
                    Recent Activity
                </h3>
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                    <div class="space-y-3 sm:space-y-4">
                        <!-- Activity Item 1 -->
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-1.5 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                <i class="fas fa-sign-in-alt text-blue-500 text-xs sm:text-sm"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-gray-800 text-sm sm:text-base">Successfully logged in</p>
                                <p class="text-xs sm:text-sm text-gray-500">Just now</p>
                            </div>
                        </div>
                        
                        <!-- Activity Item 2 -->
                        <div class="flex items-start">
                            <div class="bg-green-100 p-1.5 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                <i class="fas fa-user-edit text-green-500 text-xs sm:text-sm"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-gray-800 text-sm sm:text-base">Updated profile information</p>
                                <p class="text-xs sm:text-sm text-gray-500">2 days ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection