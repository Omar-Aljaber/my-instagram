<div class="relative flex items-center">
    <x-text-input class="w-56 md:w-64 lg:w-96 border-none bg-gray-200 rounded-xl h-10 focus:ring-0"
        wire:model.live="searchInput" placeholder="{{ __('Search...') }}" autocomplete="off" />

    @if (!empty($searchInput))
        <button class="absolute top-1.5 right-2" wire:click="clear">
            <i class="bx bx-x circle text-gray-400 text-xl hover:text-red-500"></i>
        </button>
    @endif

    <div>
        @if (!empty($results) and !empty($searchInput))
            <ul
                class="absolute w-56 md:w-64 lg:w-96 bg-white p-2 border border-neutral-300 z-10 rounded-lg shadow-xl left-0 top-10">
                @forelse ($results as $result)
                    <li class="flex flex-row w-full p-3 items-center text-sm hover:bg-gray-100 cursor-pointer gap-2"
                        wire:key="user-{{ $result->id }}" wire:click="goto('{{ $result->username }}')">

                        <div>
                            <img src="{{ Str::startsWith($result->image, 'https') ? $result->image : asset('storage/' . $result->image) }}"
                                class="w-10 h-10 ltr:mr-2 rtl:ml-2 rounded-full border border-neutral-300">
                        </div>
                        <div class="flex flex-col grow">
                            <div class="font-bold">
                                <span>
                                    {{ $result->username }}
                                </span>
                            </div>
                            <div class="text-sm text-neutral-500">
                                {{ $result->name }}
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="w-full p-3 text-center">
                        {{ __('There are no results') }}
                    </li>
                @endforelse
            </ul>
        @endif
    </div>
</div>
