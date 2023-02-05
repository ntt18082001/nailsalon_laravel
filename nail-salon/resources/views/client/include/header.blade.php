<!-- HEADER
   ============================================= -->
<header id="header" class="header white-menu navbar-dark">
    <div class="header-wrapper">
        <!-- MOBILE HEADER -->
        <div class="wsmobileheader clearfix">
            @php
                $logo = App\Models\WebConfigs::where('name', '=', 'logo')->get();
                $logoPath = $logo[0]->value;
            @endphp
            <span class="smllogo"><img src="{{"storage/webconfig/$logoPath"}}" alt="mobile-logo" /></span>
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
                            <a href="{{route('client.home')}}#about-3">About</a>
                        </li>

                        <!-- SIMPLE NAVIGATION LINK -->
                        <li class="nl-simple" aria-haspopup="true">
                            <a href="{{route('client.home')}}#pricing-6">Our Services</a>
                        </li>


                        <!-- SIMPLE NAVIGATION LINK -->
                        <li class="nl-simple" aria-haspopup="true">
                            <a href="{{route('client.home')}}#gallery-4">Gallery</a>
                        </li>
                        <!-- HEADER LOGO -->
                        <li aria-haspopup="true" class="wscenterlogo">
                            <a href="/" class="logo-black"><img
                                    src="{{"storage/webconfig/$logoPath"}}" alt="header-logo" /></a>
                            <a href="/" class="logo-white"><img
                                    src="{{"storage/webconfig/$logoPath"}}" alt="header-logo" /></a>
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
                            <li aria-haspopup="true">
                                <a href="#about-3">Account <span class="wsarrow"></span></a>
                                <ul class="sub-menu">
                                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                        <li class="nl-simple" aria-haspopup="true">
                                            <a href="{{ route('admin.home.index') }}">Manage website</a>
                                        </li>
                                    @endif
                                    <li class="nl-simple" aria-haspopup="true">
                                        <a href="{{ route('client.account.profile') }}">Profile</a>
                                    </li>
                                    <li aria-haspopup="true">
                                        <a href="{{ route('client.account.logout') }}">Logout</a>
                                    </li>
                                </ul>
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
