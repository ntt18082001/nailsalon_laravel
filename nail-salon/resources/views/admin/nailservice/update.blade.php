<x-admin-layout title="Update nail service">
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/preview_img.css') }}">
    </x-slot>
    <form action="{{ route('admin.nailservice.save', ['id' => $data->id]) }}" method="POST" autocomplete="off"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                {{-- <x-input name="cover_path" label="Hình ảnh" type="file" /> --}}
                <div class="form-group group-container">
                    <label class="control-label required">Image</label>
                    <input name="cover_path" id="cover_path" type="file" class="form-control fake-d-none">
                    <div class="position-relative">
                        <input type="button" class="btn btn-choose-file w-100 h-100 position-absolute">
                        <div class="selectedImages" style="height: 250px !important;">
                            @if (isset($data->cover_path))
                                <img class="image-review" src="/storage/nailservice/{{ $data->cover_path }}" />
                            @else
                                <img class="image-review" />
                            @endif
                        </div>
                    </div>
                    @error('cover_path')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <x-input name="name" label="Name" value="{{ $data->name }}" />
                <x-textarea name="description" label="Description" value="{{ $data->description }}" />
                <x-mst-select name="service_cate_id" label="Service category" table="service_categories"
                    displayColumn="name" value="{{ $data->service_cate_id }}" />
            </div>
            <div class="col-md-6">
                <x-input name="duration" label="Time duration" type="number" value="{{ $data->duration }}" />
                <div class="row">
                    <div class="col-md-6">
                        <x-input name="price_naturel" label="Price Naturel" type="number"
                            value="{{ $data->price_naturel }}" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="price_couleur" label="Price Couleur" type="number"
                            value="{{ $data->price_couleur }}" />
                    </div>
                    <div class="col-md-6">
                        <x-input name="price_french" label="Price French" type="number"
                            value="{{ $data->price_french }}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary text-white" value="Update" />
            <button type="reset" class="btn btn-success"><i class="fa fa-undo"></i>Reset</button>
            <a href="{{ route('admin.nailservice.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
    <x-slot name="script">
        <script src="{{ asset('js/admin/nailservice/index.js') }}"></script>
    </x-slot>
</x-admin-layout>
