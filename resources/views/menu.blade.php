<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a></li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<img src="https://www.gravatar.com/avatar/221cce464778cb94229ff5a54b784262?d=mm&s=84" class="user-image img-circle elevation-2" alt="User Image">
				<span class="d-none d-md-inline">{{Session::get('username')}}</span>
			</a>
			<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<li class="user-header bg-primary">
					<img src="https://www.gravatar.com/avatar/221cce464778cb94229ff5a54b784262?d=mm&s=84" class="img-circle elevation-2" alt="User Image">
					<p>{{Session::get('title')}}-{{Session::get('type')}}<small>{{Session::get('org_name')}}</small></p>
				</li>
				<li class="user-footer">
					<a href="#" class="btn btn-default btn-flat">Profile</a>
					<a href="{{url('logout')}}" class="btn btn-default btn-flat float-right">Sign out</a>
				</li>
			</ul>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="#" class="brand-link">
		<img src="{{env('assets')}}img/logo.png" alt="DMS" class="brand-image img-circle bg-light elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">DMS</span>
	</a>
	<div class="sidebar">
		<nav class="mt-2">
        	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item">
				<a href="{{url('dashboard')}}" class="nav-link {{request()->segment(1)=='dashboard'?"active":""}}">
					<i class="nav-icon fad fa-tachometer-alt"></i><p>Dashboard</p>
				</a>
            </li>
            <li class="nav-item has-treeview {{request()->segment(1)=='people'?"menu-open":""}}">
				<a href="#" class="nav-link {{request()->segment(1)=='people'?"active":""}}">
					<i class="nav-icon fas fa-database"></i><p>Attributes<i class="right fas fa-angle-left"></i></p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{url('attribute/division')}}" class="nav-link {{request()->segment(2)=='admin'?"active":""}}">
							<i class="fal fa-circle nav-icon text-info"></i><p>Division</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{url('attribute/doctype')}}" class="nav-link {{request()->segment(2)=='user'?"active":""}}">
							<i class="fal fa-circle nav-icon text-info"></i><p>DocType</p>
						</a>
                    </li>
                    <li class="nav-item">
						<a href="{{url('attribute/status')}}" class="nav-link {{request()->segment(2)=='user'?"active":""}}">
							<i class="fal fa-circle nav-icon text-info"></i><p>Status</p>
						</a>
					</li>
				</ul>
          	</li>
			<li class="nav-item">
				<a href="{{url('files')}}" class="nav-link {{request()->segment(1)=='blog'?"active":""}}">
					<i class="nav-icon fas fa-file"></i><p>Files</p>
				</a>
			</li>

            <li class="nav-item">
				<a href="{{url('transaction')}}" class="nav-link {{request()->segment(1)=='transaction'?"active":""}}">
					<i class="nav-icon fas fa-money-bill"></i><p>Document</p>
				</a>
			</li>

			<li class="nav-header">Systems</li>
          	<li class="nav-item has-treeview {{request()->segment(1)=='people'?"menu-open":""}}">
				<a href="#" class="nav-link {{request()->segment(1)=='people'?"active":""}}">
					<i class="nav-icon fas fa-users"></i><p>People<i class="right fas fa-angle-left"></i></p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{url('people/admin')}}" class="nav-link {{request()->segment(2)=='admin'?"active":""}}">
							<i class="fal fa-circle nav-icon text-info"></i><p>Admin</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{url('people/user')}}" class="nav-link {{request()->segment(2)=='user'?"active":""}}">
							<i class="fal fa-circle nav-icon text-info"></i><p>User</p>
						</a>
					</li>
				</ul>
          	</li>
          	<li class="nav-item has-treeview {{request()->segment(1)=='log'||request()->segment(1)=='settings'?"menu-open":""}}">
				<a href="#" class="nav-link {{request()->segment(1)=='log'||request()->segment(1)=='settings'?"active":""}}">
					<i class="nav-icon fas fa-cogs"></i><p>System<i class="right fas fa-angle-left"></i></p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{url('settings')}}" class="nav-link {{request()->segment(1)=='settings'?"active":""}}">
							<i class="fal fa-circle nav-icon text-info"></i><p>Settings</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{url('log/system')}}" class="nav-link {{request()->segment(1).'/'.request()->segment(2)=='log/system'?"active":""}}">
							<i class="fal fa-circle nav-icon text-info"></i><p>System Log</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{url('log/email')}}" class="nav-link {{request()->segment(1).'/'.request()->segment(2)=='log/email'?"active":""}}">
							<i class="fal fa-circle nav-icon text-info"></i><p>Email Log</p>
						</a>
					</li>
				</ul>
          	</li>
			<li class="nav-item">
				<a href="{{url('logout')}}" class="nav-link">
					<i class="nav-icon fas fa-sign-out"></i><p>Logout</p>
				</a>
			</li>
        </ul>
      </nav>
    </div>
  </aside>
