<?php
if (!isset($shop)) {

    echo "There has been an error, please return to the previous page and try again.";
    return;
}
?>

<!DOCTYPE html>
<html> 
    <head> 
        <title> Edit Data |Giftery</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url("css/changeDataShop.css")?>"> 
    </head> 
    <body> 
       
        <div class="container myContainer">
            <div class="row"> 
                <div class="col-sm-12" align="center"> 
                    <h4> Edit data</h4>
                   <hr class="hrWhite">
                </div>
            </div>
                 <div class="row"> 
                <div class="col-sm-12 tags">
                    <img src="<?=base_url("images/icons/tag.png")?>" width="40px" height="40px">Tags <br> 
                    <ul type="none"> 
                        <?php if(isset($myCategories))
                        foreach($myCategories as $myCat){
                            //ovde u echo mi isto treba IDShop
                          echo  " <li class='tag'> ";
                       echo    $myCat->name ;
                          echo "&nbsp;<a href='";
                         echo base_url("Shop/deleteCategory/{$myCat->idC}");
                           echo "'><img src='";
                          echo base_url("images/icons/close.png");
                           echo "' width='12px' height='12px'>
                            </a>
                            </li>";
                            }?>
                        <li onClick="toggleCategoryListDiv()" class="addNewCategory">
                            <a href="<?= base_url("Shop/showCategories")?>">
                            <img src="<?=base_url("images/icons/add.png")?>" width="30px" height="30px"> 
                            </a>
                        </li>
                    </ul>
                   

                </div>
            </div>
            <div class="row">
              <div class="categoryList col-sm-12" id="categoryListDiv" align="center"> 
                <br>
            
                <input type="text" placeholder="Search here" id="search_input" >
                
                    <img src="<?= base_url("images/icons/search-icon.png")?>" class="icons" onlick="submitSearch()" > 
                
                <br><br>  
                <form method="POST" action="<?= base_url("Shop/addCategories")?>">
                <select name=selected[]" class="custom-select text-center selectCategoryList" multiple>
                
                <?php 
               
                if(!empty($allCategories)){
                  echo '<script> document.getElementById("categoryListDiv").style.display = "block";</script>';
                    
                    foreach($allCategories as $category){
                        echo " <option class='categorySelect form-control' value='$category->idC'>$category->name</option>";
                    }
              
                }
                ?>
              </select>
              
              <br>
              <br>  
            <button onClick="toggleCategoryListDiv()" class="btn btn-success">Add</button>
                </form>
        </div>
            </div>
            <form method="POST" id="part1" action="<?= base_url("Shop/submitNewData")?>">
            <div class="row"> 
                <div class="offset-sm-2 col-sm-8 text-center">  
                    <br>
                    <textarea class="text-center title" name="shopName"><?php echo $shop->shopName; ?></textarea>
                  <?php if(isset($shopName)) echo "<p style='color:red'>$shopName</p></center>";?>
                </div>
              
            </div>
            <br>
            <div class="row "> 
                <div class="col-sm-3 text-center"  align="center"> 
                    
                  
                    <img src="<?php echo base_url("uploads/" . $shop->image) ?>" class="img-fluid shopImage text-left">
                  <button class="btn btn-success"> Upload image</button>
                </div>
               
            
              <div class="col-sm-9">
                    <h5 class="text-left">Description: </h5>
                    <textarea class="shopDescription" name="description" ><?php echo $shop->description; ?>
                     </textarea>
                    <?php if(isset($description)) echo "<p style='color:red'>$description </p></center>";?>
             </div>
                     
                   
                    
            </div>
            
            <div class="row"> 
                <div class="col-sm-12" align="center"> 
                  &nbsp; 
                </div>
            </div>
          
            <div class="row"> 
                <div class="col-sm-12" align="center"> 
                  &nbsp; 
                </div>
            </div>
            
       <!---->
            <div class="row"> 
                <div class="col-sm-12" align="center"> 
                  &nbsp; 
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-12" > 
                  <h4> Owner and shop data</h4> 
                </div>
            </div>
         
            <div class="row rowBorder"> 
                <div class=" col-sm-6"> 
                    
                        <p>Owner's first name</p>
			<input type="text" name="name" placeholder="Enter First name" value="<?php echo $shop->name;?>">
                         <?php if(isset($name)) echo "<p style='color:red'>$name </p></center>";?>
			<p>Owner's last name</p>
			<input type="text" name="surname" placeholder="Enter Last name" value="<?php echo $shop->surname;?>">
                         <?php if(isset($surname)) echo "<p style='color:red'>$surname </p></center>";?>
			<p>Shop's e-mail</p>
			<input type="text" name="email" placeholder="Enter E-mail" value="<?php echo $shop->email;?>">
                         <?php if(isset($email)) echo "<p style='color:red'>$email</p></center>";?>
			<p>Shop's address</p>
                        <input type="text" name="address" placeholder="Enter Address" value="<?php echo $shop->address;?>">
                         <?php if(isset($address)) echo "<p style='color:red'>$address</p></center>";?>
                 </div>
                 <div class=" col-sm-6"> 
			<p>Phone number</p>
			<input type="text" name="phone" placeholder="Enter phone number" value="<?php echo $shop->phoneNum;?>">
			 <?php if(isset($phone)) echo "<p style='color:red'>$phone </p></center>";?>
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password" value="<?php echo $shop->password;?>">
                        <?php if(isset($password)) echo "<p style='color:red'>$password </p></center>";?>
			<p>Confirm password</p>
                        <input type="password" name="confirmPassword" placeholder="Enter Password" value="<?php echo $shop->password;?>">
                        <?php if(isset($confirmPassword)) echo "<p style='color:red'>$confirmPassword </p></center>";?>
                </div>
			
               
            </div>
       
            <div class="row"> 
                <div class="col-sm-12" align="center"> 
                  &nbsp; 
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-12" align="center"> 
                    <button class="btn btn-success"> 
                        Save changes
                    </button>
                </div>
            </div>
            </form> 
            <div class="row"> 
                <div class="col-sm-12" align="center"> 
                  &nbsp; 
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-12" align="center"> 
                    <p class="note"> Note: These changes must be approved by admin. It may take a 1-2 days for changes to be visible. </p>
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-12" align="center"> 
                    &nbsp; 
                </div>
            </div>
        


                
        </div>
        <script>
           function toggleCategoryListDiv(){
             
                var x = document.getElementById("categoryListDiv");
              if (x.style.display == "none" || x.style.display==" ") {
                x.style.display = "block";
              }else {
                  x.style.display="none";
              } 
                
           
            }
           
        
            
          
        </script> 
       
    </body>
</html>

