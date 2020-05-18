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
function initShop(shopId) {
    // Shop whose products are in cart
    localStorage.setItem('shopId', shopId);
}
function init() {

    localStorage.removeItem('products', "");
    localStorage.removeItem('numItems', "");
    localStorage.removeItem('prices', "");
    localStorage.removeItem('productNames', "");
    localStorage.setItem('totalPrice', '0');
}

function addToCart(id, price, productName) {
    if (localStorage.getItem('products') == null) {
        cartItems = [];
        numCartItems = [];
        prices = [];
        names = [];
    } else {
        cartItems = localStorage.getItem('products').split('-');
        numCartItems = localStorage.getItem('numItems').split('-');
        prices = localStorage.getItem('prices').split('-');
        names = localStorage.getItem('productNames').split('-');
    }
    let i = 0;
    while (i < cartItems.length && cartItems[i] != id)
        i++;
    if (i == cartItems.length) {
        cartItems.push(id);
        numCartItems.push(1);
        prices.push(price);
        names.push(productName);
    } else {
        numCartItems[i] = parseInt(numCartItems[i]) + 1;
    }
    localStorage.setItem('totalPrice', parseInt(localStorage.getItem('totalPrice')) + price);
    localStorage.setItem('products', cartItems.join('-'));
    localStorage.setItem('numItems', numCartItems.join('-'));
    localStorage.setItem('prices', prices.join('-'));
    localStorage.setItem('productNames', names.join('-'));
}

function decrease(id) {
    let i = 0;
    cartItems = localStorage.getItem('products').split('-');
    numCartItems = localStorage.getItem('numItems').split('-');
    prices = localStorage.getItem('prices').split('-');
    names = localStorage.getItem('productNames').split('-');
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
        names.splice(i, 1);
        if (cartItems.length == 0) {
            init();
        } else {
            localStorage.setItem('products', cartItems.join('-'));
            localStorage.setItem('numItems', numCartItems.join('-'));
            localStorage.setItem('prices', prices.join('-'));
            localStorage.setItem('productNames', names.join('-'));
        }
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
function emptyCart() {
    localStorage.removeItem('products', "");
    localStorage.removeItem('numItems', "");
    localStorage.removeItem('prices', "");
    localStorage.removeItem('productNames', "");
    localStorage.removeItem('addOns', "");
    localStorage.setItem('totalPrice', '0');
}
//TODO[miki]: if there is no addOns selected
function addOns() {
    additions = document.querySelectorAll('input[name=additions]:checked');
    addOnIds = [];
    addOnNames = [];
    addOnPrices = [];
    additions.forEach((addition) => {
        let addOns = addition.value.split('-');
        addOnIds.push(addOns[0]);
        addOnNames.push(addOns[1]);
        addOnPrices.push(addOns[2]);
    });
    addOnIds = addOnIds.join('-');
    addOnNames = addOnNames.join('-');
    addOnPrices = addOnPrices.join('-');
    localStorage.setItem('addOnIds', addOnIds);
    localStorage.setItem('addOnNames', addOnNames);
    localStorage.setItem('addOnPrices', addOnPrices);
}
function initBill() {
    cartItems = localStorage.getItem('products').split('-');
    numCartItems = localStorage.getItem('numItems').split('-');
    prices = localStorage.getItem('prices').split('-');
    names = localStorage.getItem('productNames').split('-');
    let tableBody = $("#productsTable");
    for (let i = 0; i < cartItems.length; i++) {
        let row = $("<tr></tr>");
        // Name
        let column = $("<td></td>");
        column.append(names[i]);
        row.append(column);
        // Quantity
        column = $("<td></td>");
        column.append(numCartItems[i]);
        row.append(column);
        // Total Price
        column = $("<td></td>");
        column.append(parseInt(prices[i]) * parseInt(numCartItems[i]));
        row.append(column);
        tableBody.append(row);
    }
    let additionField = $("#additions");
    let totalPriceField = $("#totalPrice");
    // Writing additions
    addOnIds = localStorage.getItem('addOnIds').split('-');
    addOnNames = localStorage.getItem('addOnNames').split('-');
    addOnPrices = localStorage.getItem('addOnPrices').split('-');
    let additions = "";
    let addOnSum = 0;
    for (let i = 0; i < addOnIds.length - 1; i++) {
        additions = additions + addOnNames[i] + "(" + addOnPrices[i] + " RSD), ";
        addOnSum += parseInt(addOnPrices[i]);
    }
    if (addOnIds.length > 0) {
        additions = additions + addOnNames[addOnNames.length - 1] + "(" + addOnPrices[addOnNames.length - 1] + " RSD)";
        addOnSum += parseInt(addOnPrices[addOnPrices.length - 1])
    }
    additionField.text(additions);
    let productsSum = parseInt(localStorage.getItem('totalPrice'));

    totalPriceField.text("Total price: " + (addOnSum + productsSum));
}
function payment() {
    var selected = $("input[name=payment]:checked").val();
    if (selected) {
        localStorage.setItem()('payment', selected);
    }
}
function addRest() {


    let cartItems = localStorage.getItem('products').split('-');
    let numCartItems = localStorage.getItem('numItems').split('-');
    let addOns = localStorage.getItem('addOnIds').split('-');
    
    $("#shopId").val(localStorage.getItem('shopId'));
    $("#quantity").val(JSON.stringify(numCartItems));
    $("#products").val(JSON.stringify(cartItems));
    $("#payment").val(localStorage.getItem('payment'));
    $("#addOns").val(JSON.stringify(addOns));
}

