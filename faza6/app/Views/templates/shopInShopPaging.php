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
        echo "<a id='addToFav$i' method='POST' href='" . base_url("/User/addToFav?shopId=$shop->id") . "><button type='button' class='btn btn-info visit_shop right_corner_second' data-toggle='tooltip' data-placement='bottom' title='Add to favourites' >".'<svg  width="24" height="24" fill="white" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402m5.726-20.583c-2.203 0-4.446 1.042-5.726 3.238-1.285-2.206-3.522-3.248-5.719-3.248-3.183 0-6.281 2.187-6.281 6.191 0 4.661 5.571 9.429 12 15.809 6.43-6.38 12-11.148 12-15.809 0-4.011-3.095-6.181-6.274-6.181"/></svg>'."</button> </a>";
    }
    ?>

</div> 

