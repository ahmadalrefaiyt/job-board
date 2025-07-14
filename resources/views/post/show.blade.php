<x-layout :title="$pageTitle" pageHeader="Blog / {{ $post->title }} - {{ $post->id }}">

    <div class="massage w-full">
        @if (session()->has('success'))
            <div class="bg-green-100 text-green-700 text-sm p-[20px] rounded-xl mb-4">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="buttons w-full my-4 flex justify-end gap-1">
        <a href="/blog/{{ $post->id }}/edit"
            class="flex gap-1 px-3 py-1 text-sm font-semibold text-amber-50 bg-amber-500 rounded-md hover:bg-amber-600">
            <svg class="fill-amber-50" width="10px" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                viewBox="0 0 24 24">
                <path d="M1.172,19.119A4,4,0,0,0,0,21.947V24H2.053a4,4,0,0,0,2.828-1.172L18.224,9.485,14.515,5.776Z" />
                <path
                    d="M23.145.855a2.622,2.622,0,0,0-3.71,0L15.929,4.362l3.709,3.709,3.507-3.506A2.622,2.622,0,0,0,23.145.855Z" />
            </svg> Edit</a>
        <form action="/blog/{{ $post->id }}" method="POST" class="inline-block"
            onsubmit="return confirm('Are you sure you want to delete this post?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="flex gap-1  px-3 py-1 text-sm font-semibold text-red-50 bg-red-500 rounded-md hover:bg-red-600 cursor-pointer">
                <svg class="fill-red-50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512"
                    style="enable-background:new 0 0 512 512;" xml:space="preserve" width="10px">
                    <g>
                        <path
                            d="M448,85.333h-66.133C371.66,35.703,328.002,0.064,277.333,0h-42.667c-50.669,0.064-94.327,35.703-104.533,85.333H64   c-11.782,0-21.333,9.551-21.333,21.333S52.218,128,64,128h21.333v277.333C85.404,464.214,133.119,511.93,192,512h128   c58.881-0.07,106.596-47.786,106.667-106.667V128H448c11.782,0,21.333-9.551,21.333-21.333S459.782,85.333,448,85.333z    M234.667,362.667c0,11.782-9.551,21.333-21.333,21.333C201.551,384,192,374.449,192,362.667v-128   c0-11.782,9.551-21.333,21.333-21.333c11.782,0,21.333,9.551,21.333,21.333V362.667z M320,362.667   c0,11.782-9.551,21.333-21.333,21.333c-11.782,0-21.333-9.551-21.333-21.333v-128c0-11.782,9.551-21.333,21.333-21.333   c11.782,0,21.333,9.551,21.333,21.333V362.667z M174.315,85.333c9.074-25.551,33.238-42.634,60.352-42.667h42.667   c27.114,0.033,51.278,17.116,60.352,42.667H174.315z" />
                    </g>
                </svg> Delete
            </button>
        </form>

    </div>
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
        <h4 class="mt-4">Comments</h4>
        <ul class="flex flex-col gap-2 my-4">
            @foreach ($post->comments as $comment)
                <li class="flex flex-col gap-1 p-2 border border-gray-300 rounded">
                    <strong class="text-lg">{{ $comment->author }}</strong> {{ $comment->comment }}

                    <form action="/comment/{{ $comment->id }}" method="post"
                        onsubmit="return confirm('Are you sure you want to delete this comment?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-50 bg-red-500  hover:bg-red-600 px-3 py-1 rounded-md text-sm cursor-pointer">Delete
                            Comment</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <h4 class="mb-2">Add New Comment</h4>
        <form action="/comment/" method="post" class="flex flex-col gap-2 w-[50%]">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="text" name="author" class="w-full p-2  border border-gray-300 rounded" placeholder="Your name"
                value="{{ old('author') }}">
            @error('author')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <textarea name="comment" class="w-full p-2 border border-gray-300 rounded" rows="4"
                placeholder="Write your comment here...">{{ old('comment') }}</textarea>
            @error('comment')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="flex gap-1 px-3 py-1 text-sm font-semibold text-blue-50 bg-blue-500 rounded-md hover:bg-blue-600 cursor-pointer w-fit">
                Add Comment <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24"
                    width="13px" class="fill-blue-50 ">
                    <path
                        d="M15.707,8.293c.189,.188,.293,.439,.293,.707s-.104,.518-.293,.707l-5.707,5.707c-.378,.378-.88,.586-1.414,.586h-.586v-.586c0-.526,.214-1.042,.586-1.414l5.707-5.707c.391-.39,1.023-.39,1.414,0Zm8.293,4.047v6.66c0,2.757-2.243,5-5,5h-5.917C6.082,24,.471,19.208,.029,12.854-.211,9.378,1.057,5.976,3.509,3.521,5.962,1.065,9.371-.205,12.836,.029c6.261,.425,11.164,5.833,11.164,12.312Zm-6-3.34c0-.801-.313-1.555-.879-2.121-1.17-1.17-3.072-1.17-4.242,0l-5.707,5.707c-.756,.755-1.172,1.76-1.172,2.828v1.586c0,.552,.447,1,1,1h1.586c1.068,0,2.073-.417,2.828-1.172l5.707-5.707c.566-.567,.879-1.32,.879-2.122Z" />
                </svg>
            </button>
        </form>

    </div>



</x-layout>