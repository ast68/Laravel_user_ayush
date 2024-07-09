@props(['disabled' => false]);

<input {{ $disabled ? 'disabled' : '' }} type="radio" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}">
