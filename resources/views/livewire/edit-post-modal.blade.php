<div class="h-[50rem] lg:flex lg:flex-row overflow-y-auto rtl:text-right ltr:text-left">
    @if (session('error'))
        <div class="text-sm text-red-500 py-5">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex h-1/2 lg:h-full items-center justify-center overflow-hidden bg-black lg:w-8/12">
        @if ($newImage)
            <img src="{{ $newImage->temporaryUrl() }}" class="h-full w-auto object-cover">
        @else
            <img src="{{ asset('storage/' . $this->post->image) }}" class="h-full w-auto object-cover">
        @endif
    </div>

    <div class="lg:w-4/12 flex flex-col bg-white p-5">
        <div class="flex flex-row items-center gap-2">
            <div>
                <img src="{{ Str::startsWith(auth()->user()->image, 'https') ? auth()->user()->image : asset('storage/' . auth()->user()->image) }}"
                    class="w-10 h-10 mr-2 rounded-full border-neutral-300">
            </div>
            <div class="flex flex-col">
                <div class="font-bold">
                    <a href="{{ route('user_profile', auth()->user()->username) }}">{{ auth()->user()->username }}</a>

                </div>
            </div>
        </div>

        <div class="mt-3">
            <label class="block mb-2 text-sm font-medium text-gray-900">
                {{ __('Change Image') }}
            </label>

            <input type="file" wire:model="newImage"
                class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100" />
                @error('newImage')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
        </div>


        <div class="mt-3">
            <textarea wire:model="description" placeholder="{{ __('Write description...') }}"
                class="ring-none border-none h-64 w-full mb-2 rounded" required></textarea>
            @error('description')
            <span class="text-sm text-red-500 py-5">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-auto">
            <x-primary-button class="w-full justify-center" wire:click="update">{{ __('Update') }}</x-primary-button>
        </div>


    </div>

</div>
