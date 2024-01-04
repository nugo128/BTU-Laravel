<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        
        @vite('resources/css/app.css')    
    </head>
    <body class="antialiased">
        <div class="bg-gray-600 flex flex-col gap-10 px-20 py-10 text-white items-center">
        <div id="main" class="border-4 rounded-md border-black p-6 flex flex-col justify-center items-center gap-3 max-w-2xl">
            <h1 class="text-4xl font-bold text-red-400">{{$quizz->quizz_name}}</h1>
            <h2 class="text-green-600  text-2xl font-bold">{{$quizz->status ? "active" : "inactive"}}</h2>
            <h2 class="self-start text-xl">{{$quizz->lecturer}}</h2>
            <img src="{{ str_contains($quizz->quizz_thumbnail, 'https') ? $quizz->quizz_thumbnail : '/storage/' . $quizz->quizz_thumbnail }}" alt="thumbnail">
            <h2 class="self-start">Quizz Description:</h2>
            <p class="text-lg">{{$quizz->description}}</p>
            <div class="flex justify-between w-full text-xl text-green-400 items-center">
                <p>my reasult: <span class="text-green-600  text-2xl font-bold">{{$quizz->my_reasult}}</span></p> 
                <p>max-grade: <span class="text-green-600  text-2xl font-bold">{{$quizz->max_grade}}</span></p>
            </div>
            <h2 class="self-start text-4xl text-white flex items-center gap-4 mt-8 mb-2">Comments <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-10 h-10">
  <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
</svg>
</h2>
<form id="commentForm" class="flex flex-col gap-4 w-full text-black">
    <input type="text" name="comment_author" placeholder="Your Name">
    <input type="hidden" name="quizz_id" value="{{$quizz->id}}">
    <textarea name="comment" placeholder="Your Comment"></textarea>
    <button type="submit" class="bg-green-500 w-1/3 self-center py-2 rounded-2xl">Add Comment</button>
</form>
            @foreach ($quizz->comments as $comment )
                <div class="mb-8">
                <h2 class="self-start text-2xl font-bold ml-2">{{$comment->comment_author}}</h2>
                <p class="bg-slate-300 text-black p-4 rounded-2xl">{{$comment->comment}}</p>
                </div>
            @endforeach
        

        </div>          
        </div>
        
    </body>
    <script>
    document.getElementById('commentForm').addEventListener('submit', function (e) {
        e.preventDefault()
        const formData = new FormData(this);
        axios.post('{{ route("comments.add") }}', formData)
            .then(response => {
                console.log(response.data);
                const commentsContainer = document.getElementById('main');
                const newComment = response.data.comment;
                const commentElement = document.createElement('div');
                commentElement.innerHTML = `
                    <h2 class="self-start text-2xl font-bold ml-2">${newComment.comment_author}</h2>
                    <p class="bg-slate-300 text-black p-4 rounded-2xl">${newComment.comment}</p>
                `;

                commentsContainer.appendChild(commentElement);
                document.getElementById('commentForm').reset();
            })
            .catch(error => {
                console.error(error.response.data);
            });
    });
</script>
</html>