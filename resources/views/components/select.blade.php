@props(['options', 'value'])

<select
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm resize-none']) }}>
    @foreach ($options as $key => $val)
        <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>{{ $val }}</option>
    @endforeach
</select>
