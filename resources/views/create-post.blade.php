<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="w-full bg-stone-200 h-screen flex justify-center items-center">
        <div class="w-1/2 bg-white/80 backdrop-blur-md rounded-md p-4 border">
            <h1 class="text-center text-4xl font-semibold">Create Post</h1>
            @if ($errors->any()>0)
            <div class="w-full flex flex-col gap-1">
                @foreach ($errors->all() as $error)
                <p class="text-red-500 text-sm">{{ $error }}</p>
                @endforeach
            </div>
            @endif
            <form action="{{URL('store-post')}}" method="post" class="flex flex-col gap-1 items-center">
                @csrf
                <input type="text" name="title" placeholder="Write the post title" class="w-full rounded-md py-2 border focus:outline-none">
                <textarea name="body" class="w-full rounded-md h-72 border focus:outline-0" id="" placeholder="Write the post description"></textarea>
                <button type="submit" class="w-full py-2.5 rounded-md px-8 bg-blue-500 text-white ">Save</button>
            </form>
        </div>
    </div>
</body>

</html>