
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Moon - Multipurpose Bootstrap 4 Template by GetTemplates.co</title>
    <meta name="description" content="Core HTML Project">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/lightcase/lightcase.css') }}">

    <!-- Fonts -->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Lato:300,400|Work+Sans:300,400,700') }}" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdn.linearicons.com/free/1.0.0/icon-font.min.css') }}">
    <link href="{{ url('https://file.myfontastic.com/7vRKgqrN3iFEnLHuqYhYuL/icons.css" rel="stylesheet') }}">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js') }}"></script>

</head>
<body data-spy="scroll" data-target="#navbar-nav-header" class="">
	<div class="boxed-page">
		<nav id="gtco-header-navbar" class="navbar navbar-expand-lg py-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="">
            <span class="lnr lnr-moon"></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-menu"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-nav-header">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fillDB.index') }}">Data Scan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('php.index') }}">CRUD PHP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CRUD Mysql</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CRUD Solr</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">CRUD Typo3</a>
                </li>
            </ul>
        </div>
    </div>
    
</nav>		<div class="jumbotron d-flex align-items-center" style="background-image: url(img/hero-2.jpg)">
  <div class="container text-center">
    <h1 class="display-2 mb-4"> @yield('title') </h1>
    
  </div>
</div>		<section id="gtco-who-we-are" class="bg-white">


<div class="container-fluid">
    <div class="row">
            @section('left')
            
            @show
    
            @section('right')
            
            @show
        
    </div>
</div>


<!-- End of Client Section -->		<footer class="mastfoot mb-3 bg-white py-4 border-top">
    <div class="inner container">
         <div class="row">
         	<div class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center">
         		<p class="mb-0">&copy; 2021 Stage ETNIC par <a href="" target="_blank"> Isaac T.N</a>.</p>
         	</div>
            
        </div>
    </div>
</footer>	</div>
	
</div>
	<!-- External JS -->
	<script type="text/javascript" src="{{ url('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/popper.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('vendor/owlcarousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('vendor/isotope/isotope.min.js') }}"></script>
	<script src="{{ asset('vendor/lightcase/lightcase.js') }}"></script>
	<script src="{{ asset('vendor/waypoints/waypoint.min.js') }}"></script>
	<script src="{{ asset('vendor/countTo/jquery.countTo.js') }}"></script>

	<!-- Main JS -->
	<script src="{{ asset('js/app.min.js') }}"></script>
	<script src="{{ url('//localhost:35729/livereload.js') }}"></script>
</body>
</html>
