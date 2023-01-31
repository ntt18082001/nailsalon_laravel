<x-admin-layout title="Danh sách dịch vụ">
    <a href="{{ route('admin.nailservice.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus"></i>
        Thêm dịch vụ
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="fit">#</th>
                <th scope="col" class="fit">Hình ảnh</th>
                <th scope="col">Tên dịch vụ</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Giá Naturel</th>
                <th scope="col">Giá Couleur</th>
                <th scope="col">Giá French</th>
                <th scope="col">Loại dịch vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <img src="/storage/nailservice/{{ $item->cover_path }}" width="50px" alt="">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->duration }}</td>
                    <td>
                        @if (isset($item->price_naturel))
                            <span>{{ $item->price_naturel }} €</span>
                        @endif
                    </td>
                    <td>
                        @if (isset($item->price_couleur))
                            <span>{{ $item->price_couleur }} €</span>
                        @endif
                    </td>
                    <td>
                        @if (isset($item->price_french))
                            <span>{{ $item->price_french }} €</span>
                        @endif
                    </td>
                    <td>{{ isset($item->service_cate) ? $item->service_cate->name : '' }}</td>
                    <td class="fit">
                        <a href=" {{ route('admin.nailservice.update', ['id' => $item->id]) }}"
                            class="btn btn-secondary">
                            Sửa
                        </a>
                        <a href=" {{ route('admin.nailservice.delete', ['id' => $item->id]) }}" class="btn btn-danger">
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
