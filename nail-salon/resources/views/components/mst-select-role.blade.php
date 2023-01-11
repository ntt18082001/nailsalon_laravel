@php
$_name = $attributes['name'];
$_label = $attributes['label'];
$_old_value = old($_name);

$_value = $attributes['value'] ?? '';
$_value = empty($_old_value) ? $_value : $_old_value;

function getNameRole($role_id) {
    if($role_id == 1) {
        return "Admin";
    }
    if($role_id == 2) {
        return "Nhân viên";
    }
    if($role_id == 3) {
        return "Khách hàng";
    }
}
@endphp

<div class="form-group mt-3 ">
    <label for="{{ $_name }}" class="form-label">{{ $_label }}</label>

    <select id="{{ $_name }}" name="{{ $_name }}" class="form-control @error($_name) is-invalid @enderror">
        <option value="">-- Chọn 1 giá trị --</option>
        @foreach ($data as $item => $val)
        @if ($_value == $val)
        <option value="{{ $val }}" selected>{{ getNameRole($val) }}</option>
        @else
        <option value="{{ $val }}">{{ getNameRole($val) }}</option>
        @endif
        @endforeach
    </select>
    <span class="text-danger"></span>

    {{-- Thông báo lỗi xác thực dữ liệu --}}
    @error($_name)
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror
</div>