@php
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
<x-admin-layout title="Danh sách tài khoản">
    <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus"></i>
        Thêm người dùng
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Tài khoản</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Quyền tài khoản</th>
                <th scope="col">Trạng thái tài khoản</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->phone_number }}</td>
                <td>{{ getNameRole($item->role_id) }}</td>
                {{-- @if ($item->is_blocked == true)
                <td>Đang khóa</td>
                @else
                <td>Còn hoạt động</td>
                @endif --}}
                <td class="fit">
                    <a href=" {{ route('admin.user.update', ['id'=> $item->id]) }}" class="btn btn-secondary">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Sửa
                    </a>
                    {{-- @if ($item->is_blocked == true)
                    <a href="{{ route('block.user', ['id' => $item->id]) }}" class=" btn btn-danger">
                        <i class="fa-solid fa-user-lock"></i>
                        Mở khóa
                    </a>
                    @else
                    <a href="{{ route('block.user', ['id' => $item->id]) }}" class=" btn btn-danger">
                        <i class="fa-solid fa-user-lock"></i>
                        Khóa
                    </a>
                    @endif --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $data->links() }}
    </div>
</x-admin-layout>