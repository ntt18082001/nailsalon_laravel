<x-admin-layout title="Thông tin cửa hàng">
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('lib/tagify/tagify.css') }}" />
        <style>
            .tagify {
                height: 45px;
            }

            .tagify__tag {
                bottom: -2px;
                left: 3px;
            }
        </style>
    </x-slot>

    @php
        $arrLabel = [
            'logo' => 'Hình ảnh logo',
            'brand_name' => 'Tên thương hiệu',
            'brand_phone' => 'Số điện thoại',
            'brand_address' => 'Địa chỉ',
            'brand_email' => 'Email',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'time_cancel' => 'Thời gian hủy đặt lịch (Phút)',
            'mail_reciver' => 'Mail nhận thông báo đặt lịch',
            'list_mail_reciver' => 'Danh sách mail nhận thông báo đặt lịch',
        ];
        $arrPlaceholder = [
            'logo' => 'Đường dẫn logo...',
            'brand_name' => 'Nhập tên thương hiệu...',
            'brand_phone' => 'Nhập số điện thoại...',
            'brand_address' => 'Nhập địa chỉ...',
            'brand_email' => 'Nhập email...',
            'facebook' => 'Đường dẫn facebook...',
            'instagram' => 'Đường dẫn instagram...',
            'time_cancel' => '',
            'mail_reciver' => 'Mail nhận thông báo...',
            'list_mail_reciver' => 'Danh sách mail nhận thông báo',
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
                                            <input hidden id="{{ $item->name }}" name="{{ $item->name }}"
                                                type="file" placeholder="{{ $arrPlaceholder[$item->name] }}"
                                                class="form-control" value="{{ $item->value }}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control input-value-logo" readonly
                                                placeholder="{{ $arrPlaceholder[$item->name] }}"
                                                value="{{ $item->value }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary btn-choose-file"
                                                    type="button">Button</button>
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
                                @elseif($item->name == 'time_cancel')
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="{{ $item->name }}"
                                            class="control-label">{{ $arrLabel[$item->name] }}</label>
                                        <input id="{{ $item->name }}" name="{{ $item->name }}"
                                            placeholder="{{ $arrPlaceholder[$item->name] }}" class="form-control"
                                            value="{{ $item->value }}" type="number" />
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
        <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
        <script src="{{ asset('js/admin/webconfig/index.js') }}"></script>
        <script src="{{ asset('lib/tagify/tagify.js') }}"></script>
        <script src="{{ asset('lib/tagify/tagify.polyfills.min.js') }}"></script>
        <script>
            var input = document.querySelector('input[name=list_mail_reciver]');
            new Tagify(input)
            var tagStr = $("#list_mail_reciver").tagify('serialize');
        </script>
    </x-slot>
</x-admin-layout>
