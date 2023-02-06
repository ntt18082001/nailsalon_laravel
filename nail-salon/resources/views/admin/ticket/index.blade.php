<x-admin-layout title="List ticket">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="fit">#</th>
                    <th scope="col">Customer name</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Start time</th>
                    <th scope="col">End time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->cus_name }}</td>
                        <td>{{ $item->cus_phone }}</td>
                        <td>{{ $item->total }} €</td>
                        <td>
                            @if ($item->status_id == 1)
                                <span
                                    class="badge border border-dark text-dark status-{{ $item->id }}">{{ $item->status->name }}</span>
                            @elseif ($item->status_id == 2)
                                <span
                                    class="badge border bg-success status-{{ $item->id }}">{{ $item->status->name }}</span>
                            @elseif ($item->status_id == 3)
                                <span
                                    class="badge border bg-dark status-{{ $item->id }}">{{ $item->status->name }}</span>
                            @elseif ($item->status_id == 4)
                                <span
                                    class="badge border bg-dark status-{{ $item->id }}">{{ $item->status->name }}</span>
                            @endif
                        </td>
                        <td>{{ date('d-m-Y H:i:s', $item->start_at / 1000) }}</td>
                        <td>
                            @if (isset($item->end_at))
                                {{ date('d-m-Y H:i:s', $item->end_at / 1000) }}
                            @endif
                        </td>
                        @php
                            $now = Carbon\Carbon::now();
                            $date_now = strtotime($now->addMinute((int) $time_cancel)) * 1000;
                            $datetime_now = Carbon\Carbon::parse(date('d-m-Y H:i:s', $date_now / 1000));
                            $date_book = Carbon\Carbon::parse(date('d-m-Y H:i:s', $item->start_at / 1000));
                            $invisible = 'invisible';
                        @endphp
                        <td class="fit">
                            @if ($item->status_id == 1)
                                @if ($datetime_now->lessThan($date_book))
                                    @php
                                        $invisible = "";
                                    @endphp
                                @endif
                                <button type="button" data-order-id={{ $item->id }}
                                    data-status-id={{ $item->status_id }}
                                    class="btn btn-primary btn-update-status btn-status{{ $item->id }} {{$invisible}}"
                                    data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                    Edit
                                </button>
                            @else
                                <button type="button" data-order-id={{ $item->id }}
                                    data-status-id={{ $item->status_id }}
                                    class="btn btn-primary btn-update-status btn-status{{ $item->id }} invisible"
                                    data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                    Edit
                                </button>
                            @endif
                            <a href="{{ route('admin.ticket.detail', ['id' => $item->id]) }}" class="btn btn-info">
                                Detail
                            </a>
                            <a href=" {{ route('admin.ticket.delete', ['id' => $item->id]) }}" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $data->links() }}
    </div>
    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
        aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Update status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <x-mst-select name="service_cate_id" label="Status" table="ticket_statuses"
                        displayColumn="name" />
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-submit-status">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('noti-aweasome/css/style.css') }}">
        </link>
        <script src="{{ asset('noti-aweasome/js/index.var.js') }}"></script>
    </x-slot>
    <x-slot name="script">
        <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>

        <script src="{{ asset('js/admin/ticket/ticket.js') }}"></script>
    </x-slot>
</x-admin-layout>
