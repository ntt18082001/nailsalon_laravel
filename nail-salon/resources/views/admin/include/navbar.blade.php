<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
	<!-- LOGO -->
	<div class="navbar-brand-box">
		<!-- Dark Logo-->
		<a href="index.html" class="logo logo-dark">
			<span class="logo-sm">
				<img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
			</span>
			<span class="logo-lg">
				<img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
			</span>
		</a>
		<!-- Light Logo-->
		<a asp-action="Index" asp-controller="Home" class="logo logo-light">
			<span class="logo-sm">
				<img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
			</span>
			<span class="logo-lg">
				<img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="17">
			</span>
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
                    <a class="nav-link menu-link" 
                        href="{{ route('admin.home.index') }}">
                        <i class="mdi mdi-puzzle-outline"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link menu-link" 
                        href="{{ route('admin.user.index') }}">
                        <i class="mdi mdi-account"></i> <span data-key="t-widgets">Quản lý tài khoản</span>
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link menu-link" 
                        href="{{ route('admin.servicecate.index') }}">
                        <i class="mdi mdi-layers"></i> <span data-key="t-widgets">Quản lý thể loại dịch vụ</span>
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link menu-link" 
                        href="{{ route('admin.nailservice.index') }}">
                        <i class="mdi mdi-weight"></i> <span data-key="t-widgets">Quản lý dịch vụ</span>
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link menu-link" 
                        href="{{ route('admin.ticket.index') }}">
                        <i class="mdi mdi-ticket"></i> <span data-key="t-widgets">Quản lý ticket</span>
                    </a>
                </li>
			</ul>
		</div>
		<!-- Sidebar -->
	</div>
	<div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->