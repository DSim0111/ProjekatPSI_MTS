<!DOCTYPE html>
<html> 
    <head> 
        <title> Products|Giftery</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url("css/shopPage_Tijana.css") ?>"> 
        <link rel="stylesheet" href="<?php echo base_url("css/style_common.css") ?>">
        <link rel="stylesheet" href="<?php echo base_url("css/style_comments.css") ?>"> 
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/js/shopCart.js"></script>
    </head> 
    <body onload="initBill();">
        <?php
        if (isset($header)) {

            echo view($header);
        }
        ?>
        <br>
        <div class="container myContainer">


            <div class="row" align="center"> 
                <div class="col-sm-12"> 

                    <h3>Your bill</h3>
                    <hr class="hrGray"> 
                </div>
            </div>

            <div class="row"> 
                <div class="col-sm-6 " align="center">
                    <b>Products: </b>
                    <style>
                        #myTable{
                            width: 80%; 
                        }
                    </style>
                    <table class="table table-striped table-dark" id="myTable">
                        <style>
                            .thead-dark td{

                                font-weight:bold;
                                color:lightgreen;   
                            }
                        </style>
                        <thead class="thead-dark">
                            <tr> 
                                <td>Product</td>
                                <td> Quantity</td>
                                <td> Total price</td>
                            </tr>
                        </thead>
                        <!--Table for products Product | Quantity | Price-->
                        <tbody id="productsTable">

                        </tbody>

                    </table>
                </div>
                <div class="col-sm-6"> 
                    <b>Additions:</b> 
                    <!--Additions Name(price RSD), Name(price RSD)...-->
                    <span id="additions">

                    </span>
                    <br>
                    <hr>
                    <h5><b style="border:1px solid white" id="totalPrice"> </b></h5>

                </div>
            </div>
            <hr class="hrGray">

            <div class="row" >
                <div class="col-sm-12" font-size="30px">
                    <h3>Choose a payment method</h3>

                    <input checked type="radio" name="payment" value="pod"> P.O.D (Payment On Delivery)
                    <br>
                    <input type="radio" name="payment" value="creditCard"> Credit card
                    <br>
                    <input type="radio" name="payment" value="pbd"> Pay before delivery
                </div>
            </div>
            <div class="row" align="center"> 
                <div class="col-sm-12"> 

                    &nbsp;
                </div>
            </div>
            <div class="row" align="center"> 
                <div class="col-sm-12"> 

                    <a href="/User/order_gifts"><button class="btn btn-info" onClick="payment();">Continue with order</button></a>
                </div>
            </div>

            <div class="row" align="center"> 
                <div class="col-sm-12"> 

                    &nbsp;
                </div>
            </div>
        </div> 


    </body>
</html>