<x-admin-layout title="Change password">
    @php
    $user = Auth::user();
    @endphp
    <div class="card">
        <div class="card-body">
            @if (session('change-err'))
            <div class="alert alert-danger" role="alert">
                {{ session('change-err') }}
            </div>
            @endif
            @if (session('change-success'))
            <div class="alert alert-success" role="alert">
                {{ session('change-success') }}
            </div>
            @endif
            <form action="{{ route('admin.user.savechangepassword', ['id' => $user->id]) }}" method="POST" autocomplete="off"
                class="col-md-4">
                @csrf
                <x-input name="password" type="password" label="Enter old password" />
                <x-input name="newPassword" type="password" label="Enter new password" />
                <x-input name="confirmPassword" type="password" label="Confirm new password" />
                <div class="mt-3">
                    <input type="submit" class="btn btn-primary text-white" value="Submit" />
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>