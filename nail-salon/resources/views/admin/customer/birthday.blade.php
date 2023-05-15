<x-admin-layout title="Customer's birthday">
  <x-slot name="header">
      <link rel="stylesheet" href="{{ asset('lib/vanilla-calendar/vanilla-calendar.min.css') }}">
      <link rel="stylesheet" href="{{ asset('lib/vanilla-calendar/themes/dark.min.css') }}">
      <link rel="stylesheet" href="{{ asset('lib/vanilla-calendar/themes/light.min.css') }}">
  </x-slot>
  <div class="row">
    <div id="calendar" class="calendar-nail"></div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="birthday-modal" tabindex="-1" role="dialog" aria-labelledby="birthday-modal-label"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="birthday-modal-label">Danh sách khách hàng</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>Tên</th>
                                  <th class="fit">Ngày sinh</th>
                              </tr>
                          </thead>
                          <tbody class="tbody-table">
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <x-slot name="script">
      <script src="{{ asset('lib/unpkg/axios.min.js') }}"></script>
      <script src="{{ asset('lib/vanilla-calendar/vanilla-calendar.min.js') }}"></script>
      <script src="{{ asset('js/admin/customer/index.js') }}"></script>
  </x-slot>
</x-admin-layout>
