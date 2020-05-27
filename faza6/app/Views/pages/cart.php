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
    <body>
        <?php
        if (isset($header)) {

            echo view($header);
        }
        ?>
        <br>
        <form id="sendForm" method="POST" action="<?php echo base_url(); ?>/User/checkCart">
            <input id="num" type="hidden" name="numItems">
            <input id="products" type="hidden" name="products">
            <input id="shopId" type="hidden" name="shopId" value="<?php echo $shopId; ?>">
        </form>
        <br>
        <div class="container myContainer">
            <div class="row" align="center"> 

                <div class="col-sm-12"> 
                    <?php if(isset($no_products)) echo "<br><span style='color:red'>$no_products</span></center>";?>
                    <br>
                    <h3>You ordered these items:</h3>
                    <div class="row">
                        <?php
                        $sum = 0;
                        if (isset($products) and (count($products) > 0)) {
                            $productsPerRow = array(array(), array(), array(), array());
                            $numItemsPerRow = array(array(), array(), array(), array());
                            $i = 0;
                            $j = 0;
                            foreach ($products as $product) {
                                
                                array_push($productsPerRow[$i % 4], $product);
                                array_push($numItemsPerRow[$i % 4], $numItems[$i]);
                                $sum += $numItems[$i] * $product->price;
                                $i++;
                            }
                            for ($i = 0; $i < 4; $i++) {
                                echo "<div class='col-sm-3 myCol'>";
                                $j = 0;
                                foreach ($productsPerRow[$i] as $product) {
                                    
                                    $data = ['product' => $product, 'numItems' => $numItemsPerRow[$i][$j]];
                                    echo view('templates/cartProduct', $data);
                                    $j++;
                                }
                                echo "</div>";
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>

            <div class="row" align="center"> 
                <div class="col-sm-12"> 

                    <h3 id="totalPrice"> Total price is: <?php echo $sum . "RSD"; ?></h3>

                </div>
            </div>
            <br>
            <div class="row" align="center"> 
                <div class="col-sm-6" align="center"> 

                    <button class="btn btn-danger emptyCartBtn" onclick="emptyCart()">Empty your cart</button>
                </div>
                <div class="col-sm-6" align="center"> 
                    <form id="continue" method="POST" action="<?php echo base_url(); ?>/User/pick_wrapper">
                        <input id="shopIdSend" type="hidden" name="shopId" value="<?php echo $shopId; ?>">
                        <input id="numCartItem" type="hidden" name="numCartItem">
                        <button class="btn btn-info" onClick="checkNumItems();">Continue with order</button>
                    </form>

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
