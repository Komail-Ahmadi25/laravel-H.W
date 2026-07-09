<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css');
</head>

<body>
    <div class="w-full min-h-screen bg-stone-100">
        <div class="w-full max-w-7xl mx-auto p-4">
            <div>
                <form action="{{ route('posts.index') }}" class="w-full" method="get">
                    <input type="text" placeholder="Search the posts..." value="{{ request('search') }}" name="search" class="w-full py-2">
                    <!-- <button type="submit" class="py-2 px-5 bg-blue-700 text-white">Search</button> -->
                </form>
            </div>
            @if (count($posts)>0)
            <table class="w-full border border-collapse">
                <tr>
                    <th class="border py-2 text-center">ID</th>
                    <th class="border py-2 text-center">Post title</th>
                    <th class="border py-2 text-center">Post descriptions</th>
                </tr>
                @foreach ($posts as $post)
                <tr>
                    <td class="border py-2  text-center">{{$post->id}}</td>
                    <td class="border py-2  text-center">{{$post->title}}</td>
                    <td class="border py-2  text-center">{{$post->body}}</td>
                    @can('update', $post)
                    <td class="border py-2"><a href="{{ 'post-edit/'.$post->id }}" class="py-2 px-5 bg-blue-500 text-white rounded-md">Update</a></td>
                    @endcan
                    @can('delete', $post)
                    <td class="border py-2"><a href="" class="py-2 px-5 bg-red-500 text-white rounded-md">Delete</a></td>
                    @endcan
                    @endforeach
                </tr>
            </table>
            <div class="flex w-full justify-center gap-2">
                {{ $posts
                ->appends(request()->query())->
                links() }}
            </div>
            @endif ()
        </div>
    </div>
</body>

</html>