<x-admin-layout title="Danh sách slide">
    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus"></i>
        Thêm slide
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="fit">#</th>
                <th scope="col" class="fit">Hình ảnh</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <img src="/storage/slider/{{ $item->img_path }}" width="100px" alt="">
                    </td>
                    <td>
                        @if (isset($item->from))
                            {{ $item->from->format('d/m/Y') }}
                        @endif
                    </td>
                    <td>
                        @if (isset($item->to))
                            {{ $item->to->format('d/m/Y') }}
                        @endif
                    </td>
                    <td class="fit">
                        <a href=" {{ route('admin.slider.update', ['id' => $item->id]) }}"
                            class="btn btn-secondary">
                            Sửa
                        </a>
                        <a href=" {{ route('admin.slider.delete', ['id' => $item->id]) }}" class="btn btn-danger">
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
