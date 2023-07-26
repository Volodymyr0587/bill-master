<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill master</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<x-body>
    <!-- Menu Navigation Bar -->
    <x-navbar />

    <x-header />

    <!-- Main section -->
    <main class="mt-10">

        @yield('content')

    </main>

    <!-- Footer Section -->
    <x-footer />
</x-body>
</html>
