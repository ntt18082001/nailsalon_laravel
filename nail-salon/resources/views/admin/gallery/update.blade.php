<x-admin-layout title="Update gallery #{{ $data->id }}">
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/preview_img.css') }}">
    </x-slot>
    <form action="{{ route('admin.gallery.save', ['id' => $data->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group group-container">
                    <label class="control-label required">Image gallery</label>
                    <input name="img_path" id="img_path" type="file" class="form-control fake-d-none">
                    <div class="position-relative">
                        <input type="button" class="btn btn-choose-file w-100 h-100 position-absolute" >
                        <div class="selectedImages" style="height: 250px !important;">
                            @if(isset($data->img_path))
                                <img class="image-review" src="/storage/gallery/{{$data->img_path}}" />
                            @else
                                <img class="image-review" />
                            @endif
                        </div>
                    </div>
                    @error('img_path')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <x-textarea name="description" label="Description" value="{{$data->description}}" />
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary text-white" value="Update" />
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
    <x-slot name="script">
        <script src="{{ asset('js/admin/slider/slider.js') }}"></script>
    </x-slot>
</x-admin-layout>
