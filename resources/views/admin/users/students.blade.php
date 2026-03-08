@extends('admin.layouts.app')

@section('title', 'Manage Students')
@section('page-title', 'Student Management')

@section('breadcrumb')
<div class="flex items-center space-x-3 text-sm text-gray-600">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">
        <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
    </a>
    <i class="fas fa-chevron-right text-xs text-gray-400"></i>
    <span class="text-gray-800 font-medium">Students</span>
</div>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-lg overflow-hidden"> <!-- rounded-xl untuk sudut lebih halus -->
    <div class="p-8"> <!-- Padding diperbesar jadi p-8 -->
        <!-- Header dengan judul yang lebih jelas -->
        <div class="mb-8"> <!-- Margin bottom diperbesar -->
            <h2 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-user-graduate text-blue-600 mr-3"></i>
                Students List
            </h2>
            <p class="text-gray-600 mt-1">Manage and view all registered students</p>
        </div>
        
        <!-- Search and Filter - Diberi jarak lebih -->
        <div class="mb-8 flex flex-col sm:flex-row gap-4">
            <form method="GET" class="flex flex-col sm:flex-row gap-4 w-full">
                <div class="relative flex-1">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Search by name, email, or student ID..." 
                           class="pl-10 pr-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                    <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                </div>
                
                <select name="faculty" 
                        class="px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-[180px]">
                    <option value="">All Faculties</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty }}" {{ request('faculty') == $faculty ? 'selected' : '' }}>
                            {{ $faculty }}
                        </option>
                    @endforeach
                </select>
                
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                    <i class="fas fa-filter mr-2"></i>
                    Filter
                </button>
                
                @if(request('search') || request('faculty'))
                    <a href="{{ route('admin.users.students') }}" 
                       class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors text-center flex items-center justify-center">
                        <i class="fas fa-times mr-2"></i>
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <!-- Students Table dengan spacing lebih baik -->
        <div class="overflow-x-auto border rounded-lg"> <!-- Tambah border -->
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profile</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student ID</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Faculty</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($students as $student)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-blue-500">
                                    <img src="{{ $student->profile_photo_url }}" 
                                         alt="{{ $student->name }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">{{ $student->student_id }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">{{ $student->name }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-600">{{ $student->email }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $student->faculty ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('admin.users.student.show', $student->id) }}" 
                                       class="text-blue-600 hover:text-blue-900 transition-colors p-2 hover:bg-blue-50 rounded-lg"
                                       title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.users.student.delete', $student->id) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 transition-colors p-2 hover:bg-red-50 rounded-lg"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-users text-4xl text-gray-300 mb-3"></i>
                                <p class="text-lg">No students found</p>
                                <p class="text-sm">Try adjusting your search or filter criteria</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination dengan margin top lebih besar -->
        <div class="mt-8">
            {{ $students->links() }}
        </div>
    </div>
</div>
@endsection