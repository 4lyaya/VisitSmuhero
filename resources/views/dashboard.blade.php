@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Welcome Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl font-bold text-gray-900">Welcome, {{ auth()->user()->name }}!</h1>
                <p class="text-gray-600 mt-2">Here's what's happening today</p>
            </div>
            <div class="bg-white p-3 rounded-lg shadow-sm">
                <p class="text-sm font-medium text-gray-700">
                    <span class="text-gray-500">Last updated:</span>
                    {{ now()->format('M j, Y \a\t g:i A') }}
                </p>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            <!-- Total Guests -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm border border-blue-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-blue-600">Total Guests</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $totalGuests }}</h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded-full">+{{ round(($totalGuests / 100) * 5) }}%</span>
                    <span class="text-xs text-gray-500 ml-2">vs last month</span>
                </div>
            </div>

            <!-- Total Teachers -->
            <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl p-6 shadow-sm border border-indigo-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-indigo-600">Total Teachers</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $totalTeachers }}</h3>
                    </div>
                    <div class="bg-indigo-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center">
                    <span
                        class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2 py-0.5 rounded-full">+{{ round(($totalTeachers / 100) * 2) }}%</span>
                    <span class="text-xs text-gray-500 ml-2">vs last month</span>
                </div>
            </div>

            <!-- System Users -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 shadow-sm border border-purple-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-purple-600">System Users</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $totalUsers }}</h3>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-xs text-gray-500">Admin access only</span>
                </div>
            </div>

            <!-- Most Requested Teacher -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 shadow-sm border border-green-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-green-600">Most Wanted Teacher</p>
                        <h3 class="text-xl font-bold text-gray-800 mt-1 truncate">{{ $mostRequestedTeacher['name'] }}</h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-xs text-gray-500">Requested by
                        <strong>{{ $mostRequestedTeacher['total_requests'] }}</strong> guests</span>
                </div>
            </div>
        </div>

        <!-- Recent Guests Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-xl font-bold text-gray-800">Recent Guest Visits</h2>
                <a href="{{ route('guests.index') }}"
                    class="text-sm font-medium text-blue-600 hover:text-blue-800 transition">View All</a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Visitor</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Institution</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Person to Meet</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Purpose</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time
                                Created</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($recentGuests as $guest)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ asset('storage/' . $guest->photo) }}" alt="{{ $guest->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $guest->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $guest->category }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $guest->institution }}</div>
                                    <div class="text-xs text-gray-500">{{ $guest->address }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $guest->teacher->name ?? 'N/A' }}
                                        @isset($guest->teacher->subject)
                                            <span class="text-xs text-gray-500">({{ $guest->teacher->subject }})</span>
                                        @endisset
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $guest->category === 'Meeting'
                                            ? 'bg-blue-100 text-blue-800'
                                            : ($guest->category === 'Interview'
                                                ? 'bg-green-100 text-green-800'
                                                : ($guest->category === 'Observation'
                                                    ? 'bg-purple-100 text-purple-800'
                                                    : 'bg-gray-100 text-gray-800')) }}">
                                        {{ $guest->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        @if ($guest->created_at)
                                            {{ $guest->created_at->format('M j, Y') }}
                                        @else
                                            None
                                        @endif
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        @if ($guest->created_at)
                                            {{ $guest->created_at->format('H:i') }}
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('guests.show', $guest->id) }}"
                                            class="text-blue-600 hover:text-blue-900">View</a>
                                        @can('update', $guest)
                                            <a href="{{ route('guests.edit', $guest->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">No recent guest visits
                                    found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-500">
                        Showing <span class="font-medium">1</span> to <span
                            class="font-medium">{{ min(5, count($recentGuests)) }}</span> of <span
                            class="font-medium">{{ $totalGuests }}</span> guests
                    </div>
                    <a href="{{ route('guests.index') }}"
                        class="text-sm font-medium text-blue-600 hover:text-blue-800 transition">
                        View all guests →
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <!-- Register New Guest -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Register New Guest</h3>
                </div>
                <p class="text-gray-600 text-sm mb-5">Quickly register a visitor who arrives without an appointment.</p>
                <a href="{{ route('guest.create') }}"
                    class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Add Guest
                </a>
            </div>

            <!-- Manage Teachers -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-indigo-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Manage Teachers</h3>
                </div>
                <p class="text-gray-600 text-sm mb-5">View, add, or edit teacher information in the system.</p>
                <a href="{{ route('teachers.index') }}"
                    class="w-full inline-flex justify-center items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Teacher List
                </a>
            </div>

            <!-- Export Data -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Export Data</h3>
                </div>
                <p class="text-gray-600 text-sm mb-5">Export guest or teacher data to PDF for reporting purposes.</p>
                <div class="grid grid-cols-2 gap-3">
                    {{-- <a href="{{ route('export.pdf') }}"
                        class="inline-flex justify-center items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 text-sm">
                        Export Guests
                    </a> --}}
                    {{-- <a href="{{ route('export.index') }}"
                        class="w-full inline-flex justify-center items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 text-sm">
                        Export Data
                    </a> --}}
                </div>
                <a href="{{ route('export.index') }}"
                    class="w-full inline-flex justify-center items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 text-sm">
                    Export Data
                </a>
            </div>
        </div>
    </div>
@endsection
