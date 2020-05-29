<html>
	<head>
		<title>Welcome page|Giftery</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet"  type="text/css" href="<?php echo base_url("css/welcome.css")?>">
		<!-- mora bootstrap link da bi moglo da se lepo otvorim na ekranima bilo koje velicine -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
		<script src="https://use.fontawesome.com/eb17731fd8.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	
	
	</head>
	<body >
	
		<div id="slider">
		<!-- figure izlaze sve slike jednu ispod druge u browseru -->
			<figure>
				<img src="<?php echo base_url('images/picx2.jpg')?>" class="slider_image">
				<img src="<?php echo base_url('images/childrenn.jpg')?>" class="slider_image">
				<img src="<?php echo base_url('images/hands.jpg')?>" class="slider_image">
				<img src="<?php echo base_url('images/giving.jpg')?>" class="slider_image">
				<img src="<?php echo base_url('images/hugg.jpg')?>" class="slider_image" >
				<img src="<?php echo base_url('images/picx2.jpg')?>" class="slider_image">
				
			</figure>
		</div>
		
		<!-- Dugmad za Sign in,Register i Continue as Guest -->
		<div class="welcomeBtn">
			<h1 class="Giftery_name">Giftery</h1>
		<h3 class="transient_quote"><i>Shape it till you make it!</i></h3>
			<a href="<?php echo base_url('Guest/whoAreYou')?>"><button class="RegisterBtn hoverBtn"><b>New here? Register</b></button></a>
			<a href="<?php echo base_url('Guest/login')?>"><button class="LoginBtn hoverBtn"><b>Sign in</b></button></a>
			<a href="<?php echo base_url('Guest/listShopsPaging')?>"><button class="GuestBtn hoverBtn"><b>Continue as guest</b></button></a>
			</div>
		
	</body>
</html>
