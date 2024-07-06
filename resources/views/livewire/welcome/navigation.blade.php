<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>
<nav class="-mx-3 flex flex-1 justify-end">
    @auth
    <div class="relative m-6 inline-flex w-fit">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger"> 
            <button
            class="flex items-center justify-center rounded-lg bg-indigo-700 px-1 py-1 text-center text-white shadow-lg dark:text-gray-200">
            @if(Auth::user()->unreadNotifications->count() > 0)
            <div class="absolute bottom-auto left-auto right-0 top-0 z-10 inline-block -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-x-2 scale-y-2 rounded-full bg-pink-700 p-1 text-xs"></div>
            @endif
                <span class="[&>svg]:h-5 [&>svg]:w-5">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                    fill-rule="evenodd"
                    d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z"
                    clip-rule="evenodd" />
                </svg>
                </span>
            </button>
            </x-slot>
            <x-slot name="content" >
                 @if(Auth::user()->unreadNotifications->count() > 0)
                 <a href="{{ route('markNotificationAsRead') }}" style="display: flex; justify-content: center; padding-top: 11px;" class="text-sm text-indigo-500 mb-4" id="mark-all">
                     Mark all as read
                 </a>
                 @foreach(Auth::user()->unreadNotifications as $notif)
                <x-dropdown-link :href="route('profile')" wire:navigate>
                    {{ $notif->data['message']  }}
                </x-dropdown-link>
                @if($loop->last)
                @endif
                @endforeach
                @else
                <h6 class="text-sm text-gray-600 mb-4" style="display: flex; justify-content: center; padding-top: 11px;">No new notifications</h6>
                @endif
                
            </x-slot>
        </x-dropdown>

        </div>
        <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent leading-4 rounded-md text-black bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('editprofile')" wire:navigate>
                            {{ __('Edit Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2  text-black hover:bg-gray-700 hover:text-white"
        >
            Log in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-md px-3 py-2  text-black hover:bg-gray-700 hover:text-white"
            >
                Register
            </a>
        @endif
    @endauth
</nav>
