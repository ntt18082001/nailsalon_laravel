@php
function getNameRole($role_id) {
    if($role_id == 1) {
        return "Admin";
    }
    if($role_id == 2) {
        return "Staff";
    }
    if($role_id == 3) {
        return "Customer";
    }
}
@endphp
<x-admin-layout title="User detail">
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Image -->
				<div class="card card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img rounded-circle avatar-xl" src="{{asset('assets/images/users/user-dummy-img.jpg')}}" alt="User profile picture">
						</div>

						<h3 class="profile-username text-center">{{$data->name}}</h3>

						<ul class="list-group list-group-unbordered mb-3">
							<li class="list-group-item">
								<b>Role: </b>
								<a class="float-right">{{getNameRole($data->role_id)}}</a>
							</li>
						</ul>
					</div>
					<!-- /.card-body -->
				</div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>#: </strong> {{$data->id}}</p>
                            <p><strong>Username: </strong> {{$data->username}}</p>
                            <p><strong>Fullname: </strong> {{$data->name}}</p>
                            <p><strong>Email: </strong> {{$data->email}}</p>
                            <p><strong>Phone number: </strong> {{$data->phone_number}}</p>
                            <p><strong>Addresse: </strong> {{$data->address}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>
    </div>
    </x-admin-layout>