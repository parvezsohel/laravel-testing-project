<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="nav">
				  <li class="nav-item">
				    <a class="nav-link active" href="{{ url('login') }}">Login</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="{{ url('register') }}">Register</a>
				  </li>
				</ul>
			</div>
		</div>
	</div>

</body>
</html>