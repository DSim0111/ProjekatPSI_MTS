<!DOCTYPE html>
<html>
    <head> 
        <title> 
            Orders
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url("css/shopPage_Tijana.css") ?>"> 
        <link rel="stylesheet" href="<?php echo base_url("css/style_common.css") ?>">
        <link rel="stylesheet" href="<?= base_url("css/changeDataShop.css") ?>"> 
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/js/shopCart.js"></script>
    </head>
    <body>
        <?php
        if (isset($header)) {

            echo view($header);
        }
        ?>
        <br>
        
        <div class="container myContainer"> 

            <div class="row" > 
                <div class="offset-sm-4 col-sm-4 log-box-center rowBorder"> 
                    <?php if(isset($no_products)) echo "<br><span style='color:red'>$no_products</span></center>";?>
                    <form method="POST" action="/User/order">
                        <p>Person's name</p>
                        <input type="text" name="name" placeholder="Enter first name">
                        <?php if(isset($name)) echo "<br><span style='color:red'>$name</span></center>";?>
                        <p>Person's surname</p>
                        <input type="text" name="surname" placeholder="Enter last name">
                        <?php if(isset($surname)) echo "<br><span style='color:red'>$surname</span></center>";?>
                        <p>Address</p>
                        <input type="text" name="address" placeholder="Enter address">
                        <?php if(isset($address)) echo "<br><span style='color:red'>$address</span></center>";?>
                        <p>Note</p>
                        <input type="text" name="note" placeholder="Enter note">
                        <?php if(isset($note)) echo "<br><span style='color:red'>$note</span></center>";?>
                        <p>Date of delivery [yyyy-mm-dd]</p>
                        <input type="text" name="date" placeholder="Enter date">
                        <?php if(isset($date)) echo "<br><span style='color:red'>$date</span></center>";?>
                        <?php if(isset($bad_date)) echo "<br><span style='color:red'>$bad_date</span></center>";?>
                        <p>Time of delivery [hh:mm]</p>
                        <input type="text" name="time" placeholder="Enter time">
                        
                        <?php if(isset($time)) echo "<br><span style='color:red'>$time</span></center>";?>
                        <?php if(isset($bad_time)) echo "<br><span style='color:red'>$bad_time</span></center>";?>


                        <input type="hidden" name="shopId" id="shopId">
                        <input type="hidden" name="products" id="products">
                        <input type="hidden" name="addOns" id="addOns">
                        <input type="hidden" name="payment" id="payment">
                        <input type="hidden" name="quantity" id="quantity">
                        <div class="row">
                            <div align="center" class="offset-sm-4 col-sm-4">
                                <button  type="submit" class="btn btn-info" name="submitOrder" onclick="addRest();">
                                    Submit
                                </button> 
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </body> 
</html>