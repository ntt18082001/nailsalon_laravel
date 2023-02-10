<x-client-layout title="Change password">
    @php
        $user = Auth::user();
    @endphp
    <section id="booking-1" class="booking-section division mt-100">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <!-- BOOKING-1 WRAPPER -->
                <div class="col-md-6 col-lg-6">
                    <div class="booking-1-wrapper bg--alice-blue">
                        <div class="form-holder">
                            @if (session('change-err'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('change-err') }}
                                </div>
                            @endif
                            @if (session('change-success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('change-success') }}
                                </div>
                            @endif
                            <!-- Section ID -->
                            <!-- Title -->
                            <h4 class="h4-xl text-center">Change password</h4>
                            <!-- Booking Form -->
                            <form action="{{ route('client.account.savechangepassword', ['id' => $user->id]) }}"
                                method="POST" class="row booking-form" autocomplete="off">
                                @csrf
                                <!-- Form Input -->
                                <div class="col-md-12 mb-20">
                                    @php
                                        $_old_value = old('password');
                                        $_value = empty($_old_value) ? '' : $_old_value;
                                    @endphp
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Old password*" required value="{{ $_value }}">
                                    @error('password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    @php
                                        $_old_value = old('newPassword');
                                        $_value = empty($_old_value) ? '' : $_old_value;
                                    @endphp
                                    <input type="password" name="newPassword" class="form-control"
                                        placeholder="New password*" required value="{{ $_value }}">
                                    @error('newPassword')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    @php
                                        $_old_value = old('confirmPassword');
                                        $_value = empty($_old_value) ? '' : $_old_value;
                                    @endphp
                                    <input type="password" name="confirmPassword" class="form-control"
                                        placeholder="Confirm password*" required value="{{ $_value }}">
                                    @error('confirmPassword')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!-- Form Button -->
                                <div class="col-md-12 mt-10 text-end">
                                    <button type="submit" class="btn rose--btn">Submit</button>
                                </div>
                            </form> <!-- End Booking Form -->
                        </div>
                    </div>
                </div> <!-- END BOOKING-1 WRAPPER -->
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END BOOKING-1 -->
</x-client-layout>
