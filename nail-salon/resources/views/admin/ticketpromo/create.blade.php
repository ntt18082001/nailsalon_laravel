<x-admin-layout title="Create ticket">
    <form action="{{ route('admin.ticketpromo.createsave') }}" method="post" autocomplete="off">
        @csrf
        <div class="col-md-6">
            <x-input name="name" type="text" placeholder="" label="Fullname" required />
            <x-input name="phone_number" placeholder="Số điện thoại" label="Phone number" required />
            <x-input name="email" placeholder="Email" label="Email" />
            <x-textarea name="note" label="Note" />
            <div class="mt-3 mb-3">
                <label class="form-label d-block">Ticket check no.</label>
                @php
                    $defaultcheck = config('defaultchecket');
                @endphp
                @for ($i = 0; $i < $defaultcheck; $i++)
                    <!-- Inline Checkbox -->
                    <div class="form-check form-check-inline">
                        <label class="form-check-label"
                            for="inlineCheckbox{{$i}}">.{{ $i + 1 }}</label>
                        <input class="form-check-input checkbox" type="checkbox" data-index="{{$i}}" id="inlineCheckbox{{$i}}"
                            value="{{$i}}" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" >
                        <input type="hidden" name="ticket_detail[{{$i}}]">
                    </div>
                @endfor
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('admin.ticketpromo.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
    <!-- Varying modal content -->
    <div class="modal fade" id="varyingcontentModal" tabindex="-1" aria-labelledby="varyingcontentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingcontentModalLabel">Select date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Checked date</label>
                        <input type="date" class="form-control" id="checked_date" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary submit">Submit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
        <script src="{{ asset('js/admin/ticketpromo/index.js') }}"></script>
    </x-slot>
</x-admin-layout>
