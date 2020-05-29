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
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
       <link  type="text/css" rel="stylesheet" href="<?php echo base_url("css/style_navbar.css"); ?>">
        <link rel="stylesheet"   type="text/css" href="<?= base_url("css/addRemoveProductsShop.css")?>"> 
       
    </head> 
    
    <body> 
          <?php
        if (isset($header)) {

            echo view($header);
        }
        ?>  
        <div class=" myContainer container">
            <div class="row"> 
                <div class=" text-center col-sm-3 offset-sm-0 offset-lg-4 col-lg-2"> 
                    <br>
                    <h2 class="text-center title"><?php echo $shop->shopName; ?></h2>
                  
                </div>
            
           
                <div class="col-sm-4 col-lg-3  ">  
                    <br>
                    <a href="<?=base_url("Shop/addProduct")?>">
                    <button class="float-right btn functions btn-danger">
                        Add product
                    </button>
                </a>
                </div>
                 <div class="col-sm-4 col-lg-3">  
                     <br>
                    <a  href="<?=base_url("Shop/addAddOn")?>" >
                    <button class="float-right btn functions btn-danger" >
                        Add addOn
                    </button>
                      
                </a>
                     
                </div>
            </div>
               
            
            <div class='row'> 
                <div class='col-sm-12'>
                    <br>
                    <h4> Existing addOns</h4>
                </div>
            </div>
            <hr>
              <div class='row'> 
                  
                <div class='col-sm-12 myCol'>
                        

                  
                        <?php $i=0;?>
                <?php foreach ($allAddOns as $addOn) { 
                    
                    if($i%4==0)  echo "<div class='row'>" ;?> 
                   
                    <div class=' col-lg-3 col-md-6 col-dm-12'>
                    <div class='product_envelope' align='center'>
                       <div class='product_image_div'>
                    <a href='<?= base_url("Shop/deleteAddOn/{$addOn->idA}") ?>'>
                    <button class='btn btn-danger deleteBtn'>
                        <svg class='bi bi-trash' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z'/>
                            <path fill-rule='evenodd' d='M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' clip-rule='evenodd'/>
                        </svg>
                    </button>
                    </a>
                           
                        <img class='img-fluid product_image' id='upload_img' src="<?= base_url("uploads/".$addOn->image)?>">

                           </div>  
                           
                            <div class='product_description text-left'> 
                                <h3 align='center'><?php echo $addOn->name; ?></h3>
                               
                               <p align='center'> <?php echo $addOn->price; ?> RSD </p>
                               
                            </div>
                           
                    </div>
                    <br>
                    <br>
                   </div>
                      <?php
                  if($i%4==3){
                    echo "</div>";
                    
                  }
                  
                  $i++;
                   } 
                   if(($i%4!=3) && $i!=0)echo '</div>';
                   ?>
                   
                </div>
                        
                   
        </div>  
          
            <div class='row'> 
                <div class='col-sm-12'>
                    <br>
                    <h4> Existing products</h4>
                </div>
            </div>
        
            <hr>
                    
        <div class='row'> 
                  
                <div class='col-sm-12 myCol'>
                        

                  
                        <?php $i=0;?>
                <?php  foreach ($allProducts as $product) { 
                    if($i%4==0) echo "<div class='row'>"; ?> 
                    
                        <div class=' col-lg-3 col-md-6 col-dm-12'>
               
                            <div class='product_envelope' align='center'>
                                <div class='product_image_div'>
                                        <a href='<?=base_url("Shop/deleteProduct/{$product->idProduct}") ?>'> 
                                            <button class='btn btn-danger deleteBtn'>
                                                <svg class='bi bi-trash' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                    <path d='M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z'/>
                                                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' clip-rule='evenodd'/>
                                              </svg>
                                            </button>
                                        </a>
                
                            
                                    <img class='img-fluid product_image' id='upload_img' src='<?=base_url("uploads/".$product->image)?>'>

                                </div>  
                           
                                <div class='product_description text-left'> 
                                  <h3 align='center'><?php echo $product->name;?></h3>
                                   <p align='center'><?php echo $product->description;?></p>
                                   <p align='center'><?php echo $product->price;?> RSD</p>
                               
                                 </div>
                           
                    
                   
                            </div>
                     <br>
                    <br>
                   </div>
                 <?php
                  if($i%4==3 || ($i+1)== count($allProducts)){
                    echo "</div>";
                    
                  }
                  $i++;
                   } ?>
                   
                </div>
                        
                   
        </div>  
        </div>  
                       
       
            
    </body>
    
</html>

