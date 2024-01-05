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
        <div class=" flex flex-col gap-10 px-20 py-10 text-black items-center bg-gray-600">

        
        
    <form action="{{ route('quizz.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST') 
                <input type="hidden" name="id" id="id">
                <div class="flex flex-col">
                    <label for="quizz_name">quizz name</label>
                    <input class="border-2 border-black rounded-lg" type="text" name="quizz_name" id="quizz_name">
                </div>
                <div class="flex flex-col">
                    <label for="lecturer">lecturer</label>
                    <input class="border-2 border-black rounded-lg" type="text" name="lecturer" id="lecturer">
                </div>
                <div class="flex flex-col">
                    <label for="description">description</label>
                    
                    <textarea class="border-2 border-black rounded-lg" name="description" id="description" cols="20" rows="8"></textarea>
                    
                </div>
                
                <div class="flex flex-col">
                    <label for="quizz_thumbnail" class="block">quizz thumbnail</label>
                    <input type="file" name="quizz_thumbnail" id="quizz_thumbnail" class="w-full border border-gray-400 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="my_reasult">My reasult</label>
                    <input class="border-2 border-black rounded-lg" type="number" name="my_reasult" id="my_reasult">
                </div>
                <div class="flex flex-col">
                    <label for="max_grade">Max grade</label>
                    <input class="border-2 border-black rounded-lg" type="number" name="max_grade" id="max_grade">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 mt-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Submit</button>
            </form>
            </div>
        <div class="bg-gray-600 flex flex-col gap-10 px-20 py-10 text-white items-center">
        @foreach ($quizz as $quizzes)
        <div  class="border-4 rounded-md border-black p-6 flex flex-col justify-center items-center gap-3 max-w-2xl">
            <h1 class="text-4xl font-bold text-red-400">{{$quizzes->quizz_name}}</h1>
            <h2 class="text-green-600  text-2xl font-bold">{{$quizzes->status ? "active" : "inactive"}}</h2>
            <h2 class="self-start text-xl">{{$quizzes->lecturer}}</h2>
            <img src="{{ str_contains($quizzes->quizz_thumbnail, 'https') ? $quizzes->quizz_thumbnail : '/storage/' . $quizzes->quizz_thumbnail }}" alt="thumbnail">
            <h2 class="self-start">Quizz Description:</h2>
            <p class="text-lg">{{$quizzes->description}}</p>
            <h2 class="self-start text-4xl text-white flex items-center gap-4 mt-8 mb-2">Comments <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
            </svg>
        </h2>
        @foreach ($quizzes->comments as $comment )
        <div class="mb-8">
            <h2 class="self-start text-2xl font-bold ml-2">{{$comment->comment_author}}</h2>
            <p class="bg-slate-300 text-black p-4 rounded-2xl mb-4">{{$comment->comment}}</p>
            <a href="/admin/comment/{{$comment->id}}" class="text-white bg-green-500 p-2 rounded-2xl">delete comment</a>
        </div>
        @endforeach
        
        
        <a href="/admin/quizz/{{$quizzes->id}}" class="text-3xl bg-red-500 p-3 rounded-3xl">DELETE QUIZZ</a>
    </div>          
    @endforeach
</div>
        
    </body>
</html>
