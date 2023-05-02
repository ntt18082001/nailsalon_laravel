<x-admin-layout title="Web config">
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
            'logo' => 'Logo image',
            'brand_name' => 'Brand name',
            'brand_phone' => 'Phone number',
            'brand_address' => 'Address',
            'brand_email' => 'Email',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'time_cancel' => 'Time cancel booking (minutes)',
            'list_mail_reciver' => 'List mail reciver booking',
            'disabled_date' => 'Disabled date',
            'sms_content' => 'SMS content'
        ];
        $arrPlaceholder = [
            'logo' => 'Path logo...',
            'brand_name' => 'Enter brand name...',
            'brand_phone' => 'Enter phone number...',
            'brand_address' => 'Enter address...',
            'brand_email' => 'Enter email...',
            'facebook' => 'Path facebook...',
            'instagram' => 'Path instagram...',
            'time_cancel' => '',
            'list_mail_reciver' => 'List mail reciver booking',
            'disabled_date' => 'Disabled date',
            'sms_content' => 'SMS content',
        ];
    @endphp

    <form action="{{ route('admin.config.save') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
        @csrf
        <div asp-validation-summary="ModelOnly" class="text-danger"></div>
        <div class="form-group">
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Information</h3>
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
                                @elseif($item->name == 'brand_address' || $item->name == 'sms_content')
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="{{ $item->name }}"
                                            class="control-label">{{ $arrLabel[$item->name] }}</label>
                                        <textarea id="{{ $item->name }}" name="{{ $item->name }}" placeholder="{{ $arrPlaceholder[$item->name] }}"
                                            rows="2" class="form-control" value="{{ $item->value }}">{{ $item->value }}</textarea>
                                    </div>
                                @elseif($item->name == 'disabled_date')
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="{{ $item->name }}"
                                            class="control-label">{{ $arrLabel[$item->name] }}</label>
                                        <input id="{{ $item->name }}" name="{{ $item->name }}" placeholder="{{ $arrPlaceholder[$item->name] }}" type="date" class="form-control" value="{{ $item->value }}"/>
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
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Submit</button>
            <button type="reset" class="btn btn-default"><i class="fa fa-undo"></i>Reset</button>
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
