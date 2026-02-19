@extends('admin.layouts.app')

@section('title', 'Admin Profile')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-48 relative">
            <div class="absolute -bottom-16 left-8">
                <div class="w-32 h-32 rounded-full border-4 border-white overflow-hidden bg-white">
                    <img src="{{ $admin->profile_photo_url }}" 
                         alt="{{ $admin->name }}" 
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>
        
        <!-- Profile Content -->
        <div class="pt-20 px-8 pb-8">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">{{ $admin->name }}</h1>
                    <p class="text-gray-600 mt-1">Administrator</p>
                    <div class="flex items-center mt-2 text-gray-500">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>{{ $admin->email }}</span>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('admin.profile.edit') }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-edit mr-2"></i> Edit Profile
                    </a>
                    <a href="{{ route('admin.dashboard') }}" 
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
                    </a>
                </div>
            </div>
            
            <!-- Profile Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        Account Information
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Account Type:</span>
                            <span class="font-medium">Administrator</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Member Since:</span>
                            <span class="font-medium">{{ $admin->created_at->format('F d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Last Updated:</span>
                            <span class="font-medium">{{ $admin->updated_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-shield-alt text-green-500 mr-2"></i>
                        Security Status
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Password Security:</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i> Strong
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Two-Factor Auth:</span>
                            <span class="text-yellow-600">Not Enabled</span>
                        </div>
                        <div class="pt-3">
                            <a href="{{ route('admin.profile.edit') }}#password" 
                               class="text-blue-500 hover:text-blue-700 text-sm font-medium">
                                <i class="fas fa-key mr-1"></i> Change Password
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-history text-purple-500 mr-2"></i>
                    Recent Activity
                </h3>
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-2 rounded-full mr-3">
                                <i class="fas fa-sign-in-alt text-blue-500"></i>
                            </div>
                            <div>
                                <p class="text-gray-800">Successfully logged in</p>
                                <p class="text-sm text-gray-500">Just now</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-100 p-2 rounded-full mr-3">
                                <i class="fas fa-user-edit text-green-500"></i>
                            </div>
                            <div>
                                <p class="text-gray-800">Updated profile information</p>
                                <p class="text-sm text-gray-500">2 days ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection