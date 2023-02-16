<x-client-layout title="Login">
    <section id="booking-1" class="booking-section division mt-100">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <!-- BOOKING-1 WRAPPER -->
                <div class="col-md-6 col-lg-6">
                    <div class="p-4 bg--alice-blue">
                        <div class="form-holder">
                            <!-- Section ID -->
                            <!-- Title -->
                            <h4 class="h4-xl text-center">Login</h4>
                            <!-- Booking Form -->
                            @if (session('login-err-msg'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('login-err-msg') }}
                                </div>
                            @endif
                            <form action="{{ route('client.account.auth') }}" method="POST" class="row booking-form"
                                autocomplete="off">
                                @csrf
                                <!-- Form Input -->
                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control email"
                                        placeholder="Email Address*" required>
                                </div>
                                <!-- Form Input -->
                                <div class="col-md-12">
                                    <input type="password" name="password" class="form-control phone"
                                        placeholder="Password*" required>
                                </div>
                                <!-- Form Button -->
                                <div class="col-md-12 mt-10 text-end">
                                    <button type="submit" class="btn rose--btn">Login</button>
                                </div>
                                <div class="col-md-12 mt-10 text-end">
                                    <a href="{{route('client.account.register')}}" style="text-decoration: underline">Register</a>
                                </div>
                            </form> <!-- End Booking Form -->
                        </div>
                    </div>
                </div> <!-- END BOOKING-1 WRAPPER -->
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END BOOKING-1 -->
</x-client-layout>
