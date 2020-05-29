<html>
	<head>
		<title>Login|Giftery</title>
                 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
                <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_common.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_login.css">
	</head>
        <style>
            html{
            height:100%; 
          }
          body{
                  margin:0;
                  padding:0;
                  background: url("../images/giftChild.jpg");
                  background-size:cover;
                  background-position:center;
                  font-family:sans-serif;
            height: 100%;


          }
            
        </style>
	<body>
            <div class="container">
            <div class="row">
                <div class="col-sm-12"> 
                    <br>
                    <br>
                    <br>
                     <br>
                    <br>
                    <br>
                 
                    <div class="log-box">
			<img src="<?php echo base_url();?>/images/avatar_login.png" class="avatar">
			<h1>Login Here</h1>
                        <?php
                        
                            if(isset($error)){
                                
                                
                                echo "<p class='errorMessage'>".$error."</p>";
                            }
                        ?> 
                        
                        <form name="loginForm" method="POST" action="<?php  echo base_url("Guest/loginSubmit")?>">
                            <div class="radioDiv" align="center">
                       <input type="radio" name="role" value="User" checked>User
                       <input type="radio" name="role" value="Shop">Shop
                       <input type="radio" name="role" value="Administrator">Admin
                            </div>
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username">
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password">
                        <div class="w-100" align="center">
			<a href="user_index.html"><input class="w-100" type="submit" name="submit" value="Login"></a>
                        </div>
                        
                        
			
			</form>
			
		</div>
                 
                    <br>
                    <br>
                     <br>
                    <br>
                    <br>
            </div>
            </div>
            </div>
	</body>
	
</html>