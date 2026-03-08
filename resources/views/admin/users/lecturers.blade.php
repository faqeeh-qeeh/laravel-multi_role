@extends('admin.layouts.app')

@section('title', 'Manage Lecturers')
@section('page-title', 'Lecturer Management')

@section('breadcrumb')
<div class="flex items-center space-x-3 text-sm text-gray-600">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">
        <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
    </a>
    <i class="fas fa-chevron-right text-xs text-gray-400"></i>
    <span class="text-gray-800 font-medium">Lecturers</span>
</div>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="p-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-chalkboard-teacher text-purple-600 mr-3"></i>
                Lecturers List
            </h2>
            <p class="text-gray-600 mt-1">Manage and view all registered lecturers</p>
        </div>
        
        <!-- Search and Filter -->
        <div class="mb-8 flex flex-col sm:flex-row gap-4">
            <form method="GET" class="flex flex-col sm:flex-row gap-4 w-full">
                <div class="relative flex-1">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Search by name, email, or NIP..." 
                           class="pl-10 pr-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                    <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                </div>
                
                <select name="department" 
                        class="px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 min-w-[180px]">
                    <option value="">All Departments</option>
                    @foreach($departments as $department)
                        <option value="{{ $department }}" {{ request('department') == $department ? 'selected' : '' }}>
                            {{ $department }}
                        </option>
                    @endforeach
                </select>
                
                <button type="submit" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                    <i class="fas fa-filter mr-2"></i>
                    Filter
                </button>
                
                @if(request('search') || request('department'))
                    <a href="{{ route('admin.users.lecturers') }}" 
                       class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors text-center flex items-center justify-center">
                        <i class="fas fa-times mr-2"></i>
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <!-- Lecturers Table -->
        <div class="overflow-x-auto border rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profile</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIP</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($lecturers as $lecturer)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-purple-500">
                                    <img src="{{ $lecturer->profile_photo_url }}" 
                                         alt="{{ $lecturer->name }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">{{ $lecturer->nip }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">{{ $lecturer->name }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-600">{{ $lecturer->email }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                                    {{ $lecturer->department ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('admin.users.lecturer.show', $lecturer->id) }}" 
                                       class="text-purple-600 hover:text-purple-900 transition-colors p-2 hover:bg-purple-50 rounded-lg"
                                       title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.users.lecturer.delete', $lecturer->id) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this lecturer?');">
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
                                <i class="fas fa-chalkboard-teacher text-4xl text-gray-300 mb-3"></i>
                                <p class="text-lg">No lecturers found</p>
                                <p class="text-sm">Try adjusting your search or filter criteria</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $lecturers->links() }}
        </div>
    </div>
</div>
@endsection