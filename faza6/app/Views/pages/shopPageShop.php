<?php
if (!isset($shop)) {

    echo "There has been an error, please return to the previous page and try again.";
    return;
}
?>

<!DOCTYPE html>
<html> 
    <head> 
        <title> Products|Giftery</title>
         <link  type="text/css" rel="stylesheet" href="<?php echo base_url("css/style_navbar.css"); ?>">
        <link rel="stylesheet" href="<?= base_url("css/shopPage_Tijana.css")?>"> 
            <link rel="stylesheet" href="<?php echo base_url("css/style_common.css")?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head> 
    <body> 
          <?php
        if (isset($header)) {

            echo view($header);
        }
        ?>  
        <div class="container myContainer">
            <div class="row"> 
               
                <div class="offset-sm-4 col-sm-4 text-center"> 
                    <br>
                    <h2 class="text-center title"> <?php echo $shop->shopName; ?></h2>
                  
                </div>
                <div class="col-sm-4"> 
                    <br>
                    <a href="changeDataShop.html">
                    <button class="float-right btn btn-info">
                        Edit data
                    </button>
                </a>
                </div>
            </div>
            
            <br>
            
            <div class="row "> 
                <div class="col-sm-12 text-center" > 
                    
                   <div class="row">
                      <div class="col-sm-3">
                        <img src="<?php echo base_url("uploads/" . $shop->image) ?>" class="img-fluid shopImage text-left">
                 
                      </div>
                      <div class="col-sm-8">
                         <div class="row">
                             <div class="col-sm-12 desc_div">
                            <h5 class="text-left">Description: </h5>
                            <p class="shopDescription"> <?php echo $shop->description; ?></p>
                             </div>
                         </div>
                          <br>
                          <hr>
                          <br>
                     <div class="row" > 
                         <div class="col-sm-12 shop_info" align="left">
                             <span>  <b>Address</b>:  <?php echo $shop->address; ?> </span><br>
                             <span> <b> Phone</b>:  <?php echo $shop->phoneNum; ?> </span><br>
                             <span><b>e-mail</b>:  <?php echo $shop->email; ?></span><br>
                         </div>
                    </div>
                        </div>
                   </div>
                </div>  
            </div>
            <div class="row"> 
                <div class="col-sm-12">
                    <br>
                    <h4> Pick a product</h4>
                </div>
            </div>
            <hr>
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
           
             
 <?php
            if (!isset($commentError)):
                ?>
            <div class="row"> 
                <div class="col-sm-12">
                    <br>
                    <h4>Comment section</h4>
                    <hr>
                </div>
                 
            </div>
           
            <br>
                <div class="row"> 
                    <div class="offset-sm-1 col-sm-10">
                <?php
                if ($userRole == "User") {

                    echo view("templates/commentsSection_User", $comments);
                } else {
                    echo view("templates/commentsSection", $comments);
                }
                ?>
                          </div>
                </div>


<?php
else:
    // if there has been an error 
    echo "<p class='errorMessage'>" . $error . "</p>";
    ?>


            <?php endif ?>


            <!--END_SIMONA-->


                
        </div>
    </body>
</html>

