<x-admin-layout title="List service category">
    <a href="{{ route('admin.servicecate.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus"></i>
        Create service category
    </a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="fit">#</th>
                    <th scope="col" class="fit">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="/storage/{{ $item->cover_path }}" width="50px" alt="">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->note }}</td>
                        <td class="fit">
                            <a href=" {{ route('admin.servicecate.update', ['id' => $item->id]) }}"
                                class="btn btn-secondary">
                                Edit
                            </a>
                            <a href=" {{ route('admin.servicecate.delete', ['id' => $item->id]) }}"
                                class="btn btn-danger">
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
