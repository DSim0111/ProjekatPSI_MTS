<?php ?>

<!DOCTYPE html>
<html> 
    <head> 
        <title> Products|Giftery</title>
        <link rel="stylesheet" href="<?= base_url("css/shopPage_Tijana.css")?>"> 
            <link rel="stylesheet" href="<?php echo base_url("css/style_common.css")?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head> 
    <body> 
        <div class="container myContainer">
            <div class="row"> 
                <div class="col-sm-4 lighter"> 
                    <b>Address</b>: Street Belgrade 10a <br>
                   <b> Phone</b>: +3816458585858 <br>
                   <b>e-mail</b>: owner.last@gmail.com<br>
                </div>
                <div class=" col-sm-4 text-center"> 
                    <br>
                    <h2 class="text-center title">Shop 1</h2>
                  
                </div>
                <div class="col-sm-4"> 
                    <br>
                    <a href="changeDataShop.html">
                    <button class="float-right btn btn-success">
                        Edit data
                    </button>
                </a>
                </div>
            </div>
            
            <br>
            
            <div class="row "> 
                <div class="col-sm-12 text-center" > 
                    
                 
                  <img src="shops/shop1.jpg" class="img-fluid shopImage text-left">
                 
            
              
                    <h5 class="text-left">Description: </h5>
                    <p class="shopDescription"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also
                        em Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has be
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also
                        em Ipsum is simply dummy text of the printing an</p>
                    </div>
                    
            </div>
            <div class="row"> 
                <div class="col-sm-12">
                    <br>
                    <h4> Pick a product</h4>
                </div>
            </div>

           <div class='row'> 
                  
                <div class='col-sm-12 myCol'>
                        

                  
                        <?php $i=0;?>
                <?php  foreach ($allProducts as $product) { 
                    
                    if($i%4==0)  echo "<div class='row'>"; 
                     echo "<div class=' col-lg-3 col-md-6 col-dm-12'>";
                  echo "<div class='product_envelope' align='center'>"; 
                ?>
               
                <?php
                echo " 
                            <div class='product_image_div'>
                                <img class='img-fluid product_image' id='upload_img' src='";
                ?>
               
                 <?php 
                      
                  echo base_url("uploads/".$product->image);
                  echo "'>

                           </div>  
                           
                            <div class='product_description text-left'> 
                                <h3>$product->name</h3>
                               <p >$product->description</p>
                               <p>$product->price RSD</p>
                               
                            </div>
                           </div>
                           <br>
                           <br>
                    </div>
                       ";
                  if($i%4==3){
                    echo "</div>";
                    
                  }
                  $i++;
                   } ?>
                   
                </div>
                        
                   
        </div>  

                
        </div>
    </body>
</html>

