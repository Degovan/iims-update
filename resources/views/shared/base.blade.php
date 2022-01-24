<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="{{asset('assets/js/app.js') }}" defer></script>
	<link href="{{asset('assets/css/app.css') }}" rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Inventory Management System</title>
	<link rel="stylesheet" href="{{asset('asset/vendors/mdi/css/materialdesignicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('asset/vendors/css/vendor.bundle.base.css')}}">
	<link rel="stylesheet" href="{{asset('asset/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<link rel="stylesheet" href="{{asset('asset/vendors/jvectormap/jquery-jvectormap.css')}}">
	<link rel="stylesheet" href="{{asset('asset/css/demo/style.css')}}">
	<link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	@stack('style')
</head>

<body>
	<script src="{{asset('asset/js/preloader.js')}}"></script>
	<div class="body-wrapper">
		<!-- partial:partials/_sidebar.html -->
		<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
			<div class="mdc-drawer__header">
				<a href="index.html" class="brand-logo"><img src="{{ asset('assets/images/logo.png') }}" alt="logo">otanomulti.com</a>
			</div>
			<div class="mdc-drawer__content">
				<div class="mdc-list-group">
					<nav class="mdc-list mdc-drawer-menu">
						<div class="mdc-list-item mdc-drawer-item">
							<a class="mdc-drawer-link" href="#">
								<i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
								Home </a>
						</div>
						@php
						$lUser = Auth::user();

						@endphp
						@if($lUser->can('read-product') || $lUser->can('read-vendor') || $lUser->can('read-user') || $lUser->can('read-inventory') || $lUser->can('read-customer'))
						<div class="mdc-list-item mdc-drawer-item">
							<a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="ui-sub-menu">
								<i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">dashboard</i>
								Master Data <i class="mdc-drawer-arrow material-icons">chevron_right</i>
							</a>
							<div class="mdc-expansion-panel" id="ui-sub-menu">
								<nav class="mdc-list mdc-drawer-submenu">
									@if($lUser->can('read-product'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-produk" href="{{route('produk')}}" style="font-size: 12px;">Product</a>
									</div>
									@endif
									@if($lUser->can('read-vendor'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-vendor" href="{{route('vendor')}}" style="font-size: 12px;">Vendor</a>
									</div>
									@endif
									@if($lUser->can('read-user'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-user" href="{{route('users.index')}}" style="font-size: 12px;">User</a>
									</div>
									@endif
									@if($lUser->can('read-inventory'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-inv" href="{{route('inventory')}}" style="font-size: 12px;">Inventory</a>
									</div>
									@endif
									@if($lUser->can('read-customer'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-customer" href="{{route('customer')}}" style="font-size: 12px;">Customer</a>
									</div>
									@endif

								</nav>
							</div>
						</div>
						@endif
						@if($lUser->can('read-role') || $lUser->can('read-permission'))
						<div class="mdc-list-item mdc-drawer-item">
							<a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu">
								<i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pages</i>
								User Level Akses <i class="mdc-drawer-arrow material-icons">chevron_right</i>
							</a>
							<div class="mdc-expansion-panel" id="sample-page-submenu">
								<nav class="mdc-list mdc-drawer-submenu">
									@if($lUser->can('read-role'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-roles" href="{{ route('roles.index') }}" style="font-size: 12px;">Role</a>
									</div>
									@endif
									@if($lUser->can('read-permission'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-permission" href="{{ route('permissions.index') }}" style="font-size: 12px;">Permission</a>
									</div>
									@endif
								</nav>
							</div>
						</div>
						@endif
						@if($lUser->can('read-pr') || $lUser->can('read-itr'))
						<div class="mdc-list-item mdc-drawer-item">
							<a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu2">
								<i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pages</i>
								PR > ITR <i class="mdc-drawer-arrow material-icons">chevron_right</i>
							</a>
							<div class="mdc-expansion-panel" id="sample-page-submenu2">
								<nav class="mdc-list mdc-drawer-submenu">
									@if($lUser->can('read-pr'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-pr" href="{{ route('purchase') }}" style="font-size: 12px;">Purchase Request</a>
									</div>
									@endif
									@if($lUser->can('read-itr'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-itr" href="{{ route('itr') }}" style="font-size: 12px;">Incoming Transaction</a>
									</div>
									@endif
								</nav>
							</div>
						</div>
						@endif
						@if($lUser->can('read-do') || $lUser->can('read-otr'))
						<div class="mdc-list-item mdc-drawer-item">
							<a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu3">
								<i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pages</i>
								DO > OTR<i class="mdc-drawer-arrow material-icons">chevron_right</i>
							</a>
							<div class="mdc-expansion-panel" id="sample-page-submenu3">
								<nav class="mdc-list mdc-drawer-submenu">
									@if($lUser->can('read-do'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-do" href="{{ route('deliveryOrder') }}" style="font-size: 12px;">Delivery Order</a>
									</div>
									@endif
									@if ($lUser->can('read-otr'))
									<div class="mdc-list-item mdc-drawer-item">
										<a class="mdc-drawer-link" id="mdc-otr" href="{{ route('otr') }}" style="font-size: 12px;">Outgoing Transaction</a>
									</div>
									@endif
								</nav>
							</div>
						</div>
						@endif
						{{-- untuk admin --}}
						@if($lUser->roles()->get()[0]->name == 'admin')
							<div class="mdc-list-item mdc-drawer-item">
								<a class="mdc-drawer-link" href="/edit-homepage">
									<i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pages</i>
									Edit Hompage </a>
							</div>
						@endif
						<!-- <div class="mdc-list-item mdc-drawer-item">
				<a class="mdc-drawer-link" href="https://www.bootstrapdash.com/demo/material-admin-free/jquery/documentation/documentation.html" target="_blank">
				<i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">description</i>
				Documentation </a>
			</div> -->
					</nav>
				</div>
				<hr>
				<div class="profile-actions">
					<hr>
					<a href="javascript:;">Inventory Management System</a>
				</div>
			</div>
		</aside>
		<!-- partial -->
		<div class="main-wrapper mdc-drawer-app-content">
			<!-- partial:partials/_navbar.html -->
			<header class="mdc-top-app-bar">
				<div class="mdc-top-app-bar__row">
					<div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
						<button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
						<span class="mdc-top-app-bar__title">Welcome!</span>
					</div>
					<div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
						<div class="menu-button-container menu-profile d-none d-md-block">

							<button class="mdc-button mdc-menu-button">
								<span class="d-flex align-items-center">
									<span class="figure">
										<!-- <img src="../assets/images/faces/face1.jpg" alt="user" class="user"> -->
									</span>
									<span class="user-name">{{ Auth::user()->name }}</span><i class="mdi mdi-menu-down"></i>

								</span>
							</button>
							<div class="mdc-menu mdc-menu-surface" tabindex="-1">
								<ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
									<!-- <li class="mdc-list-item" role="menuitem">
								<div class="item-thumbnail item-thumbnail-icon-only">
									<i class="mdi mdi-account-edit-outline text-primary"></i>
								</div>
								<div class="item-content d-flex align-items-start flex-column justify-content-center">
									<h6 class="item-subject font-weight-normal">Edit profile</h6>
								</div>
							</li> -->
									<li class="mdc-list-item" role="menuitem">
										<div class="item-thumbnail item-thumbnail-icon-only">
											<i class="mdi mdi-login-variant text-danger"></i>
										</div>
										<div class="item-content d-flex align-items-start flex-column justify-content-center">
											<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration:none;color: black;">
												<h6 class="item-subject font-weight-normal">{{ __('Logout') }}</h6>
											</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="container-fluid font-weight-normal" style="font-size: 0.8rem;">@yield('content')</div>
		</div>
	</div>
	<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					Select "Logout" below if you are ready to end your current session.
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button><a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
				</div>
			</div>
		</div>
	</div>
	<script src="{{asset('asset/vendors/js/vendor.bundle.base.js')}}"></script>
	<script src="{{asset('asset/vendors/chartjs/Chart.min.js')}}"></script>
	<script src="{{asset('asset/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
	<script src="{{asset('asset/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('asset/js/material.js')}}"></script>
	<script src="{{asset('asset/js/misc.js')}}"></script>
	<script src="{{asset('asset/js/dashboard.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
	<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
	<script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	@yield('javascript')
	@stack('script')
	<script type="text/javascript">
		function removeActive(param) {
			$("#mdc-role").removeClass('active');
			$("#mdc-otr").removeClass('active');
			$("#mdc-itr").removeClass('active');
			$("#mdc-pr").removeClass('active');
			$("#mdc-roles").removeClass('active');
			$("#mdc-permission").removeClass('active');
			$("#mdc-do").removeClass('active');
			$("#mdc-"+param).addClass('active');
		}
		$(document).ready(function() {
			var url = '<?= url()->current(); ?>';
			$("#mdc-produk").removeClass('active');
			$("#mdc-vendor").removeClass('active');
			$("#mdc-user").removeClass('active');
			$("#mdc-inv").removeClass('active');
			$("#mdc-customer").removeClass('active');

			if (window.location.href.indexOf("produk") > -1) {
				$("#mdc-produk").addClass('active');
			}
			if (window.location.href.indexOf("vendor") > -1) {
				// $("#mdc-vendor").addClass('active');
				removeActive('vendor');
			}
			if (window.location.href.indexOf("users") > -1) {
				$("#mdc-user").addClass('active');
			}

			if (window.location.href.indexOf("customer") > -1) {
				$("#mdc-customer").addClass('active');
			}

			if (window.location.href.indexOf("inventory") > -1) {
				removeActive('inv');
			}

			if (window.location.href.indexOf("purchase") > -1) {
				removeActive('pr');
			}

			if (window.location.href.indexOf("itr") > -1) {
				removeActive('itr');
			}

			if (window.location.href.indexOf("otr") > -1) {
				removeActive('otr');
			}

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		});
	</script>
</body>
</html>
