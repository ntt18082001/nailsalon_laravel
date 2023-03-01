<x-client-layout title="Booking">
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
    </x-slot>
    @php
        $date = App\Models\WebConfigs::where('name', '=', 'disabled_date')->get();
    @endphp
    <input hidden id="disabled_date" type="date" value="{{ $date[0]->value }}" />
    <!-- PAGE HERO
   ============================================= -->
    <section id="booking-page" class="bg-fixed page-hero-section division">
        <div class="container">
            <!-- PAGE HERO TEXT -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-xl-8">
                    <div class="hero-txt text-center white--color">
                        <h2 class="h2-xl">Prendre Rendez-vous</h2>
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
                                    <li class="breadcrumb-item active" aria-current="page">Prendre</li>
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
                            <h5 class="h5-lg">Beauté des pied</h5>
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
                            <!-- Title -->
                            <h4 class="h4-xl">Prendre Rendez-vous</h4>
                            <!-- Booking Form -->
                            <form action="{{ route('client.booking.save') }}" method="POST" class="row booking-form" id="booking-form"
                                autocomplete="off">
                                @csrf
                                <!-- Form Input -->
                                <div class="col-md-12">
                                    <input type="text" name="cus_name" class="form-control firstname"
                                        placeholder="Name*" required>
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
                                <div class="mb-20">
                                    <button type="button" class="btn"
                                        style="color: #000; padding-left: 0;"data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">+ Add new service</button>
                                </div>
                                <ul class="list-service">
                                </ul>
                                <div class="col-md-12">
                                    <x-mst-select-branch name="branch" />
                                </div>
                                <!-- Form Input -->
                                <div class="col-md-12">
                                    <input id="datetimepicker" type="text" name="start_at"
                                        class="form-control date" placeholder="Appointment Date*" required readonly>
                                </div>
                                <div class="col-md-12">
                                    <textarea type="text" name="cus_note" class="form-control" placeholder="Note" style="padding: 10px 12px;"
                                        rows="3"></textarea>
                                </div>
                                <!-- Form Button -->
                                <div class="col-md-12 mt-10 text-end">
                                    <button type="submit" class="btn rose--btn">Réservez</button>
                                </div>
                            </form> <!-- End Booking Form -->

                        </div>
                    </div>
                </div> <!-- END BOOKING-1 WRAPPER -->
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END BOOKING-1 -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select a service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Select -->
                    <div class="col-md-12 js-service-row">
                        <label class="mb-10" for="service_id">Select service</label>
                        <x-mst-select-client name="service_id" table="nail_services" displayColumn="name" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary bg-primary btn-add-service">Save</button>
                    <button type="button" class="btn btn-secondary bg-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
                        <h2 class="h2-lg">Avis Client</h2>

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
    <x-slot name="script">
        <script src="{{ asset('js/chosen.jquery.js') }}"></script>
        <script>
            $(".chosen-select").chosen();
            $(".chosen-container").css({
                'width': '100%'
            });
        </script>
    </x-slot>
</x-client-layout>
