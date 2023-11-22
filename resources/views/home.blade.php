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
        <div class="bg-gray-600 flex flex-col gap-10 px-20 py-10 text-white items-center">
        @foreach ($quizz as $quizzes)
        <div class="border-4 rounded-md border-black p-6 flex flex-col justify-center items-center gap-3 max-w-2xl">
            <h1 class="text-4xl font-bold text-red-400">{{$quizzes->quizz_name}}</h1>
            <h2 class="text-green-600  text-2xl font-bold">{{$quizzes->status ? "active" : "inactive"}}</h2>
            <h2 class="self-start text-xl">{{$quizzes->lecturer}}</h2>
            <img src="{{ str_contains($quizzes->quizz_thumbnail, 'https') ? $quizzes->quizz_thumbnail : '/storage/' . $quizzes->quizz_thumbnail }}" alt="thumbnail">
            <h2 class="self-start">Quizz Description:</h2>
            <p class="text-lg">{{$quizzes->description}}</p>
            <div class="flex justify-between w-full text-xl text-green-400 items-center">
                <p>my reasult: <span class="text-green-600  text-2xl font-bold">{{$quizzes->my_reasult}}</span></p> 
                <p>max-grade: <span class="text-green-600  text-2xl font-bold">{{$quizzes->max_grade}}</span></p>
            </div>
        

        </div>          
        @endforeach
        </div>
        
    </body>
</html>
