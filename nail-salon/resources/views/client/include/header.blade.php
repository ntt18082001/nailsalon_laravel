<!-- HEADER
   ============================================= -->
<header id="header" class="header white-menu navbar-dark">
    <div class="header-wrapper">
        <!-- MOBILE HEADER -->
        <div class="wsmobileheader clearfix">
            <span class="smllogo"><img src="{{ asset('client/images/logo-01.png') }}" alt="mobile-logo" /></span>
            <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
            <a href="tel:<x-web-config displayData='brand_phone'/>" class="callusbtn ico-20"><span
                    class="flaticon-phone-call-1"></span></a>
        </div>

        <!-- NAVIGATION MENU -->
        <div class="wsmainfull menu clearfix centered-menu">
            <div class="wsmainwp clearfix">
                <!-- MAIN MENU -->
                <nav class="wsmenu clearfix">
                    <ul class="wsmenu-list">
                        <!-- DROPDOWN MENU -->
                        <li aria-haspopup="true">
                            <a href="#">About <span class="wsarrow"></span></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true">
                                    <a href="#about-3">About Studio</a>
                                </li>
                            </ul>
                        </li>

                        <!-- SIMPLE NAVIGATION LINK -->
                        <li class="nl-simple" aria-haspopup="true">
                            <a href="#pricing-6">Our Services</a>
                        </li>


                        <!-- SIMPLE NAVIGATION LINK -->
                        <li class="nl-simple" aria-haspopup="true">
                            <a href="#gallery-4">Gallery</a>
                        </li>
                        <!-- HEADER LOGO -->
                        <li aria-haspopup="true" class="wscenterlogo">
                            <a href="/" class="logo-black"><img
                                    src="storage/webconfig/<x-web-config displayData='logo' />" alt="header-logo" /></a>
                            <a href="/" class="logo-white"><img
                                    src="storage/webconfig/<x-web-config displayData='logo' />" alt="header-logo" /></a>
                        </li>

                        <!-- SIMPLE NAVIGATION LINK -->
                        <li class="nl-simple" aria-haspopup="true">
                            <a href="{{ route('client.booking.index') }}">Booking</a>
                        </li>

                        <!-- HEADER BUTTON -->
                        <li class="nl-simple" aria-haspopup="true">
                            <a href="#footer-2" class="btn rose--btn tra-black--hover last-link">Contacts</a>
                        </li>

                        @if (Auth::check())
                            <li class="nl-simple" aria-haspopup="true">
                                <a href="{{ route('client.account.profile') }}">Profile</a>
                            </li>
                        @else
                            <li class="nl-simple" aria-haspopup="true">
                                <a href="{{ route('client.account.login') }}">Login</a>
                            </li>
                        @endif
                    </ul>
                </nav>
                <!-- END MAIN MENU -->
            </div>
        </div>
        <!-- END NAVIGATION MENU -->
    </div>
    <!-- End header-wrapper -->
</header>
