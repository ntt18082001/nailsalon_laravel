<x-admin-layout title="Thêm mới dịch vụ">
    <form action="{{ route('admin.nailservice.save') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-input name="name" label="Tên dịch vụ" />
                <x-input name="cover_path" label="Hình ảnh" type="file" />
                <x-textarea name="description" label="Mô tả" />
            <x-mst-select name="service_cate_id" label="Danh mục loại dịch vụ" table="service_categories" displayColumn="name" />

            </div>
            <div class="col-md-6">
                <x-input name="duration" label="Thời gian làm (phút)" type="number" />
                <div class="row">
                    <div class="col-md-6">
                        <x-input name="price" label="Giá" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="discount_price" label="Giá khuyến mãi" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-input name="discount_from" label="Từ ngày" type="date" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="discount_to" label="Đến ngày" type="date" />
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
