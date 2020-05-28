<!DOCTYPE html> 
<?php

    if(!isset($shop)){
        
        echo "There has been an error, please return to the previous page and try again."; 
        return; 
    }
?>
<html>
    <head> 
        <title> 
            Contact | Giftery 
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
         <link rel="stylesheet" href="<?php echo base_url("css/style_common.css")?>">
        <link rel="stylesheet" href="<?php echo base_url("css/style_reportShop.css")?>">
      
    </head>
    <body> 
        <style> 
            
        </style>
        <div class="container-fluid myContainer">
            <div class="container inside_container">
           
                 
            

                    <div class="row "  style='height: 100%;'> 
                        <div class="offset-sm-1 col-sm-10 form_container"> 
                            

                         

                              <br>
                           <b style='font-size:2em;'> Tell us what happened. We are here to help.</b>  
                                <br>
                                <?php
                               
                                
                                   
                                    if(isset($error)){
                                        echo " You wanted to report this shop: ".$shop->shopName. "<br>"; 
                                        echo "<p style='color:red;'>".$error."</p>";
                                    }else if(isset($success)){
                                        
                                       echo "<p class='successMessage'>".$success."</p>";
                                    }else{
                                         echo " You wanted to report this shop: ".$shop->shopName. "<br>"; 
                                    }
                                ?>
                            <br>
                            <br>
                            <form name="reportForm" method="POST" action="<?php echo base_url('User/reportShopSubmit')?>"> 
                               
                                 <br>
                                 <input type="hidden" name="shopId" value="<?php echo $shop->id?>">
                                 
                                <textarea type="text" class="commentText"  name="message" value='' placeholder="Enter your message to administrator..."></textarea>
                                <br>
                                <div align="center">
                                    
                                    <button  type="submit" class="btn btn-success"> 
                                      Submit
                                   </button>
                                 
                                </div>
                            </form> 

                        </div>
                    </div>

                 </div>
       
                </div>
    </body>
</html> 