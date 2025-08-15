document.addEventListener('DOMContentLoaded', function () {
    const video = document.getElementById('webcam');
    const canvas = document.getElementById('canvas');
    const photoInput = document.getElementById('photo');
    const activateBtn = document.getElementById('activate-btn');
    const captureBtn = document.getElementById('capture-btn');
    const preview = document.getElementById('photo-preview');
    const noPhoto = document.getElementById('no-photo');
    let stream = null;

    // Activate camera
    activateBtn.addEventListener('click', async function () {
        try {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: {
                        width: { ideal: 640 },
                        height: { ideal: 480 }
                    },
                    audio: false
                });

                video.srcObject = stream;
                video.classList.remove('hidden');
                video.play();

                // Show capture button and change activate button
                captureBtn.classList.remove('hidden');
                activateBtn.textContent = 'Deactivate Camera';
                activateBtn.classList.remove('bg-blue-500');
                activateBtn.classList.add('bg-red-500', 'hover:bg-red-600');

                // Change click handler to deactivate
                activateBtn.onclick = deactivateCamera;
            }
        } catch (error) {
            console.error("Error accessing webcam:", error);
            alert("Could not access the camera. Please check permissions.");
        }
    });

    // Capture photo
    captureBtn.addEventListener('click', function () {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        const imageData = canvas.toDataURL('image/jpeg', 0.8); // Use JPEG for smaller size
        photoInput.value = imageData;

        // Show preview
        preview.src = imageData;
        preview.classList.remove('hidden');
        noPhoto.classList.add('hidden');

        // Optional: Show success message
        alert('Photo captured successfully!');
    });

    // Deactivate camera function
    function deactivateCamera() {
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
            video.srcObject = null;
            video.classList.add('hidden');

            // Reset buttons
            captureBtn.classList.add('hidden');
            activateBtn.textContent = 'Activate Camera';
            activateBtn.classList.remove('bg-red-500', 'hover:bg-red-600');
            activateBtn.classList.add('bg-blue-500', 'hover:bg-blue-600');

            // Reset click handler
            activateBtn.onclick = function () {
                activateBtn.click();
            };
        }
    }

    // Clean up when leaving page
    window.addEventListener('beforeunload', function () {
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }
    });
});