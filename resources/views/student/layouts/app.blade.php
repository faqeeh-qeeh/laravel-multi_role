<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Student Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and Brand -->
                <div class="flex items-center">
                    <a href="{{ route('student.dashboard') }}" class="flex items-center">
                        <div class="bg-green-600 p-2 rounded-lg mr-3">
                            <i class="fas fa-user-graduate text-white text-xl"></i>
                        </div>
                        <span class="text-xl font-bold text-green-600 hidden md:block">
                            Student Portal
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('student.dashboard') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('student.dashboard') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                        <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
                    </a>
                    
                    <a href="#" 
                       class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-green-50 hover:text-green-600">
                        <i class="fas fa-book mr-1"></i> Courses
                    </a>
                    
                    <a href="#" 
                       class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-green-50 hover:text-green-600">
                        <i class="fas fa-tasks mr-1"></i> Assignments
                    </a>
                    
                    <a href="#" 
                       class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-green-50 hover:text-green-600">
                        <i class="fas fa-chart-line mr-1"></i> Grades
                    </a>
                    
                    <!-- Student Profile Dropdown -->
                    <div class="relative">
                        <button type="button" class="flex items-center space-x-2 focus:outline-none" id="student-menu-button">
                            <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-green-500">
                                <img src="{{ auth()->guard('student')->user()->profile_photo_url }}" 
                                     alt="Profile Photo" 
                                     class="w-full h-full object-cover">
                            </div>
                            <span class="text-gray-700">{{ auth()->guard('student')->user()->name }}</span>
                            <i class="fas fa-chevron-down text-gray-500"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 hidden"
                             id="student-dropdown-menu">
                            <div class="px-4 py-2 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-800">{{ auth()->guard('student')->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->guard('student')->user()->email }}</p>
                                <p class="text-xs text-gray-500">ID: {{ auth()->guard('student')->user()->student_id }}</p>
                            </div>
                            <a href="{{ route('student.profile.show') }}" 
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i> My Profile
                            </a>
                            <a href="{{ route('student.profile.edit') }}" 
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-edit mr-2"></i> Edit Profile
                            </a>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('student.logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" 
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500"
                            id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('student.dashboard') }}" 
                   class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('student.dashboard') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                
                <a href="#" 
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-green-50 hover:text-green-600">
                    <i class="fas fa-book mr-2"></i> Courses
                </a>
                
                <a href="#" 
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-green-50 hover:text-green-600">
                    <i class="fas fa-tasks mr-2"></i> Assignments
                </a>
                
                <a href="#" 
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-green-50 hover:text-green-600">
                    <i class="fas fa-chart-line mr-2"></i> Grades
                </a>
                
                <div class="border-t border-gray-200 pt-4">
                    <div class="flex items-center px-3 py-2">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-green-500 mr-3">
                            <img src="{{ auth()->guard('student')->user()->profile_photo_url }}" 
                                 alt="Profile Photo" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ auth()->guard('student')->user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->guard('student')->user()->email }}</p>
                            <p class="text-xs text-gray-500">ID: {{ auth()->guard('student')->user()->student_id }}</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('student.profile.show') }}" 
                       class="block px-3 py-2 text-base text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-user mr-2"></i> My Profile
                    </a>
                    <a href="{{ route('student.profile.edit') }}" 
                       class="block px-3 py-2 text-base text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-edit mr-2"></i> Edit Profile
                    </a>
                    
                    <div class="border-t border-gray-200 mt-2 pt-2">
                        <form method="POST" action="{{ route('student.logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="block w-full text-left px-3 py-2 text-base text-red-600 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg shadow-lg p-6 mb-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold">Welcome back, {{ auth()->guard('student')->user()->name }}!</h1>
                        <p class="text-green-100 mt-1">
                            <i class="fas fa-graduation-cap mr-1"></i>
                            {{ auth()->guard('student')->user()->faculty }} • Student ID: {{ auth()->guard('student')->user()->student_id }}
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div class="text-right">
                            <p class="text-sm opacity-90">Current Semester</p>
                            <p class="text-2xl font-bold">6</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Breadcrumb -->
            @hasSection('breadcrumb')
                <div class="mb-6">
                    @yield('breadcrumb')
                </div>
            @endif

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Content -->
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-lg mt-8 border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left mb-4 md:mb-0">
                    <p class="text-gray-600">
                        <i class="fas fa-user-graduate text-green-500 mr-1"></i>
                        Student Portal &copy; {{ date('Y') }}. All rights reserved.
                    </p>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-500">
                        <i class="fas fa-user mr-1"></i>
                        {{ auth()->guard('student')->user()->name }}
                    </span>
                    <span class="text-sm text-gray-500">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        Semester 6 • {{ now()->format('d M Y') }}
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Student dropdown menu
        const studentMenuButton = document.getElementById('student-menu-button');
        const studentDropdownMenu = document.getElementById('student-dropdown-menu');
        
        if (studentMenuButton && studentDropdownMenu) {
            studentMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                studentDropdownMenu.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!studentMenuButton.contains(e.target) && !studentDropdownMenu.contains(e.target)) {
                    studentDropdownMenu.classList.add('hidden');
                }
            });
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            
            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>