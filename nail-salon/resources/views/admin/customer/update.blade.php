<x-admin-layout title="Update customer #{{ $data->id }}">
    <form action="{{ route('admin.customer.save', ['id' => $data->id]) }}" method="POST" autocomplete="off"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-input name="name" type="text" label="Fullname" value="{{ $data->name }}" />
                <x-input name="email" placeholder="Email" label="Email" value="{{ $data->email }}" />
                <x-input name="phone_number" placeholder="Phone number" label="Phone number"
                    value="{{ $data->phone_number }}" />
                <x-input name="date_of_birth" label="Date of birth" type="date"
                    value="{{ isset($data->date_of_birth) ? date('Y-m-d', strtotime($data->date_of_birth)) : '' }}" />
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary text-white" value="Update" />
            <a href="{{ route('admin.customer.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</x-admin-layout>
