<x-client-layout title="Homepage">
    @php
        $success = session()->get('successMsg');
    @endphp
    @if (isset($success))
        <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ $success }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    <x-slider-component />

    <!-- SERVICES-2
   ============================================= -->
    <section id="services-2" class="wide-70 services-section division">
        <div class="container">
            <!-- SERVICES-2 WRAPPER -->
            <div class="sbox-2-wrapper text-center">
                <div class="row row-cols-1 row-cols-md-3">
                    <!-- SERVICES BOX #1 -->
                    <div class="col">
                        <div id="sb-2-1" class="sbox-2 mb-40 wow fadeInUp" data-wow-delay="0.3s">
                            <!-- Icon -->
                            <div class="sbox-ico ico-95 black--color">
                                <span class="flaticon-pedicure-1"></span>
                            </div>
                            <!-- Title -->
                            <h5 class="h5-lg">Nail Care</h5>
                        </div>
                    </div>

                    <!-- SERVICES BOX #2 -->
                    <div class="col">
                        <div id="sb-2-2" class="sbox-2 mb-40 wow fadeInUp" data-wow-delay="0.6s">
                            <!-- Icon -->
                            <div class="sbox-ico ico-95 black--color">
                                <span class="flaticon-nail-polish-3"></span>

                            </div>
                            <!-- Title -->
                            <h5 class="h5-lg">Nail Art</h5>
                        </div>
                    </div>


                    <!-- SERVICES BOX #3 -->
                    <div class="col">
                        <div id="sb-2-3" class="sbox-2 mb-40 wow fadeInUp" data-wow-delay="0.9s">
                            <!-- Icon -->
                            <div class="sbox-ico ico-95 black--color">
                                <span class="flaticon-soak"></span>
                            </div>
                            <!-- Title -->
                            <h5 class="h5-lg">Beauté des pied</h5>
                        </div>
                    </div>
                </div> <!-- End row -->
            </div> <!-- END SERVICES-2 WRAPPER -->
        </div> <!-- End container -->
    </section> <!-- END SERVICES-2 -->

    <!-- ABOUT-3
============================================= -->
    <section id="about-3" class="pb-100 about-section division">
        <div class="container">
            <div class="row d-flex align-items-center">
                <!-- TEXT BLOCK -->
                <div class="col-md-7 col-lg-6">
                    <div class="txt-block left-column wow fadeInRight">
                        <!-- Section ID -->
                        <div class="section-id">Get Your Shine On</div>
                        <x-web-config displayData='about' />
                    </div>
                </div>

                <!-- IMAGE BLOCK -->
                <div class="col-md-5 col-lg-6">
                    <div class="img-block right-column wow fadeInLeft">
                        @php
                            $about_img = App\Models\WebConfigs::where('name', '=', 'about_img')->get();
                            $about_imgPath = $about_img[0]->value;
                        @endphp
                        <img class="img-fluid" src="{{"storage/webconfig/$about_imgPath"}}"
                            alt="about-image" />
                    </div>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
    <!-- END ABOUT-3 -->
    <x-nail-service-component />
    <x-gallery-component />
</x-client-layout>
