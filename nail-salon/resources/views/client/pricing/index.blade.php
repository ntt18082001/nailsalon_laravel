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
                                                <p class="p-md"><em>Service length {{ $child->duration }} minutes</em>
                                                </p>
                                            </div>
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
                        <h2 class="h2-lg">What People Are Saying</h2>

                    </div>
                </div>
            </div>


            <!-- TESTIMONIALS CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme reviews-wrapper">


                        <!-- TESTIMONIAL #1 -->
                        <div class="review-1">

                            <!-- Quote Icon -->
                            <div class="quote-icon ico-80 black--color"><span class="flaticon-left-quote"></span>
                            </div>

                            <!-- Text -->
                            <p class="p-xl">&Prime;Etiam sapien sagittis congue an augue massa varius egestas
                                suscipit magna a tempus
                                and aliquet rutrum magna &Prime;
                            </p>

                            <!-- Testimonial Author -->
                            <span class="testimonial-autor black--color">&mdash; Rachel A.</span>

                        </div> <!-- END TESTIMONIAL #1 -->


                        <!-- TESTIMONIAL #2 -->
                        <div class="review-1">

                            <!-- Quote Icon -->
                            <div class="quote-icon ico-80 black--color"><span class="flaticon-left-quote"></span>
                            </div>

                            <!-- Text -->
                            <p class="p-xl">&Prime;At sagittis congue augue undo egestas magna ipsum vitae purus
                                primis suscipit and
                                blandit a cursus molestie at quisque sapien and integer congue magna&Prime;
                            </p>

                            <!-- Testimonial Author -->
                            <span class="testimonial-autor black--color">&mdash; Wendy T.</span>

                        </div> <!-- END TESTIMONIAL #2 -->


                        <!-- TESTIMONIAL #3 -->
                        <div class="review-1">

                            <!-- Quote Icon -->
                            <div class="quote-icon ico-80 black--color"><span class="flaticon-left-quote"></span>
                            </div>

                            <!-- Text -->
                            <p class="p-xl">&Prime;Mauris donec ociis magnis sapien etiam sapien congue augue pretium
                                and ligula augue
                                a lectus magna suscipit egestas a vitae purus integer congue&Prime;
                            </p>

                            <!-- Testimonial Author -->
                            <span class="testimonial-autor black--color">&mdash; Grace L.</span>

                        </div> <!-- END TESTIMONIAL #3 -->


                        <!-- TESTIMONIAL #4 -->
                        <div class="review-1">

                            <!-- Quote Icon -->
                            <div class="quote-icon ico-80 black--color"><span class="flaticon-left-quote"></span>
                            </div>

                            <!-- Text -->
                            <p class="p-xl">&Prime;An augue in cubilia laoreet magna and suscipit egestas magna ipsum
                                purus an ipsum
                                undo suscipit gravida donec and pretium ipsum porta integer&Prime;
                            </p>

                            <!-- Testimonial Author -->
                            <span class="testimonial-autor black--color">&mdash; Michelle Boxer</span>

                        </div> <!-- END TESTIMONIAL #4 -->


                        <!-- TESTIMONIAL #5 -->
                        <div class="review-1">

                            <!-- Quote Icon -->
                            <div class="quote-icon ico-80 black--color"><span class="flaticon-left-quote"></span>
                            </div>

                            <!-- Text -->
                            <p class="p-xl">&Prime;Mauris donec magnis a sapien etiam sapien and congue augue egestas
                                ultrice vitae
                                purus velna integer tempor congue egestas a vitae purus&Prime;
                            </p>

                            <!-- Testimonial Author -->
                            <span class="testimonial-autor black--color">&mdash; Kelley Baker</span>

                        </div> <!-- END TESTIMONIAL #5 -->


                        <!-- TESTIMONIAL #6 -->
                        <div class="review-1">

                            <!-- Quote Icon -->
                            <div class="quote-icon ico-80 black--color"><span class="flaticon-left-quote"></span>
                            </div>

                            <!-- Text -->
                            <p class="p-xl">&Prime;An augue cubilia laoreet magna sapien suscipit undo egestas magna
                                ipsum ligula
                                vitae a purus cubilia a blandit and auctor integer congue magna undo justo purus pretium
                                ligula
                                efficitur ipsum&Prime;
                            </p>

                            <!-- Testimonial Author -->
                            <span class="testimonial-autor black--color">&mdash; Sarah D.</span>

                        </div> <!-- END TESTIMONIAL #6 -->


                        <!-- TESTIMONIAL #7 -->
                        <div class="review-1">

                            <!-- Quote Icon -->
                            <div class="quote-icon ico-80 black--color"><span class="flaticon-left-quote"></span>
                            </div>

                            <!-- Text -->
                            <p class="p-xl">&Prime;Augue egestas volutpat undo egestas augue in cubilia laoreet magna
                                at primis libero
                                undo suscipit luctus congue magna undo purus pretium ligula rutrum&Prime;
                            </p>

                            <!-- Testimonial Author -->
                            <span class="testimonial-autor black--color">&mdash; Nicole Byer</span>

                        </div> <!-- END TESTIMONIAL #7 -->


                        <!-- TESTIMONIAL #8 -->
                        <div class="review-1">

                            <!-- Quote Icon -->
                            <div class="quote-icon ico-80 black--color"><span class="flaticon-left-quote"></span>
                            </div>

                            <!-- Text -->
                            <p class="p-xl">&Prime;Aliquam augue a suscipit luctus neque purus ipsum neque dolor
                                primis libero at tempus
                                blandit posuere magna sagittis congue augue magna risus mauris and volutpat and
                                egestas&Prime;
                            </p>

                            <!-- Testimonial Author -->
                            <span class="testimonial-autor black--color">&mdash; AJ</span>

                        </div> <!-- END TESTIMONIAL #8 -->


                    </div>
                </div>
            </div> <!-- END TESTIMONIALS CONTENT -->


        </div> <!-- End container -->
    </section> <!-- END TESTIMONIALS-1 -->
</x-client-layout>
