<x-layout :title="$pageTitle" pageHeader="Comments">
    <ul class="flex flex-col gap-2">
        @foreach ($comments as $comment)
            <a href="comment/{{ $comment->id }}" class="p-2 border border-gray-300 rounded">
                <strong class="text-lg">{{ $comment->author }}</strong><br> {{ $comment->comment }}
            </a>
        @endforeach
    </ul>
</x-layout>