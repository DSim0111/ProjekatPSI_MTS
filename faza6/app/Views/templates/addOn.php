<div class="row ">
    <div class="product_envelope col-sm-12"> 
        
        <div class="product_image_div">
            <img  align="center" class="img-fluid product_image"src=<?php echo base_url()."/uploads/{$addOn->image}";?>> 
        </div>  

        <div class="product_description text-left img-fluid"> 
            <h3><?php echo $addOn->name;?></h3>
            <?php echo "<input type='checkbox' name='additions' value='{$addOn->idA}-{$addOn->name}-{$addOn->price}'>({$addOn->price}" . " RSD)";?>
        </div>

    </div>
</div>
<br>
