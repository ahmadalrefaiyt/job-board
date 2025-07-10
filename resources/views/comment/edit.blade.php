<x-layout :title="$pageTitle" pageHeader="Edit Comment">
    <strong class="text-lg">{{ $comment->author }}</strong><br> {{ $comment->comment }}
</x-layout>