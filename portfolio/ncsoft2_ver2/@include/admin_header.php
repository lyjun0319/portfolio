	<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner" style="display:none">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<a class="brand" href="#n"><span>Fitpl-총 관리시스템</span></a>


				
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?=$_COOKIE["U_NAME"]?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>

								<? if ( $_SESSION['meet_admin_rule']=="MASTER" ) { ?>
								<li><a href="/@admin/login/logout_proc.php"><i class="halflings-icon off"></i> Logout</a></li>
								<? } else { ?>
								<li><a href="/@admin/login/store_logout_proc.php"><i class="halflings-icon off"></i> Logout</a></li>
								<? } ?>
								
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->