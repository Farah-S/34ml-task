<nav class="-mx-3 flex flex-1 justify-end">
    @auth
        <a
            href="{{ url('/profile') }}"
            class="rounded-md px-3 py-2  text-black hover:bg-gray-700 hover:text-white"
        >
            Dashboard
        </a>
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
