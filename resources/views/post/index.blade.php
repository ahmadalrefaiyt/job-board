<x-layout :title="$pageTitle" pageHeader="Blog">

    <div class="flex flex-wrap gap-[1.5rem]">
        <div class="massage w-full">
            @if (session()->has('success'))
                <div class="bg-green-100 text-green-700 text-sm p-[20px] rounded-xl">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="buttons-section w-full flex justify-end">
            <a href="/blog/create"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create New Post +
            </a>
        </div>

        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
    </div>
    <div class="paginate my-10">{{ $posts->links() }}</div>

</x-layout>