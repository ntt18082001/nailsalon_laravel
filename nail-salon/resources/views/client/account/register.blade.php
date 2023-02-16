<x-client-layout title="Register">
    <section id="booking-1" class="booking-section division mt-100">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <!-- BOOKING-1 WRAPPER -->
                <div class="col-md-6 col-lg-6">
                    <div class="p-4 bg--alice-blue">
                        <div class="form-holder">
                            <!-- Section ID -->
                            <!-- Title -->
                            <h4 class="h4-xl text-center">Register</h4>
                            <!-- Booking Form -->
                            <form action="{{ route('client.account.save') }}" method="POST" class="row booking-form"
                                autocomplete="off">
                                @csrf
                                <!-- Form Input -->
                                <div class="col-md-12 mb-20">
                                    @php
                                        $_old_value = old('name');
                                        $_value = empty($_old_value) ? "" : $_old_value;
                                    @endphp
                                    <input type="text" name="name" class="form-control" placeholder="Fullname*"
                                        required value="{{$_value}}">
                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    @php
                                        $_old_value = old('username');
                                        $_value = empty($_old_value) ? "" : $_old_value;
                                    @endphp
                                    <input type="text" name="username" class="form-control" placeholder="Username*"
                                        required value="{{$_value}}">
                                    @error('username')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    @php
                                        $_old_value = old('email');
                                        $_value = empty($_old_value) ? "" : $_old_value;
                                    @endphp
                                    <input type="email" name="email" class="form-control email"
                                        placeholder="Email Address*" required value="{{$_value}}">
                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    @php
                                        $_old_value = old('phone_number');
                                        $_value = empty($_old_value) ? "" : $_old_value;
                                    @endphp
                                    <input type="text" name="phone_number" class="form-control"
                                        placeholder="Phone number*" required value="{{$_value}}">
                                </div>
                                @error('phone_number')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <!-- Form Input -->
                                <div class="col-md-12 mb-20">
                                    @php
                                        $_old_value = old('password');
                                        $_value = empty($_old_value) ? "" : $_old_value;
                                    @endphp
                                    <input type="password" name="password" class="form-control phone"
                                        placeholder="Password*" required value="{{$_value}}">
                                    @error('password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-20">
                                    @php
                                        $_old_value = old('confirmPassword');
                                        $_value = empty($_old_value) ? "" : $_old_value;
                                    @endphp
                                    <input type="password" name="confirmPassword" class="form-control"
                                        placeholder="Confirm password" required value="{{$_value}}">
                                    @error('confirmPassword')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!-- Form Button -->
                                <div class="col-md-12 mt-10 text-end">
                                    <button type="submit" class="btn rose--btn">Register</button>
                                </div>
                                <div class="col-md-12 mt-10 text-end">
                                    <a href="{{ route('client.account.login') }}"
                                        style="text-decoration: underline">Login</a>
                                </div>
                            </form> <!-- End Booking Form -->
                        </div>
                    </div>
                </div> <!-- END BOOKING-1 WRAPPER -->
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END BOOKING-1 -->
</x-client-layout>
