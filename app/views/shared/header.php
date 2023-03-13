<html>
<head>
	<title><?= $data ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<nav class="navbar navbar-dark bg-dark">

<body style="background-color:darkgrey;">
	<div class='container' style='text-align: center; margin: auto; background-color: darkgrey;'>
		<a href='/Main/index'><img src="/images/logo.png" style="max-width: 200px;"/></a>
		<form action="/Main/search" method="get" style='display:inline-block'>					
			<div class="input-group">
			    <input type="search" name='search_term' class="form-control" placeholder="Search Publication"/>
			  <button style="color:white;background: black;" type="submit" class="btn btn-primary" value="Search"><i class="bi-search"></i></button>
			</div>
				
		</form>
		<div class="side nav-bar">
		<?php
		if(!isset($_SESSION['user_id'])){?>
	
			<a href="/User/index"><i style="font-size: 2rem; color:black" class='bi-lock-fill' title="Log in"></i></a>
<?php	}else{ ?>
			<a href="/User/logout"><i style="font-size: 2rem; color:black" class='bi-lock' title='Log out'></i></a>
<?php	}
		?>
		<a href='/Publication/create'><i style="font-size: 2rem; color:black" class='bi-download' title='New publication'></i></a>
		<a href='/Profile/index'><i style="font-size: 2rem; color:black;" class='bi-person-square' title='My Profile'></i></a>		
	</div>
</nav>
