@extends('student.layouts.app')

@section('title', 'Edit Student Profile')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 px-8 py-6">
            <h1 class="text-2xl font-bold text-white">Edit Profile</h1>
            <p class="text-green-100">Update your student information and settings</p>
        </div>
        
        <!-- Profile Edit Form -->
        <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Left Column - Profile Photo -->
                <div class="md:col-span-1">
                    <div class="sticky top-8">
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Profile Photo</h3>
                            
                            <!-- Current Photo -->
                            <div class="flex flex-col items-center mb-6">
                                <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-white shadow-lg mb-4">
                                    <img src="{{ $student->profile_photo_url }}" 
                                         alt="{{ $student->name }}" 
                                         id="profile-photo-preview"
                                         class="w-full h-full object-cover">
                                </div>
                                <p class="text-sm text-gray-500 text-center">
                                    Current profile photo
                                </p>
                            </div>
                            
                            <!-- Upload Controls -->
                            <div class="space-y-4">
                                <div>
                                    <label for="profile_photo" class="block text-sm font-medium text-gray-700 mb-2">
                                        Upload New Photo
                                    </label>
                                    <input type="file" 
                                           id="profile_photo" 
                                           name="profile_photo" 
                                           accept="image/*"
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                                           onchange="previewImage(event)">
                                    <p class="text-xs text-gray-500 mt-1">
                                        JPG, PNG or GIF. Max size 2MB.
                                    </p>
                                </div>
                                
                                @if($student->profile_photo)
                                    <div class="pt-4 border-t border-gray-200">
                                        <form action="{{ route('student.profile.delete.photo') }}" method="POST" id="delete-photo-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    onclick="confirmDeletePhoto()"
                                                    class="w-full bg-red-50 hover:bg-red-100 text-red-700 px-4 py-2 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-trash-alt mr-2"></i> Remove Photo
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Form Fields -->
                <div class="md:col-span-2">
                    <div class="space-y-6">
                        <!-- Personal Information Section -->
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Personal Information</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Full Name *
                                    </label>
                                    <input type="text" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $student->name) }}"
                                           required
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Address *
                                    </label>
                                    <input type="email" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email', $student->email) }}"
                                           required
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Student Information Section -->
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Student Information</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="student_id" class="block text-sm font-medium text-gray-700 mb-2">
                                        Student ID *
                                    </label>
                                    <input type="text" 
                                           id="student_id" 
                                           name="student_id" 
                                           value="{{ old('student_id', $student->student_id) }}"
                                           required
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                </div>
                                
                                <div>
                                    <label for="faculty" class="block text-sm font-medium text-gray-700 mb-2">
                                        Faculty *
                                    </label>
                                    <input type="text" 
                                           id="faculty" 
                                           name="faculty" 
                                           value="{{ old('faculty', $student->faculty) }}"
                                           required
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Change Password Section -->
                        <div class="bg-gray-50 rounded-lg p-6" id="password">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Change Password</h3>
                            <p class="text-sm text-gray-500 mb-4">
                                Leave blank if you don't want to change your password
                            </p>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                                        Current Password
                                    </label>
                                    <input type="password" 
                                           id="current_password" 
                                           name="current_password"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                </div>
                                
                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">
                                        New Password
                                    </label>
                                    <input type="password" 
                                           id="new_password" 
                                           name="new_password"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                </div>
                                
                                <div>
                                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                        Confirm New Password
                                    </label>
                                    <input type="password" 
                                           id="new_password_confirmation" 
                                           name="new_password_confirmation"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="flex justify-between pt-6">
                            <a href="{{ route('student.profile.show') }}" 
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-medium flex items-center">
                                <i class="fas fa-times mr-2"></i> Cancel
                            </a>
                            <button type="submit" 
                                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-medium flex items-center">
                                <i class="fas fa-save mr-2"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Image preview functionality
    function previewImage(event) {
        const reader = new FileReader();
        const imageElement = document.getElementById('profile-photo-preview');
        
        reader.onload = function(){
            imageElement.src = reader.result;
        }
        
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
    
    // Confirm delete photo
    function confirmDeletePhoto() {
        if (confirm('Are you sure you want to remove your profile photo?')) {
            document.getElementById('delete-photo-form').submit();
        }
    }
    
    // Confirm password change
    document.querySelector('form').addEventListener('submit', function(e) {
        const currentPassword = document.getElementById('current_password').value;
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('new_password_confirmation').value;
        
        if ((newPassword || confirmPassword) && !currentPassword) {
            e.preventDefault();
            alert('Please enter your current password to change it.');
            return false;
        }
        
        if (newPassword !== confirmPassword) {
            e.preventDefault();
            alert('New password and confirmation do not match.');
            return false;
        }
    });
</script>
@endsection