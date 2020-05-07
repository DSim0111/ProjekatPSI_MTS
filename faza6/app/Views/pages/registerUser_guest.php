<html>
    <head> 
        
        <title>Register|Giftery</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
         <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_register.css">
    </head> 
    <body> 
        
        
        

<div class="container"> 
    <div class="row">
       
		<div class="offset-lg-3 col-lg-6 offset-md-2 col-md-8 col-sm-12 ">
                    <br>
                    <br> 
                   
                    <div class="log-box ">
                        <br>
			<h1>Register Here</h1>
                     
			<form  name="registerUser" class="reg-form" method="POST"  action='<?php
                        echo base_url("Guest/registerUserSubmit"); 
                        
                        ?>'>
                           
			<p>First name</p>
                        
                        <input type="text" name="name" value="<?php
                        if(isset($_POST['name']))echo $_POST['name'];
                        ?>" placeholder="Enter First name">
                        
                        
                         <?php
                                if(isset($name))
                                     
                                echo "<p style='color:red;'>".$name."</p><br> ";
                            ?>
                         
			<p>Last name</p>
			<input type="text" name="surname" value="<?php if(isset($_POST['surname']))echo $_POST['surname'];?>"placeholder="Enter Last name">
                        
                          <?php
                                if(isset($surname))
                                     
                                echo "<p style='color:red;'>".$surname."</p><br> ";
                            ?>
                        
			<p>E-mail</p>
			<input type="text" name="email"  value="<?php if(isset($_POST['email']))echo $_POST['email'];?>"placeholder="Enter E-mail">
                          <?php
                                if(isset($email))
                                     
                                echo "<p style='color:red;'>".$email."</p><br> ";
                            ?>
                         
			<p>Address</p>
			<input type="text" name="address"  value="<?php if(isset($_POST['address']))echo $_POST['address'];?>"  placeholder="Enter Address">
                        
                         <?php
                                if(isset($address))
                                     
                                echo "<p style='color:red;'>".$address."</p><br> ";
                           ?>
                        
			<p>Phone number</p>
			<input type="text" name="phoneNum" value="<?php if(isset($_POST['phoneNum']))echo $_POST['phoneNum'];?>" placeholder="Enter phone number">
                           <?php
                                if(isset($phoneNum))
                                     
                                echo "<p style='color:red;'>".$phoneNum."</p><br> ";
                           ?>
			<p>Username</p>
			<input type="text" name="username" value="<?php if(isset($_POST['username']))echo $_POST['username'];?>"   placeholder="Enter Username">
                           <?php
                                if(isset($username))
                                     
                                echo "<p style='color:red;'>".$username."</p><br> ";
                           ?>
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password">
                          <?php
                                if(isset($password))
                                     
                                echo "<p style='color:red;'>".$password."</p><br> ";
                           ?>
			<p>Confirm password</p>
			<input type="password" name="confirmPassword" placeholder="Enter Password">
                        
                         <?php
                                if(isset($confirmPassword))
                                     
                                echo "<p style='color:red;'>".$confirmPassword."</p><br> ";
                           ?>
			<input type="submit" name="submit" value="Register">
			
			</form>
                </div>
                    <br> 
                    <br>
		</div>
        </div>
        </div>
        </body>
</html>