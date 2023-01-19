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
                <th scope="col">Giá</th>
                <th scope="col">Ngày khuyến mãi (From)</th>
                <th scope="col">Ngày khuyến mãi (To)</th>
                <th scope="col">Loại dịch vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <img src="/storage/nailservice/{{$item->cover_path}}" width="50px" alt="">
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->duration }}</td>
                <td>
                    @if(isset($item->discount_price))
                        <span class="text-decoration-line-through">{{ $item->price }} VNĐ</span>
                        <span class="text-danger">{{ $item->discount_price }} VNĐ</span>
                    @else
                        <span>{{ $item->price }} VNĐ</span>
                    @endif
                </td>
                <td>
                    @if(isset($item->discount_from))
                        {{ $item->discount_from->format('d/m/Y') }}
                    @endif
                </td>
                <td>@if(isset($item->discount_to))
                    {{ $item->discount_to->format('d/m/Y') }}
                @endif</td>
                <td>{{ $item->service_cate->name }}</td>
                <td class="fit">
                    <a href=" {{ route('admin.nailservice.update', ['id'=> $item->id]) }}" class="btn btn-secondary">
                        Sửa
                    </a>
                    <a href=" {{ route('admin.nailservice.delete', ['id'=> $item->id]) }}" class="btn btn-danger">
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