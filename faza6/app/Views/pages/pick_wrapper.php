<!DOCTYPE html>
<html> 
    <head> 
        <title> Products|Giftery</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url("css/shopPage_Tijana.css") ?>"> 
        <link rel="stylesheet" href="<?php echo base_url("css/style_common.css") ?>">
        <link rel="stylesheet" href="<?php echo base_url("css/style_shopPage.css") ?>"> 
        <link rel="stylesheet" href="<?php echo base_url("css/style_comments.css") ?>"> 
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/js/shopCart.js"></script>
    </head> 
    <body>
        <div class="container myContainer">
            <div class="row" > 

                <div class="col-sm-12" align="center"> 
                    <br>

                    <h5> Pick addition</h5> 
                    <form id="wrapperForm" method="POST" action="/User/payment_method">
                        <?php
                        foreach ($addons as $addon) {
                            echo "<input type='checkbox' name='additions' value='{$addon->idA}-{$addon->name}-{$addon->price}'> {$addon->name}({$addon->price}" . " RSD)";
                        }
                        ?>
                        <br><br>
                        <button class="btn btn-success" onclick="addOns()">
                            Submit
                        </button> 

                    </form>   
                    <br><br>




                    <hr class="hrGray">


                    <br> 
                    <br> 




                </div>
            </div>
        </div> 


    </body>
</html>