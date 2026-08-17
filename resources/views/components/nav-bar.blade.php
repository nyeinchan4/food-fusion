<div class="navbar bg-base-100 shadow-sm">
    <div class="navbar-start">
        <div class="dropdown lg:hidden">
            <button tabindex="0" class="btn btn-ghost btn-square">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-56">
                <li><x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link></li>
                <li><x-nav-link href="/recipes" :active="request()->is('recipes')">Recipes</x-nav-link></li>
                <li><x-nav-link href="/posts" :active="request()->is('posts')">Community</x-nav-link></li>
                <li>
                    <details>
                        <summary class="font-medium">Resources</summary>
                        <ul class="p-2 bg-base-200 rounded-t-none">
                            <li><x-nav-link href="/culinary-resources" :active="request()->is('culinary-resources')">Culinary Resources</x-nav-link></li>
                            <li><x-nav-link href="/educational-resources" :active="request()->is('educational-resources')">Educational Resources</x-nav-link></li>
                        </ul>
                    </details>
                </li>
                @auth
                    @if (auth()->user()->is_admin)
                        <li><x-nav-link href="/admin/contacts" :active="request()->is('admin/contacts')">Contact List</x-nav-link></li>
                        <li><x-nav-link href="/admin/events" :active="request()->is('admin/events*')">Events</x-nav-link></li>
                    @else
                        <li><x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link></li>
                    @endif
                @else
                    <li><x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link></li>
                @endauth
                <li><x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link></li>
                @guest
                    <li>
                        <button onclick="join_us_modal.showModal()" class="btn btn-sm w-full justify-center">Join Us</button>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-sm w-full justify-center" href="/login"
                            :active="request()->is('login')">Login</a>
                    </li>
                @endguest
                @auth
                    <li>
                        <form action="/logout" method="POST" name="logout-mobile" id="logout-mobile">
                            @csrf
                            <x-form-button class="btn btn-sm w-full justify-center m-0" form="logout-mobile">
                                Logout
                            </x-form-button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
        <a href="/" class="btn btn-ghost text-xl">
            <span class="text-second">Food</span>
            <span class="text-secondary">Fusion</span>
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 flex justify-center items-center gap-1">
            <li><x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link></li>
            <li><x-nav-link href="/recipes" :active="request()->is('recipes')">Recipes</x-nav-link></li>
            <li><x-nav-link href="/posts" :active="request()->is('posts')">Community</x-nav-link></li>
            <li>
                <details>
                    <summary class="font-medium">Resources</summary>
                    <ul class="p-2 bg-base-100 rounded-t-none shadow-lg min-w-48">
                        <li><x-nav-link href="/culinary-resources" :active="request()->is('culinary-resources')">Culinary Resources</x-nav-link></li>
                        <li><x-nav-link href="/educational-resources" :active="request()->is('educational-resources')">Educational Resources</x-nav-link></li>
                    </ul>
                </details>
            </li>
            @auth
                @if (auth()->user()->is_admin)
                    <li><x-nav-link href="/admin/contacts" :active="request()->is('admin/contacts')">Contact List</x-nav-link></li>
                    <li><x-nav-link href="/admin/events" :active="request()->is('admin/events*')">Events</x-nav-link></li>
                @else
                    <li><x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link></li>
                @endif
            @else
                <li><x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link></li>
            @endauth
            <li><x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link></li>
        </ul>
    </div>
    <div class="navbar-end hidden lg:flex gap-2">
        @guest
            <button onclick="join_us_modal.showModal()" class="btn">Join Us</button>
            <a class="btn btn-primary" href="/login" :active="request()->is('login')">Login</a>
        @endguest
        @auth
            <form action="/logout" method="POST" name="logout" id="logout">
                @csrf
                <x-form-button class="m-0 p-0" form="logout">Logout</x-form-button>
            </form>
        @endauth
    </div>
</div>
