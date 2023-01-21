<x-admin-layout title="Chi tiết ticket">
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<h3 class="card-header">Thông tin ticket</h3>
			<div class="card-body">
				<strong><i class="fas fa-code mr-1"></i>Mã ticket</strong>
				<p class="text-muted bigger-text">{{ $data->id }}</p>

				<strong><i class="fas fa-book mr-1"></i>Tên khách hàng</strong>
				<p class="text-muted bigger-text">{{ $data->cus_name }}</p>

				<strong><i class="fas fa-envelope mr-1"></i>Email</strong>
				<p class="text-muted bigger-text">{{ $data->cus_email }}</p>
				
				<strong><i class="fas fa-phone mr-1"></i>Số điện thoại</strong>
				<p class="text-muted bigger-text">{{ $data->cus_phone }}</p>
                
				<strong><i class="fas fa-sticky-note mr-1"></i>Ghi chú</strong>
				<p class="text-muted bigger-text">{{ $data->cus_note }}</p>

				<strong><i class="fas fa-money-bill mr-1"></i>Tổng tiền</strong>
				<p class="text-muted bigger-text">{{ $data->total }} VNĐ</p>

				<strong><i class="fas fa-bookmark mr-1"></i>Trạng thái</strong>
				<p class="text-muted bigger-text">
					<h5>
						@if ($data->status_id == 1)
							<span class="badge border border-dark text-dark">{{ $data->status->name }}</span>
						@elseif ($data->status_id == 2)
							<span class="badge border bg-info">{{ $data->status->name }}</span>
						@elseif ($data->status_id == 3)
							<span class="badge border bg-success">{{ $data->status->name }}</span>
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
			<h3 class="card-header">Chi tiết ticket</h3>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th class="text-center fit">Ảnh sản phẩm</th>
								<th>Tên dịch vụ</th>
								<th>Đơn giá</th>
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
										<td>{{ $item->price }} VNĐ</td>
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
            Về trang trước
        </a>
    </div>
</div>
</x-admin-layout>