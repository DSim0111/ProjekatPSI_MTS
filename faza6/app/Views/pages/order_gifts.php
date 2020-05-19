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
                    <form method="POST" action="/User/order">
                        <p>Person's name</p>
                        <input type="text" name="name" placeholder="Enter first name">
                        <p>Person's surname</p>
                        <input type="text" name="surname" placeholder="Enter last name">
                        <p>Address</p>
                        <input type="text" name="address" placeholder="Enter address">
                        <p>Note</p>
                        <input type="text" name="note" placeholder="Enter note">
                        <p>Date of delivery</p>
                        <input type="text" name="date" placeholder="Enter date">
                        <p>Time of delivery</p>
                        <input type="text" name="time" placeholder="Enter time">


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