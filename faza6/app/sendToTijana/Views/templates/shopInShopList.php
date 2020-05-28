  
<?php

    if(!isset($shop)){
        
        echo "Error"; 
        return;
    }
?>

<div class="row">
    <div class="col-sm-12   addBorders rounded shop_content_wrapper  ">
      
        <div class="row addPadding" >
            <div class="col-sm-12  borderBottom addPadding">
         <img src="<?php echo base_url("uploads/".$shop->image)?>" class="rounded shop_img" width="80%">
                        <h1><?php
                        
                        echo $shop->shopName;
                        ?></h1>
                        <p class="description">
                            
                            
                            <?php
                            echo $shop->description; 
                            ?>
                        </p>
            </div>
        </div>
        <div class="row  text-left addPadding">
            <div class="col-sm-12 rating">
         <img src="<?php echo base_url("images/icons/rating.png")?>"  class="rating_icon icons">
                      <p> Buyer rating: <?php
                      echo round($shop->rating,2); // define when retrieving data  
                      ?></p>
                      <a href="<?php echo $shopPageLink?>?shopId=<?php echo $shop->id?>"><button type="button" class="btn btn-success visit_shop" value="Visit">Visit</button> </a>
            </div>
            </div>        
    </div>
</div>
<br>


