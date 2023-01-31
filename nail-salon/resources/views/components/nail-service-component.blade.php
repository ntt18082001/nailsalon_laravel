<section id="pricing-6" class="bg--tra-img wide-70 pricing-section division">
    <div class="container">
        <!-- PRICING-6 WRAPPER -->
        <div class="pricing-6-wrapper">
            <div class="row">
                @php
                    $i = 0;
                @endphp
                @foreach ($data as $item)
                    <div class="col-lg-6">
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
                                            <p class="p-md"><em>Service length {{ $child->duration }} minutes</em></p>
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
                    <p class="tra-link"><a href="{{ route('client.pricing.index') }}">View All Prices</a></p>
                </div>
            </div>
        </div> <!-- END BUTTON -->


    </div> <!-- End container -->
</section> <!-- END PRICING-6 -->
