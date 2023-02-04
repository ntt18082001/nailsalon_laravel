<x-admin-layout title="List nail service">
    <a href="{{ route('admin.nailservice.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus"></i>
        Create service
    </a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="fit">#</th>
                    <th scope="col" class="fit">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Time duration</th>
                    <th scope="col">Price Naturel</th>
                    <th scope="col">Price Couleur</th>
                    <th scope="col">Price French</th>
                    <th scope="col">Service category</th>
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
                                Edit
                            </a>
                            <a href=" {{ route('admin.nailservice.delete', ['id' => $item->id]) }}"
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
