@extends('lecturer.layouts.app')

@section('title', 'Lecturer Profile')
@section('page-title', 'My Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Profile Header - Responsif -->
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-32 sm:h-40 md:h-48 relative">
            <div class="absolute -bottom-12 sm:-bottom-16 left-4 sm:left-8">
                <div class="w-20 h-20 sm:w-24 sm:h-24 md:w-32 md:h-32 rounded-full border-4 border-white overflow-hidden bg-white shadow-lg">
                    <img src="{{ $lecturer->profile_photo_url }}"
                         alt="{{ $lecturer->name }}"
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Profile Content - Responsif -->
        <div class="pt-16 sm:pt-20 px-4 sm:px-6 md:px-8 pb-4 sm:pb-6 md:pb-8">
            <!-- Header dengan action buttons yang responsif -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div class="w-full sm:w-auto">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 break-words">Dr. {{ $lecturer->name }}</h1>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">Lecturer</p>
                    <div class="flex items-center mt-2 text-gray-500 text-sm sm:text-base">
                        <i class="fas fa-envelope mr-2"></i>
                        <span class="break-all">{{ $lecturer->email }}</span>
                    </div>
                </div>

                <!-- Action buttons - Stack di mobile, horizontal di desktop -->
                <div class="flex flex-col sm:flex-row w-full sm:w-auto gap-2 sm:gap-3">
                    <a href="{{ route('lecturer.profile.edit') }}"
                       class="bg-purple-500 hover:bg-purple-600 text-white px-3 sm:px-4 py-2 rounded-lg flex items-center justify-center text-sm sm:text-base transition duration-150 ease-in-out">
                        <i class="fas fa-edit mr-2"></i>
                        <span class="whitespace-nowrap">Edit Profile</span>
                    </a>
                    <a href="{{ route('lecturer.dashboard') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 sm:px-4 py-2 rounded-lg flex items-center justify-center text-sm sm:text-base transition duration-150 ease-in-out">
                        <i class="fas fa-arrow-left mr-2"></i>
                        <span class="whitespace-nowrap">Back</span>
                    </a>
                </div>
            </div>

            <!-- Profile Details Grid - Responsif -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mt-6 sm:mt-8">
                <!-- Lecturer Information Card -->
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                        <i class="fas fa-chalkboard-teacher text-purple-500 mr-2 text-sm sm:text-base"></i>
                        Lecturer Information
                    </h3>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">NIP:</span>
                            <span class="font-medium text-sm sm:text-base">{{ $lecturer->nip }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Department:</span>
                            <span class="font-medium text-sm sm:text-base">{{ $lecturer->department }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Member Since:</span>
                            <span class="font-medium text-sm sm:text-base">{{ $lecturer->created_at->format('F d, Y') }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Last Updated:</span>
                            <span class="font-medium text-sm sm:text-base">{{ $lecturer->updated_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Teaching Information Card -->
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                        <i class="fas fa-book-open text-blue-500 mr-2 text-sm sm:text-base"></i>
                        Teaching Information
                    </h3>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                            <span class="text-gray-600 text-sm sm:text-base">Active Courses:</span>
                            <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800 w-fit mt-1 sm:mt-0">
                                4 Courses
                            </span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Total Students:</span>
                            <span class="font-medium text-sm sm:text-base">120</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-gray-600 text-sm sm:text-base">Years of Service:</span>
                            <span class="font-medium text-sm sm:text-base">8 Years</span>
                        </div>
                        <div class="pt-2 sm:pt-3">
                            <a href="#"
                               class="text-purple-500 hover:text-purple-700 text-xs sm:text-sm font-medium inline-flex items-center">
                                <i class="fas fa-calendar-alt mr-1"></i> View Teaching Schedule
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teaching Schedule - Responsif dengan overflow scroll -->
            <div class="mt-6 sm:mt-8">
                <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4 flex items-center">
                    <i class="fas fa-calendar-day text-green-500 mr-2 text-sm sm:text-base"></i>
                    Teaching Schedule
                </h3>
                <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                    <div class="overflow-x-auto -mx-4 sm:mx-0">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden border border-gray-200 rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col" class="px-3 sm:px-4 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Course
                                            </th>
                                            <th scope="col" class="px-3 sm:px-4 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Day & Time
                                            </th>
                                            <th scope="col" class="px-3 sm:px-4 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Room
                                            </th>
                                            <th scope="col" class="px-3 sm:px-4 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Students
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap">
                                                <div class="text-xs sm:text-sm font-medium text-gray-900">Web Development</div>
                                                <div class="text-xs text-gray-500">CS301</div>
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                Monday, 09:00 - 11:00
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                Room 301
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                35
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap">
                                                <div class="text-xs sm:text-sm font-medium text-gray-900">Database Systems</div>
                                                <div class="text-xs text-gray-500">CS302</div>
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                Tuesday, 13:00 - 15:00
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                Lab 205
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                28
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap">
                                                <div class="text-xs sm:text-sm font-medium text-gray-900">Mobile App Dev</div>
                                                <div class="text-xs text-gray-500">CS303</div>
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                Wednesday, 10:00 - 12:00
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                Room 402
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                42
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap">
                                                <div class="text-xs sm:text-sm font-medium text-gray-900">Software Engineering</div>
                                                <div class="text-xs text-gray-500">CS304</div>
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                Thursday, 14:00 - 16:00
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                Room 310
                                            </td>
                                            <td class="px-3 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                30
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Mobile-friendly touch targets */
    @media (max-width: 640px) {
        button,
        a {
            min-height: 44px;
        }

        /* Improve table readability on mobile */
        table {
            font-size: 14px;
        }

        td, th {
            padding: 0.75rem 0.5rem;
        }
    }
</style>
@endsection