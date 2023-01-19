<x-admin-layout title="Sửa dịch vụ">
    <form action="{{ route('admin.nailservice.save', ["id" => $data->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-input name="name" label="Tên dịch vụ" value="{{ $data->name }}" />
                <x-input name="cover_path" label="Hình ảnh" type="file" />
                <x-textarea name="description" label="Mô tả" value="{{ $data->description }}" />
            <x-mst-select name="service_cate_id" label="Danh mục loại dịch vụ" table="service_categories" displayColumn="name" value="{{ $data->service_cate_id }}" />

            </div>
            <div class="col-md-6">
                <x-input name="duration" label="Thời gian làm (phút)" type="number" value="{{ $data->duration }}" />
                <div class="row">
                    <div class="col-md-6">
                        <x-input name="price" label="Giá" value="{{ $data->price }}" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="discount_price" label="Giá khuyến mãi" value="{{ $data->discount_price }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-input name="discount_from" label="Từ ngày" type="date" value="{{ date('Y-m-d', strtotime($data->discount_from)) }}"/>
                    </div>
                    <div class="col-md-6">
                        <x-input name="discount_to" label="Đến ngày" type="date" value="{{ date('Y-m-d', strtotime($data->discount_to)) }}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary text-white" value="Thêm" />
            <a href="{{ route('admin.nailservice.index') }}" class="btn btn-secondary">Về trang trước</a>
        </div>
    </form>
</x-admin-layout>
