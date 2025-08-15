<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisitSmuhero - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/webcam.js'])
    <style>
        .blue-wave-bg {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%233b82f6' fill-opacity='0.05' d='M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: bottom;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="bg-gray-50 blue-wave-bg">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Sidebar Form (Visitor Information) -->
        <div class="lg:w-96 xl:w-2/5 bg-white shadow-xl z-10">
            <div class="p-8 h-full overflow-y-auto">
                <div class="flex items-center mb-8">
                    <div class="bg-blue-600 rounded-lg p-2 mr-3 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Visitor Registration</h2>
                </div>

                <form method="POST" action="{{ route('guests.store') }}" id="visitor-form" class="space-y-6">
                    @csrf
                    <!-- Data Tamu (1 Row) -->
                    <div class="grid grid-cols-3 gap-4">
                        <!-- Nama Lengkap -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition shadow-sm">
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                Alamat <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="address" name="address" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition shadow-sm">
                        </div>

                        <!-- Instansi -->
                        <div>
                            <label for="institution" class="block text-sm font-medium text-gray-700 mb-2">
                                Instansi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="institution" name="institution" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition shadow-sm">
                        </div>
                    </div>

                    <!-- Data Tamu (2 Row) -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Person to Meet -->
                        <div>
                            <label for="teacher_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Guru yang Dituju <span class="text-red-500">*</span>
                            </label>
                            <select id="teacher_id" name="teacher_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition shadow-sm">
                                <option value="">Pilih Guru</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }} ({{ $teacher->subject }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Purpose -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                                Tujuan Kunjungan <span class="text-red-500">*</span>
                            </label>
                            <select id="category" name="category" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition shadow-sm">
                                <option value="">Pilih Tujuan</option>
                                <option value="Meeting">Rapat</option>
                                <option value="Interview">Wawancara</option>
                                <option value="Observation">Observasi</option>
                                <option value="Other">Lainnya</option>
                            </select>
                        </div>

                        <!-- Date & Time -->
                        <div>
                            <label for="appointment_datetime" class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal & Waktu <span class="text-gray-500">(Opsional)</span>
                            </label>
                            <input type="datetime-local" id="appointment_datetime" name="appointment_datetime"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition shadow-sm">
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Informasi Tambahan <span class="text-gray-500">(Opsional)</span>
                        </label>
                        <textarea id="description" name="description" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition shadow-sm"></textarea>
                    </div>

                    <!-- Photo Capture Section -->
                    <div class="pt-2">
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Ambil Foto</h3>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Webcam Preview & Controls -->
                            <div>
                                <div
                                    class="mb-4 bg-gray-50 rounded-lg overflow-hidden border border-gray-200 relative h-48">
                                    <!-- Placeholder di atas kamera -->
                                    <div id="camera-placeholder"
                                        class="absolute inset-0 flex items-center justify-center bg-gray-50 text-gray-400 z-10">
                                        <p class="text-sm">Kamera belum aktif</p>
                                    </div>

                                    <!-- Canvas -->
                                    <canvas id="canvas" class="absolute inset-0 w-full h-full hidden"></canvas>

                                    <!-- Video di belakang -->
                                    <video id="webcam" class="absolute inset-0 w-full h-full object-cover"></video>
                                </div>

                                <!-- Camera Controls -->
                                <div class="flex gap-3">
                                    <button id="activate-btn" type="button"
                                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-lg transition shadow-md">
                                        Aktifkan Kamera
                                    </button>
                                    <button id="capture-btn" type="button"
                                        class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2.5 rounded-lg transition shadow-md hidden">
                                        Ambil Foto
                                    </button>
                                </div>
                            </div>

                            <!-- Photo Preview -->
                            <div>
                                <div class="bg-gray-50 rounded-lg overflow-hidden border border-gray-200 relative">
                                    <img id="photo-preview" class="w-full h-48 object-cover hidden">
                                    <div id="no-photo"
                                        class="w-full h-48 flex items-center justify-center text-gray-400">
                                        <p class="text-sm">Belum ada foto</p>
                                    </div>
                                </div>

                                <!-- Tombol Foto Ulang -->
                                <button id="retake-btn" type="button"
                                    class="mt-3 w-full bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2.5 rounded-lg transition shadow-md hidden">
                                    Foto Ulang
                                </button>

                                <input type="hidden" name="photo" id="photo">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit"
                            class="w-full px-6 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Kirim Pendaftaran
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

        <!-- Main Content (School Information) -->
        <div class="flex-1 overflow-y-auto">
            <div class="max-w-5xl mx-auto p-6">

                <!-- Header -->
                <div class="flex items-center mb-8 space-x-6">
                    <!-- Logo -->
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('images/school-logo.png') }}" alt="School Logo"
                            class="w-28 h-28 object-contain">
                    </a>
                    <div>
                        <h1 class="text-3xl font-semibold text-gray-800">Selamat Datang di</h1>
                        <p class="text-xl font-medium text-blue-600">SMK MUHAMMADIYAH 6 ROGOJAMPI</p>
                        <p class="text-gray-500 text-sm">Visitor Management System</p>
                    </div>
                </div>

                <!-- School Info -->
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tentang Sekolah</h2>
                    <p class="text-gray-600 leading-relaxed text-sm">
                        <span class="font-semibold text-blue-600">SMK MUHAMMADIYAH 6 ROGOJAMPI</span> adalah sekolah
                        menengah kejuruan yang mengutamakan pendidikan berkualitas, membangun karakter, dan membekali
                        siswa dengan keterampilan praktis.
                    </p>

                    <ul class="mt-4 space-y-2 text-sm text-gray-600">
                        <li>• Berdiri sejak 1985 dengan lebih dari 2.000 alumni sukses</li>
                        <li>• Terakreditasi A oleh Kementerian Pendidikan</li>
                        <li>• Fasilitas modern dengan peralatan berstandar industri</li>
                    </ul>
                </div>

                <!-- Gallery -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Galeri Sekolah</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @php
                            $gallery = [
                                ['img' => 'school1.jpg', 'title' => 'Gedung Utama'],
                                ['img' => 'school2.jpg', 'title' => 'Ruang Kelas'],
                                ['img' => 'school1.jpg', 'title' => 'Perpustakaan'],
                                ['img' => 'school2.jpg', 'title' => 'Laboratorium'],
                                ['img' => 'school1.jpg', 'title' => 'Lapangan Olahraga'],
                                ['img' => 'school2.jpg', 'title' => 'Acara Sekolah'],
                            ];
                        @endphp
                        @foreach ($gallery as $item)
                            <div class="overflow-hidden rounded-lg border border-gray-200">
                                <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['title'] }}"
                                    class="w-full h-32 object-cover">
                                <div class="p-2">
                                    <p class="text-sm font-medium text-gray-700">{{ $item['title'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/webcam.js') }}"></script>
    <script>
        document.getElementById('activate-btn').addEventListener('click', async () => {
            const video = document.getElementById('webcam');
            const placeholder = document.getElementById('camera-placeholder');
            const captureBtn = document.getElementById('capture-btn');

            try {
                // Minta izin akses kamera
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: true
                });
                video.srcObject = stream;
                video.play();

                // Sembunyikan placeholder
                placeholder.classList.add('hidden');

                // Tampilkan tombol ambil foto
                captureBtn.classList.remove('hidden');
            } catch (err) {
                console.error("Gagal mengaktifkan kamera:", err);
            }
        });
    </script>
</body>

</html>
