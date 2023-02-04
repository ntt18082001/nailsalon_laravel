<x-admin-layout title="Ticket details">
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<h3 class="card-header">Ticket information</h3>
			<div class="card-body">
				<strong><i class="fas fa-code mr-1"></i>#</strong>
				<p class="text-muted bigger-text">{{ $data->id }}</p>

				<strong><i class="fas fa-book mr-1"></i>Customer name</strong>
				<p class="text-muted bigger-text">{{ $data->cus_name }}</p>

				<strong><i class="fas fa-envelope mr-1"></i>Customer email</strong>
				<p class="text-muted bigger-text">{{ $data->cus_email }}</p>
				
				<strong><i class="fas fa-phone mr-1"></i>Phone number</strong>
				<p class="text-muted bigger-text">{{ $data->cus_phone }}</p>
                
				<strong><i class="fas fa-sticky-note mr-1"></i>Note</strong>
				<p class="text-muted bigger-text">{{ $data->cus_note }}</p>

				<strong><i class="fas fa-money-bill mr-1"></i>Total</strong>
				<p class="text-muted bigger-text">{{ $data->total }} €</p>

				<strong><i class="fas fa-bookmark mr-1"></i>Status</strong>
				<p class="text-muted bigger-text">
					<h5>
						@if ($data->status_id == 1)
							<span class="badge border border-dark text-dark">{{ $data->status->name }}</span>
						@elseif ($data->status_id == 2)
							<span class="badge border bg-success">{{ $data->status->name }}</span>
						@elseif ($data->status_id == 3)
							<span class="badge border bg-dark">{{ $data->status->name }}</span>
						@elseif ($data->status_id == 4)
							<span class="badge border bg-dark">{{ $data->status->name }}</span>
                        @endif
					</h5>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card">
			<h3 class="card-header">Ticket details</h3>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th class="text-center fit">Image</th>
								<th>Name</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							@if (sizeof($childs))
								@foreach ($childs as $item)
									<tr>
										<td>{{ $item->id }}</td>
                                        <td class="text-center">
                                            <img src="/storage/nailservice/{{ $item->img_path }}" width="50px" alt="">
                                        </td>
										<td>
											{{ $item->service_name }}
										</td>
										<td>{{ $item->price }} €</td>
									</tr>
                                @endforeach
                            @endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div>
        <a href="{{ route('admin.ticket.index') }}" class="btn btn-secondary">
            Back
        </a>
    </div>
</div>
</x-admin-layout>