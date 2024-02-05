<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Meta description -->
    <meta name="description" content="A simple todo demo">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

        <div class="container mx-auto p-4 grid grid-cols-1 md:grid-cols-3 gap-4">

            <!-- To Do tasks Column -->
            <div class="bg-white shadow rounded p-4 text-center">
                @livewire('index-tasks')
            </div>

            <!-- Create/Edit new tasks Column -->
            <div class="bg-white shadow rounded p-4 text-center">
                {{ $slot }}
                @livewire('edit-task')
            </div>

            <!-- Completed tasks Column -->
            <div class="bg-white shadow rounded p-4 text-center">
                @livewire('completed-tasks')
            </div>

        </div>

</body>

</html>
