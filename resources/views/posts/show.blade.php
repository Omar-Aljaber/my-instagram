<x-app-layout>
    <div class="h-screen md:flex md:flex-row">
        <!-- Left Side -->
         <div class="h-full md:w-7/12 bg-black flex items-center">
            @can('update', $post)
                <img src="{{ asset('storage/' . $post->image) }}" class="max-h-screen object-cover mx-auto">
            @endcan
            @cannot('update', $post)
                <img src="{{ asset($post->image) }}" class="max-h-screen object-cover mx-auto">
            @endcannot
         </div>

         <!-- Right Side -->
        <div class="flex w-full flex-col bg-white md:w-5/12">
            <!-- Top -->
             <div class="border-b-2">
                <div class="flex items-center p-5">
                    <img src="{{ $post->owner->image }}" alt="photo" class="mr-5 w-10 h-10 rounded-full">
                    <div class="grow">
                        <a href="{{asset($post->owner->username)}}" class="font-bold">{{ $post->owner->username }}</a>
                    </div>
                    @can('update', $post)
                        <!-- edit -->
                        {{-- <a href="{{asset('p/' . $post->slug)}}/edit">
                            <i class="bx bx-message-square-edit text-xl"></i>
                        </a> --}}
                        <button onclick="Livewire.dispatch('openModal',{component: 'edit-post-modal',arguments:{postid:{{ $post->id }}}})">
                            <i class='bx bx-message-square-edit text-xl'></i>
                        </button>
                        <!-- delete -->
                        <form action="{{asset('p/' . $post->slug)}}/delete" method="POST" class="ml-5">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure')">
                                <i class="bx bx-message-square-x text-xl text-red-500 hover:text-red-700"></i>
                            </button>
                        </form>
                    @endcan
                    @cannot('update', $post)
                        <livewire:follow-button :Post="$post" :userId="$post->owner->id" classes="bg-blue-500 text-white" />
                    @endcannot
                </div>
             </div>

            <!-- Middle -->
            <div class="flex flex-col grow overflow-y-auto">
                <div class="flex items-start p-5">
                    <img src="{{ $post->owner->image }}" class="ltr:mr-5 mr-3 rtl:ml-5 h-10 w-10 rounded-full">
                    <div>
                        <a href="{{asset($post->owner->username)}}" class="font-bold">{{ $post->owner->username }}</a>
                        {{ $post->description }}
                    </div>
                </div>

                <!-- Comments -->
                <div class="grow">
                    @foreach ($post->comments as $comment)
                        <div class="flex items-start px-5 py-2">
                            <img src="{{ $comment->owner->image }}" alt="" class="h-100 mr-3 ltr:mr-5 rtl:ml-5 w-10 rounded-full">
                            <div class="flex flex-col">
                                <div>
                                    <a href="/{{ $comment->owner->username }}" class="font-bold">{{ $comment->owner->username }}:</a>
                                    {{ $comment->body }}
                                </div>
                                <div class="mt-1 text-sm font-bold text-gray-400">
                                    {{ $comment->created_at->shortAbsoluteDiffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Likes and Actions -->
            <div class="p-3 flex border-t-2 flex-row">
                <livewire:like :post="$post" />
                <a class="grow" onclick="document.getElementById('comment_body').focus();">
                    <i class="bx bx-comment text-3xl hover:text-gray-400 cursor-pointer mr-3"></i>
                </a>
            </div>
            <livewire:likedby :post="$post" />
            <div class="border-t-2 p-5">
                <form action="{{asset('p/' . $post->slug)}}/comment" method="post">
                    @csrf
                    <div class="flex flex-row">
                        <textarea name="body" id="comment_body" placeholder="Add a comment ..." 
                            class="h-5 grow resize-none overflow-hidden border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0"></textarea>
                            <button type="submit" class="ml-5 border-none bg-white text-blue-500">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>