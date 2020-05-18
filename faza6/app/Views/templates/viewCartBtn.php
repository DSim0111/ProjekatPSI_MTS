
<div class='text-center'>
    <form id="productsData" method="POST" action="<?php echo base_url(); ?>/User/checkCart">
        <input id="num" type="hidden" name="numItems">
        <input id="products" type="hidden" name="products">
        <input id="shopId" type="hidden" name="shopId" value="<?php echo $shopId;?>">
        <input class='btn btn-success' id="butt" type="button" value="Korpa" >
    </form>
</div>