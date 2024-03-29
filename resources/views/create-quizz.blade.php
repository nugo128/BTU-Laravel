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
    <body class="antialiased">
    <div class=" h-screen flex flex-col gap-10 px-20 py-10 text-black items-center bg-gray-500">
    <a href="/" class="border-2 border-green-500 rounded-2xl p-2 self-start text-white">HomePage</a>
    <form action="{{ route('quizz.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST') 
                <h1 class="text-white text-3xl text-center">Create new Quizz
            
                </h1>
                <div class="flex flex-col">
                    <label for="quizz_name" class="text-white">quizz name</label>
                    <input class="border-2 border-black rounded-lg" type="text" name="quizz_name" id="quizz_name">
                </div>
                <div class="flex flex-col">
                    <label for="lecturer" class="text-white">lecturer</label>
                    <input class="border-2 border-black rounded-lg" type="text" name="lecturer" id="lecturer" >
                </div>
                <div class="flex flex-col">
                    <label for="description" class="text-white">description</label>
                    
                    <textarea class="border-2 border-black rounded-lg" name="description" id="description" cols="20" rows="8"></textarea>
                    
                </div>
                
                <div class="flex flex-col">
                    <label for="quizz_thumbnail" class="block text-white">quizz thumbnail</label>
                    <input type="file" name="quizz_thumbnail" id="quizz_thumbnail" class="w-full border border-gray-400 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 mt-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Submit</button>
            </form>
    </div>
    </body>
</html>
