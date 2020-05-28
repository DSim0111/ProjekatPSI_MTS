<div id="<?php echo "shopContent$i";?>" class="col-sm-12 data_box shop_content"> 

    <!--image-->
    <img id="<?php echo "img$i";?>" src="<?php echo base_url("uploads/" . $shop->image) ?>" class="shop_img">


    <div class="rating_div"> 

        <img src="<?php echo base_url("images/icons/rating.png") ?>"  class="rating_icon icons">
        <p >Rating: <b id="<?php echo "rating$i";?>"><?php echo round($shop->rating, 2); ?></b></p>
    </div>

    <h3 id="<?php echo "name$i";?>">
        <?php
        echo $shop->shopName;
        ?>
    </h3>
    <p id="<?php echo "description$i";?>" class="description">
        <?php
        echo $shop->description;
        ?>
    </p>

    <a id="<?php echo "pageLink$i";?>" href="<?php echo $shopPageLink ?>?shopId=<?php echo $shop->id ?>"><button type="button" class="btn  visit_shop right_corner" value="Visit">Visit</button> </a>
    <!--miki-->
    <?php
    if (isset($userRole) && $userRole == "User") {
        echo "<a id='addToFav$i' method='POST' href='" . base_url("/User/addToFav?shopId=$shop->id") . "><button type='button' class='btn btn-info visit_shop right_corner_second' value='Add to favorite'>Add to favorite</button> </a>";
    }
    ?>

</div> 

