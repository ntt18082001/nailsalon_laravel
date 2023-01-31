<x-admin-layout title="Giới thiệu">
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('summernote/summernote-bs4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/preview_img.css') }}">
    </x-slot>
    <form action="{{ route('admin.config.saveabout') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group group-container mb-3">
            <label class="control-label required">Ảnh bìa</label>
            <input name="about_img" id="about_img" type="file" class="form-control fake-d-none">
            <div class="position-relative">
                <input type="button" class="btn btn-choose-file w-100 h-100 position-absolute" >
                <div class="selectedImages" style="height: 250px !important;">
                    @if(isset($data_img->value))
                        <img class="image-review" src="/storage/webconfig/{{$data_img->value}}" />
                    @else
                        <img class="image-review" />
                    @endif
                </div>
            </div>
        </div>

        <label class="control-label required">Nội dung</label>
        <textarea id="summernote" name="about">{{$data->value}}</textarea>
        <div class="form-group">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Lưu</button>
        </div>
    </form>
    <x-slot name="script">
        <!-- ckeditor -->
        <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
        <script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Nội dung giới thiệu',
                    tabsize: 2,
                    height: 500,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            });
        </script>
        <script src="{{ asset('js/admin/webconfig/about.js') }}"></script>
    </x-slot>
</x-admin-layout>
