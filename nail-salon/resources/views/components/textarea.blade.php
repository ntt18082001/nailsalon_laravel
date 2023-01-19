@php
$_name = $attributes['name'];
$_label = $attributes['label'];
$_old_value = old($_name);
$_value = $attributes['value'] ?? '';
$_value = empty($_old_value) ? $_value : $_old_value;
$_isrequired = isset($attributes['required']) ? 'required' : '';
$_rows = isset($attributes['rows']) && is_numeric($attributes['rows']) ? $attributes['rows'] : 3;
$_is_html_decoding = isset($attributes['htmlDecoding']) && $attributes['htmlDecoding'] == true ? true : false;

@endphp
<div class="form-group mt-3">
    <label for="{{ $_name }}" class="form-label"> {{ $_label }} </label>
    <textarea id="{{ $_name }}" name="{{ $_name }}" {{ $_isrequired }}
        class="form-control @error($_name) is-inavalid @enderror " rows="{{ $_rows }}">@if($_is_html_decoding){!! $_value !!}@else{{ $_value }}@endif</textarea>

    @error($_name)
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>
