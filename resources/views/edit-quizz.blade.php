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
    <div class=" h-full flex flex-col gap-10 px-20 py-10 text-black items-center ">
    <form action="{{ route('quizz.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST') 
                <input type="hidden" name="id" id="id" value="{{$id}}">
                <div class="flex flex-col">
                    <label for="quizz_name">quizz name</label>
                    <input class="border-2 border-black rounded-lg" type="text" name="quizz_name" id="quizz_name" value="{{$quizz->quizz_name}}">
                </div>
                <div class="flex flex-col">
                    <label for="lecturer">lecturer</label>
                    <input class="border-2 border-black rounded-lg" type="text" name="lecturer" id="lecturer" value="{{ $quizz->lecturer }}   ">
                </div>
                <div class="flex flex-col">
                    <label for="description">description</label>
                    
                    <textarea class="border-2 border-black rounded-lg" name="description" id="description" cols="20" rows="8">{{ $quizz->description }}</textarea>
                    
                </div>
                
                <div class="flex flex-col">
                    <label for="quizz_thumbnail" class="block">quizz thumbnail</label>
                    <input type="file" name="quizz_thumbnail" id="quizz_thumbnail" class="w-full border border-gray-400 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
                    <img src="{{$quizz->quizz_thumbnail}}" alt="" class="w-40 h-40">
                </div>
                <div class="flex flex-col">
                    <label for="my_reasult">My reasult</label>
                    <input class="border-2 border-black rounded-lg" type="number" name="my_reasult" id="my_reasult" value="{{ $quizz->my_reasult }}">
                </div>
                <div class="flex flex-col">
                    <label for="max_grade">Max grade</label>
                    <input class="border-2 border-black rounded-lg" type="number" name="max_grade" id="max_grade"   value="{{ $quizz->max_grade }}">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 mt-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Submit</button>
            </form>
    </div>
    </body>
</html>
