<x-client-layout title="Booking">

    <!-- PAGE HERO
   ============================================= -->
    <section id="booking-page" class="bg-fixed page-hero-section division">
        <div class="container">
            <!-- PAGE HERO TEXT -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-xl-8">
                    <div class="hero-txt text-center white--color">
                        <h2 class="h2-xl">Book An Appointment</h2>
                    </div>
                </div>
            </div>

            <!-- BREADCRUMB -->
            <div id="breadcrumb">
                <div class="row d-flex align-items-center">
                    <div class="col">
                        <div class="breadcrumb-nav">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Booking Online</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> <!-- END BREADCRUMB -->


        </div> <!-- End container -->
    </section> <!-- END PAGE HERO -->




    <!-- SERVICES-5
   ============================================= -->
    <section id="services-5" class="wide-100 services-section division">
        <div class="container">
            <!-- SERVICES-5 WRAPPER -->
            <div class="sbox-5-wrapper text-center">
                @php
                    $success = session()->get('successMsg');
                @endphp
                @if (isset($success))
                    <div class="alert alert-success alert-dismissible fade {{ isset($success) ? 'show' : '' }}"
                        role="alert">
                        <strong>{{ $success }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4">

                    <!-- SERVICES BOX #1 -->
                    <div class="col">
                        <div id="sb-5-1" class="sbox-5 wow fadeInUp" data-wow-delay="0.3s">

                            <!-- Icon -->
                            <div class="sbox-ico ico-80 black--color">
                                <span class="flaticon-pedicure-1"></span>
                            </div>

                            <!-- Title -->
                            <h5 class="h5-lg">Nail Care</h5>

                            <!-- Text -->
                            <p class="p-lg">Risus auctor ligula tempus and dolor vitae neque feugiat ligula suscipit
                                and risus mauri</p>

                        </div>
                    </div>


                    <!-- SERVICES BOX #2 -->
                    <div class="col">
                        <div id="sb-5-2" class="sbox-5 wow fadeInUp" data-wow-delay="0.6s">

                            <!-- Icon -->
                            <div class="sbox-ico ico-80 black--color">
                                <span class="flaticon-nail-polish-3"></span>
                            </div>

                            <!-- Title -->
                            <h5 class="h5-lg">Nail Art</h5>

                            <!-- Text -->
                            <p class="p-lg">Risus auctor ligula tempus and dolor vitae neque feugiat ligula suscipit
                                and risus mauri</p>

                        </div>
                    </div>


                    <!-- SERVICES BOX #3 -->
                    <div class="col">
                        <div id="sb-5-3" class="sbox-5 wow fadeInUp" data-wow-delay="0.9s">

                            <!-- Icon -->
                            <div class="sbox-ico ico-80 black--color">
                                <span class="flaticon-soak"></span>
                            </div>

                            <!-- Title -->
                            <h5 class="h5-lg">Add-Ons</h5>

                            <!-- Text -->
                            <p class="p-lg">Risus auctor ligula tempus and dolor vitae neque feugiat ligula suscipit
                                and risus mauri</p>

                        </div>
                    </div>


                    <!-- SERVICES BOX #4 -->
                    <div class="col">
                        <div id="sb-5-4" class="sbox-5 wow fadeInUp" data-wow-delay="1.2s">

                            <!-- Icon -->
                            <div class="sbox-ico ico-80 black--color">
                                <span class="flaticon-skincare"></span>
                            </div>

                            <!-- Title -->
                            <h5 class="h5-lg">Treatments</h5>

                            <!-- Text -->
                            <p class="p-lg">Risus auctor ligula tempus and dolor vitae neque feugiat ligula suscipit
                                and risus mauri</p>

                        </div>
                    </div>


                </div>
            </div> <!-- END SERVICES-5 BOXES -->


        </div> <!-- End container -->
    </section> <!-- END SERVICES-5 -->




    <!-- BOOKING-1
   ============================================= -->
    <section id="booking-1" class="booking-section division">
        <div class="container">
            <div class="row d-flex align-items-center">
                <!-- BOOKING-1 IMAGE -->
                <div class="col-md-5 col-lg-6">
                    <div class="booking-1-img">
                        <img class="img-fluid" src="{{ asset('client/images/booking/promo-06.jpg') }}"
                            alt="booking-image">
                    </div>
                </div>


                <!-- BOOKING-1 WRAPPER -->
                <div class="col-md-7 col-lg-6">
                    <div class="booking-1-wrapper bg--alice-blue">
                        <div class="form-holder">
                            <!-- Section ID -->
                            <span class="section-id">Booking Now</span>
                            <!-- Title -->
                            <h4 class="h4-xl">Make An Appointment</h4>
                            <!-- Booking Form -->
                            <form action="{{ route('client.booking.save') }}" method="POST" class="row booking-form"
                                autocomplete="off">
                                @csrf
                                <!-- Form Input -->
                                <div class="col-md-12">
                                    <input type="text" name="cus_name" class="form-control firstname"
                                        placeholder="Fullname*" required>
                                </div>
                                <!-- Form Input -->
                                <div class="col-md-12">
                                    <input type="email" name="cus_email" class="form-control email"
                                        placeholder="Email Address*" required>
                                </div>
                                <!-- Form Input -->
                                <div class="col-md-12">
                                    <input type="tel" name="cus_phone" class="form-control phone"
                                        placeholder="Phone Number*" required>
                                </div>
                                <!-- Form Select -->
                                <div class="col-md-12">
                                    <x-mst-select-client name="service_id" table="nail_services" displayColumn="name" />
                                </div>
                                <!-- Form Select -->
                                <div class="col-md-12">
                                    <x-mst-select-client name="employee_id" table="users" displayColumn="name" />
                                </div>
                                <!-- Form Input -->
                                <div class="col-md-12">
                                    <input id="datetimepicker" type="text" name="start_at"
                                        class="form-control date" placeholder="Appointment Date*" required>
                                </div>
                                <!-- Form Button -->
                                <div class="col-md-12 mt-10 text-end">
                                    <button type="submit" class="btn rose--btn">Book Now</button>
                                </div>
                            </form> <!-- End Booking Form -->

                        </div>
                    </div>
                </div> <!-- END BOOKING-1 WRAPPER -->
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END BOOKING-1 -->

    <!-- TESTIMONIALS-1
   ============================================= -->
    <section id="reviews-1" class="wide-100 reviews-section division">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="section-title title-01 mb-50">

                        <!-- Section ID -->
                        <span class="section-id">Testimonials</span>

                        <!-- Title -->
                        <h2 class="h2-lg">What People Are Saying</h2>

                    </div>
                </div>
            </div>


            <!-- TESTIMONIALS CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme reviews-wrapper">
                        <x-review-component />
                    </div>
                </div>
            </div> <!-- END TESTIMONIALS CONTENT -->


        </div> <!-- End container -->
    </section> <!-- END TESTIMONIALS-1 -->
</x-client-layout>
