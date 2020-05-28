<!--TODO[miki]: integrate this into products overView-->
<html>
    <head>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/js/shopCart.js"></script>
    </head>
    <body onload="init()">
        <form id="productsData" method="POST" action="<?php echo base_url(); ?>/User/checkCart">
            <input id="num" type="hidden" name="numItems">
            <input id="products" type="hidden" name="products">
            <input id="butt" type="button" value="send" >
        </form>
        <input type="button" value="send28"  onclick="addToCart(28)">
        <input type="button" value="send29"  onclick="addToCart(29)">
        <input type="button" value="send30"  onclick="addToCart(30)">
        <input type="button" value="send31"  onclick="addToCart(31)">
        <input type="button" value="send32"  onclick="addToCart(32)">
        <input type="button" value="send33"  onclick="addToCart(33)">
        <input type="button" value="send34"  onclick="addToCart(34)">
        HELLO WORLD.
    </body>
</html>
