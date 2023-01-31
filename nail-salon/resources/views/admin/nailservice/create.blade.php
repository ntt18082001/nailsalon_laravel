<x-admin-layout title="Thêm mới dịch vụ">
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/preview_img.css') }}">
    </x-slot>
    <form action="{{ route('admin.nailservice.save') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                {{-- <x-input name="cover_path" label="Hình ảnh" type="file" /> --}}
                <div class="form-group group-container">
                    <label class="control-label required">Ảnh</label>
                    <input name="cover_path" id="cover_path" type="file" class="form-control fake-d-none">
                    <div class="position-relative">
                        <input type="button" class="btn btn-choose-file w-100 h-100 position-absolute">
                        <div class="selectedImages" style="height: 250px !important;">
                            <img class="image-review" />
                        </div>
                    </div>
                    @error('cover_path')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <x-input name="name" label="Tên dịch vụ" />
                <x-textarea name="description" label="Mô tả" />
                <x-mst-select name="service_cate_id" label="Danh mục loại dịch vụ" table="service_categories"
                    displayColumn="name" />

            </div>
            <div class="col-md-6">
                <x-input name="duration" label="Thời gian làm (phút)" type="number" />
                <div class="row">
                    <div class="col-md-6">
                        <x-input name="price_naturel" label="Giá Naturel" type="number" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="price_couleur" label="Giá Couleur" type="number" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="price_french" label="Giá French" type="number" />
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary text-white" value="Thêm" />
            <button type="reset" class="btn btn-success"><i class="fa fa-undo"></i> Nhập lại</button>
            <a href="{{ route('admin.nailservice.index') }}" class="btn btn-secondary">Về trang trước</a>
        </div>
    </form>
    <x-slot name="script">
        <script src="{{ asset('js/admin/nailservice/index.js') }}"></script>
    </x-slot>
</x-admin-layout>
