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
            <h1 class="text-center text-4xl font-semibold mb-4">Create Post</h1>
            <form enctype="multipart/form-data" action="{{ URL('/store-post') }}" method="post" class="flex flex-col gap-2 items-center">
                @csrf
                <div class="w-full flex flex-col gap-1">
                    <input type="text" value="{{old('title')}}" name="title" placeholder="Write the post title" class="w-full rounded-md py-2 border focus:outline-none px-3">
                    @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-1">
                    <textarea name="body" class="w-full rounded-md h-72 border focus:outline-0 p-3" placeholder="Write the post description">{{ old('body') }}</textarea>
                    <input type="file" accept="image/*" name="image1" class="w-full border py-2">
                    <input type="file" accept="image/*" name="image2" class="w-full border py-2">
                    @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full py-2.5 rounded-md px-8 bg-blue-500 text-white font-medium hover:bg-blue-600 transition">Save</button>
            </form>
        </div>
    </div>
</body>

</html>