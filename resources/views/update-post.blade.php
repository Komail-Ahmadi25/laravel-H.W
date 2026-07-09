<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css');
</head>

<body>
    <div class="w-full min-h-screen flex justify-center items-center">
        <div class="w-1/2 border rounded-lg shadow-sm p-5">
            <h1 class="text-center text-4xl font-semibold">Update Post</h1>
            <form action="" method="post" class="w-full flex flex-col gap-4">
                <input class="w-full border py-2 focus:outline-none" type="text" value="{{$post->title}}">
                <textarea class="w-full h-32 border focus:outline-none" name="" id="">{{$post->body}}</textarea>
                <button class="uppercase py-2 px-5 w-full bg-blue-600 text-white">Save</button>
            </form>
        </div>
    </div>
</body>

</html>