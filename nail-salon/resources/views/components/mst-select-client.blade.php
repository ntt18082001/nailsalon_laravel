@php
$_name = $attributes['name'];
$_label = $attributes['label'];
$_old_value = old($_name);

$_value = $attributes['value'] ?? '';
$_value = empty($_old_value) ? $_value : $_old_value;
@endphp

<div class="form-group">
    <select id="{{ $_name }}" name="{{ $_name }}" class="form-select service @error($_name) is-invalid @enderror" aria-label="Service Select" required>
        <option value="">-- Select {{$select_display}} --</option>
        @foreach ($data as $item)
            @if ($_value == $item->id)
                <option value="{{ $item->id }}" selected>
                    {{ isset($item->name_cate) ? $item->name_cate . ' - ' : ''}}{{ $item->$displayColumn }}
                </option>
            @else
                <option value="{{ $item->id }}">
                    {{ isset($item->name_cate) ? $item->name_cate . ' - ' : ''}}{{ $item->$displayColumn }}
                </option>
            @endif
        @endforeach
    </select>
    {{-- Thông báo lỗi xác thực dữ liệu --}}
    @error($_name)
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror
</div>