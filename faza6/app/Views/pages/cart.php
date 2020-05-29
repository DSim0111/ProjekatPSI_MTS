<!DOCTYPE html>
<html> 
    <head> 
        <title> Products|Giftery</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url() ?>/css/checkOrder.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/css/shopRegisterRequests.css">

    </head> 
    <body>
        <div class="container myContainer">
            <div class="row" align="center"> 

                <div class="col-sm-12"> 

                    <br>
                    <h3>You ordered these items:</h3>
                    <div class="row">
                        <?php
                        $productsPerRow = array(array(), array(), array(), array());
                        $i = 0;
                        foreach ($products as $product) {
                            array_push($productsPerRow[$i], $product);
                            $i = ($i + 1) % 4;
                        }
                        for ($i = 0; $i < 4; $i++) {
                            echo "<div class='col-sm-3 myCol'>";
                            foreach ($productsPerRow[$i] as $product) {
                                $data = ['product' => $product];
                                echo view('templates/cartProduct', $data);
                            }
                            echo "</div>";
                        }
                        ?>
                    </div>

                </div>
            </div>

            <div class="row" align="center"> 
                <div class="col-sm-12"> 

                    <h3> Total price is: 7000RSD</h3>

                </div>
            </div>
            <br>
            <div class="row" align="center"> 
                <div class="col-sm-6" align="center"> 

                    <button class="btn btn-danger">Empty your cart</button>
                </div>
                <div class="col-sm-6" align="center"> 

                    <a href="pickAWrapper.html"><button class="btn btn-success">Continue with order</button></a>
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
