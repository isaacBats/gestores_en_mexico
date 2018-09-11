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
    <link rel="icon" href="/assets/images/favicon.png" type="image/x-icon">
    <!-- Font Awesome Styles -->
    <link type="text/css" rel="stylesheet" href="/assets/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="/assets/fonts/font-awesome/css/font-awesome.css">
    <!-- Bootstrap Styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/menu.css" rel="stylesheet">
    <link href="/assets/css/material.css" rel="stylesheet">
    <link href="/assets/css/fileinput.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	@yield('css')

    <!-- Google Code para etiquetas de remarketing -->
    <!--
    Es posible que las etiquetas de remarketing todavía no estén asociadas a la información personal identificable o que estén en páginas relacionadas con las categorías delicadas. Para obtener más información e instrucciones sobre cómo configurar la etiqueta, consulte http://google.com/ads/remarketingsetup.
    -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 869136133;
        var google_conversion_label = "x4cKCLbE-2sQhe63ngM";
        var google_remarketing_only = false;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt=""  
                src="//www.googleadservices.com/pagead/conversion/869136133/?label=x4cKCLbE-2sQhe63ngM&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-W989ND');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121499655-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-121499655-1');
    </script>
</head>
<body class="gradient">

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W989ND"
            height="0" width="0" style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

<div class="phoneTop light mayus">
    <div class="container">
        <div class="col-md-8 info centrar">
            <a href="tel:{{ $phone }}" class="phoneMobile"><i class="fa fa-phone" aria-hidden="true"></i> {{ $phone }} </a>
            <a href="https://api.whatsapp.com/send?phone={{ $whats }}" class="phoneMobile"><i class="fa fa-whatsapp" aria-hidden="true"></i> {{ $whats }} </a>
            <a href="mailto:{{ $correo }}" class="phoneMobile"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $correo }} </a>
            <span class="phoneDesk"><i class="fa fa-phone" aria-hidden="true"></i> <strong>Desde México </strong>{{ $phone }}, </span><span class="phoneDesk"><i class="fa fa-whatsapp" aria-hidden="true"></i>  {{ $whats }}, </span><span style="text-transform: lowercase;" class="phoneDesk"><i class="fa fa-envelope-o" aria-hidden="true"></i>  {{ $correo }}</span>
            <br>
            <span class="phoneDesk">de lunes a viernes de {{ $horaIni }} A {{ $horaFin }}</span>
            {{-- <a href="tel:5527189072" class="phoneMobile">Llamar ahora <i class="fa fa-phone" aria-hidden="true"></i></a> --}}
            <br>
            <span class="phoneDesk"><i class="fa fa-map-marker" aria-hidden="true"></i>
                {{ $direction }}
            </span>
        </div>
        <div class="col-md-4 consulta">
            <form action="/tramite/consulta/status">
                <p>Consulta tu trámite</p>
                <input name="clave" class="form-control materail-input light consultaCampo" id="consulta_tramite" placeholder="Ingresa tu clave" required="" aria-required="false" value="{{ isset($clave) ? $clave : NULL; }}">
                <input type="submit" id="button_consultar" class="btn material-btn_lg material-btn_success main-container__column" value="Buscar">
            </form>
        </div>
    </div>
</div>

	@include('partials.menu')
	@if (isset($alert))
		<div class="alert {{ $alert['class'] }} fade in">
	        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	        <strong class="status">{{ $alert['status'] }}</strong>  {{ $alert['message'] }}
	    </div>
	@endif
	@yield('content')		
	<footer class="paddingContent">
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
	                <a href="https://www.facebook.com/GestoresEnMexico/" class="transitions" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
	                <a href="https://twitter.com/GestoresMX" class="transitions" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	                <!-- <a href="#" class="transitions"><i class="fa fa-youtube" aria-hidden="true"></i></a>
	                <a href="#" class="transitions"><i class="fa fa-linkedin" aria-hidden="true"></i></a> -->
	            </div>
	            <div class="col-md-4 justificadoDerecha">
	            <a href="/aviso-privacidad" class="transitions">Aviso de Privacidad </a>
	        </div>
	    </div>
	    <!-- Main Scripts-->
	    <script src="/assets/js/jquery.js"></script>
	    <script src="/assets/js/bootstrap.min.js"></script>
	    <script src="/assets/js/bootstrap-datetimepicker.js"></script>
		<script src="/assets/js/bootstrap-datetimepicker.es.js"></script>
	    <script src="/assets/js/search.js"></script>
	    <script src="/assets/js/jquery.validate.min.js"></script>
	    <script src="/assets/js/jquery.form.js"></script>
	    <script src="/assets/js/ttmenu.js"></script>
	    <script src="/assets/js/fileinput.min.js" type="text/javascript"></script>
	    <script src="/assets/js/jquery.fitvids.js"></script>
	    @yield('js')
	    <script src="/assets/js/custom.js"></script>



		<!-- Carousel -->
	    <script type="text/javascript">
	    $(document).ready(function () {
	        $('.carousel').carousel({
	            interval: 3000
	        });

	        $('.carousel').carousel('cycle');

	        $('.form_datetime').datetimepicker({
		        //language:  'es',
		        weekStart: 1,
		        todayBtn:  1,
		        autoclose: 1,
		        todayHighlight: 1,
		        startView: 2,
		        forceParse: 0,
		        showMeridian: 1
		    });
		    $('.form_date').datetimepicker({
		        language:  'es',
		        weekStart: 1,
		        todayBtn:  1,
		        autoclose: 1,
		        todayHighlight: 1,
		        startView: 2,
		        minView: 2,
		        forceParse: 0
		    });
		    $('.form_time').datetimepicker({
		        language:  'es',
		        weekStart: 1,
		        todayBtn:  1,
		        autoclose: 1,
		        todayHighlight: 1,
		        startView: 1,
		        minView: 0,
		        maxView: 1,
		        forceParse: 0
		    });

		    $("#file-3").fileinput({
		        showCaption: false,
		        browseClass: "btn btn-primary btn-lg",
		        fileType: "any"
		    });
	    });
	    </script>  
	</footer>
</body>
</html>