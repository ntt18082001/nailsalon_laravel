<x-client-layout title="Pricing">
    <!-- PAGE HERO
   ============================================= -->
    <section id="pricing-page" class="bg-fixed page-hero-section division">
        <div class="container">
            <!-- PAGE HERO TEXT -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-xl-8">
                    <div class="hero-txt text-center white--color">
                        <h2 class="h2-xl">Services & Pricing</h2>
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
                                    <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> <!-- END BREADCRUMB -->
        </div> <!-- End container -->
    </section> <!-- END PAGE HERO -->

    <!-- PRICING-6
   ============================================= -->
    <section id="pricing-6" class="bg--tra-img wide-70 pricing-section division">
        <div class="container">
            <!-- PRICING-6 WRAPPER -->
            <div class="pricing-6-wrapper">
                <div class="row">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($data as $item)
                        <div class="col-lg-6 mb-50">
                            <div class="pricing-6-table pr-25 wow fadeInUp">
                                <!-- Title -->
                                <h5 class="h5-xl pricing-title">
                                    {{ isset($item->name) ? $item->name : '' }}
                                </h5>
                                <!-- PRICING LIST -->
                                <ul class="pricing-6-list">
                                    @foreach ($data_childs[$i] as $child)
                                        <!-- PRICING ITEM #1 -->
                                        <li class="pricing-6-item">
                                            <!-- Title & Price -->
                                            <a href="{{ route('client.pricing.detail', ['id' => $item->id]) }}">
                                                <div class="detail-price">
                                                    <div class="price-name">
                                                        <h5 class="h5-lg">{{ $child->name }}</h5>
                                                    </div>
                                                    <div class="price-dots"></div>
                                                    <div class="price-number">
                                                        <h5 class="h5-lg">{{ $child->price_couleur }} €</h5>
                                                    </div>
                                                </div>
                                                <!-- Description -->
                                                <div class="price-txt">
                                                    <p class="p-md"><em>Service length {{ $child->duration }}
                                                            minutes</em>
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul> <!-- END PRICING LIST -->
                            </div>
                        </div> <!-- END pricing-6 TABLE -->
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div> <!-- End row -->
            </div> <!-- END PRICING-6 WRAPPER -->

            <!-- BUTTON -->
            <div class="row">
                <div class="col">
                    <div class="more-btn mt-50">
                        <p class="tra-link"><a href="{{ route('client.booking.index') }}">Booking now</a></p>
                    </div>
                </div>
            </div> <!-- END BUTTON -->
        </div> <!-- End container -->
    </section> <!-- END PRICING-6 -->

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
</x-client-layout>
