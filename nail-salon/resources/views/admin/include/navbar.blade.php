<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Light Logo-->
        <a href="{{ route('client.home') }}" target="_blank" class="logo logo-light">
            <h4 class="logo-sm text-white mt-4">
                <span>
                    <x-web-config displayData="brand_name" />
                </span>
            </h4>
            <h4 class="logo-lg text-white mt-4">
                <span>
                    <x-web-config displayData="brand_name" />
                </span>
            </h4>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.customer.index') }}">
                        <i class="mdi mdi-account-multiple"></i> <span data-key="t-widgets">Customer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.ticket.index') }}">
                        <i class="mdi mdi-ticket"></i> <span data-key="t-widgets">Réservation</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.ticketpromo.index') }}">
                        <i class="mdi mdi-ticket"></i> <span data-key="t-widgets">Carte de fidélité</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.slider.index') }}">
                        <i class="mdi mdi-image"></i> <span data-key="t-widgets">Slider</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.gallery.index') }}">
                        <i class="mdi mdi-image"></i> <span data-key="t-widgets">Gallery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.user.index') }}">
                        <i class="mdi mdi-account"></i> <span data-key="t-widgets">Account</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.servicecate.index') }}">
                        <i class="mdi mdi-layers"></i> <span data-key="t-widgets">Service Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.nailservice.index') }}">
                        <i class="mdi mdi-weight"></i> <span data-key="t-widgets">Nail Service</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.config.index') }}">
                        <i class="mdi mdi-wrench"></i> <span data-key="t-widgets">Web Config</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.about.index') }}">
                        <i class="mdi mdi-alert-circle"></i> <span data-key="t-widgets">About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.subscriber.index') }}">
                        <i class="mdi mdi-email"></i> <span data-key="t-widgets">Subscriber</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>