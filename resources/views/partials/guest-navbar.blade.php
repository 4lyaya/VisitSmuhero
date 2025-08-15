<nav class="bg-primary text-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-4">
                <a href="/" class="text-xl font-bold">VisitSmuhero</a>
            </div>

            @if (Route::has('login'))
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}"
                        class="bg-white text-primary px-3 py-1 rounded hover:bg-gray-100 transition">
                        Admin Login
                    </a>
                </div>
            @endif
        </div>
    </div>
</nav>
