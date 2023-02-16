<footer id="footer-2" class="footer division">
    <div class="container">
        <!-- FOOTER CONTENT -->
        <div class="row">
            <!-- FOOTER NEWSLETTER FORM -->
            <div class="col-md-5">
                <div class="footer-form mb-40">
                    <!-- Title -->
                    <h5 class="h5-lg">Newsletters</h5>

                    <!-- Newsletter Form Input -->
                    <form method="POST" action="{{ route('client.subscriber.save') }}" class="newsletter-form mt-30">
                        @csrf
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Email Address" required
                                id="s-email" name="email" />
                            <span class="input-group-btn ico-15">
                                <button type="submit" class="btn rose--btn black--hover">
                                    Subscribe
                                </button>
                            </span>
                        </div>
                        <!-- Newsletter Form Notification -->
                        <label for="s-email" class="form-notification"></label>
                    </form>
                </div>
            </div>
            <!-- END FOOTER NEWSLETTER FORM -->

            <!-- FOOTER CONTACTS -->
            <div class="col-md-7">
                <div class="row">
                    <!-- FOOTER CONTACTS -->
                    <div class="col-sm-8 col-md-9">
                        <div class="footer-contacts mb-40">
                            <!-- Title -->
                            <h5 class="h5-lg">Info</h5>

                            <!-- Address -->
                            <p class="p-lg">
                                <x-web-config displayData="brand_address" />
                            </p>

                            <!-- Email -->
                            <p class="p-lg mt-5">
                                <a href='mailto:<x-web-config displayData="brand_email" />' class="txt-600">
                                    <x-web-config displayData="brand_email" />
                                </a>
                            </p>

                            <!-- Phone -->
                            <h4 class="h4-sm txt-700">
                                <span class="rose--color">
                                    <x-web-config displayData="brand_phone" />
                                </span>
                            </h4>

                            <!-- Working Hours -->
                            <p class="p-lg">Mon-Saturday: 10AM - 6PM</p>
                        </div>
                    </div>
                    <!-- END FOOTER CONTACTS -->

                    <!-- FOOTER LINKS -->
                    <div class="col-sm-4 col-md-3">
                        <div class="footer-links mb-40">
                            <!-- Title -->
                            <h5 class="h5-lg">Social</h5>

                            <!-- Footer Links -->
                            <ul class="foo-links clearfix">
                                @php
                                    $ins = App\Models\WebConfigs::where('name', '=', 'instagram')->get();
                                @endphp
                                @if (!empty($ins[0]->value))
                                    <li>
                                        <p class="p-lg"><a
                                                href="{{$ins[0]->value}}">Instagram</a>
                                        </p>
                                    </li>
                                @endif
                                <li>
                                    <p class="p-lg"><a href="<x-web-config displayData='facebook' />">Facebook</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END FOOTER LINKS -->
                </div>
            </div>
        </div>
        <!-- END FOOTER CONTENT -->
    </div>
    <!-- End container -->
</footer>
<!-- END FOOTER-2 -->
