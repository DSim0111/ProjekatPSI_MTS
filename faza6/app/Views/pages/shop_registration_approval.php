<!DOCTYPE html> 
<html>
    <head>
        <title>
            Reports | Giftery
        </title>
        <link rel="stylesheet" href="<?php echo base_url() ?>/css/shopRegisterRequests.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body> 
        <br>
        <div class="container myContainer">

            <div class="row"> 
                <div class="col-sm-12"> 
                    <h1> Requests for new shop accounts</h1>
                </div>
            </div>
            <?php if(isset($errors))
                   echo "<p style='color:red;'>".$error."</p>";
                ?>
            <!--Container-->
            <div class="shopReportContainer row">  
                <div class="col-sm-12">            
                    <?php
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