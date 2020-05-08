  
<?php

    if(!isset($shop)){
        
        echo "Error"; 
    }
?>
<div class="row shopRow"> 

                    <div class="col-sm-12 shop" > 
                        <div class="border-bottom">
                       
                        <img src="<?php echo base_url("uploads/".$shop->image)?>" class="rounded float-left">
                      
                    
                        <h2> <i>Shop name</i></h2>
                       
                        <p class="text-justify">
                           <?php
                           
                            echo $shop->description; 
                           ?>
                        </p>

                      </div>
                      <br>
                      <div class="rating text-left">
                      <img src="<?php echo base_url("images/icons/rating.png")?>"  class="rating_icon icons">
                      <p> Buyer rating: <?php
                      // echo $shop->rating; // define when retrieving data  
                      ?></p>
                      <a href="<?php echo $shopPageLink ?>"><button class="btn btn-success visit_shop" value="Visit">Visit</button> </a>
                      
                    </div>
                    <br>
                      
                      
                      

                     
                        
                    </div>
                    
</div>