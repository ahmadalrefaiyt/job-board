<x-layout :title="$pageTitle" pageHeader="Blog">
    <div class="flex flex-wrap gap-[1.5rem]">
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
    </div>
    <div class="paginate my-10">{{ $posts->links() }}</div>

</x-layout>