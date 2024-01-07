<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')    
    </head>
    <body class="antialiased bg-gray-600">
    <div class="bg-gray-600 flex justify-end pr-20 pt-6 gap-4 font-bold text-2xl text-white">
            <a href="/" class="border-2 border-green-500 rounded-2xl p-2">home</a>
            <a href="/registration" class="border-2 border-green-500 rounded-2xl p-2">Register</a>
        </div>
    <div class=" h-full flex flex-col gap-10 px-20 py-10 text-black items-center ">
    <form action="{{route('login')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST') 
                <h1 class="text-white text-5xl py-2 pb-10">Login
                </h1>
                <div class="flex flex-col">
                    <label for="email" class="text-white">email</label>
                    <input  class="border-2 border-black rounded-lg" type="email" name="email" id="email">
                </div>
                <div class="flex flex-col">
                    <label for="password" class="text-white">password</label>
                    <input class="border-2 border-black rounded-lg" type="password" name="password" id="password" >
                </div> 
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 mt-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
            </form>
    </div>
    </body>
</html>
