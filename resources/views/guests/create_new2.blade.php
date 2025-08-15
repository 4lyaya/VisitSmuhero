<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Muhammadiyah 6 Rogojampi - Visitor System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/webcam.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        .bg-primary {
            background-color: #1e40af;
        }

        .text-primary {
            color: #1e40af;
        }

        .border-primary {
            border-color: #1e40af;
        }

        .hover\:bg-primary-dark:hover {
            background-color: #1e3a8a;
        }

        .section-divider {
            height: 100px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M1200 120L0 16.48 0 0 1200 0 1200 120z' fill='%23f9fafb'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .animate-delay-100 {
            animation-delay: 100ms;
        }

        .animate-delay-200 {
            animation-delay: 200ms;
        }

        .animate-delay-300 {
            animation-delay: 300ms;
        }

        .form-section {
            background: linear-gradient(135deg, #f0f4ff 0%, #ffffff 100%);
        }

        .photo-container {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center">
                    <a href="{{ route('login') }}" class="flex items-center space-x-3 group">
                        <img class="h-12 w-auto" src="{{ asset('images/school-logo.png') }}" alt="School Logo">
                        <div>
                            <span
                                class="block text-xl font-extrabold bg-gradient-to-r from-blue-600 to-indigo-500 bg-clip-text text-transparent tracking-wide group-hover:from-indigo-500 group-hover:to-blue-600 transition-all duration-500">
                                SMK Muhammadiyah 6
                            </span>
                            <span
                                class="block text-sm text-gray-500 group-hover:text-gray-700 tracking-wider transition-all duration-300">
                                Rogojampi
                            </span>
                        </div>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-primary font-medium">Beranda</a>
                    <a href="#about" class="text-gray-700 hover:text-primary font-medium">Tentang</a>
                    <a href="#gallery" class="text-gray-700 hover:text-primary font-medium">Galeri</a>
                    <a href="#visit"
                        class="bg-primary text-white px-5 py-2 rounded-md font-medium hover:bg-primary-dark transition">Daftar
                        Tamu</a>
                </div>
                <div class="md:hidden">
                    <button class="text-gray-700">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative overflow-hidden">
        <!-- Overlay biru transparan -->
        <div class="absolute inset-0 bg-primary opacity-40"></div>

        <!-- Gambar background -->
        <img src="{{ asset('images/school1.jpg') }}" alt="SMK Muhammadiyah 6 Rogojampi"
            class="w-full h-full object-cover absolute">

        <!-- Efek kabut putih -->
        <div class="absolute inset-0 bg-white/40 backdrop-blur-sm"></div>

        <!-- Konten -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 relative z-10 text-center">
            <h1
                class="text-4xl md:text-5xl lg:text-6xl font-bold text-blue-700 animate__animated animate__fadeInDown drop-shadow-lg">
                Selamat Datang di SMK Muhammadiyah 6 Rogojampi
            </h1>
            <p
                class="mt-6 text-xl text-blue-600 max-w-3xl mx-auto animate__animated animate__fadeIn animate__delay-1s drop-shadow-lg">
                Membentuk generasi unggul dengan pendidikan berkualitas sejak 1993
            </p>
            <div class="mt-10 animate__animated animate__fadeInUp animate__delay-1s">
                <a href="#visit"
                    class="inline-block bg-white text-primary px-8 py-3 rounded-md text-lg font-medium hover:bg-gray-100 transition shadow-lg">
                    Daftar Kunjungan
                </a>
            </div>
        </div>
        <div class="section-divider"></div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2
                    class="text-base text-primary font-semibold tracking-wide uppercase animate__animated animate__fadeIn">
                    Tentang Kami</h2>
                <p
                    class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl animate__animated animate__fadeIn">
                    Profil Sekolah
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-600 mx-auto animate__animated animate__fadeIn">
                    SMK Muhammadiyah 6 Rogojampi adalah sekolah kejuruan yang berkomitmen untuk memberikan pendidikan
                    terbaik.
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl p-6 card-hover animate__animated animate__fadeInUp animate-delay-100">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Fasilitas Modern</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Ruang kelas nyaman, laboratorium lengkap, dan workshop berstandar industri untuk mendukung
                        pembelajaran praktik.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-xl p-6 card-hover animate__animated animate__fadeInUp animate-delay-200">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Akreditasi A</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Terakreditasi A oleh Kementerian Pendidikan dengan kurikulum yang selalu diperbarui sesuai
                        kebutuhan industri.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-xl p-6 card-hover animate__animated animate__fadeInUp animate-delay-300">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">2000+ Alumni</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Lebih dari 2000 alumni tersebar di berbagai perusahaan ternama dan perguruan tinggi terkemuka.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="animate__animated animate__fadeIn">
                    <div class="text-4xl font-bold">25+</div>
                    <div class="text-lg mt-2">Program Keahlian</div>
                </div>
                <div class="animate__animated animate__fadeIn animate-delay-100">
                    <div class="text-4xl font-bold">50+</div>
                    <div class="text-lg mt-2">Tenaga Pengajar</div>
                </div>
                <div class="animate__animated animate__fadeIn animate-delay-200">
                    <div class="text-4xl font-bold">1000+</div>
                    <div class="text-lg mt-2">Siswa Aktif</div>
                </div>
                <div class="animate__animated animate__fadeIn animate-delay-300">
                    <div class="text-4xl font-bold">36</div>
                    <div class="text-lg mt-2">Tahun Berdiri</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base text-primary font-semibold tracking-wide uppercase">Galeri</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Fasilitas Sekolah
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-600 mx-auto">
                    Lihat suasana dan kegiatan di SMK Muhammadiyah 6 Rogojampi
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="rounded-lg overflow-hidden shadow-md animate__animated animate__fadeIn">
                    <img src="{{ asset('images/school1.jpg') }}" alt="Gedung Sekolah"
                        class="w-full h-64 object-cover hover:scale-105 transition duration-500">
                </div>
                <div class="rounded-lg overflow-hidden shadow-md animate__animated animate__fadeIn animate-delay-100">
                    <img src="{{ asset('images/school1.jpg') }}" alt="Ruang Kelas"
                        class="w-full h-64 object-cover hover:scale-105 transition duration-500">
                </div>
                <div class="rounded-lg overflow-hidden shadow-md animate__animated animate__fadeIn animate-delay-200">
                    <img src="{{ asset('images/school2.jpg') }}" alt="Laboratorium Komputer"
                        class="w-full h-64 object-cover hover:scale-105 transition duration-500">
                </div>
                <div class="rounded-lg overflow-hidden shadow-md animate__animated animate__fadeIn">
                    <img src="{{ asset('images/school2.jpg') }}" alt="Perpustakaan"
                        class="w-full h-64 object-cover hover:scale-105 transition duration-500">
                </div>
                <div class="rounded-lg overflow-hidden shadow-md animate__animated animate__fadeIn animate-delay-100">
                    <img src="{{ asset('images/school3.jpg') }}" alt="Workshop"
                        class="w-full h-64 object-cover hover:scale-105 transition duration-500">
                </div>
                <div class="rounded-lg overflow-hidden shadow-md animate__animated animate__fadeIn animate-delay-200">
                    <img src="{{ asset('images/school3.jpg') }}" alt="Ekstrakurikuler"
                        class="w-full h-64 object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
    </section>

    <!-- Visitor Form Section -->
    <section id="visit" class="form-section py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                <div class="lg:col-span-5">
                    <div class="animate__animated animate__fadeInLeft">
                        <h2 class="text-3xl font-extrabold text-gray-900">
                            Pendaftaran Tamu
                        </h2>
                        <p class="mt-3 text-lg text-gray-600">
                            Silakan isi formulir berikut untuk mendaftar sebagai tamu sekolah kami.
                        </p>
                        <div class="mt-8">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-primary rounded-md p-2">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900">Proses Cepat</h3>
                                    <p class="mt-1 text-gray-600">
                                        Pendaftaran hanya membutuhkan waktu 2 menit.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0 bg-primary rounded-md p-2">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900">Data Aman</h3>
                                    <p class="mt-1 text-gray-600">
                                        Informasi Anda akan kami jaga kerahasiaannya.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 lg:mt-0 lg:col-span-7 animate__animated animate__fadeInRight">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="px-6 py-5 bg-primary">
                            <h3 class="text-lg font-medium text-white">Formulir Kunjungan</h3>
                        </div>
                        <div class="p-6">
                            <form method="POST" action="{{ route('guests.store') }}" id="visitor-form"
                                class="space-y-6">
                                @csrf
                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <!-- Nama Lengkap -->
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700">
                                            Nama Lengkap <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="name" name="name" required
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                    </div>

                                    <!-- Alamat -->
                                    <div>
                                        <label for="address" class="block text-sm font-medium text-gray-700">
                                            Alamat <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="address" name="address" required
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                    </div>

                                    <!-- Instansi -->
                                    <div>
                                        <label for="institution" class="block text-sm font-medium text-gray-700">
                                            Instansi <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="institution" name="institution" required
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                    </div>

                                    <!-- Person to Meet -->
                                    <div>
                                        <label for="teacher_id" class="block text-sm font-medium text-gray-700">
                                            Guru yang Dituju <span class="text-red-500">*</span>
                                        </label>
                                        <select id="teacher_id" name="teacher_id" required
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                            <option value="">Pilih Guru</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">
                                                    {{ $teacher->name }} ({{ $teacher->subject }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Purpose -->
                                    <div>
                                        <label for="category" class="block text-sm font-medium text-gray-700">
                                            Tujuan Kunjungan <span class="text-red-500">*</span>
                                        </label>
                                        <select id="category" name="category" required
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                            <option value="">Pilih Tujuan</option>
                                            <option value="Meeting">Rapat</option>
                                            <option value="Interview">Wawancara</option>
                                            <option value="Observation">Observasi</option>
                                            <option value="Other">Lainnya</option>
                                        </select>
                                    </div>

                                    <!-- Date & Time -->
                                    <div>
                                        <label for="appointment_datetime"
                                            class="block text-sm font-medium text-gray-700">
                                            Tanggal & Waktu <span class="text-gray-500">(Opsional)</span>
                                        </label>
                                        <input type="datetime-local" id="appointment_datetime"
                                            name="appointment_datetime"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                    </div>
                                </div>

                                <!-- Additional Information -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">
                                        Informasi Tambahan <span class="text-gray-500">(Opsional)</span>
                                    </label>
                                    <textarea id="description" name="description" rows="3"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                                </div>

                                <!-- Photo Capture Section -->
                                <div class="pt-2">
                                    <h3 class="text-lg font-medium text-gray-900 mb-4">Ambil Foto</h3>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Webcam Preview & Controls -->
                                        <div>
                                            <div
                                                class="mb-4 bg-gray-100 rounded-lg overflow-hidden border border-gray-200 relative h-48 photo-container">
                                                <!-- Placeholder di atas kamera -->
                                                <div id="camera-placeholder"
                                                    class="absolute inset-0 flex items-center justify-center bg-gray-100 text-gray-400 z-10">
                                                    <p class="text-sm">Kamera belum aktif</p>
                                                </div>

                                                <!-- Canvas -->
                                                <canvas id="canvas"
                                                    class="absolute inset-0 w-full h-full hidden"></canvas>

                                                <!-- Video di belakang -->
                                                <video id="webcam"
                                                    class="absolute inset-0 w-full h-full object-cover"></video>
                                            </div>

                                            <!-- Camera Controls -->
                                            <div class="flex gap-3">
                                                <button id="activate-btn" type="button"
                                                    class="flex-1 bg-primary text-white px-4 py-2 rounded-md font-medium hover:bg-primary-dark transition">
                                                    Aktifkan Kamera
                                                </button>
                                                <button id="capture-btn" type="button"
                                                    class="flex-1 bg-emerald-600 text-white px-4 py-2 rounded-md font-medium hover:bg-emerald-700 transition hidden">
                                                    Ambil Foto
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Photo Preview -->
                                        <div>
                                            <div
                                                class="bg-gray-100 rounded-lg overflow-hidden border border-gray-200 relative h-48 photo-container">
                                                <img id="photo-preview" class="w-full h-full object-cover hidden">
                                                <div id="no-photo"
                                                    class="w-full h-full flex items-center justify-center text-gray-400">
                                                    <p class="text-sm">Belum ada foto</p>
                                                </div>
                                            </div>

                                            <!-- Tombol Foto Ulang -->
                                            <button id="retake-btn" type="button"
                                                class="mt-3 w-full bg-yellow-500 text-white px-4 py-2 rounded-md font-medium hover:bg-yellow-600 transition hidden">
                                                Foto Ulang
                                            </button>

                                            <input type="hidden" name="photo" id="photo">
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="pt-6">
                                    <button type="submit"
                                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                        Kirim Pendaftaran
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    {{-- <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base text-primary font-semibold tracking-wide uppercase">Testimoni</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Apa Kata Mereka?
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-xl shadow-md card-hover animate__animated animate__fadeIn">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('images/testi-1.jpg') }}"
                            alt="Testimonial 1">
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Budi Santoso</h3>
                            <p class="text-gray-500">Orang Tua Siswa</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600">
                        "Anak saya berkembang sangat pesat setelah bersekolah di SMK Muhammadiyah 6 Rogojampi. Fasilitas
                        dan pengajarannya sangat mendukung."
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div
                    class="bg-white p-6 rounded-xl shadow-md card-hover animate__animated animate__fadeIn animate-delay-100">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('images/testi-2.jpg') }}"
                            alt="Testimonial 2">
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Siti Aminah</h3>
                            <p class="text-gray-500">Alumni 2018</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600">
                        "Saya sangat berterima kasih pada sekolah ini yang telah membekali saya dengan keterampilan
                        praktis sehingga mudah mendapatkan pekerjaan."
                    </p>
                </div>

                <!-- Testimonial 3 -->
                <div
                    class="bg-white p-6 rounded-xl shadow-md card-hover animate__animated animate__fadeIn animate-delay-200">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('images/testi-3.jpg') }}"
                            alt="Testimonial 3">
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Dewi Lestari</h3>
                            <p class="text-gray-500">Mitra Industri</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600">
                        "Lulusan SMK Muh 6 Rogojampi memiliki kompetensi yang baik dan siap kerja. Kami selalu terbuka
                        menerima lulusan dari sekolah ini."
                    </p>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3
                        class="text-xl font-extrabold mb-3 tracking-wide bg-gradient-to-r from-blue-400 to-blue-200 bg-clip-text text-transparent">
                        SMK Muhammadiyah 6 Rogojampi
                    </h3>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        <span class="block">Jl. KH. Hasyim Asy'ari No. 38, Rogojampi</span>
                        <span class="block">Kec. Rogojampi, Kab. Banyuwangi</span>
                        <span class="block">Jawa Timur, Indonesia 68462</span>
                    </p>
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                        <a href="https://github.com/4lyaya" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            info@smkmuh6rogojampi.sch.id
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            (0333) 1234567
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            081234567890 (WhatsApp)
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Jam Operasional</h3>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li class="flex justify-between">
                            <span>Senin - Jumat</span>
                            <span>07:00 - 16:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Sabtu</span>
                            <span>08:00 - 12:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Minggu & Hari Libur</span>
                            <span>Tutup</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-700 text-center text-sm text-gray-400">
                <p>&copy; 2025 SMK Muhammadiyah 6 Rogojampi. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/webcam.js') }}"></script>
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Animation on scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.animate__animated');
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;
                if (elementPosition < screenPosition) {
                    element.classList.add(element.getAttribute('class').split(' ')[1]);
                }
            });
        }
        window.addEventListener('scroll', animateOnScroll);
        document.addEventListener('DOMContentLoaded', animateOnScroll);

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
