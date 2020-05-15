<html>
    <head> 
        
        <title>Register|Giftery</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
         <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_register.css">
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
       
		<div class="offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 ">
                    <br>
                    <br> 
                   
                    <div class="log-box ">
                        <br>
			<h1>Register Here</h1>
                        <?php
                            if(isset($message)){
                                
                                echo "<p>".$message."</p>";
                            }
                            
                        ?>
			<form  name="registerUser" class="reg-form" method="POST"  action='<?php
                        echo base_url("Administrator/registerAdminSubmit"); 
                        
                        ?>'>
                           
			<p>Admin's first name</p>
                        
                        <input type="text" name="name" value="<?php
                        if(isset($_POST['name']))echo $_POST['name'];
                        ?>" placeholder="Enter First name">
                        
                        
                         <?php
                                if(isset($name))
                                     
                                echo "<p class='errorMessage'>".$name."</p> ";
                            ?>
                         
			<p>Last name</p>
			<input type="text" name="surname" value="<?php if(isset($_POST['surname']))echo $_POST['surname'];?>"placeholder="Enter Last name">
                        
                          <?php
                                if(isset($surname))
                                     
                                echo "<p class='errorMessage'>".$surname."</p> ";
                            ?>
                        
			<p>E-mail</p>
			<input type="text" name="email"  value="<?php if(isset($_POST['email']))echo $_POST['email'];?>"placeholder="Enter E-mail">
                          <?php
                                if(isset($email))
                                     
                                echo "<p class='errorMessage'>".$email."</p>";
                            ?>
                         
			
                        
			<p>Phone number</p>
			<input type="text" name="phoneNum" value="<?php if(isset($_POST['phoneNum']))echo $_POST['phoneNum'];?>" placeholder="Enter phone number">
                           <?php
                                if(isset($phoneNum))
                                     
                                echo "<p class='errorMessage'>".$phoneNum."</p> ";
                           ?>
			<p>Username</p>
			<input type="text" name="username" value="<?php if(isset($_POST['username']))echo $_POST['username'];?>"   placeholder="Enter Username">
                           <?php
                                if(isset($username))
                                     
                                echo "<p class='errorMessage'>".$username."</p> ";
                           ?>
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password">
                          <?php
                                if(isset($password))
                                     
                                echo "<p class='errorMessage'>".$password."</p> ";
                           ?>
			<p>Confirm password</p>
			<input type="password" name="confirmPassword" placeholder="Enter Password">
                        
                         <?php
                                if(isset($confirmPassword))
                                     
                                echo "<p class='errorMessage'>".$confirmPassword."</p>";
                           ?>
                        <br>
			<input type="submit" name="submit" value="Register">
                        <br>
                        <br>
			</form>
                </div>
                    <br> 
                    <br>
		</div>
        </div>
        </div>
        </body>
</html>