@extends('admin.layouts.app')

@section('title', 'Edit Admin Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Form Header - Responsif -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-4 sm:px-6 md:px-8 py-4 sm:py-5 md:py-6">
            <h1 class="text-xl sm:text-2xl font-bold text-white">Edit Profile</h1>
            <p class="text-blue-100 text-sm sm:text-base mt-1">Update your personal information and settings</p>
        </div>
        
        {{-- @if(session('success'))
            <div class="mx-4 sm:mx-6 md:mx-8 mt-4 sm:mt-6 md:mt-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        
        @if($errors->any())
            <div class="mx-4 sm:mx-6 md:mx-8 mt-4 sm:mt-6 md:mt-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        
        <!-- Grid Layout - Stack di mobile, side-by-side di desktop -->
        <div class="flex flex-col lg:grid lg:grid-cols-3 gap-6 lg:gap-8 p-4 sm:p-6 md:p-8">
            <!-- Left Column - Profile Photo (di atas di mobile) -->
            <div class="lg:col-span-1 order-1">
                <div class="lg:sticky lg:top-8">
                    <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                            <i class="fas fa-camera text-blue-500 mr-2"></i>
                            Profile Photo
                        </h3>
                        
                        <!-- Current Photo - Responsif -->
                        <div class="flex flex-col items-center mb-4 sm:mb-6">
                            <div class="w-32 h-32 sm:w-40 sm:h-40 lg:w-48 lg:h-48 rounded-full overflow-hidden border-4 border-white shadow-lg mb-3 sm:mb-4">
                                <img src="{{ $admin->profile_photo_url }}" 
                                     alt="{{ $admin->name }}" 
                                     id="profile-photo-preview"
                                     class="w-full h-full object-cover">
                            </div>
                            <p class="text-xs sm:text-sm text-gray-500 text-center">
                                Current profile photo
                            </p>
                        </div>
                        
                        <!-- Upload Controls - Responsif -->
                        <div class="space-y-3 sm:space-y-4">
                            <div>
                                <label for="profile_photo" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">
                                    Upload New Photo
                                </label>
                                <input type="file" 
                                       id="profile_photo" 
                                       name="profile_photo" 
                                       form="profile-update-form"
                                       accept="image/*"
                                       class="block w-full text-xs sm:text-sm text-gray-500 file:mr-2 sm:file:mr-4 file:py-1 sm:file:py-2 file:px-2 sm:file:px-4 file:rounded-full file:border-0 file:text-xs sm:file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                       onchange="previewImage(event)">
                                <p class="text-xs text-gray-500 mt-1">
                                    JPG, PNG or GIF. Max 2MB.
                                </p>
                            </div>
                            
                            @if($admin->profile_photo)
                                <div class="pt-3 sm:pt-4 border-t border-gray-200">
                                    <form action="{{ route('admin.profile.delete.photo') }}" method="POST" id="delete-photo-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                onclick="confirmDeletePhoto()"
                                                class="w-full bg-red-50 hover:bg-red-100 text-red-700 px-3 sm:px-4 py-2 rounded-lg flex items-center justify-center text-sm transition duration-200">
                                            <i class="fas fa-trash-alt mr-2"></i>
                                            Remove Photo
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Form Fields (di bawah di mobile) -->
            <div class="lg:col-span-2 order-2">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-update-form">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-4 sm:space-y-6">
                        <!-- Personal Information Section -->
                        <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                                <i class="fas fa-user text-blue-500 mr-2"></i>
                                Personal Information
                            </h3>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                <div>
                                    <label for="name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $admin->name) }}"
                                           required
                                           class="w-full px-3 sm:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email', $admin->email) }}"
                                           required
                                           class="w-full px-3 sm:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Change Password Section -->
                        <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                                <i class="fas fa-lock text-green-500 mr-2"></i>
                                Change Password
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-500 mb-3 sm:mb-4">
                                Leave blank if you don't want to change your password
                            </p>
                            
                            <div class="space-y-3 sm:space-y-4">
                                <div>
                                    <label for="current_password" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">
                                        Current Password
                                    </label>
                                    <input type="password" 
                                           id="current_password" 
                                           name="current_password"
                                           class="w-full px-3 sm:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('current_password') border-red-500 @enderror">
                                    @error('current_password')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="new_password" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">
                                        New Password
                                    </label>
                                    <input type="password" 
                                           id="new_password" 
                                           name="new_password"
                                           class="w-full px-3 sm:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('new_password') border-red-500 @enderror">
                                    @error('new_password')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="new_password_confirmation" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">
                                        Confirm New Password
                                    </label>
                                    <input type="password" 
                                           id="new_password_confirmation" 
                                           name="new_password_confirmation"
                                           class="w-full px-3 sm:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                            
                            <!-- Password Requirements (hidden di mobile, bisa di-expand) -->
                            <div class="mt-3 sm:mt-4 text-xs text-gray-500">
                                <p><i class="fas fa-info-circle mr-1"></i> Password must be at least 8 characters</p>
                            </div>
                        </div>
                        
                        <!-- Form Actions - Responsif -->
                        <div class="flex flex-col-reverse sm:flex-row justify-between gap-3 pt-4 sm:pt-6">
                            <a href="{{ route('admin.profile.show') }}" 
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-medium flex items-center justify-center text-sm transition duration-200">
                                <i class="fas fa-times mr-2"></i>
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-medium flex items-center justify-center text-sm transition duration-200">
                                <i class="fas fa-save mr-2"></i>
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
        
        if (event.target.files && event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
    
    // Confirm delete photo
    function confirmDeletePhoto() {
        if (confirm('Are you sure you want to remove your profile photo?')) {
            document.getElementById('delete-photo-form').submit();
        }
    }
    
    // Confirm password change - Improved for mobile
    document.getElementById('profile-update-form').addEventListener('submit', function(e) {
        const currentPassword = document.getElementById('current_password').value;
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('new_password_confirmation').value;
        
        // Only validate if any password field is filled
        if (newPassword || confirmPassword || currentPassword) {
            if (!currentPassword) {
                e.preventDefault();
                alert('Please enter your current password to change it.');
                return false;
            }
            
            if (newPassword !== confirmPassword) {
                e.preventDefault();
                alert('New password and confirmation do not match.');
                return false;
            }
            
            if (newPassword.length > 0 && newPassword.length < 8) {
                e.preventDefault();
                alert('New password must be at least 8 characters long.');
                return false;
            }
        }
    });
    
    // Touch-friendly improvements
    document.addEventListener('touchstart', function() {
        // Add touch-friendly styles if needed
    }, {passive: true});
</script>

<style>
    /* Mobile-friendly touch targets */
    @media (max-width: 640px) {
        button, 
        a,
        input[type="file"]::file-selector-button {
            min-height: 44px; /* Apple's recommended minimum touch target size */
        }
        
        input, select, textarea {
            font-size: 16px !important; /* Prevent zoom on focus in iOS */
        }
    }
</style>
@endsection