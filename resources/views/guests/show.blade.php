@extends('layouts.app')

@section('title', 'Guest Details')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
            <!-- Header with gradient background -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-5 px-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <h1 class="text-2xl font-bold">Guest Details</h1>
                        <p class="text-blue-100 mt-1">Visitor information and appointment details</p>
                    </div>
                    <div class="mt-3 md:mt-0 flex space-x-2">
                        <a href="{{ url()->previous() }}"
                            class="flex items-center gap-2 bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Back
                        </a>
                        @can('update', $guest)
                            <a href="{{ route('guests.edit', $guest->id) }}"
                                class="flex items-center gap-2 bg-white text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-lg transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Edit
                            </a>
                        @endcan
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column - Personal Info -->
                    <div class="lg:col-span-1">
                        <div class="bg-gray-50 rounded-lg p-5">
                            <h2
                                class="text-lg font-semibold text-gray-800 mb-5 pb-2 border-b border-gray-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Personal Information
                            </h2>

                            <div class="space-y-5">
                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Full Name</p>
                                    <p class="text-gray-800 font-medium">{{ $guest->name }}</p>
                                </div>

                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Address</p>
                                    <p class="text-gray-800">{{ $guest->address }}</p>
                                </div>

                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">
                                        Institution/School</p>
                                    <p class="text-gray-800">{{ $guest->institution }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Column - Visit Info -->
                    <div class="lg:col-span-1">
                        <div class="bg-gray-50 rounded-lg p-5">
                            <h2
                                class="text-lg font-semibold text-gray-800 mb-5 pb-2 border-b border-gray-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Visit Information
                            </h2>

                            <div class="space-y-5">
                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Person to
                                        Meet</p>
                                    <p class="text-gray-800">
                                        {{ $guest->teacher->name ?? 'Not specified' }}
                                        @isset($guest->teacher->subject)
                                            <span class="text-gray-600">({{ $guest->teacher->subject }})</span>
                                        @endisset
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Purpose of
                                        Visit</p>
                                    <p class="text-gray-800">{{ $guest->category }}</p>
                                </div>

                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Appointment
                                        Date & Time</p>
                                    <p class="text-gray-800">
                                        @if ($guest->appointment_datetime)
                                            <span
                                                class="font-medium">{{ $guest->appointment_datetime->format('M d, Y') }}</span>
                                            <span
                                                class="text-gray-600">{{ $guest->appointment_datetime->format('H:i') }}</span>
                                        @else
                                            None provided
                                        @endif
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Additional
                                        Information</p>
                                    <p class="text-gray-800">{{ $guest->description ?? 'None provided' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Photo and Meta -->
                    <div class="lg:col-span-1">
                        <div class="bg-gray-50 rounded-lg p-5">
                            <h2
                                class="text-lg font-semibold text-gray-800 mb-5 pb-2 border-b border-gray-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Visitor Photo
                            </h2>

                            <div class="flex flex-col items-center">
                                @if ($guest->photo)
                                    @if (Str::startsWith($guest->photo, 'data:image'))
                                        <img src="{{ $guest->photo }}" alt="Visitor Photo"
                                            class="w-48 h-48 border-2 border-white shadow-md rounded-lg object-cover mb-4">
                                    @elseif (Storage::disk('public')->exists($guest->photo))
                                        <img src="{{ asset('storage/' . $guest->photo) }}" alt="Visitor Photo"
                                            class="w-48 h-48 border-2 border-white shadow-md rounded-lg object-cover mb-4">
                                    @else
                                        <img src="{{ $guest->photo }}" alt="Visitor Photo"
                                            class="w-48 h-48 border-2 border-white shadow-md rounded-lg object-cover mb-4">
                                    @endif
                                @else
                                    <div
                                        class="w-48 h-48 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center bg-gray-100 mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                <div class="w-full">
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Record
                                        Created</p>
                                    <p class="text-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1 text-gray-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $guest->created_at ? $guest->created_at->format('M d, Y H:i') : 'Not available' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
