<x-admin-layout title="Sửa tài khoản">
    <form action="{{ route('admin.user.createsave', ['id' => $user->id]) }}" method="post" autocomplete="off">
        @csrf
        <div class="col-md-6">
            <x-input name="name" type="text" label="Tên người dùng" value="{{ $user->name ?? '' }}" />
            <x-input name="username" label="Tên tài khoản" value="{{ $user->username ?? '' }}" />
            <x-input name="email" placeholder="Email" label="Email" value="{{ $user->email ?? '' }}" />
            <x-input name="phone_number" placeholder="Số điện thoại" label="Số điện thoại"
                value="{{ $user->phone_number ?? '' }}" />
            <x-input name="address" placeholder="Địa chỉ" label="Địa chỉ" value="{{ $user->address ?? '' }}" />
            <x-mst-select-role name="role_id" label="Danh mục quyền" value="{{ $user->role_id ?? '' }}" />
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Cập nhật dữ liệu</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Về trang trước</a>
            </div>
        </div>
    </form>
</x-admin-layout>
