<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    @auth
        <p>Congrats you are logged in...</p>
        <form action="/logout" method="post">
            @csrf
            <button class="bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">Log Out</button>
        </form>

        <div class="border-8 border-black p-4">
            <h2>Create New Post</h2>
            <form action="/create-post" method="post">
                @csrf
                <input type="text" name="title" placeholder="Post Title">
                <textarea name="body" placeholder="Message area...."></textarea>
                <button class="bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">Save Post</button>
            </form>
        </div>

        <div class="">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
                <div class="bg-gray-200 p-4">
                    <h3 class="text-black text-2xl font-semibold">{{$post['title']}} by {{$post->user->name}}</h3>
                    <p>{{$post['body']}}</p>
                    <p class="my-2"><a class="bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg" href="/edit-post/{{$post->id}}">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="post" class="my-2">
                    @csrf
                    @method('delete')
                    <button class="bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">Delete</button>
                </form>
                </div>
            @endforeach
        </div>

    @else
        <div class="border-8 border-black p-4">
            <form action="/register" method="post">
                @csrf
                <h1 class="my-2 text-3xl font-bold">Register</h1>
                <input class="border-2 p-2 rounded-lg" name="name" type="text" placeholder="Name">
                <input class="border-2 p-2 rounded-lg" name="email" type="text" placeholder="Email">
                <input class="border-2 p-2 rounded-lg" name="password" type="password" placeholder="Password">
                <button class="bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">Register</button>
            </form>
        </div>

        <div class="border-8 border-black p-4 my-4">
            <form action="/login" method="post">
                @csrf
                <h1 class="my-2 text-3xl font-bold">Login</h1>
                <input class="border-2 p-2 rounded-lg" name="loginname" type="text" placeholder="Name">
                <input class="border-2 p-2 rounded-lg" name="loginpassword" type="password" placeholder="Password">
                <button class="bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">Login</button>
            </form>
        </div>

    @endauth

</body>

</html>
