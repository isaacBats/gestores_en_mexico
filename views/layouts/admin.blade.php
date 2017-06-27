<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="Administrador Gestores en México">
  <meta name="author" content="Isaac Daniel Batista">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>Administrador Gestores en México | @yield('page_title')</title>

  <link rel="stylesheet" href="/assets/lib/fontawesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/lib/weather-icons/css/weather-icons.css">
  @yield('css');
  <link rel="stylesheet" href="/assets/css/quirk.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <script src="/assets/lib/modernizr/modernizr.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->
</head>

<body>

  <header>
	<div class="headerpanel">

	  <div class="logopanel">
		<h2><a href="/admin/index">Administrador</a></h2>
	  </div><!-- logopanel -->

	  <div class="headerbar">

		<a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>

		{{-- <div class="searchpanel">
		  <div class="input-group">
			<input type="text" class="form-control" placeholder="Search for...">
			<span class="input-group-btn">
			  <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
			</span>
		  </div><!-- input-group -->
		</div> --}}

		<div class="header-right">
		  <ul class="headermenu">
			{{-- <li>
			  <div id="noticePanel" class="btn-group">
				<button class="btn btn-notice alert-notice" data-toggle="dropdown">
				  <i class="fa fa-globe"></i>
				</button>
				<div id="noticeDropdown" class="dropdown-menu dm-notice pull-right">
				  <div role="tabpanel">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li class="active"><a data-target="#notification" data-toggle="tab">Notifications (2)</a></li>
					  <li><a data-target="#reminders" data-toggle="tab">Reminders (4)</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="notification">
						 <ul class="list-group notice-list">
						  <li class="list-group-item unread">
							<div class="row">
							  <div class="col-xs-2">
								<i class="fa fa-envelope"></i>
							  </div>
							  <div class="col-xs-10">
								<h5><a href="">New message from Weno Carasbong</a></h5>
								<small>June 20, 2015</small>
								<span>Soluta nobis est eligendi optio cumque...</span>
							  </div>
							</div>
						  </li>
						  <li class="list-group-item unread">
							<div class="row">
							  <div class="col-xs-2">
								<i class="fa fa-user"></i>
							  </div>
							  <div class="col-xs-10">
								<h5><a href="">Renov Leonga is now following you!</a></h5>
								<small>June 18, 2015</small>
							  </div>
							</div>
						  </li>
						  <li class="list-group-item">
							<div class="row">
							  <div class="col-xs-2">
								<i class="fa fa-user"></i>
							  </div>
							  <div class="col-xs-10">
								<h5><a href="">Zaham Sindil is now following you!</a></h5>
								<small>June 17, 2015</small>
							  </div>
							</div>
						  </li>
						  <li class="list-group-item">
							<div class="row">
							  <div class="col-xs-2">
								<i class="fa fa-thumbs-up"></i>
							  </div>
							  <div class="col-xs-10">
								<h5><a href="">Rey Reslaba likes your post!</a></h5>
								<small>June 16, 2015</small>
								<span>HTML5 For Beginners Chapter 1</span>
							  </div>
							</div>
						  </li>
						  <li class="list-group-item">
							<div class="row">
							  <div class="col-xs-2">
								<i class="fa fa-comment"></i>
							  </div>
							  <div class="col-xs-10">
								<h5><a href="">Socrates commented on your post!</a></h5>
								<small>June 16, 2015</small>
								<span>Temporibus autem et aut officiis debitis...</span>
							  </div>
							</div>
						  </li>
						</ul> 
						<a class="btn-more" href="">View More Notifications <i class="fa fa-long-arrow-right"></i></a> 
					  </div><!-- tab-pane -->

					  <div role="tabpanel" class="tab-pane" id="reminders">
						<h1 id="todayDay" class="today-day">...</h1>
						<h3 id="todayDate" class="today-date">...</h3>

						<h5 class="today-weather"><i class="wi wi-hail"></i> Cloudy 77 Degree</h5>
						<p>Thunderstorm in the area this afternoon through this evening</p>

						<h4 class="panel-title">Upcoming Events</h4>
						<ul class="list-group">
						  <li class="list-group-item">
							<div class="row">
							  <div class="col-xs-2">
								<h4>20</h4>
								<p>Aug</p>
							  </div>
							  <div class="col-xs-10">
								<h5><a href="">HTML5/CSS3 Live! United States</a></h5>
								<small>San Francisco, CA</small>
							  </div>
							</div>
						  </li>
						  <li class="list-group-item">
							<div class="row">
							  <div class="col-xs-2">
								<h4>05</h4>
								<p>Sep</p>
							  </div>
							  <div class="col-xs-10">
								<h5><a href="">Web Technology Summit</a></h5>
								<small>Sydney, Australia</small>
							  </div>
							</div>
						  </li>
						  <li class="list-group-item">
							<div class="row">
							  <div class="col-xs-2">
								<h4>25</h4>
								<p>Sep</p>
							  </div>
							  <div class="col-xs-10">
								<h5><a href="">HTML5 Developer Conference 2015</a></h5>
								<small>Los Angeles CA United States</small>
							  </div>
							</div>
						  </li>
						  <li class="list-group-item">
							<div class="row">
							  <div class="col-xs-2">
								<h4>10</h4>
								<p>Oct</p>
							  </div>
							  <div class="col-xs-10">
								<h5><a href="">AngularJS Conference 2015</a></h5>
								<small>Silicon Valley CA, United States</small>
							  </div>
							</div>
						  </li>
						</ul>
						<a class="btn-more" href="">View More Events <i class="fa fa-long-arrow-right"></i></a>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</li> --}}
			<li>
			  <div class="btn-group">
				<button type="button" class="btn btn-logged" data-toggle="dropdown">
				  <img src="http://lorempixel.com/260/260/people/1" alt="{{$user->first_name .' '.$user->last_name}}" />
					{{$user->first_name .' '.$user->last_name}}
				  <span class="caret"></span>
				</button>
				<ul class="dropdown-menu pull-right">
				  <li><a href="/admin/usuario/perfil"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
				  {{-- <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li> --}}
				  {{-- <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li> --}}
				  <li><a href="/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
				</ul>
			  </div>
			</li>
			{{-- <li>
			  <button id="chatview" class="btn btn-chat alert-notice">
				<span class="badge-alert"></span>
				<i class="fa fa-comments-o"></i>
			  </button>
			</li> --}}
		  </ul>
		</div><!-- header-right -->
	  </div><!-- headerbar -->
	</div><!-- header-->
  </header>

  <section>

	<div class="leftpanel">
	  <div class="leftpanelinner">
		<div class="tab-content">
		  <!-- ################# MAIN MENU ################### -->
		  <div class="tab-pane active" id="mainmenu">
			<h5 class="sidebar-title">Catalogos</h5>
			<ul class="nav nav-pills nav-stacked nav-quirk">
			  <li class="nav-parent">
				<a href="javascript:void(0)"><i class="fa fa-users"></i> <span>Usuarios</span></a>
				<ul class="children">
				  <li><a href="/admin/usuarios">Listar usuarios</a></li>
				  <li><a href="/admin/usuario/crear">Crear usuarios</a></li>
				</ul>
			  </li>
			  <li class="nav-parent">
				<a href="javascript:void(0)"><i class="fa fa-usd"></i> <span>Precios</span></a>
				<ul class="children">
				  <li><a href="/admin/precios">Listar precios</a></li>
				  {{-- <li><a href="/admin/usuario/crear">Crear usuarios</a></li> --}}
				</ul>
			  </li>
			  <li class="nav-parent">
				<a href="javascript:void(0)"><i class="fa fa-tasks"></i> <span>Atributos</span></a>
				<ul class="children">
				  <li><a href="/admin/atributos">Listar atributos</a></li>
				</ul>
			  </li>
			  {{-- <li class="nav-parent">
				<a href="javascript:void(0)"><i class="fa fa-institution"></i> <span>Tramites</span></a>
				<ul class="children">
				  <li><a href="/admin/tramites">Listar tramites</a></li>
				</ul>
			  </li> --}}
			</ul>
			<h5 class="sidebar-title">Tramites</h5>
			<ul class="nav nav-pills nav-stacked nav-quirk">
			  <li class="nav-parent">
				<a href="javascript:void(0)"><i class="fa fa-institution"></i> <span>Tramites</span></a>
				<ul class="children">
				  <li><a href="/admin/tramites">Listar tramites</a></li>
				</ul>
			  </li>
			</ul>
		  </div><!-- tab-pane -->
		</div><!-- tab-content -->
	  </div><!-- leftpanelinner -->
	</div><!-- leftpanel -->

	<div class="mainpanel">

	  <div class="contentpanel">
		@if (isset($bread))
		  {{ $bread }}
		@endif
		@if ($alert)
		  <div class="alert {{ $alert['class'] }} fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong class="status">{{ $alert['status'] }}</strong>  {{ $alert['message'] }}
		  </div>
		@endif
		@yield('content')
	  </div><!-- contentpanel -->
	</div><!-- mainpanel -->
  </section>
  {{-- Modal --}}
<div class="modal bounceIn animated" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="myGeneralModal" aria-hidden="true">
	<div class="modal-dialog">
  		<div class="modal-content">
			<form action="" method="">
				<div class="modal-header">
		  			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  			<h4 class="modal-title" id="modal-title-alert">Modal title</h4>
				</div>
				<div class="modal-body">
		  			<p></p>
				</div>
				<div class="modal-footer">
		  			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		  			<button id="btn-submit" type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
  		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->

<script src="/assets/lib/jquery/jquery.js"></script>
<script src="/assets/lib/jquery-ui/jquery-ui.js"></script>
<script src="/assets/lib/bootstrap/js/bootstrap.js"></script>
@yield('scripts');
<script type="text/javascript" src="/assets/js/admin/custom.js"></script>
<script src="/assets/js/quirk.js"></script>

</body>
</html>
