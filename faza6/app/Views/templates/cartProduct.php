<div class="row ">
    <div class="product_envelope col-sm-12"> 
        <button class="btn btn-danger deleteBtn" onClick='decrease(<?php echo $product->idProduct;?>)'>-</button>
        
        <div class="product_image_div">
            <img  align="center" class="img-fluid product_image"src=<?php echo base_url()."/uploads/{$product->image}";?>> 
        </div>  

        <div class="product_description text-left img-fluid"> 
            <h3><?php echo $product->name;?></h3>
            <p><?php echo $product->description;?></p>
            <p><?php echo $product->price;?></p>
            <p id="p<?php echo "$product->idProduct";?>">Number of items ordered: <?php echo $numItems;?></p>
        </div>

    </div>
</div>
<br>

