<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Multi-Role System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">
                        <i class="fas fa-graduation-cap mr-2"></i>Laravel Multi-Role
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    {{-- @auth('admin')
                        <span class="text-gray-700">Admin: {{ auth()->guard('admin')->user()->name }}</span>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">
                                Logout
                            </button>
                        </form>
                    @endauth
                    
                    @auth('student')
                        <span class="text-gray-700">Student: {{ auth()->guard('student')->user()->name }}</span>
                        <form method="POST" action="{{ route('student.logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">
                                Logout
                            </button>
                        </form>
                    @endauth
                    
                    @auth('lecturer')
                        <span class="text-gray-700">Lecturer: {{ auth()->guard('lecturer')->user()->name }}</span>
                        <form method="POST" action="{{ route('lecturer.logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">
                                Logout
                            </button>
                        </form>
                    @endauth --}}
                </div>
            </div>
        </div>
    </nav>

    <main class="py-6">
        @yield('content')
    </main>

    <footer class="bg-white shadow-lg mt-8">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center text-gray-600">
            &copy; {{ date('Y') }} Laravel Multi-Role System. All rights reserved.
        </div>
    </footer>
</body>
</html>