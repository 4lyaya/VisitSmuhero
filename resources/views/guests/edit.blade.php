@extends('layouts.app')

@section('title', 'Edit Guest')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
            <!-- Header with gradient background -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-5 px-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <h1 class="text-2xl font-bold">Edit Guest Information</h1>
                        <p class="text-blue-100 mt-1">Update visitor details and appointment information</p>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-6">
                <form method="POST" action="{{ route('guests.update', $guest->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Personal Information Column -->
                        <div class="space-y-5">
                            <h3 class="text-lg font-semibold text-gray-800 pb-2 border-b border-gray-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Personal Information
                            </h3>

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name', $guest->name) }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="address" name="address"
                                    value="{{ old('address', $guest->address) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="institution"
                                    class="block text-sm font-medium text-gray-700 mb-1">Institution/School <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="institution" name="institution"
                                    value="{{ old('institution', $guest->institution) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                @error('institution')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Visit Information Column -->
                        <div class="space-y-5">
                            <h3 class="text-lg font-semibold text-gray-800 pb-2 border-b border-gray-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Visit Information
                            </h3>

                            <div>
                                <label for="teacher_id" class="block text-sm font-medium text-gray-700 mb-1">Person to Meet
                                    <span class="text-red-500">*</span></label>
                                <select id="teacher_id" name="teacher_id" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                    <option value="">-- Select Teacher --</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"
                                            {{ old('teacher_id', $guest->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->name }}
                                            @if ($teacher->subject)
                                                ({{ $teacher->subject }})
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Purpose of Visit
                                    <span class="text-red-500">*</span></label>
                                <select id="category" name="category" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                    <option value="Meeting"
                                        {{ old('category', $guest->category) == 'Meeting' ? 'selected' : '' }}>Meeting
                                    </option>
                                    <option value="Interview"
                                        {{ old('category', $guest->category) == 'Interview' ? 'selected' : '' }}>Interview
                                    </option>
                                    <option value="Observation"
                                        {{ old('category', $guest->category) == 'Observation' ? 'selected' : '' }}>
                                        Observation</option>
                                    <option value="Other"
                                        {{ old('category', $guest->category) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="appointment_datetime"
                                    class="block text-sm font-medium text-gray-700 mb-1">Appointment Date & Time</label>
                                <input type="datetime-local" id="appointment_datetime" name="appointment_datetime"
                                    value="{{ old('appointment_datetime', optional($guest->appointment_datetime)->format('Y-m-d\TH:i')) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                @error('appointment_datetime')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Additional
                                    Information</label>
                                <textarea id="description" name="description" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">{{ old('description', $guest->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Photo Section -->
                    <div class="mt-8">
                        <h3
                            class="text-lg font-semibold text-gray-800 pb-2 border-b border-gray-200 flex items-center mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                    clip-rule="evenodd" />
                            </svg>
                            Visitor Photo
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Current Photo -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Photo</label>
                                @if ($guest->photo)
                                    <img src="{{ asset('storage/' . $guest->photo) }}" alt="Current Photo"
                                        class="w-full max-w-xs border-2 border-gray-200 rounded-lg shadow-sm">
                                @else
                                    <div
                                        class="w-full max-w-xs h-48 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Photo Update Options -->
                            <div class="pt-2">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Take Photo</h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Webcam Preview & Controls -->
                                    <div>
                                        <div
                                            class="mb-4 bg-gray-100 rounded-lg overflow-hidden border border-gray-200 relative h-48 photo-container">
                                            <!-- Camera Placeholder -->
                                            <div id="camera-placeholder"
                                                class="absolute inset-0 flex flex-col items-center justify-center bg-gray-100 text-gray-400 z-10">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                </svg>
                                                <p class="text-sm text-center">Camera not activated</p>
                                            </div>

                                            <!-- Camera Error -->
                                            <div id="camera-error"
                                                class="absolute inset-0 flex flex-col items-center justify-center bg-gray-100 text-red-500 z-20 hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                                <p class="text-sm text-center px-2" id="error-message"></p>
                                            </div>

                                            <!-- Video Feed -->
                                            <video id="webcam"
                                                class="absolute inset-0 w-full h-full object-cover hidden"
                                                playsinline></video>

                                            <!-- Canvas -->
                                            <canvas id="canvas" class="absolute inset-0 w-full h-full hidden"></canvas>

                                            <!-- Loading Indicator -->
                                            <div id="camera-loading"
                                                class="absolute inset-0 flex items-center justify-center bg-gray-100 bg-opacity-75 z-30 hidden">
                                                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Camera Controls -->
                                        <div class="flex gap-3">
                                            <button id="activate-btn" type="button"
                                                class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-700 transition flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                </svg>
                                                Activate Camera
                                            </button>
                                            <button id="capture-btn" type="button"
                                                class="flex-1 bg-emerald-600 text-white px-4 py-2 rounded-md font-medium hover:bg-emerald-700 transition hidden flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                Capture
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Photo Preview -->
                                    <div>
                                        <div
                                            class="bg-gray-100 rounded-lg overflow-hidden border border-gray-200 relative h-48 photo-container">
                                            <!-- Current photo for edit form -->
                                            @if (isset($guest) && $guest->photo)
                                                <img src="{{ asset('storage/' . $guest->photo) }}"
                                                    class="w-full h-full object-cover" id="current-photo">
                                            @endif

                                            <!-- New photo preview -->
                                            <img id="photo-preview"
                                                class="absolute inset-0 w-full h-full object-cover hidden">

                                            <!-- No photo placeholder -->
                                            <div id="no-photo"
                                                class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p class="text-sm">No photo taken</p>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="mt-3 flex gap-3">
                                            <button id="retake-btn" type="button"
                                                class="flex-1 bg-yellow-500 text-white px-4 py-2 rounded-md font-medium hover:bg-yellow-600 transition hidden flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Retake
                                            </button>
                                            <button id="save-btn" type="button"
                                                class="flex-1 bg-green-600 text-white px-4 py-2 rounded-md font-medium hover:bg-green-700 transition hidden flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                                Use This Photo
                                            </button>
                                        </div>

                                        <input type="hidden" name="photo" id="photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-8 pt-5 border-t border-gray-200 flex justify-between">
                        <a href="{{ url()->previous() }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Update Guest Information
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const video = document.getElementById('webcam');
            const canvas = document.getElementById('canvas');
            const photoInput = document.getElementById('photo');
            const activateBtn = document.getElementById('activate-btn');
            const captureBtn = document.getElementById('capture-btn');
            const retakeBtn = document.getElementById('retake-btn');
            const saveBtn = document.getElementById('save-btn');
            const preview = document.getElementById('photo-preview');
            const noPhoto = document.getElementById('no-photo');
            const currentPhoto = document.getElementById('current-photo');
            const cameraPlaceholder = document.getElementById('camera-placeholder');
            const cameraError = document.getElementById('camera-error');
            const errorMessage = document.getElementById('error-message');
            const cameraLoading = document.getElementById('camera-loading');

            let stream = null;
            let photoData = null;

            // Initialize based on edit/create mode
            if (currentPhoto) {
                noPhoto.classList.add('hidden');
                photoData = currentPhoto.src;
                photoInput.value = photoData;
            }

            // Activate camera
            async function activateCamera() {
                try {
                    // Show loading
                    cameraLoading.classList.remove('hidden');
                    activateBtn.disabled = true;

                    // Hide error if shown
                    cameraError.classList.add('hidden');

                    // Get media stream
                    stream = await navigator.mediaDevices.getUserMedia({
                        video: {
                            width: {
                                ideal: 1280
                            },
                            height: {
                                ideal: 720
                            },
                            facingMode: 'user'
                        },
                        audio: false
                    });

                    video.srcObject = stream;
                    video.classList.remove('hidden');
                    cameraPlaceholder.classList.add('hidden');

                    // Change button states
                    captureBtn.classList.remove('hidden');
                    activateBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Stop Camera`;
                    activateBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                    activateBtn.classList.add('bg-red-600', 'hover:bg-red-700');
                    activateBtn.onclick = deactivateCamera;

                    // Play video
                    await video.play();

                } catch (err) {
                    console.error("Camera error:", err);
                    showCameraError(err.message || "Could not access camera");
                } finally {
                    cameraLoading.classList.add('hidden');
                    activateBtn.disabled = false;
                }
            }

            // Deactivate camera
            function deactivateCamera() {
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                    video.srcObject = null;
                    video.classList.add('hidden');
                    cameraPlaceholder.classList.remove('hidden');

                    // Reset buttons
                    captureBtn.classList.add('hidden');
                    activateBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                Activate Camera`;
                    activateBtn.classList.remove('bg-red-600', 'hover:bg-red-700');
                    activateBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
                    activateBtn.onclick = activateCamera;

                    stream = null;
                }
            }

            // Show camera error
            function showCameraError(message) {
                errorMessage.textContent = message;
                cameraError.classList.remove('hidden');
                cameraPlaceholder.classList.add('hidden');
            }

            // Capture photo
            captureBtn.addEventListener('click', function() {
                // Set canvas dimensions
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;

                // Draw video frame to canvas
                const context = canvas.getContext('2d');
                context.drawImage(video, 0, 0, canvas.width, canvas.height);

                // Get image data (JPEG with 80% quality)
                photoData = canvas.toDataURL('image/jpeg', 0.8);

                // Show preview
                preview.src = photoData;
                preview.classList.remove('hidden');
                noPhoto.classList.add('hidden');

                // Show action buttons
                retakeBtn.classList.remove('hidden');
                saveBtn.classList.remove('hidden');

                // Deactivate camera
                deactivateCamera();
            });

            // Retake photo
            retakeBtn.addEventListener('click', function() {
                // Clear preview
                preview.src = '';
                preview.classList.add('hidden');
                photoData = null;

                // Show no photo state
                noPhoto.classList.remove('hidden');

                // Hide action buttons
                retakeBtn.classList.add('hidden');
                saveBtn.classList.add('hidden');

                // If in edit mode, show original photo again
                if (currentPhoto) {
                    currentPhoto.classList.remove('hidden');
                    photoInput.value = currentPhoto.src;
                } else {
                    photoInput.value = '';
                }
            });

            // Save photo
            saveBtn.addEventListener('click', function() {
                if (photoData) {
                    photoInput.value = photoData;

                    // Show success feedback
                    saveBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Saved!`;
                    saveBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
                    saveBtn.classList.add('bg-green-500');

                    setTimeout(() => {
                        saveBtn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Use This Photo`;
                        saveBtn.classList.remove('bg-green-500');
                        saveBtn.classList.add('bg-green-600', 'hover:bg-green-700');
                    }, 2000);

                    // Hide current photo in edit mode
                    if (currentPhoto) {
                        currentPhoto.classList.add('hidden');
                    }
                }
            });

            // Clean up when leaving page
            window.addEventListener('beforeunload', function() {
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                }
            });

            // Initialize activate button
            activateBtn.onclick = activateCamera;
        });
    </script>
@endsection
