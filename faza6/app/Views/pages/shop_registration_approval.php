<!DOCTYPE html> 
<html>
    <head>
        <title>
            Reports | Giftery
        </title>
        <link  type="text/css" rel="stylesheet" href="<?php echo base_url("css/style_navbar.css"); ?>">
        <link rel="stylesheet" href="<?= base_url("css/showUserRequest.css") ?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body> 
        <?php
        if (isset($header)) {

            echo view($header);
        }
        ?>  
        <br>
        <span></span>
        <div class="container myContainer">

            <div class="row">
                <div class="col-sm-12 requestsContainer">
                    <h1> Requests for new shop accounts</h1>
                </div>
            </div>
            <?php
            if (isset($errors))
                echo "<p style='color:red;'>" . $error . "</p>";
            ?>
            <!--Container-->
            <div class="row requestEnvelope">  
                <div class="col-sm-12">            
                    <?php
                    if (count($shops)==0){
                        echo "<h1>There is no requests!</h1>";
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