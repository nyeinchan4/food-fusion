@props(['name'])

@error($name)
    <p class="mt-1 text-error text-xs">{{ $message }}</p>
@enderror