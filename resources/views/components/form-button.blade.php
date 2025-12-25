<button type="submit"
    {{ $attributes->merge(['class' => 'rounded-md px-4 py-2 text-sm font-semibold btn btn-primary', 'type' => 'submit']) }}>
    {{ $slot }}
</button>
