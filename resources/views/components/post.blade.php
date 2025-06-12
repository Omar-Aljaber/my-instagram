<div class="card">
    <div class="card-header">
        <img src="{{ $post->owner->image }}" class="w-9 h-9 mr-3 rounded-full">
        <a href="/{{ $post->owner->username }}" class="font-bold">{{ $post->owner->username }}</a>
    </div>

    <div class="card-body">
        <div class="max-h-[35rem] overflow-hidden">
            <img src="{{ $post->image }}" alt="{{ $post->description }}" class="w-full h-auto object-cover">
        </div>
        <div class="p-3">
            <a href="/laravel/my-instagram/public/p/{{ $post->slug}}/like">
                @if($post->liked(auth()->user()))
                    <i class="bx bxs-heart text-3xl text-red-600 hover:text-red-400 cursor-pointer mr-3"></i>
                @else
                <i class="bx bx-heart text-3xl hover:text-gray-400 cursor-pointer mr-3"></i>
                @endif
            </a>
        </div>
        <div class="p-3">
            <a href="/{{ $post->owner->username }}" class="font-bold mr-l">{{ $post->owner->username }}</a>
            {{ $post->description }}
        </div>

        @if($post->comments()->count() > 0)
            <a href="/laravel/my-instagram/public/p/{{$post->slug}}"
                class="p-3 font-bold text-sm text-gray-500">
                {{ __('View all ' . $post->comments()->count() . ' comments') }}
            </a>
        @endif
        <div class="p-3 text-gray-400 uppercase text-xs">
            {{ $post->created_at->diffForHumans() }}
        </div>
    </div>

    <div class="card-footer">
        <form action="/laravel/my-instagram/public/p/{{ $post->slug }}/comment" method="POST">
            @csrf
            <div class="flex flex-row">
                <textarea name="body" placeholder="{{ __('Add a comment...') }}" autocomplete="off" autocorrect="off"
                    class="grow resize-none mx-h-60 h-5 p-0 overflow-hidden border-none bg-none placeholder-gray-400 outline-0 focus:ring-0"></textarea>
                <button type="submit" class="border-none bg-white text-blue-500 ml-5">{{ __('Post') }}</button>
            </div>
        </form>
    </div>
</div>