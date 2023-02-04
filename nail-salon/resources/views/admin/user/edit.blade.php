<x-admin-layout title="Update account">
    <form action="{{ route('admin.user.createsave', ['id' => $user->id]) }}" method="post" autocomplete="off">
        @csrf
        <div class="col-md-6">
            <x-input name="name" type="text" label="Fullname" value="{{ $user->name ?? '' }}" />
            <x-input name="username" label="Username" value="{{ $user->username ?? '' }}" />
            <x-input name="email" placeholder="Email" label="Email" value="{{ $user->email ?? '' }}" />
            <x-input name="phone_number" placeholder="Phone number" label="Phone number"
                value="{{ $user->phone_number ?? '' }}" />
            <x-input name="address" placeholder="Address" label="Address" value="{{ $user->address ?? '' }}" />
            <x-mst-select-role name="role_id" label="Role" value="{{ $user->role_id ?? '' }}" />
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</x-admin-layout>
