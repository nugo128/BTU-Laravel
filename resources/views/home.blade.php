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
        <div class="bg-gray-600 flex justify-end pr-20 pt-6 gap-4 font-bold text-2xl text-white">
            @auth
                <h2 class="mt-3 mr-2">Welcome, {{ucwords(auth()->user()->name)}}</h2>
                @if (auth()->id() === 1)
                    <a href="/admin" class="border-2 border-green-500 rounded-2xl p-2">Admin Pannel</a>
                @endif
                <a href="/logout" class="border-2 border-green-500 rounded-2xl p-2"">Logout</a>
            @endauth
            @if (!auth()->user())
            <a href="/registration" class="border-2 border-green-500 rounded-2xl p-2">register</a>
            <a href="/login" class="border-2 border-green-500 rounded-2xl p-2">login</a>
            @endif
        </div>
        <div class="bg-gray-600 flex flex-col gap-10 px-20 py-10 text-white items-center">
        @foreach ($quizz as $quizzes)
        <div class="border-4 rounded-md border-black p-6 flex flex-col justify-center items-center gap-3 max-w-2xl">

        <a  href="/viewQuizz/{{$quizzes->id}}" class=" flex flex-col justify-center items-center gap-3 max-w-2xl">

            <h1 class="text-4xl font-bold text-red-400">{{$quizzes->quizz_name}}</h1>
            <h2 class="text-2xl">Number of questions: {{count($quizzes->questions)}}</h2>
            <h2 class="text-green-600  text-2xl font-bold">{{$quizzes->status ? "active" : "inactive"}}</h2>
            <h2 class="self-start text-xl">{{$quizzes->lecturer}}</h2>
            <img src="{{ str_contains($quizzes->quizz_thumbnail, 'https') ? $quizzes->quizz_thumbnail : '/storage/' . $quizzes->quizz_thumbnail }}" alt="thumbnail">
            <h2 class="self-start">Quizz Description:</h2>
            <p class="text-lg">{{$quizzes->description}}</p>
            
            
        </a>   
        <div>
        @auth
                
                @if (auth()->id() === $quizzes->user_id)
                    <a href="/quizz/{{$quizzes->id}}" class="text-white text-xl px-14 py-3 bg-green-500 p-2 rounded-3xl">EDIT</a>
                    <a href="/admin/quizz/{{$quizzes->id}}" class="text-xl bg-red-500 p-3 rounded-3xl">DELETE QUIZZ</a>
                @endif
            @endauth
        </div>
        </div>       
        @endforeach
        </div>
        
    </body>
</html>
