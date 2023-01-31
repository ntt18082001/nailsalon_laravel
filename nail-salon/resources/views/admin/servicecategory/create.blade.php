<x-admin-layout title="Thêm mới thể loại dịch vụ">
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/preview_img.css') }}">
    </x-slot>
    <form action="{{ route('admin.servicecate.save') }}" method="POST" autocomplete="off" enctype="multipart/form-data"
        class="col-md-6">
        @csrf
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
        <x-input name="name" label="Tên thể loại" />
        <x-textarea name="note" label="Ghi chú" />
        <div class="mt-3">
            <input type="submit" class="btn btn-primary text-white" value="Thêm" />
            <a href="{{ route('admin.servicecate.index') }}" class="btn btn-secondary">Về trang trước</a>
        </div>
    </form>
    <x-slot name="script">
        <script src="{{ asset('js/admin/nailservice/index.js') }}"></script>
    </x-slot>
</x-admin-layout>
