@extends('layouts.guest')

@section('title', 'Guest Registration')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-primary">Visitor Registration</h1>
                <p class="mt-2 text-lg text-gray-600">Welcome to SMU Hero School</p>
            </div>

            <!-- Dual Form Layout -->
            <div class="grid grid-cols- lg:grid-cols-2 gap-6">
                <!-- Form 1: School Information (Left) -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-fit">
                    <div class="p-8 bg-gradient-to-b from-blue-50 to-white">
                        <div class="flex items-center mb-6">
                            <div class="bg-primary rounded-lg p-2 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">About Our School</h2>
                        </div>

                        <div class="space-y-6">
                            <p class="text-gray-700">
                                SMU Hero School is a leading educational institution committed to excellence in academics
                                and character building.
                                <span class="block mt-2 font-semibold text-primary">"Knowledge, Integrity, Service"</span>
                            </p>

                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <svg class="flex-shrink-0 h-5 w-5 text-primary mt-0.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">Established 1985 with 2000+ alumni</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="flex-shrink-0 h-5 w-5 text-primary mt-0.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">Accredited by Ministry of Education</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3 mt-6">
                                <img src="{{ asset('images/school1.jpg') }}" alt="School Building"
                                    class="rounded-lg w-full h-40 object-cover shadow">
                                <img src="{{ asset('images/school2.jpg') }}" alt="Classroom"
                                    class="rounded-lg w-full h-40 object-cover shadow">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form 2: Visitor Information (Right) -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <div class="bg-primary rounded-lg p-2 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">Your Information</h2>
                        </div>

                        <form method="POST" action="{{ route('guests.store') }}" id="visitor-form">
                            @csrf

                            <div class="space-y-5">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name
                                        *</label>
                                    <input type="text" id="name" name="name" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                </div>

                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address
                                        *</label>
                                    <input type="text" id="address" name="address" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                </div>

                                <div>
                                    <label for="institution"
                                        class="block text-sm font-medium text-gray-700 mb-1">Institution/School *</label>
                                    <input type="text" id="institution" name="institution" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                </div>

                                <div>
                                    <label for="teacher_id" class="block text-sm font-medium text-gray-700 mb-1">Person to
                                        Meet *</label>
                                    <select id="teacher_id" name="teacher_id" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                        <option value="">Select Teacher</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                                {{ $teacher->name }} ({{ $teacher->subject }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Purpose
                                            *</label>
                                        <select id="category" name="category" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                            <option value="">Select Purpose</option>
                                            <option value="Meeting">Meeting</option>
                                            <option value="Interview">Interview</option>
                                            <option value="Observation">Observation</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="appointment_datetime"
                                            class="block text-sm font-medium text-gray-700 mb-1">Date & Time *</label>
                                        <input type="datetime-local" id="appointment_datetime"
                                            name="appointment_datetime"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                    </div>
                                </div>

                                <div>
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700 mb-1">Additional Information</label>
                                    <textarea id="description" name="description" rows="1"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"></textarea>
                                </div>

                                <!-- Photo Capture Section -->
                                <div class="mb-8">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Photo Capture</h3>

                                    <div class="md:flex md:space-x-6">
                                        <!-- Webcam Column -->
                                        <div class="mb-4 md:w-1/2">
                                            <div
                                                class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                                                <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                                                    <h4 class="font-medium text-gray-700">Webcam</h4>
                                                </div>
                                                <div class="p-4">
                                                    <div class="relative bg-black rounded-md overflow-hidden">
                                                        <video id="webcam"
                                                            class="w-full h-64 object-cover hidden"></video>
                                                        {{-- <div id="camera-placeholder"
                                                            class="w-full h-64 flex items-center justify-center bg-gray-100">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-12 w-12 text-gray-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1.5"
                                                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1.5"
                                                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            </svg>
                                                        </div> --}}
                                                        <canvas id="canvas" class="hidden"></canvas>
                                                    </div>

                                                    <div id="camera-controls" class="mt-4 space-y-2">
                                                        <button id="activate-btn" type="button"
                                                            class="w-full flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-md transition-colors duration-200">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                            </svg>
                                                            Activate Camera
                                                        </button>
                                                        <button id="capture-btn" type="button"
                                                            class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2.5 rounded-md transition-colors duration-200 hidden">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            </svg>
                                                            Capture Photo
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Preview Column -->
                                        <div class="mb-4 md:w-1/2">
                                            <div
                                                class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                                                <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                                                    <h4 class="font-medium text-gray-700">Photo Preview</h4>
                                                </div>
                                                <div class="p-4">
                                                    <div
                                                        class="relative bg-gray-100 rounded-md overflow-hidden h-64 flex items-center justify-center">
                                                        <img id="photo-preview" class="w-full h-full object-cover hidden">
                                                        <div id="no-photo" class="text-center p-4">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-12 w-12 mx-auto text-gray-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1.5"
                                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                            <p class="mt-2 text-gray-500">No photo captured</p>
                                                            <p class="text-sm text-gray-400">Your captured image will
                                                                appear here</p>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="photo" id="photo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Submission -->
                            <div class="mt-8">
                                <button type="submit"
                                    class="w-full px-6 py-3 bg-primary hover:bg-primary-dark text-white font-medium rounded-lg shadow-sm transition flex items-center justify-center">
                                    Submit Registration
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/webcam.js') }}"></script>
@endsection
