<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>@yield('page_title', 'Gestores en México | Inicio')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="AtaqueVisual.com">
    <meta property="og:url"                content="http://www.gestoresenmexico.com" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Lo tramitamos por ti" />
    <meta property="og:description"        content="Realizamos casi todo tipo de trámites" />
    <meta property="og:image"              content="http://gestoresenmexico.com/images/imagen.jpg" />

    <link rel="shortcut icon" type="image/png" href="/assets/images/favicon.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="favicon-apple-touch-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="favicon-apple-touch-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="favicon-apple-touch-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="favicon-apple-touch-144.png">
    <link rel="icon" type="image/vnd.microsoft.icon" sizes="32x32 48x48" href="favicon.ico">
    <link rel="icon" sizes="128x128" href="favicon.icns">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <!-- Font Awesome Styles -->
    <link type="text/css" rel="stylesheet" href="/assets/css/font-awesome.css">
    <!-- Bootstrap Styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/menu.css" rel="stylesheet">
    <link href="/assets/css/material.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	@yield('css')
</head>
<body class="gradient">
	@include('partials.menu')
	@yield('content')		
	<footer class="paddingContent">
		<script src="https://code.jquery.com/jquery-2.2.2.min.js" ></script>
		@yield('js')
		<div class="container">
	        <div class="row">
	            <div class="col-md-4">
	                <div class="col-md-4">
	                    <img src="/assets/images/logo-k.svg" class="imgSVG img-responsive logoFooter" alt="Gestores en México" title="Gestores en México"/>
	                </div>
	                <div class="col-md-8">
	                    <p>® 2017 Gestores en México. <br>
	                    Todos los derechos reservados.</p>
	                </div>
	            </div>
	            <div class="col-md-4 social">
	                <a href="#" class="transitions"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
	                <a href="#" class="transitions"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	                <a href="#" class="transitions"><i class="fa fa-youtube" aria-hidden="true"></i></a>
	                <a href="#" class="transitions"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
	            </div>
	            <div class="col-md-4 justificadoDerecha">
	            <!-- <a href="preguntas-frecuentes.php" class="transitions">Preguntas Frecuentes </a> |  --> <a href="aviso-de-privacidad.php" class="transitions">Aviso de Privacidad </a> <!-- |  <a href="#" class="transitions">Términos de uso</a> -->
	        </div>
	    </div>
	    <!-- Main Scripts-->
	    <script src="/assets/js/jquery.js"></script>
	    <script src="/assets/js/bootstrap.min.js"></script>
	    <script src="/assets/js/search.js"></script>
	    <script src="/assets/js/ttmenu.js"></script>
	    <script src="/assets/js/jquery.fitvids.js"></script>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-90562164-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<!-- Carousel -->
	    <script type="text/javascript">
	    $(document).ready(function () {
	        $('.carousel').carousel({
	            interval: 3000
	        });

	        $('.carousel').carousel('cycle');
	    });
	    </script>  
	</footer>
</body>
</html>