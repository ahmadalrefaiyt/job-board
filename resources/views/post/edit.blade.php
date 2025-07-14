<x-layout :title="$pageTitle" pageHeader="Edit post : {{ $post->title }}">

    <form method="post" action="/blog/{{ $post->id }}">
        @CSRF
        @method('PATCH')

        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="space-y-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 {{ $errors->has('title') ? 'outline-red-500' : 'outline-gray-300' }}  focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input value="{{old('title', $post->title)}}" type="text" name="title" id="title"
                                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
                        </div>
                    </div>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="author" class="block text-sm/6 font-medium text-gray-900">Author</label>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1  {{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }} focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input value="{{old('author', $post->author)}}" type="text" name="author" id="author"
                                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
                        </div>
                    </div>
                    @error('author')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>
                    <div class="mt-2">
                        <textarea name="body" id="content" rows="3"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 {{ $errors->has('body') ? 'outline-red-500' : 'outline-gray-300' }}  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{old('body', $post->body)}}</textarea>
                    </div>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


            </div>




            <div class="border-b border-gray-900/10 pb-12">


                <div class="mt-10 space-y-10">
                    <fieldset>
                        <legend class="text-sm/6 font-semibold text-gray-900">Status</legend>
                        <div class="mt-6 space-y-6">
                            <div class="flex gap-3">
                                <div class="flex h-6 shrink-0 items-center">
                                    <div class="group grid size-4 grid-cols-1">
                                        <input id="published" aria-describedby="published-description" name="published"
                                            type="checkbox" value="1" {{ old('published') || (!old() && $post->published) ? 'checked' : '' }}
                                            class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                        <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                            viewBox="0 0 14 14" fill="none">
                                            <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="text-sm/6">
                                    <label for="published" class="font-medium text-gray-900">Published</label>
                                    <p id="published-description" class="text-gray-500">If the box is checked, the post
                                        will appear as a <bold class="font-bold ">Public</bold> post.
                                        <br>Otherwise, it will
                                        save as a <bold class="font-bold">
                                            Draft</bold> psot.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </fieldset>


                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/blog" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update
                Post</button>
        </div>
    </form>



</x-layout>