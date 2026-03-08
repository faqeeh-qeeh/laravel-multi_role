<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
    <style>
        /* Custom styles for responsive layout */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        @media (min-width: 768px) {
            .main-content {
                margin-left: 16rem;
                margin-top: 4rem;
            }
        }
        @media (max-width: 767px) {
            .main-content {
                margin-top: 4rem;
            }
            .sidebar-open {
                transform: translateX(0);
            }
            .sidebar-closed {
                transform: translateX(-100%);
            }
        }
        /* Toast animation */
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        [id$="-toast"] {
            animation: slideIn 0.3s ease-out;
        }
        
        [id$="-toast"] + [id$="-toast"] {
            margin-top: 1rem;
        }
        
        @media (max-width: 640px) {
            [id$="-toast"] {
                top: 1rem;
                right: 1rem;
                left: 1rem;
                width: auto;
                max-width: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Overlay for mobile sidebar -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden md:hidden"></div>

    <!-- Sidebar (Mobile & Tablet) -->
    <aside id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-white shadow-lg z-30 sidebar-transition sidebar-closed md:translate-x-0 md:shadow-xl">
        <div class="flex flex-col h-full">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between p-4 border-b">
                <div class="flex items-center">
                    <div class="bg-green-600 p-2 rounded-lg mr-3">
                        <i class="fas fa-user-graduate text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-green-600">Student Portal</span>
                </div>
                <button id="close-sidebar" class="md:hidden text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="flex-1 overflow-y-auto py-4">
                <!-- Profile Info -->
                <div class="px-4 mb-6">
                    <div class="flex items-center space-x-3 p-3 bg-green-50 rounded-lg">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-green-500">
                            <img src="{{ auth()->guard('student')->user()->profile_photo_url }}"
                                 alt="Profile Photo"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ auth()->guard('student')->user()->name }}
                            </p>
                            <p class="text-xs text-gray-500 truncate">
                                {{ auth()->guard('student')->user()->student_id }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="px-4 space-y-1">
                    <a href="{{ route('student.dashboard') }}"
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('student.dashboard') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                        <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                        Dashboard
                    </a>

                    <!-- Courses Dropdown -->
                    <div x-data="{ open: {{ request()->routeIs('student.courses.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open"
                                class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('student.courses.*') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                            <div class="flex items-center">
                                <i class="fas fa-book w-5 mr-3"></i>
                                <span>My Courses</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs transition-transform" :class="{ 'transform rotate-180': open }"></i>
                        </button>
                        
                        <div x-show="open" class="mt-1 ml-8 space-y-1">
                            <a href="#"
                               class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('student.courses.active*') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                                <i class="fas fa-play-circle w-4 mr-3"></i>
                                Active Courses
                            </a>
                            <a href="#"
                               class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('student.courses.completed*') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                                <i class="fas fa-check-circle w-4 mr-3"></i>
                                Completed
                            </a>
                        </div>
                    </div>

                    <a href="#"
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('student.assignments*') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                        <i class="fas fa-tasks w-5 mr-3"></i>
                        Assignments
                    </a>

                    <a href="#"
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('student.grades*') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                        <i class="fas fa-chart-line w-5 mr-3"></i>
                        Grades
                    </a>

                    <a href="#"
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('student.schedule*') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                        <i class="fas fa-calendar-alt w-5 mr-3"></i>
                        Schedule
                    </a>
                </div>
            </nav>

            <!-- Sidebar Footer (empty) -->
            <div class="p-4 border-t">
                <!-- No menu items in footer -->
            </div>
        </div>
    </aside>

    <!-- Desktop Navbar (visible only on desktop) -->
    <nav class="bg-white shadow-lg hidden md:block fixed top-0 left-0 right-0 z-10" style="margin-left: 16rem;">
        <div class="px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-lg font-semibold text-gray-800">
                        @yield('page-title', 'Dashboard')
                    </span>
                </div>

                <!-- Desktop Profile Dropdown -->
                <div class="flex items-center">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" type="button" class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-green-500">
                                <img src="{{ auth()->guard('student')->user()->profile_photo_url }}"
                                     alt="Profile Photo"
                                     class="w-full h-full object-cover">
                            </div>
                            <span class="text-gray-700">{{ auth()->guard('student')->user()->name }}</span>
                            <i class="fas fa-chevron-down text-gray-500"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
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
            </div>
        </div>
    </nav>

    <!-- Mobile Top Bar (visible only on mobile/tablet) -->
    <div class="md:hidden bg-white shadow-lg fixed top-0 left-0 right-0 z-10">
        <div class="px-4 h-16 flex items-center justify-between">
            <button id="open-sidebar" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-bars text-xl"></i>
            </button>
            
            <div class="flex items-center">
                <span class="text-xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</span>
            </div>
            
            <!-- Profile Photo with Dropdown untuk Mobile -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="focus:outline-none">
                    <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-green-500">
                        <img src="{{ auth()->guard('student')->user()->profile_photo_url }}"
                             alt="Profile Photo"
                             class="w-full h-full object-cover">
                    </div>
                </button>

                <!-- Dropdown Menu untuk Mobile -->
                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
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
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="p-6 sm:p-8 lg:p-10">
            <!-- Welcome Banner (now inside main content) -->
            {{-- <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg shadow-lg p-6 mb-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold">Welcome back, {{ auth()->guard('student')->user()->name }}!</h1>
                        <p class="text-green-100 mt-1">
                            <i class="fas fa-graduation-cap mr-1"></i>
                            {{ auth()->guard('student')->user()->faculty ?? 'Faculty' }} • Student ID: {{ auth()->guard('student')->user()->student_id }}
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div class="text-right">
                            <p class="text-sm opacity-90">Current Semester</p>
                            <p class="text-2xl font-bold">6</p>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Breadcrumb -->
            @hasSection('breadcrumb')
                <div class="mb-8">
                    @yield('breadcrumb')
                </div>
            @endif

            <!-- Page Header -->
            @hasSection('header')
                <div class="mb-8">
                    @yield('header')
                </div>
            @endif

            <!-- Toast Notifications (sama dengan admin) -->
            @if(session('success'))
                <div id="success-toast" 
                    class="fixed top-4 right-4 z-50 flex items-center w-full max-w-sm bg-white border-l-4 border-green-500 shadow-lg rounded-lg overflow-hidden transform transition-all duration-500 translate-x-0 opacity-100"
                    role="alert">
                    <div class="flex items-center justify-between w-full p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                    <i class="fas fa-check-circle text-green-500"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-semibold text-gray-800">Success!</p>
                                <p class="text-sm text-gray-600">{{ session('success') }}</p>
                            </div>
                        </div>
                        <button onclick="closeToast('success-toast')" class="ml-4 text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-0 left-0 h-1 bg-green-500 progress-bar" style="width: 100%;"></div>
                </div>
            @endif

            @if(session('error'))
                <div id="error-toast" 
                    class="fixed top-4 right-4 z-50 flex items-center w-full max-w-sm bg-white border-l-4 border-red-500 shadow-lg rounded-lg overflow-hidden transform transition-all duration-500 translate-x-0 opacity-100"
                    role="alert">
                    <div class="flex items-center justify-between w-full p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                                    <i class="fas fa-exclamation-circle text-red-500"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-semibold text-gray-800">Error!</p>
                                <p class="text-sm text-gray-600">{{ session('error') }}</p>
                            </div>
                        </div>
                        <button onclick="closeToast('error-toast')" class="ml-4 text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-0 left-0 h-1 bg-red-500 progress-bar" style="width: 100%;"></div>
                </div>
            @endif

            @if(session('warning'))
                <div id="warning-toast" 
                    class="fixed top-4 right-4 z-50 flex items-center w-full max-w-sm bg-white border-l-4 border-yellow-500 shadow-lg rounded-lg overflow-hidden transform transition-all duration-500 translate-x-0 opacity-100"
                    role="alert">
                    <div class="flex items-center justify-between w-full p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-yellow-500"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-semibold text-gray-800">Warning!</p>
                                <p class="text-sm text-gray-600">{{ session('warning') }}</p>
                            </div>
                        </div>
                        <button onclick="closeToast('warning-toast')" class="ml-4 text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-0 left-0 h-1 bg-yellow-500 progress-bar" style="width: 100%;"></div>
                </div>
            @endif

            @if(session('info'))
                <div id="info-toast" 
                    class="fixed top-4 right-4 z-50 flex items-center w-full max-w-sm bg-white border-l-4 border-blue-500 shadow-lg rounded-lg overflow-hidden transform transition-all duration-500 translate-x-0 opacity-100"
                    role="alert">
                    <div class="flex items-center justify-between w-full p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-info-circle text-blue-500"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-semibold text-gray-800">Information</p>
                                <p class="text-sm text-gray-600">{{ session('info') }}</p>
                            </div>
                        </div>
                        <button onclick="closeToast('info-toast')" class="ml-4 text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-0 left-0 h-1 bg-blue-500 progress-bar" style="width: 100%;"></div>
                </div>
            @endif

            <!-- Content -->
            @yield('content')
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        // Sidebar functionality for mobile/tablet
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const openBtn = document.getElementById('open-sidebar');
        const closeBtn = document.getElementById('close-sidebar');

        if (openBtn) {
            openBtn.addEventListener('click', () => {
                sidebar.classList.remove('sidebar-closed');
                sidebar.classList.add('sidebar-open');
                overlay.classList.remove('hidden');
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', closeSidebar);
        }

        if (overlay) {
            overlay.addEventListener('click', closeSidebar);
        }

        function closeSidebar() {
            sidebar.classList.remove('sidebar-open');
            sidebar.classList.add('sidebar-closed');
            overlay.classList.add('hidden');
        }

        // Close sidebar on window resize if > md breakpoint
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('sidebar-closed', 'sidebar-open');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.add('sidebar-closed');
            }
        });

        // Initialize based on screen size
        if (window.innerWidth < 768) {
            sidebar.classList.add('sidebar-closed');
        }
    </script>
    
    <script>
        // Auto close toast after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const toasts = document.querySelectorAll('[id$="-toast"]');
            
            toasts.forEach(toast => {
                // Set timeout to close toast
                setTimeout(() => {
                    closeToast(toast.id);
                }, 5000); // 5 seconds
                
                // Animate progress bar
                const progressBar = toast.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.transition = 'width 5s linear';
                    setTimeout(() => {
                        progressBar.style.width = '0%';
                    }, 100);
                }
            });
        });
        
        // Close toast function
        function closeToast(toastId) {
            const toast = document.getElementById(toastId);
            if (toast) {
                toast.style.transform = 'translateX(100%)';
                toast.style.opacity = '0';
                
                // Remove from DOM after animation
                setTimeout(() => {
                    if (toast.parentNode) {
                        toast.remove();
                    }
                }, 500);
            }
        }
        
        // Close toast with escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const toasts = document.querySelectorAll('[id$="-toast"]');
                toasts.forEach(toast => closeToast(toast.id));
            }
        });
    </script>
    @stack('scripts')
</body>
</html>