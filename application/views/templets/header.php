<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title><?php $title || 'prizm'?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
	<a href="#" class="navbar-brand">prizm</a>
		<ul class="navbar-nav mr-auto">
           <li class="nav-item">
			   <a href="<?=base_url() . 'home'?>" class="nav-link">home</a>
		   </li>
			<!-- <li class="nav-item">
				<a href="<?=base_url() . 'contact/create'?>" class="nav-link">create contact</a>
			</li> -->
			<li class="nav-item">
				<a href="<?=base_url() . 'uplaod'?>" class="nav-link">upload file</a>
			</li>

			<li class="nav-item">
				<a href="<?=base_url() . 'index'?>" class="nav-link">Emails</a>
			</li>

		</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a href="<?=base_url() . 'login'?>" class="nav-link">login</a>
		</li>
		<li class="nav-item">
			<a href="<?=base_url() . 'register'?>" class="nav-link">register</a>
		</li>

	</ul>
</nav>
<div class="container">

