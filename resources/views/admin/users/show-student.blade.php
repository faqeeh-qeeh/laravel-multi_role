@extends('admin.layouts.app')

@section('title', 'Student Details')
@section('page-title', 'Student Details')

@section('breadcrumb')
<div class="flex items-center space-x-2 text-sm text-gray-600">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
    <i class="fas fa-chevron-right text-xs"></i>
    <a href="{{ route('admin.users.students') }}" class="hover:text-blue-600">Students</a>
    <i class="fas fa-chevron-right text-xs"></i>
    <span class="text-gray-800">Details</span>
</div>
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-8">
            <div class="flex items-center">
                <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white shadow-lg">
                    <img src="{{ $student->profile_photo_url }}" 
                         alt="{{ $student->name }}" 
                         class="w-full h-full object-cover">
                </div>
                <div class="ml-6">
                    <h1 class="text-2xl font-bold text-white">{{ $student->name }}</h1>
                    <p class="text-blue-100">{{ $student->student_id }}</p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Personal Information -->
                <div class="col-span-2 md:col-span-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-user text-blue-600 mr-2"></i>
                        Personal Information
                    </h3>
                    <div class="space-y-3">
                        <div class="flex border-b pb-2">
                            <span class="w-32 text-gray-600">Full Name</span>
                            <span class="text-gray-900 font-medium">{{ $student->name }}</span>
                        </div>
                        <div class="flex border-b pb-2">
                            <span class="w-32 text-gray-600">Student ID</span>
                            <span class="text-gray-900 font-medium">{{ $student->student_id }}</span>
                        </div>
                        <div class="flex border-b pb-2">
                            <span class="w-32 text-gray-600">Email</span>
                            <span class="text-gray-900">{{ $student->email }}</span>
                        </div>
                        <div class="flex border-b pb-2">
                            <span class="w-32 text-gray-600">Faculty</span>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $student->faculty ?? 'N/A' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Account Information -->
                <div class="col-span-2 md:col-span-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-cog text-blue-600 mr-2"></i>
                        Account Information
                    </h3>
                    <div class="space-y-3">
                        <div class="flex border-b pb-2">
                            <span class="w-32 text-gray-600">Account Type</span>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                Student
                            </span>
                        </div>
                        <div class="flex border-b pb-2">
                            <span class="w-32 text-gray-600">Joined Date</span>
                            <span class="text-gray-900">{{ $student->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex border-b pb-2">
                            <span class="w-32 text-gray-600">Last Updated</span>
                            <span class="text-gray-900">{{ $student->updated_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex border-b pb-2">
                            <span class="w-32 text-gray-600">Email Verified</span>
                            <span class="text-gray-900">
                                @if($student->email_verified_at)
                                    <span class="text-green-600">
                                        <i class="fas fa-check-circle"></i> Verified
                                    </span>
                                @else
                                    <span class="text-yellow-600">
                                        <i class="fas fa-clock"></i> Not Verified
                                    </span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.users.students') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back
                </a>
                <form action="{{ route('admin.users.student.delete', $student->id) }}" 
                      method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Student
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection