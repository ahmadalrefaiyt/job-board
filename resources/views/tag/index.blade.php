<x-layout>
    <div class="flex flex-wrap self-start gap-2 mx-2 mt-2 align-top tags">
        @foreach ($tags as $tag)
            <a href="{{ $tag->slug }}"
                class="self-start inline-block px-3 py-1 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">
                {{ $tag->name }} - ({{ $tag->posts_count }})
            </a>
        @endforeach
    </div>
</x-layout>