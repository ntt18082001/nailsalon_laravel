<x-admin-layout title="Danh sách subscriber">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="fit">#</th>
                <th scope="col">Email subscriber</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        {{ $item->email }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $data->links() }}
    </div>
</x-admin-layout>
