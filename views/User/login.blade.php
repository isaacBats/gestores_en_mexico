<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="Login para la parte del administrador de Gestores en México">
  <meta name="author" content="Isaac Daniel Batista">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>Gestores en México Admin</title>

  <link rel="stylesheet" href="/assets/lib/fontawesome/css/font-awesome.css">

  <link rel="stylesheet" href="/assets/css/quirk.css">

  <script src="/assets/lib/modernizr/modernizr.js"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->
</head>

<body class="signwrapper">
    @if ($alert)
        <div class="alert {{ $alert['class'] }} fade in">
            <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong class="status">{{ $alert['status'] }}</strong>  {{ $alert['message'] }}
        </div>
    @endif
  <div class="sign-overlay"></div>
  <div class="signpanel"></div>

  <div class="panel signin">
    <div class="panel-heading">
      <h1>Gestores en México</h1>
      <h4 class="panel-title">Bienvenido! Porfavor identificate.</h4>
    </div>
    <div class="panel-body">
      <form action="" method="post">
        <div class="form-group mb10">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="username" type="text" class="form-control" placeholder="usuario">
          </div>
        </div>
        <div class="form-group nomargin">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" name="password" class="form-control" placeholder="contraseña">
          </div>
        </div>
        <div><a href="" class="forgot">Olvidaste tu contraseña?</a></div>
        <div class="form-group">
          <button class="btn btn-success btn-quirk btn-block">Sign In</button>
        </div>
      </form>
      <hr class="invisible">
      <!-- <div class="form-group">
        <a href="signup.html" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">Not a member? Sign up now!</a>
      </div> -->
    </div>
  </div><!-- panel -->
</body>
</html>
