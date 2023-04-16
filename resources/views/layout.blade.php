<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @vite('resources/css/app.css')

    <title>@yield('title')</title>
    @livewireStyles()
</head>

<body class="bg-gray-100">
    <div class="grid grid-cols-10">
        <div class=" p-4 bg-gray-900 col-span-2">
            <h1 class="text-2xl text-white">Food Nutrients</h1>
            <nav class="mt-6">
                <ul>
                    <a href="/foods/add">
                        <li class="text-white">Home</li>
                    </a>
                    <a href="/foods/add">
                        <li class="text-white">Add Food</li>
                    </a>
                    <a href="/foods/add">
                        <li class="text-white">Exit</li>
                    </a>
                </ul>
            </nav>
        </div>
        <div class=" bg-red-700 col-span-8">
            <header class="bg-gray-700 flex justify-start">
                <h1 class=" p-6 text-white text-xl">@yield('header-heading')</h1>
            </header>
            @yield('main')
        </div>


    </div>
    @livewireScripts
</body>

</html>
