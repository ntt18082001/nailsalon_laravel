<x-admin-layout title="Sửa thể loại dịch vụ">
    <form action="{{ route('admin.servicecate.save', ['id' => $data->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data"
        class="col-md-6">
        @csrf
        <x-input name="name" label="Tên thể loại" value="{{ $data->name }}" />
        <x-input name="cover_path" label="Hình ảnh" type="file" />
        <x-textarea name="note" label="Ghi chú" value="{{ $data->note }}" />
        <div class="mt-3">
            <input type="submit" class="btn btn-primary text-white" value="Sửa" />
            <a href="{{ route('admin.servicecate.index')}}" class="btn btn-secondary">Về trang trước</a>
        </div>
    </form>
</x-admin-layout>