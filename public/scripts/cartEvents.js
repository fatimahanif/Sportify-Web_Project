function openCart() {
    document.getElementById("cart-overlay-div").style.visibility = "visible";
    console.log("hi");
}

function closeCart() {
    document.getElementById("cart-overlay-div").style.visibility = "hidden";
    console.log("bye");
}

function increase() {
    var current = parseInt(document.getElementById("amount").innerText);
    document.getElementById("amount").innerText = ++current;
    console.log(current);
}

function decrease() {
    var current = parseInt(document.getElementById("amount").innerText);
    document.getElementById("amount").innerText = --current;
    console.log(current);
}

function clear() {
    document.getElementById("cart-content-div").innerHTML = "Cart is empty";
}

document.getElementById("cart-nav-btn").addEventListener("click", openCart);
document.getElementById("close-cart-btn").addEventListener("click", closeCart);
// document.getElementById("increase-quantity").addEventListener("click", increase);
// document.getElementById("decrease-quantity").addEventListener("click", decrease);
document.getElementById("clear-cart-btn").addEventListener("click", clear);
