<x-admin-layout title="Thông tin cửa hàng">

    @php
        $arrLabel = [
            'logo' => 'Hình ảnh logo',
            'brand_name' => 'Tên thương hiệu',
            'brand_phone' => 'Số điện thoại',
            'brand_address' => 'Địa chỉ',
            'brand_email' => 'Email',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
        ];
        $arrPlaceholder = [
            'logo' => 'Đường dẫn logo...',
            'brand_name' => 'Nhập tên thương hiệu...',
            'brand_phone' => 'Nhập số điện thoại...',
            'brand_address' => 'Nhập địa chỉ...',
            'brand_email' => 'Nhập email...',
            'facebook' => 'Đường dẫn facebook...',
            'instagram' => 'Đường dẫn instagram...',
        ];
    @endphp

    <form action="{{ route('admin.config.save') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
        @csrf
        <div asp-validation-summary="ModelOnly" class="text-danger"></div>
        <div class="form-group">
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin cơ bản</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($data as $item)
                                @if ($item->name == 'logo')
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="{{ $item->name }}"
                                            class="control-label">{{ $arrLabel[$item->name] }}</label>
                                        <div class="input-group">
                                            <input hidden id="{{ $item->name }}" name="{{ $item->name }}" type="file"
                                                placeholder="{{ $arrPlaceholder[$item->name] }}" class="form-control"
                                                value="{{ $item->value }}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control input-value-logo" readonly placeholder="{{ $arrPlaceholder[$item->name] }}" 
                                                value="{{ $item->value }}">
                                            <div class="input-group-append">
                                              <button class="btn btn-outline-secondary btn-choose-file" type="button" >Button</button>
                                            </div>
                                          </div>
                                          
                                    </div>
                                @elseif($item->name == 'brand_address')
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="{{ $item->name }}"
                                            class="control-label">{{ $arrLabel[$item->name] }}</label>
                                        <textarea id="{{ $item->name }}" name="{{ $item->name }}" placeholder="{{ $arrPlaceholder[$item->name] }}"
                                            rows="1" class="form-control" value="{{ $item->value }}">{{ $item->value }}</textarea>
                                    </div>
                                @else
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="{{ $item->name }}"
                                            class="control-label">{{ $arrLabel[$item->name] }}</label>
                                        <input id="{{ $item->name }}" name="{{ $item->name }}"
                                            placeholder="{{ $arrPlaceholder[$item->name] }}" class="form-control"
                                            value="{{ $item->value }}" />
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
            <button type="reset" class="btn btn-default"><i class="fa fa-undo"></i> Nhập lại</button>
        </div>
    </form>
    <x-slot name="script">
        <script src="{{ asset('js/admin/webconfig/index.js') }}"></script>
    </x-slot>
</x-admin-layout>
