<x-admin-layout title="Thêm tài khoản">
    <form action="{{ route('admin.user.createsave') }}" method="post" autocomplete="off">
        @csrf
        <div class="col-md-6">
            <x-input name="name" type="text" placeholder="" label="Tên người dùng" />
            <x-input name="username" label="Tên tài khoản" />
            <x-input name="email" placeholder="Email" label="Email" />
            <x-input name="phone_number" placeholder="Số điện thoại" label="Số điện thoại" />
            <x-input name="address" placeholder="Địa chỉ" label="Địa chỉ" />
            <x-input name="password" type="password" placeholder="Mật khẩu" label="Mật khẩu" />
            <x-input name="confirmPassword" type="password" placeholder="" label="Nhập lại mật khẩu" />
            <x-mst-select-role name="role_id" label="Danh mục quyền" />
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Thêm dữ liệu</button>
                <a href="{{ route('admin.user.index')}}" class="btn btn-secondary">Về trang trước</a>
            </div>
        </div>
    </form>
</x-admin-layout>