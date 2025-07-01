<div class="h-[50rem] lg:flex lg:flex-row overflow-y-auto">

    <div class="flex h-1/2 lg:h-full items-center justify-center overflow-hidden bg-black lg:w-8/12">
        <img class="h-full w-auto object-cover" src="{{ asset('storage/' . $filtered_image) }}">
    </div>

    <div class="lg:w-4/12 flex flex-col bg-white p-5">
        <h1 class="text-2xl text-center mb-10">{{ __('filters') }}</h1>
        <div class="grid grid-cols-3 gap-4 items-start">
            @foreach ($filters as $filter)
                <div class="flex flex-col">
                    <img src="{{ asset('storage/filters_thumb/' . $filter . '.jpg') }}"
                        class="mb-3 cursor-pointer hover:ring-1 hover:ring-gray-500"
                        wire:click="apply_filter('{{ strtolower($filter) }}')">
                    <span class="text-center text-gray-500">
                        {{ $filter }}
                    </span>

                </div>
            @endforeach
        </div>


        <div class="mt-auto flex flex-row items-center">
            <div>
                <img src="{{ Str::startsWith(auth()->user()->image, 'https') ? auth()->user()->image : asset('storage/' . auth()->user()->image) }}"
                    class="w-10 h-10 mr-2 rounded-full border border-neutral-300">
            </div>
            <div class="flex flex-col grow">
                <div class="font-bold">
                    <a href="{{ route('user_profile', auth()->user()->username) }}">{{ auth()->user()->username }}</a>

                </div>
            </div>
        </div>
        <div class="mt-3">
            <textarea name="description" id="description" cols="30" rows="10" placeholder="{{ __('Write  description') }}" 
            class="border-none w-full" wire:model="description"></textarea>
            @error('description')
            <span class="text-sm text-red-500 py-5">
                {{ $message }}
            </span>
            @enderror
            <x-primary-button class="w-full justify-center" wire:click="publish">
                {{ __('Publish') }}
               
            </x-primary-button>
        </div>
    </div>

</div>
