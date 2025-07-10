<x-layout :title="$pageTitle" pageHeader="show Comment">
    <strong class="text-lg">{{ $comment->author }}</strong><br> {{ $comment->comment }}
</x-layout>