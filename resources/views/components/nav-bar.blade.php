<div class="navbar bg-base-100 shadow-sm">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl"><span class="text-second">Food</span> <span
                class="text-secondary">Fusion</span></a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1 flex justify-center items-center gap-1">
            <li><x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link></li>
            <li><x-nav-link href="/recipes" :active="request()->is('recipes')">Collection</x-nav-link></li>
            <li><x-nav-link href="/posts" :active="request()->is('posts')">Community</x-nav-link></li>
            <li><x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link></li>
            <li><x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link></li>
            <li><x-nav-link href="/resource" :active="request()->is('resource')">Resources</x-nav-link></li>
            {{-- <li>
                <details>
                    <summary>Resource</summary>
                    <ul class="bg-base-100 rounded-t-none p-2">
                        <li><x-nav-link>Culinary</x-nav-link></li>
                        <li><x-nav-link>Educational</x-nav-link></li>
                    </ul>
                </details>
            </li> --}}
            @guest
                <li>
                    <x-nav-link class="btn" href="/register" :active="request()->is('register')">Register</x-nav-link>
                </li>
                <li> <a class="btn btn-primary" href="/login" :active="request()->is('login')">Login</a>
                </li>
            @endguest

            @auth
                <form class="" action="/logout" method="POST" name="logout" id="logout">
                    @csrf
                    <li>
                        <x-form-button class="m-0 p-0" form="logout">Logout</x-form-button>
                    </li>
                    {{-- <x-nav-link href="/login" :active="request()->is('login')">Logout</x-nav-link> --}}
                </form>
            @endauth
        </ul>
    </div>
</div>
