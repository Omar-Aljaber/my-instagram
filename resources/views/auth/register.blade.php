<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Userame -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- languages -->
        <div class="mt-4">
            <x-input-label for="lang" :value="__('Language')" />
            <select name="lang" id="lang" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 ltr:px-3 rtl:px-8 shadow-sm focus:border-indigo-500 
            focus:outline-none focus:ring-indio-500 sm:text-sm">

            <option value="en" {{ old('lang') == 'en' ? 'selected' : '' }}>English</option>
            <option value="ar" {{ old('lang') == 'ar' ? 'selected' : '' }}>العربية</option>

            </select>
            <x-input-error :messages="$errors->get('lang')" class="mt-2" />

        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <div class="flex justify-end p-4">
        <ul class="flex space-x-4">
            <li>
                <a href="{{ route('changeLang','en') }}" class="text-gray-600 hover:text-gray-900 {{ app()->getLocale()== 'en' ? 'font-bold' : '' }}">English</a>
            </li>
            <li>
                <a href="{{ route('changeLang','ar') }}" class="text-gray-600 hover:text-gray-900 {{ app()->getLocale()== 'ar' ? 'font-bold' : '' }}">العربية</a>
            </li>
        </ul>
    </div>
</x-guest-layout>
