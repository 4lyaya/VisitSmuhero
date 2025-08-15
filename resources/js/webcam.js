document.addEventListener('DOMContentLoaded', function () {
    const video = document.getElementById('webcam');
    const canvas = document.getElementById('canvas');
    const photoInput = document.getElementById('photo');
    const activateCamBtn = document.getElementById('activate-cam-btn');
    const captureBtn = document.getElementById('capture-btn');
    const photoPreview = document.getElementById('photo-preview');
    const noPhoto = document.getElementById('no-photo');
    const webcamPlaceholder = document.getElementById('webcam-placeholder');

    let stream = null;

    // Activate Camera Button
    activateCamBtn.addEventListener('click', async function () {
        try {
            // Check if webcam is already active
            if (stream) {
                disableCamera();
                return;
            }

            // Request camera access
            stream = await navigator.mediaDevices.getUserMedia({
                video: {
                    width: { ideal: 1280 },
                    height: { ideal: 720 },
                    facingMode: 'user'
                },
                audio: false
            });

            // Show video stream
            video.srcObject = stream;
            video.classList.remove('hidden');
            webcamPlaceholder.classList.add('hidden');

            // Enable capture button
            captureBtn.disabled = false;
            captureBtn.classList.remove('bg-gray-200', 'text-gray-500', 'cursor-not-allowed');
            captureBtn.classList.add('bg-blue-600', 'hover:bg-blue-700', 'text-white', 'cursor-pointer');

            // Change activate button to "Turn Off"
            activateCamBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
                </svg>
                Turn Off Camera
            `;

        } catch (error) {
            console.error("Error accessing webcam:", error);
            alert("Could not access the webcam. Please make sure you have granted permission.");
        }
    });

    // Capture Button
    captureBtn.addEventListener('click', function () {
        const context = canvas.getContext('2d');

        // Set canvas dimensions to match video
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        // Draw video frame to canvas
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Convert canvas to data URL (base64)
        const imageData = canvas.toDataURL('image/jpeg', 0.8); // 80% quality

        // Set the hidden input value
        photoInput.value = imageData;

        // Show preview and hide placeholder
        photoPreview.src = imageData;
        photoPreview.classList.remove('hidden');
        noPhoto.classList.add('hidden');

        // Tampilkan tombol retake
        retakeBtn.classList.remove('hidden');

        // Disable camera after capture
        disableCamera();
    });

    // Function to disable camera
    function disableCamera() {
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
            stream = null;
        }

        // Hide video and show placeholder
        video.srcObject = null;
        video.classList.add('hidden');
        webcamPlaceholder.classList.remove('hidden');

        // Disable capture button
        captureBtn.disabled = true;
        captureBtn.classList.add('bg-gray-200', 'text-gray-500', 'cursor-not-allowed');
        captureBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700', 'text-white', 'cursor-pointer');

        // Reset activate button
        activateCamBtn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            Activate Camera
        `;
    }

    // Clean up when leaving the page
    window.addEventListener('beforeunload', function () {
        if (stream) {
            disableCamera();
        }
    });

    // Retake Button
    retakeBtn.addEventListener('click', async function () {
        try {
            stream = await navigator.mediaDevices.getUserMedia({
                video: { width: { ideal: 1280 }, height: { ideal: 720 }, facingMode: 'user' },
                audio: false
            });

            video.srcObject = stream;
            video.classList.remove('hidden');
            webcamPlaceholder.classList.add('hidden');

            // Sembunyikan preview & tombol retake
            photoPreview.classList.add('hidden');
            retakeBtn.classList.add('hidden');

            // Aktifkan capture lagi
            captureBtn.disabled = false;
            captureBtn.classList.remove('bg-gray-200', 'text-gray-500', 'cursor-not-allowed');
            captureBtn.classList.add('bg-blue-600', 'hover:bg-blue-700', 'text-white', 'cursor-pointer');
        } catch (error) {
            console.error("Error accessing webcam:", error);
        }
    });
});