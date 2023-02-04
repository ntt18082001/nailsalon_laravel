<x-admin-layout title="Create slider">
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/preview_img.css') }}">
    </x-slot>
    <form action="{{ route('admin.slider.save') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                {{-- <x-input name="img_path" label="Hình ảnh" type="file" /> --}}
                <div class="form-group group-container">
                    <label class="control-label required">Image slider</label>
                    <input name="img_path" id="img_path" type="file" class="form-control fake-d-none">
                    <div class="position-relative">
                        <input type="button" class="btn btn-choose-file w-100 h-100 position-absolute" >
                        <div class="selectedImages" style="height: 250px !important;">
                            <img class="image-review"  />
                        </div>
                    </div>
                    @error('img_path')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <x-input name="from" label="From date" type="date" />
                <x-input name="to" label="To date" type="date" />
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary text-white" value="Create" />
            <a href="{{ route('admin.slider.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
    <x-slot name="script">
        <script src="{{ asset('js/admin/slider/slider.js') }}"></script>
    </x-slot>
</x-admin-layout>
