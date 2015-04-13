<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BookFind</title>

	<!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css"> -->
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css">
	
	<!-- Fonts -->
	<!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

	<!-- Icon -->
 	<link rel="shortcut icon" href="{{ asset('img/book.png') }}?v=2">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">
					<img alt="Bookfind" src="{{ asset('img/book.png') }}" width="20"> 
				</a>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Bookfind</a>
			</div>

			<div class="collapse navbar-collapse" id="nav-collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
					<!-- <li><a href="{{ url('/schools') }}">School</a></li> -->
					<li><a href="{{ url('/courses') }}">School</a></li>
					<!-- <li><a href="{{ url('/books') }}">My Books</a></li> -->
				</ul>

				<!-- 
				<ul class="navbar-form navbar-center" style="display: inline-block;">
					<form class="form-horizontal">
		      	<div class="input-group">
	            <input type="text" class="form-control" placeholder="Search for books, classes, and more!" name="search" id="searchbar">
	            <div class="input-group-btn">
	            	<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
	            </div>
		      	</div>
					</form>
				</ul> -->

				<ul class="nav navbar-nav navbar-right" style="display: inline-block;">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hi, {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/profile') }}">Profile</a></li>
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>

	   		<form class="navbar-form">
	        <div class="form-group" style="display: inline-block; width: 50%; margin-left: 10%;">
						<div style="display: table;" class="input-group">
	            <input type="text" autocomplete="off" placeholder="Search for courses, books, and more!" name="search" style="" class="form-control">
	           	<span style="width: 1%;" class="input-group-addon"><a href="#"><span class="glyphicon glyphicon-search" style="color: blue;"></span></a></span>  
	          </div>
	        </div>
	      </form>

			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> -->
	<script src="{{ asset('/js/jquery-2.1.3.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/moment.min.js') }}"></script>

	<script type="text/javascript">

		// format time when timestamp loaded from db
		$('.time-format-dt').attr('title', function() {
			return moment($(this).html(), 'YYYY-MM-DD HH:mm:ss').format('MMMM DD, YYYY');
		});
		$('.time-format-dt').html(function() {
			return moment($(this).html(), 'YYYY-MM-DD HH:mm:ss').fromNow();
		});


	</script>

	@yield('scripts')

</body>
</html>

<!-- 

Pages:

Home (Profile Page)
 - User's Courses (Active)

Home
	For their school:
	"SchoolName has x courses and x books to choose from!"

	- Search by courses (name or code)
	- Search books (name, author, isbn)

?
 - Add courses
 - 
  
Books
 - Access books from courses


 -->