function increaseQuantity() {
    var currentQuantity = parseInt(document.getElementById("product-quantity").innerHTML,10);
    if(currentQuantity == 1 ){
        document.getElementById("decrease-quantity-button").disabled = false;
        document.getElementById("decrease-quantity-button").classList.remove("item-button-disabled");
    }
    document.getElementById("product-quantity").innerHTML = currentQuantity + 1;
}

function decreaseQuantity() {
    var currentQuantity = parseInt(document.getElementById("product-quantity").innerHTML,10);
    if(currentQuantity == 2 ){
       document.getElementById("decrease-quantity-button").disabled = true;
       document.getElementById("decrease-quantity-button").classList.add("item-button-disabled");
    }
    document.getElementById("product-quantity").innerHTML = currentQuantity - 1;
};

function numberWithCommas() {
    var initPrice = document.getElementById('product-detail-price').innerHTML;
    var price =  initPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    document.getElementById('product-detail-price').innerHTML = price;
}

numberWithCommas();