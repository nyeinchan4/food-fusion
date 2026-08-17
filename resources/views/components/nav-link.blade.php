@props(['active' => false, 'type' => 'a'])
@if ($type == 'a')
    <a
        {{ $attributes->class([
            'rounded-md text-sm font-medium',
            'bg-base-300' => $active,
            '' => ! $active,
        ])->merge([
            'aria-current' => $active ? 'page' : 'false'
        ]) }}
    >
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->class([
            'rounded-md px-3 py-2 text-sm font-medium',
            'bg-gray-950/70 text-white' => $active,
            'bg-gray-950/20 text-gray-300 hover:bg-white/5 hover:text-white' => ! $active,
        ])->merge([
            'aria-current' => $active ? 'page' : 'false'
        ]) }}
    >
        {{ $slot }}
    </button>
@endif