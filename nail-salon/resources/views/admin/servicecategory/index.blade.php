<x-admin-layout title="Danh sách thể loại dịch vụ">
    <a href="{{ route('admin.servicecate.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus"></i>
        Thêm thể loại dịch vụ
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="fit">#</th>
                <th scope="col" class="fit">Hình ảnh</th>
                <th scope="col">Tên thể loại</th>
                <th scope="col">Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <img src="/storage/{{$item->cover_path}}" width="50px" alt="">
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->note }}</td>
                <td class="fit">
                    <a href=" {{ route('admin.servicecate.update', ['id'=> $item->id]) }}" class="btn btn-secondary">
                        Sửa
                    </a>
                    <a href=" {{ route('admin.servicecate.delete', ['id'=> $item->id]) }}" class="btn btn-danger">
                        Xóa
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $data->links() }}
    </div>
</x-admin-layout>