<div class="row ">
    <div class="product_envelope col-sm-12" align="center"> 
        <button class="btn btn-danger decreaseProducts">-</button>
        <div class="product_image_div">
            <img class="img-fluid product_image"src=<?php echo base_url()."/images/{$product->image}";?>> 

        </div>  

        <div class="product_description text-left"> 
            <h3><?php echo $product->name?></h3>
            <p><?php echo $product->description?></p>
            <p><?php echo $product->price?></p>
            <p>Number of items ordered: 5</p>
        </div>

    </div>
</div>
<br>

