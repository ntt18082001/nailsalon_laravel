<x-admin-layout title="Create account">
    <form action="{{ route('admin.user.createsave') }}" method="post" autocomplete="off">
        @csrf
        <div class="col-md-6">
            <x-input name="name" type="text" placeholder="" label="Fullname" />
            <x-input name="username" label="Username" />
            <x-input name="email" placeholder="Email" label="Email" />
            <x-input name="phone_number" placeholder="Số điện thoại" label="Phone number" />
            <x-input name="address" placeholder="Address" label="Address" />
            <x-input name="password" type="password" placeholder="Enter password" label="Password" />
            <x-input name="confirmPassword" type="password" placeholder="" label="Confirm password" />
            <x-mst-select-role name="role_id" label="Role" />
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('admin.user.index')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</x-admin-layout>