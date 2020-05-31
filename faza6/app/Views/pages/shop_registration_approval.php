<!DOCTYPE html> 
<html>
    <head>
        <title>
            Reports | Giftery
        </title>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        <link  type="text/css" rel="stylesheet" href="<?php echo base_url("css/style_navbar.css"); ?>">
        <link rel="stylesheet" href="<?= base_url("css/showUserRequest.css") ?>">
      
    </head>
    <body> 
        <?php
        if (isset($header)) {

            echo view($header);
        }
        ?>  
        <br>
        <span></span>
        <div class="container-fluid  myContainer">

            <div class="row">
                <div class="offset-sm-1 col-sm-10 ">
                    <style>
                        .orange{
                            
                            color:#FF7F50;
                        }
                        
                        
                    </style> <h2 style="color:black"> Requests for new shop accounts</h2>
                    <hr>
                   
                </div>
            </div>
            <?php
            if (isset($errors))
                echo "<p style='color:red;'>" . $error . "</p>";
            ?>
            <!--Container-->
            <div class="row ">  
                <div class="offset-sm-1 col-sm-10 " 
                     
                     <?php if(count($shops)==0):?>style='background-color:#f0efeb; color:black;padding:20px; border-radius:10px; box-shadow:0 4px 8px 0 rgba(0,0,0,0.2);'<?php endif;?>
                     >      
                    
                    <?php
                    if (count($shops)==0){
                        echo "<h6 >There is no requests!</h6>";
                    }
                    foreach ($shops as $shop) {
                        $data = ['shop' => $shop];
                        echo view("templates/shopRequest", $data);
                    }
                    ?>

                </div>
            </div>


        </div>

    </body>
</html> 