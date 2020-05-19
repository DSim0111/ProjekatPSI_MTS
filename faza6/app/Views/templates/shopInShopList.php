  
<?php
if (!isset($shop)) {

    echo "Error";
    return;
}
?>
<div class="col-sm-12 data_box shop_content"> 

    <!--image-->
    <img src="<?php echo base_url("uploads/" . $shop->image) ?>" class="shop_img">


    <div class="rating_div"> 

        <img src="<?php echo base_url("images/icons/rating.png") ?>"  class="rating_icon icons">
        <p >Rating: <b><?php echo round($shop->rating, 2); ?></b></p>
    </div>

    <h3>
        <?php
        echo $shop->shopName;
        ?>
    </h3>
    <p class="description">
        <?php
        echo $shop->description;
        ?>
    </p>

    <a href="<?php echo $shopPageLink ?>?shopId=<?php echo $shop->id ?>"><button type="button" class="btn  visit_shop right_corner" value="Visit">Visit</button> </a>
    <!--miki-->
    <?php
    if (isset($userRole) && $userRole == "User") {
        echo "<a method='POST' href='" . base_url("/User/addToFav?shopId=$shop->id") . "><button type='button' class='btn btn-info visit_shop right_corner_second' value='Add to favorite'>Add to favorite</button> </a>";
    }
    ?>

</div> 


