<x-admin-layout title="Tickets promotion">
    <a href="{{ route('admin.ticketpromo.create') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus"></i>
        Create ticket
    </a>
    @php
        $cus_name = app('request')->input('cus_name');
        $cus_phone = app('request')->input('cus_phone');
    @endphp
    <div class="mb-4" id="Search">
        <div class="card mb-0">
            <div class="card-header">
                <h4>Search form</h4>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('admin.ticketpromo.index') }}">
                    <div class="row">
                        <div class="col-md-4">
                            <x-input name="cus_name" label="Fullname" value="{{ $cus_name }}" />
                        </div>
                        <div class="col-md-4">
                            <x-input name="cus_phone" label="Phone Number" value="{{ $cus_phone }}" />
                        </div>
                        <div class="col-md-12 mt-3">
                            <button id="btn-search" class="btn btn-primary ml-3 my-sm-0" type="submit">Search</button>
                            <a href="{{ route('admin.ticketpromo.index') }}" class="btn btn-success ml-3 my-sm-0">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col fit">Ticket no.</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Note</th>
                    <th class="fit">Ticket check no.</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->user_ticket_no }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>
                            @if (isset($item->note))
                                {{ $item->note }}
                            @endif
                        </td>
                        <td class="text-nowrap js-parent-{{ $item->id }}">
                            <ol class="list-check mb-0">
                                @foreach ($item->user_ticket_details as $item2)
                                    <!-- Inline Checkbox -->
                                    <li>
                                        <input class="form-check-input checkbox" onclick="return false;" type="checkbox"
                                            checked>
                                        <span
                                            class="badge text-bg-dark">{{ $item2->checkin_date->format('d-m-Y') }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        </td>
                        <td class="fit" style="vertical-align: bottom;">
                            @php
                                $invisible = count($item->user_ticket_details) == 10 ? "invisible" : "";
                            @endphp
                            <button type="button" data-check-id={{ $item->id }}
                                class="btn btn-primary btn-add-check {{$invisible}}" data-bs-toggle="modal"
                                data-bs-target="#exampleModalgrid">
                                Check
                            </button>
                            <a href=" {{ route('admin.ticketpromo.reset', ['id' => $item->id]) }}"
                                class="btn btn-warning">
                                Reset
                            </a>
                            <a href=" {{ route('admin.ticketpromo.delete', ['id' => $item->id]) }}"
                                class="btn btn-danger" onclick="return confirm('Confirm ticket promo deletion?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
        aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Add new check</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Checked date</label>
                        <input type="date" class="form-control" id="checked_date" />
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-submit">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        {{ $data->links() }}
    </div>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('noti-aweasome/css/style.css') }}">
        <script src="{{ asset('noti-aweasome/js/index.var.js') }}"></script>
    </x-slot>
    <x-slot name="script">
        <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
        <script src="{{ asset('js/admin/ticketpromo/addcheck.js') }}"></script>
    </x-slot>
</x-admin-layout>
