<x-app title="{{ $title }}">

    <x-nav-bar />

  {{ $slot }}

    <x-footer />
    <x-cookie-banner />
    <x-join-us-modal />
</x-app>
