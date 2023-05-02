<x-admin-layout title="Create customer">
    <form action="{{ route('admin.customer.save') }}" method="POST" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-input name="name" type="text" placeholder="" label="Fullname" />
                <x-input name="email" placeholder="Email" label="Email" />
                <x-input name="phone_number" placeholder="Phone number" label="Phone number" />
                <x-input name="date_of_birth" label="Date of birth" type="date" />
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary text-white" value="Create" />
            <a href="{{ route('admin.customer.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</x-admin-layout>
