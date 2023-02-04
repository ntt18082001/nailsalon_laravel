<x-admin-layout title="List slide">
    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus"></i>
        Create slide
    </a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="fit">#</th>
                    <th scope="col" class="fit">Image</th>
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
                                Edit
                            </a>
                            <a href=" {{ route('admin.slider.delete', ['id' => $item->id]) }}" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $data->links() }}
    </div>
</x-admin-layout>
