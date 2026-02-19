@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center mb-8">
                    <div class="bg-blue-100 p-3 rounded-full mr-4">
                        <i class="fas fa-user-shield text-blue-600 text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Admin Dashboard</h2>
                        <p class="text-gray-600">Welcome back, {{ auth()->guard('admin')->user()->name }}</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-users text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Total Users</h3>
                                <p class="text-3xl font-bold text-blue-600">1,234</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-user-graduate text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Students</h3>
                                <p class="text-3xl font-bold text-green-600">1,000</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-full mr-4">
                                <i class="fas fa-chalkboard-teacher text-purple-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Lecturers</h3>
                                <p class="text-3xl font-bold text-purple-600">50</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="#" class="bg-white border border-gray-300 rounded-lg p-4 hover:bg-gray-50 transition duration-150">
                            <div class="flex items-center">
                                <i class="fas fa-cog text-blue-500 mr-3"></i>
                                <span class="text-gray-700">System Settings</span>
                            </div>
                        </a>
                        <a href="#" class="bg-white border border-gray-300 rounded-lg p-4 hover:bg-gray-50 transition duration-150">
                            <div class="flex items-center">
                                <i class="fas fa-user-cog text-green-500 mr-3"></i>
                                <span class="text-gray-700">Manage Users</span>
                            </div>
                        </a>
                        <a href="#" class="bg-white border border-gray-300 rounded-lg p-4 hover:bg-gray-50 transition duration-150">
                            <div class="flex items-center">
                                <i class="fas fa-chart-bar text-purple-500 mr-3"></i>
                                <span class="text-gray-700">View Reports</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection