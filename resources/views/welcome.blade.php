@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-6">
            Welcome to Multi-Role Authentication System
        </h1>
        <p class="text-xl text-gray-600 mb-8">
            Select your role to continue
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <!-- Admin Card -->
            <div class="bg-white rounded-lg shadow-xl p-6 border-t-4 border-blue-500">
                <div class="text-blue-500 mb-4">
                    <i class="fas fa-user-shield text-5xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Administrator</h3>
                <p class="text-gray-600 mb-6">System administrator with full access to manage the platform.</p>
                <div class="space-y-3">
                    <a href="{{ route('admin.login') }}" 
                       class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded text-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="{{ route('admin.register') }}" 
                       class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-4 rounded text-center">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </a>
                </div>
            </div>

            <!-- Student Card -->
            <div class="bg-white rounded-lg shadow-xl p-6 border-t-4 border-green-500">
                <div class="text-green-500 mb-4">
                    <i class="fas fa-user-graduate text-5xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Student</h3>
                <p class="text-gray-600 mb-6">Access course materials, submit assignments, and track progress.</p>
                <div class="space-y-3">
                    <a href="{{ route('student.login') }}" 
                       class="block w-full bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded text-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="{{ route('student.register') }}" 
                       class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-4 rounded text-center">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </a>
                </div>
            </div>

            <!-- Lecturer Card -->
            <div class="bg-white rounded-lg shadow-xl p-6 border-t-4 border-purple-500">
                <div class="text-purple-500 mb-4">
                    <i class="fas fa-chalkboard-teacher text-5xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Lecturer</h3>
                <p class="text-gray-600 mb-6">Upload materials, grade assignments, and manage courses.</p>
                <div class="space-y-3">
                    <a href="{{ route('lecturer.login') }}" 
                       class="block w-full bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded text-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="{{ route('lecturer.register') }}" 
                       class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-4 rounded text-center">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection