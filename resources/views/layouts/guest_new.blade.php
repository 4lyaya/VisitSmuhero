<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisitSmuhero - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/webcam.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">

        <main class="container mx-auto py-4 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>
</body>

</html>
