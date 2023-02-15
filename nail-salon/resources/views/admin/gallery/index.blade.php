<x-admin-layout title="List gallery">
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus"></i>
        Create gallery
    </a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="fit">#</th>
                    <th scope="col" class="fit">Image</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="/storage/gallery/{{ $item->img_path }}" width="100px" alt="">
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                        <td class="fit">
                            <a href=" {{ route('admin.gallery.update', ['id' => $item->id]) }}"
                                class="btn btn-secondary">
                                Edit
                            </a>
                            <a href=" {{ route('admin.gallery.delete', ['id' => $item->id]) }}" class="btn btn-danger">
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
