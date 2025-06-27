<x-layout :title="$pageTitle" pageHeader="Blog / {{ $post->title }} - {{ $post->id }}">
    <img class="object-cover w-full mb-4 rounded-sm h-100" src="{{ asset('images/image-' . $post->id) }}.jpg"
        alt="{{ $post->title }}">
    <div class="flex flex-row flex-wrap gap-1 my-2 tags">
        @foreach ($post->tags as $tag)
            <a href="/blog/tag/{{ $tag->slug }}"
                class="self-start inline-block px-3 py-1 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">{{ $tag->name }}</a>
        @endforeach
    </div>
    <h2 class="text-2xl">{{ $post->title }} - {{ $post->id }}</h2>
    <p>{{ $post->body }}</p>
    <p class="text-xs text-sky-800">Author : {{ $post->author }}</p>

    <div>
        <h3 class="my-3 text-2xl">Comments</h3>
        <ul class="flex flex-col gap-2">
            @foreach ($post->comments as $comment)
                <li class="p-2 border border-gray-300 rounded">
                    <strong class="text-lg">{{ $comment->author }}</strong><br> {{ $comment->comment }}
                </li>
            @endforeach
        </ul>
    </div>

    <a href="/blog/{{ $post->id }}/delete" class="text-red-500">Delete Post</a>

</x-layout>