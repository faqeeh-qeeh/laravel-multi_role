@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">
    <!-- Welcome Section - Responsif -->
    <div class="mb-6 sm:mb-8">
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg overflow-hidden">
            <div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                    <div class="flex items-center mb-3 sm:mb-0">
                        <div class="bg-white bg-opacity-20 p-2 sm:p-3 rounded-full mr-3 sm:mr-4">
                            <i class="fas fa-user-shield text-white text-xl sm:text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white">Dashboard</h1>
                            <p class="text-blue-100 text-sm sm:text-base mt-1">
                                Welcome back, <span class="font-semibold">{{ auth()->guard('admin')->user()->name }}</span>
                            </p>
                        </div>
                    </div>
                    
                    <!-- Date Display - Hidden on mobile -->
                    <div class="hidden sm:block bg-white bg-opacity-20 px-4 py-2 rounded-lg">
                        <p class="text-white text-sm">
                            <i class="far fa-calendar-alt mr-2"></i>
                            {{ now()->format('l, d F Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards - Grid Responsif -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
        <!-- Total Users Card -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-100 p-3 sm:p-4 rounded-full mr-3 sm:mr-4">
                        <i class="fas fa-users text-blue-600 text-lg sm:text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500 uppercase">Total Users</p>
                        <div class="flex items-baseline">
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mr-2">{{ $totalUsers }}</p>
                            <span class="text-xs sm:text-sm text-green-600">
                                <i class="fas fa-arrow-up"></i> +{{ $newUsersThisMonth }}
                            </span>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Last 30 days</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 sm:px-6 py-2 sm:py-3">
                <div class="flex justify-between items-center text-xs sm:text-sm">
                    <span class="text-gray-600">Active: {{ $activeUsers }}</span>
                    <span class="text-gray-400">{{ round(($activeUsers / max($totalUsers, 1)) * 100) }}%</span>
                </div>
            </div>
        </div>
        
        <!-- Students Card -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-100 p-3 sm:p-4 rounded-full mr-3 sm:mr-4">
                        <i class="fas fa-user-graduate text-green-600 text-lg sm:text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500 uppercase">Students</p>
                        <div class="flex items-baseline">
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mr-2">{{ $totalStudents }}</p>
                            <span class="text-xs sm:text-sm text-green-600">
                                <i class="fas fa-arrow-up"></i> +{{ $newStudentsThisMonth }}
                            </span>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Last 30 days</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 sm:px-6 py-2 sm:py-3">
                <div class="flex flex-wrap gap-2 text-xs">
                    @foreach($topFaculties as $faculty)
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">
                            {{ $faculty->faculty }}: {{ $faculty->count }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Lecturers Card -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-100 p-3 sm:p-4 rounded-full mr-3 sm:mr-4">
                        <i class="fas fa-chalkboard-teacher text-purple-600 text-lg sm:text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500 uppercase">Lecturers</p>
                        <div class="flex items-baseline">
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mr-2">{{ $totalLecturers }}</p>
                            <span class="text-xs sm:text-sm text-green-600">
                                <i class="fas fa-arrow-up"></i> +{{ $newLecturersThisMonth }}
                            </span>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Last 30 days</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 sm:px-6 py-2 sm:py-3">
                <div class="flex flex-wrap gap-2 text-xs">
                    @foreach($topDepartments as $department)
                        <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full">
                            {{ $department->department }}: {{ $department->count }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
        <!-- Recent Users Section -->
        <!-- Recent Users Section - Perbaikan bagian gambar -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                            <i class="fas fa-history text-blue-500 mr-2"></i>
                            Recent Users
                        </h3>
                        <a href="{{ route('admin.users.students') }}" 
                        class="text-xs sm:text-sm text-blue-600 hover:text-blue-800">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <div class="divide-y divide-gray-200">
                    @forelse($recentUsers as $user)
                        <div class="px-4 sm:px-6 py-3 sm:py-4 hover:bg-gray-50 transition-colors duration-150">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center min-w-0 flex-1">
                                    <div class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 rounded-full overflow-hidden bg-gray-200">
                                        <img src="{{ $user->profile_photo_url }}" 
                                            alt="{{ $user->name }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <p class="text-sm sm:text-base font-medium text-gray-900 truncate">
                                                {{ $user->name }}
                                            </p>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                                @if($user->type == 'student') bg-green-100 text-green-800
                                                @else bg-purple-100 text-purple-800 @endif">
                                                {{ ucfirst($user->type) }}
                                            </span>
                                        </div>
                                        <div class="flex items-center text-xs sm:text-sm text-gray-500">
                                            <i class="fas fa-envelope mr-1"></i>
                                            <span class="truncate">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-2 text-right text-xs text-gray-400 whitespace-nowrap">
                                    {{ $user->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="px-4 sm:px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-users text-4xl mb-3 opacity-50"></i>
                            <p>No recent users found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        
        <!-- Quick Actions & Stats -->
        <div class="lg:col-span-1">
            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4 sm:mb-6">
                <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                        <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                        Quick Actions
                    </h3>
                </div>
                
                <div class="p-4 sm:p-6 space-y-3">
                    <a href="{{ route('admin.users.students') }}" 
                       class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-150">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <i class="fas fa-user-graduate text-blue-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Manage Students</p>
                            <p class="text-xs text-gray-500">Add, edit or remove students</p>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </a>
                    
                    <a href="{{ route('admin.users.lecturers') }}" 
                       class="flex items-center p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors duration-150">
                        <div class="bg-purple-100 p-2 rounded-full mr-3">
                            <i class="fas fa-chalkboard-teacher text-purple-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Manage Lecturers</p>
                            <p class="text-xs text-gray-500">Add, edit or remove lecturers</p>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </a>
                    
                    <a href="{{ route('admin.profile.edit') }}" 
                       class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors duration-150">
                        <div class="bg-green-100 p-2 rounded-full mr-3">
                            <i class="fas fa-user-cog text-green-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Edit Profile</p>
                            <p class="text-xs text-gray-500">Update your account settings</p>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </a>
                </div>
            </div>
            
            <!-- System Info -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-4 sm:px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        System Info
                    </h3>
                </div>
                
                <div class="p-4 sm:p-6">
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">PHP Version:</span>
                            <span class="font-medium text-gray-800">{{ phpversion() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Laravel Version:</span>
                            <span class="font-medium text-gray-800">{{ app()->version() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Environment:</span>
                            <span class="font-medium text-gray-800">{{ app()->environment() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Last Login:</span>
                            <span class="font-medium text-gray-800">{{ now()->format('H:i, d M') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection