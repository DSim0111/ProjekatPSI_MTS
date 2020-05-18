<?php
if (!isset($shop)) {

    echo "There has been an error, please return to the previous page and try again.";
    return;
}
?>
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
    <body onload="initShop(<?php echo $shop->id;?>)"> 
        <div class="container myContainer">
            <div class="row"> 
                <div class="col-sm-4 lighter"> 
                    <b>Address</b>: <?php echo $shop->address; ?> <br>
                    <b> Phone</b>: <?php echo $shop->phoneNum; ?><br>
                    <b>e-mail</b>: <?php echo $shop->email; ?><br>
                </div>
                <div class=" col-sm-4 text-center"> 
                    <br>
                    <h2 class="text-center title">
                        <?php
                        echo $shop->shopName;
                        ?></h2>

                </div>
                <div class="col-sm-4"> 
                    <br>

                    <!--Simona-->

                    <?php
                    if (isset($userRole) && $userRole == "User") {

                        echo view("templates/reportShopBtn", ["shopId" => $shop->id]);
                        echo view("templates/viewCartBtn", ["shopId" => $shop->id]);
                    } else {
                        if (isset($userRole) && $userRole == "Administrator") {
                            echo view("templates/removeShopBtn", ["shopId" => $shop->id]);
                        }
                    }
                    ?>
                    </a>
                </div>
            </div>

            <br>

            <div class="row "> 
                <div class="col-sm-12 text-center" > 


                    <img src="<?php echo base_url("uploads/" . $shop->image) ?>" class="img-fluid shopImage text-left">



                    <h5 class="text-left">Description: </h5>
                    <p class="shopDescription"> 
                        <?php
                        echo $shop->description;
                        ?>
                    </p>
                </div>

            </div>
            <div class="row"> 
                <div class="col-sm-12">
                    <br>
                    <h4> Pick a product</h4>
                </div>
            </div>

            <div class='row'> 

                <div class='col-sm-12 myCol'>



                    <?php $i = 0; ?>
                    <?php
                    foreach ($allProducts as $product) {

                        if ($i % 4 == 0)
                            echo "<div class='row'>";
                        echo "<div class=' col-lg-3 col-md-6 col-dm-12'>";
                        echo "<div class='product_envelope' align='center'>";
                        ?>

                        <?php
                        echo " 
                            <div class='product_image_div'>
                                <img class='img-fluid product_image' id='upload_img' src='";
                        ?>

                        <?php
                        echo base_url("uploads/" . $product->image);
                        echo "'>

                           </div>  
                           
                            <div class='product_description text-left'> 
                                <h3>$product->name</h3>
                               <p >$product->description</p>
                               <p>$product->price RSD</p>
                               <input class='btn btn-success float-right' type='button' value='Dodaj u korpu'  onclick='addToCart({$product->idProduct},{$product->price},\"{$product->name}\");'>
                            </div>
                           </div>
                           <br>
                           <br>
                    </div>
                       ";
                        if ($i % 4 == 3) {
                            echo "</div>";
                        }
                        $i++;
                    }
                    ?>

                </div>



            </div>  

            <br>


                <!--SIMONA-->
                <?php
                if (!isset($commentError)):
                    ?>

                    <div class="row"> 
                        <div class="offset-sm-1 col-sm-10">
                            <?php
                            if ($userRole == "User") {
                                echo view("templates/commentsSection_User", $comments);
                            } else {
                                echo view("templates/commentsSection", $comments);
                            }
                            ?>
                        </div>
                    </div>


                    <?php
                else:
                    // if there has been an error 
                    echo "<p class='errorMessage'>" . $error . "</p>";
                    ?>


                <?php endif ?>


                <!--END_SIMONA-->

        </div>
    </body>
</html>

