<x-layout :title="$pageTitle" pageHeader="Tag: {{ $tag->name }}">
    <div class="flex flex-wrap gap-[1.5rem]">
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
    </div>
</x-layout>