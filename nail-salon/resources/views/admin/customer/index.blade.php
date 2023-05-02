<x-admin-layout title="List customer">
    <a href="{{ route('admin.customer.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus"></i>
        Create customer
    </a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="fit">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Date of birth</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->email }}
                        </td>
                        <td>
                            {{ $item->phone_number }}
                        </td>
                        <td>
                            @if (isset($item->date_of_birth))
                                {{ \Carbon\Carbon::parse($item->date_of_birth)->format('m-d-Y') }}
                            @endif
                        </td>
                        <td class="fit">
                            @php
                                $sms_config = App\Models\WebConfigs::where('name', '=', 'sms_content')->get();
                                $message = str_replace("{{name}}", $item->name, $sms_config[0]->value);
                                $message = str_replace("{{age}}", \Carbon\Carbon::parse($item->date_of_birth)->age, $message);
                                $message = str_replace("{{discount}}", 30, $message);
                            @endphp
                            <a href="sms:{{ $item->phone_number }}&body={{ $message }}" class="btn btn-success sms">
                                <i class="mdi mdi-email"></i>
                            </a>
                            <a href=" {{ route('admin.customer.update', ['id' => $item->id]) }}"
                                class="btn btn-secondary">
                                Edit
                            </a>
                            <a href=" {{ route('admin.customer.delete', ['id' => $item->id]) }}" class="btn btn-danger"
                                onclick="return confirm('Confirm customer deletion?')">
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
