<x-admin-layout title="Giới thiệu">
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('summernote/summernote-bs4.min.css') }}">
    </x-slot>
    <form action="{{ route('admin.config.saveabout') }}" method="post">
        @csrf
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
    </x-slot>
</x-admin-layout>
