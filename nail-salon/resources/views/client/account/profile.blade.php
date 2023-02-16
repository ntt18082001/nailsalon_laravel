<x-client-layout title="Profile">
    <x-slot name="header">
        <style>
            @media only screen and (max-width: 640px) {

                thead,
                .id_tbl {
                    display: none;
                }

                td {
                    white-space: nowrap;
                }
            }

            @media only screen and (max-width: 768px) {

                thead,
                .id_tbl {
                    display: none;
                }

                td {
                    white-space: nowrap;
                    display: block;
                }
            }
        </style>
    </x-slot>
    <div class="container wide-100">
        <div class="row">
            <div class="col-md-9">
                <h4>Réservez history</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="fit">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone number</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Start time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="id_tbl">{{ $item->id }}</td>
                                    <td>{{ $item->cus_name }}</td>
                                    <td>{{ $item->cus_email }}</td>
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
                                    @php
                                        $now = Carbon\Carbon::now();
                                        $date_now = strtotime($now->addMinute((int) $time_cancel)) * 1000;
                                        $datetime_now = Carbon\Carbon::parse(date('d-m-Y H:i:s', $date_now / 1000));
                                        $date_book = Carbon\Carbon::parse(date('d-m-Y H:i:s', $item->start_at / 1000));
                                    @endphp
                                    @if ($item->status_id == 1)
                                        @if ($datetime_now->lessThan($date_book))
                                            <td class="fit">
                                                <a href="{{ route('client.booking.cancel_appoinment', ['id' => $item->id]) }}"
                                                    class="btn-danger" style="padding: 5px 5px">
                                                    Cancel
                                                </a>
                                            </td>
                                        @endif
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4>Your profile</h4>
                <p>
                    Email: {{ $user->email }}
                </p>
            </div>
        </div>
    </div>
</x-client-layout>
