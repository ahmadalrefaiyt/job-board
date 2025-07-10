<x-layout :title="$pageTitle" pageHeader="Edit Tag">
    <a href="/tag/{{ $tag->slug }}"
        class="self-start inline-block px-3 py-1 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">{{ $tag->name }}
    </a>
</x-layout>