
<!--

Autor: Simona Denic - 17/0338 
Datum: 07.05.2020. 
Verzija: 1.0 
-->

<html>
    <head> 
        
        <title>Register|Giftery</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
         <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_register.css">
          <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/style_registerShop.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    </head> 
    <body> 
        
        
        

<div class="container-fluid"> 
    <div class="row">
       
		<div class="col-sm-12">
                    <br>
                    <br> 
                   <form  name="registerUser" class="reg-form" method="POST"   enctype="multipart/form-data" action='<?php
                        echo base_url("Guest/registerShopSubmit"); 
                        
                        ?>'>
                    <div class="log-box row">
                        <div class="col-sm-12"> 
                            <br> 
                        <h1>Register Here</h1>
                        </div>
                        <div class="col-lg-6 col-sm-12 basic-info">
                        <br>
			
                        <?php
                        if(isset($error)){
                            
                                echo "<p style='color:red;'>".$error."</p><br>";
                            
                        }
                        
                        ?>
                     
			
                           
			<p>Owner's name </p>
                        
                        <input type="text" name="name" value="<?php
                        if(isset($_POST['name']))echo $_POST['name'];
                        ?>" placeholder="Enter First name">
                        
                        
                         <?php
                                if(isset($name))
                                     
                                echo "<p style='color:red;'>".$name."</p> ";
                            ?>
                         
			<p>Owner's surname</p>
			<input type="text" name="surname" value="<?php if(isset($_POST['surname']))echo $_POST['surname'];?>"placeholder="Enter Last name">
                        
                          <?php
                                if(isset($surname))
                                     
                                echo "<p style='color:red;'>".$surname."</p> ";
                            ?>
                        
			<p>E-mail</p>
			<input type="text" name="email"  value="<?php if(isset($_POST['email']))echo $_POST['email'];?>"placeholder="Enter E-mail">
                          <?php
                                if(isset($email))
                                     
                                echo "<p style='color:red;'>".$email."</p> ";
                            ?>
                         
			<p>Shop address</p>
			<input type="text" name="address"  value="<?php if(isset($_POST['address']))echo $_POST['address'];?>"  placeholder="Enter Address">
                        
                         <?php
                                if(isset($address))
                                     
                                echo "<p style='color:red;'>".$address."</p> ";
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
                                     
                                echo "<p style='color:red;'>".$username."</p> ";
                           ?>
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password">
                          <?php
                                if(isset($password))
                                     
                                echo "<p style='color:red;'>".$password."</p> ";
                           ?>
			<p>Confirm password</p>
			<input type="password" name="confirmPassword" placeholder="Enter Password">
                        
                         <?php
                                if(isset($confirmPassword))
                                     
                                echo "<p style='color:red;'>".$confirmPassword."</p> ";
                           ?>
			
                    </div>
                        
                        <div class="offset-lg-1 col-lg-5 col-sm-12 " > 
                            <br>
                            <div class="upload-image-div" id="upload_image_div" align="center"> 
                                <!--Image container-->
                                <p id="upload_image_caption" class="centered-caption">
                                    Upload image
                                </p>
                                   <img id="image_tag">
                                
                            </div>
                            <br>
                           
                            <input type="file" id="uploadedImage" name="image"> 
                            <?php
                            if(isset($image)){
                                
                                echo "<p style='color:red;'>".$image."</p> ";
                            }
                            ?> 
                            <br> 
                            <br>
                            <br>
                            <p>Shop name</p>
			<input type="text" name="shopName" value="<?php if(isset($_POST['shopName']))echo $_POST['shopName'];?>" placeholder="Enter description">
                        
                           <?php
                                if(isset($shopName))
                                     
                                echo "<p style='color:red;'>".$shopName."</p> ";
                           ?>
                     
			<p>Description</p>
			<input type="text" name="description" value="<?php if(isset($_POST['description']))echo $_POST['description'];?>" placeholder="Enter description">
                        
                           <?php
                                if(isset($description))
                                     
                                echo "<p style='color:red;'>".$description."</p> ";
                           ?>
                        
                            
                        
                        </div>
                        
                        <div class="offset-lg-3 col-lg-6 col-sm-12">
                            <br>
                            <br>
                            
                        <input type="submit"  name="submit" value="Register">
                        </div>
			
                        
                        
                        
                        
                    </div>
                       </form>
                    <br> 
                    <br>
		</div>
        </div>
        </div>
        </body>
   <script> 
            
        function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
             $('#image_tag').attr('src', e.target.result).addClass("w-100");

            $("#upload_image_caption").addClass("d-none");
          };

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
   
    $("#uploadedImage").change(function() {
        // get the file name, possibly with path (depends on browser)
      
         
        var filename = $("#uploadedImage").val();

        // Use a regular expression to trim everything before final dot
        var extension = filename.replace(/^.*\./, '');
        switch(extension){
            case 'jpg': case 'png': case'gif': case'jpeg': case 'tiff': break; 
            default: 
            $('#image_tag').attr('src', '').addClass("w-100");

            $("#upload_image_caption").empty().text("Only images allowed.").removeClass("d-none");
            $("#uploadedImage").wrap('<form>').closest('form').get(0).reset();
                $("#uploadedImage").unwrap();
         
            return; 
        }

      readURL(this);
    });
    
     </script>  
</html>