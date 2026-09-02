@props(['field'])


@error($field)
    <p class="text-sm font-bold text-red-600">{{ $message }}</p>
@enderror
