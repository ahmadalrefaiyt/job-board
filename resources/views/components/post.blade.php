<div class="flex flex-wrap border rounded-md shadow-sm basis-1/5 grow-1">

    <a href="/blog/{{ $post->id }}" class="w-full">
        <img src="{{ asset('images/image-' . $post->id) }}.jpg" alt="{{ $post->title . $post->id }}"
            class="object-cover w-full h-70 rounded-t-md">
    </a>
    <div class="flex w-full flex-wrap self-start gap-1 mx-2 mt-2 align-top tags">
        @foreach ($post->tags as $tag)
            <a href="{{  route('tag.show', $tag->slug) }}"
                class="self-start inline-block px-3 py-1 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">{{ $tag->name }}</a>
        @endforeach
    </div>
    <div class="self-end p-4">
        <a class="text-2xl" href="/blog/{{ $post->id }}">{{ $post->title }} - {{ $post->id }}</a>
        <p>{{ $post->body }}</p>
    </div>
</div>