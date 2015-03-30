<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			a {
				color: blue;
				text-decoration: none;
				font-size: 20px;
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 72px;
				margin-bottom: 40px;
			}

			.subtext {
				font-size: 24px;
			}


		</style>

	<meta http-equiv="refresh" content="5; url=/">
	</head>
	<body>
		<div class="container">
			<div class="content">
				@yield('content')
				<br><br>
				<a href="javascript:history.back()">Click here to go back!</a>
				<br>
				<div><br>Or wait a few seconds to go back to the homepage.</div>
			</div>
		</div>
	</body>
</html>
