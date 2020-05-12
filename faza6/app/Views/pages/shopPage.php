<!DOCTYPE html>
 <?php
 // SIMONA 
            if(!isset($shop) || !isset($userRole)){
                
                echo "There has been an error, please return to the previous page and try again.";
                return;
            }
    ?>
<html> 
    <head> 
        <title> Products|Giftery</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url("css/style_common.css")?>">
        <link rel="stylesheet" href="<?php echo base_url("css/style_shopPage.css")?>"> 
                <link rel="stylesheet" href="<?php echo base_url("css/style_comments.css")?>"> 
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head> 
    <body> 
      
        <div class="container-fluid myContainer">
            <div class="row"> 
                <div class="col-sm-4 lighter"> 
                    <b>Address</b>: <?php echo $shop->address;?> <br>
                   <b> Phone</b>: <?php echo $shop->phoneNum;?><br>
                   <b>e-mail</b>: <?php echo $shop->email;?><br>
                </div>
                <div class=" col-sm-4 text-center"> 
                    <br>
                    <h2 class="text-center title">Shop 1</h2>
                  
                </div>
                <div class="col-sm-4"> 
                    <br>
                
                  <!--Simona-->
             
                    <?php
                        if(isset($userRole) && $userRole=="User"){
                            
                            echo view("templates/reportShopBtn", ["shopId"=>$shop->id]);
                        }
                    
                    ?>
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
                <div class="col-sm-12 tags">
                    <img src="icons/tag.png" width="40px" height="40px">Tags <br> 
                    <ul type="none"> 
                        <li class="tag radius-lg"> 
                            CATEGORY1
                        </li>
                        <li class="tag radius"> 
                            CATEGORY2
                        </li>
                        <li class="tag radius"> 
                            CATEGORY3
                        </li>
                        <li class="tag radius"> 
                            CATEGORY4
                        </li>

                    </ul>


                </div>
            </div>
            <!--Products-->
            <div class="row"> 
                <div class="col-sm-12">
                    <br>
                    <h4> Pick a product</h4>
                </div>
            </div>

                <div class="row"> 
                  
                    <div class="col-sm-3 myCol"> 
                        

                        <div class="row ">
                            <a href="viewProduct.html">
                        <div class="product_envelope col-sm-12" align="center"> 
                            <button  onClick="addToCart(); return false; " class="btn btn-info addToCartBtn">
                                Add to cart
                            </button>
                            <div class="product_image_div">
                            <img class="img-fluid product_image"src="products/pr1.jpg"> 

                        </div>  
                            
                            <div class="product_description text-left"> 
                                <h3 >Name</h3>
                               <p > Description</p>
                               <p>200,00 RSD</p>
                               
                            </div>
                           
                        </div>
                    </a>

                    </div>
                    <br>
                    <div class="row ">
                        <div class="product_envelope col-sm-12" align="center"> 
                            <div class="product_image_div">
                            <img class="img-fluid product_image"src="products/pr2.jpg"> 

                        </div>  
                            
                            <div class="product_description text-left"> 
                                <h3 >Name</h3>
                               <p > Description</p>
                               <p>200,00 RSD</p>
                               
                            </div>
                           
                        </div>

                    </div>
                    <br>
                </div>
               <!--Kolona2-->
                    <div class="col-sm-3 myCol"> 

                         <div class="row ">
                        <div class="product_envelope col-sm-12" align="center"> 
                            <button  onClick="addToCart()" class="btn btn-info addToCartBtn">
                                Add to cart
                            </button>
                            <div class="product_image_div">
                            <img class="img-fluid product_image"src="products/pr4.jpg"> 

                        </div>  
                            
                            <div class="product_description text-left"> 
                                <h3 >Name</h3>
                               <p > Description</p>
                               <p>200,00 RSD</p>
                               
                            </div>
                           
                        </div>

                    </div>
                    <br>

                    <div class="row ">
                        <div class="product_envelope col-sm-12" align="center"> 
                            <button  onClick="addToCart()" class="btn btn-info addToCartBtn">
                                Add to cart
                            </button>
                            <div class="product_image_div">
                            <img class="img-fluid product_image"src="products/pr5.jpg"> 

                        </div>  
                            
                            <div class="product_description text-left"> 
                                <h3 >Name</h3>
                               <p > Description</p>
                               <p>200,00 RSD</p>
                               
                            </div>
                           
                        </div>

                    </div>
                    <br>
                    </div>
                 <!--Kolona 3-->   
                    <div class="col-sm-3  myCol"> 

                        <div class="row my_row">
                            <div class="product_envelope col-sm-12" align="center"> 
                                <button  onClick="addToCart()" class="btn btn-info addToCartBtn">
                                    Add to cart
                                </button>
                                <div class="product_image_div">
                                <img class="img-fluid product_image"src="products/pr6.jpg"> 
    
                            </div>  
                                
                                <div class="product_description text-left"> 
                                    <h3 >Name</h3>
                                   <p > Description</p>
                                   <p>200,00 RSD</p>
                                   
                                </div>
                               
                            </div>
    
                        </div>

                        <br>

                        <div class="row ">
                            <div class="product_envelope col-sm-12" align="center"> 
                                <button  onClick="addToCart()" class="btn btn-info addToCartBtn">
                                    Add to cart
                                </button>
                                <div class="product_image_div">
                                <img class="img-fluid product_image"src="products/pr7.jpg"> 
    
                            </div>  
                                
                                <div class="product_description text-left"> 
                                    <h3 >Name</h3>
                                   <p > Description</p>
                                   <p>200,00 RSD</p>
                                   
                                </div>
                               
                            </div>
    
                        </div>
                        <br>

                    </div>
                    <!--Kolona 4-->
                    <div class="col-sm-3 myCol"> 

                        <div class="row my_row">
                            <div class="product_envelope col-sm-12" align="center"> 
                                <button  onClick="addToCart()" class="btn btn-info addToCartBtn">
                                    Add to cart
                                </button>
                                <div class="product_image_div">
                                <img class="img-fluid product_image"src="products/pr8.jpg"> 
    
                            </div>  
                                
                                <div class="product_description text-left"> 
                                    <h3 >Name</h3>
                                   <p > Description</p>
                                   <p>200,00 RSD</p>
                                   
                                </div>
                               
                            </div>
    
                        </div>
                        <br>
                        
                        <div class="row my_row">
                            <div class="product_envelope col-sm-12" align="center"> 
                                <button  onClick="addToCart()" class="btn btn-info addToCartBtn">
                                    Add to cart
                                </button>
                                <div class="product_image_div">
                                <img class="img-fluid product_image"src="products/pr9.jpg"> 
    
                            </div>  
                                
                                <div class="product_description text-left"> 
                                    <h3 >Name</h3>
                                   <p > Description</p>
                                   <p>200,00 RSD</p>
                                   
                                </div>
                               
                            </div>
    
                        </div>
                        <br>

                    </div>
                    
                    
                </div>
                <div class="row"> 
                    <div class="col-sm-12"> 
                        &nbsp; 
                    </div>
                </div>
               


                <div class="row"> 
                    <div class="col-sm-12 footer" align="center"> 
                        <a href="checkOrder.html"> <button class="btn btn-success order_btn">Check your cart</button> </a>
                    </div>
                </div>
            <!--SIMONA-->
            <?php 
            //if user is logged in 
            if (isset($userRole) && $userRole=="User"): ?>
            <?php 
            if(!isset($commentError)):
            ?>

            <div class="row"> 
                <div class="offset-sm-1 col-sm-10">
                    <?php echo view("templates/commentsSection", $comments)?>
                </div>
            </div>
              <?php else:
                  // if there has been an error 
                  echo "<p class='errorMessage'>".$error."</p>"; 
                  ?>
            
                
             <?php endif?>
            <?php endif; ?>  
            
                <!--END_SIMONA-->
            
        </div>
       
        
    </body>
</html>