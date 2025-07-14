<div class="flex flex-wrap border rounded-md shadow-sm basis-1/5 grow-1 ">

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
    <div class="self-end p-4 flex flex-col gap-1">
        <a class="text-2xl" href="/blog/{{ $post->id }}">{{ $post->title }} - {{ $post->id }}</a>
        <p>{{ $post->body }}</p>
        <div class="buttons w-full my-4 flex justify-start gap-1">
            <a href="/blog/{{ $post->id }}/edit"
                class="flex gap-1 px-3 py-1 text-sm font-semibold text-amber-50 bg-amber-500 rounded-md hover:bg-amber-600">
                <svg class="fill-amber-50" width="10px" xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                    data-name="Layer 1" viewBox="0 0 24 24">
                    <path
                        d="M1.172,19.119A4,4,0,0,0,0,21.947V24H2.053a4,4,0,0,0,2.828-1.172L18.224,9.485,14.515,5.776Z" />
                    <path
                        d="M23.145.855a2.622,2.622,0,0,0-3.71,0L15.929,4.362l3.709,3.709,3.507-3.506A2.622,2.622,0,0,0,23.145.855Z" />
                </svg> Edit</a>
            <form action="/blog/{{ $post->id }}" method="POST" class="inline-block"
                onsubmit="return confirm('Are you sure you want to delete this post?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="flex gap-1  px-3 py-1 text-sm font-semibold text-red-50 bg-red-500 rounded-md hover:bg-red-600 cursor-pointer">
                    <svg class="fill-red-50" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"
                        width="10px">
                        <g>
                            <path
                                d="M448,85.333h-66.133C371.66,35.703,328.002,0.064,277.333,0h-42.667c-50.669,0.064-94.327,35.703-104.533,85.333H64   c-11.782,0-21.333,9.551-21.333,21.333S52.218,128,64,128h21.333v277.333C85.404,464.214,133.119,511.93,192,512h128   c58.881-0.07,106.596-47.786,106.667-106.667V128H448c11.782,0,21.333-9.551,21.333-21.333S459.782,85.333,448,85.333z    M234.667,362.667c0,11.782-9.551,21.333-21.333,21.333C201.551,384,192,374.449,192,362.667v-128   c0-11.782,9.551-21.333,21.333-21.333c11.782,0,21.333,9.551,21.333,21.333V362.667z M320,362.667   c0,11.782-9.551,21.333-21.333,21.333c-11.782,0-21.333-9.551-21.333-21.333v-128c0-11.782,9.551-21.333,21.333-21.333   c11.782,0,21.333,9.551,21.333,21.333V362.667z M174.315,85.333c9.074-25.551,33.238-42.634,60.352-42.667h42.667   c27.114,0.033,51.278,17.116,60.352,42.667H174.315z" />
                        </g>
                    </svg> Delete
                </button>
            </form>

        </div>
    </div>

</div>