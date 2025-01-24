<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-100 text-gray-900">

    <header class="bg-slate-700 shadow-md">
        <nav class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{route('home')}}" class="text-xl font-semibold text-white">Sample Project</a>
                <div class="flex space-x-4">
                    <a href="{{route('home')}}" class="text-white hover:text-gray-800">Home</a>
                    <a href="{{route('about')}}" class="text-white hover:text-gray-800">About</a>
                    <a href="{{route('contacts')}}" class="text-white hover:text-gray-800">Contact</a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{route('login')}}" class="text-white hover:text-gray-800">Login</a>
                    <a href="{{route('register')}}" class="text-white hover:text-gray-800">Register</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8 px-4 mx-auto max-w-7xl">
        {{-- Content goes here --}}
        {{$slot}}
    </main>

</body>
</html>
