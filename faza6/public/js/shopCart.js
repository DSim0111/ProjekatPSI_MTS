//TODO[miki]: to add information about current shop and shop whose products are in cart
//TODO[miki]: what happenes if user switch to another shop but there are some products in the basket from previous store?
//Alert that asks if you want to delete all current products from cart?
$(document).ready(function () {
    $('#butt').click(function () {
        if (localStorage.getItem('products') == null) {
            cartItems = [];
            numCartItems = [];
        } else {
            cartItems = localStorage.getItem('products').split('-');
            numCartItems = localStorage.getItem('numItems').split('-');
        }
        $("#products").val(JSON.stringify(cartItems));
        $("#num").val(JSON.stringify(numCartItems));
        $("#productsData").submit();
    });
});

function init() {

    localStorage.removeItem('products', "");
    localStorage.removeItem('numItems', "");
    localStorage.removeItem('prices', "");
    localStorage.setItem('totalPrice', '0');
}
//TODO[miki]: getting prices from html, not from localStorage
function addToCart(id) {
    if (localStorage.getItem('products') == null) {
        cartItems = [];
        numCartItems = [];
        prices = [];
    } else {
        cartItems = localStorage.getItem('products').split('-');
        numCartItems = localStorage.getItem('numItems').split('-');
        prices = localStorage.getItem('prices').split('-');
    }
    let i = 0;
    while (i < cartItems.length && cartItems[i] != id)
        i++;
    if (i == cartItems.length) {
        cartItems.push(id);
        numCartItems.push(1);
        prices.push(200);
    } else {
        numCartItems[i] = parseInt(numCartItems[i]) + 1;
    }
    localStorage.setItem('totalPrice', parseInt(localStorage.getItem('totalPrice')) + 200);
    localStorage.setItem('products', cartItems.join('-'));
    localStorage.setItem('numItems', numCartItems.join('-'));
    localStorage.setItem('prices', prices.join('-'));
}
//TODO[miki]: getting prices from html, not from localStorage
function decrease(id) {
    let i = 0;
    cartItems = localStorage.getItem('products').split('-');
    numCartItems = localStorage.getItem('numItems').split('-');
    prices = localStorage.getItem('prices').split('-');
    for (; id != cartItems[i]; i++)
        ;
    if (i == cartItems.length) {
        alert("Nesto ne valja sa nizom!");
        return;
    }
    numCartItems[i] = parseInt(numCartItems[i]) - 1;
    localStorage.setItem('totalPrice', parseInt(localStorage.getItem('totalPrice')) - parseInt(prices[i]));
    if (numCartItems[i] == 0) {
        cartItems.splice(i, 1);
        numCartItems.splice(i, 1);
        prices.splice(i, 1);
        localStorage.setItem('products', cartItems.join('-'));
        localStorage.setItem('numItems', numCartItems.join('-'));
        localStorage.setItem('prices', prices.join('-'));
        $("#products").val(JSON.stringify(cartItems));
        $("#num").val(JSON.stringify(numCartItems));
        $("#sendForm").submit();
        return;
    }
    localStorage.setItem('products', cartItems.join('-'));
    localStorage.setItem('numItems', numCartItems.join('-'));
    $("#p" + id).text("Number of items ordered: " + numCartItems[i]);
    $("#totalPrice").text(" Total price is: " + localStorage.getItem('totalPrice') + "RSD");

}

