function incrementProduct(id,upDown){
  $amountInput = document.getElementById(id+'amount');
  if (upDown == "+") $amountInput.value = parseInt($amountInput.value) + 1;
  else if (upDown == "-") {
    if ($amountInput.value > 1) $amountInput.value = parseInt($amountInput.value) - 1;
  }
  // Else just don't do a thing
  return;
}

function selectExtra(id,extraID){
  $extraSelect = document.getElementById(String(id)+String(extraID));
  $label = document.getElementById(String(id)+String(extraID)+"label");
  $selected = $extraSelect.getAttribute("selected");
  if($selected != "true") {

    $label.style.fontWeight = "bold";
    $extraSelect.setAttribute("selected", "true");

  }

  else{
    $extraSelect.setAttribute("selected", "false");
    $label.style.fontWeight = "normal";
  }


}

// just declaring the base values else NaN
window.subPrice = 0;
window.totalPrice = 0;
window.uniqueProducts = 0;


function addToCart(id, extraIds){
  // just some basic value identification
  $amount = document.getElementById(id+'amount').value;
  $productName = $amount + "x " + document.getElementById(id + 'name').innerHTML;
  $productPrice = document.getElementById(id + 'price').getAttribute('price');
  $productExtras = "";

  $first = true;
  $productID = id;
  extraIds.forEach( extra => {
    // validating if extra is actually $selected
    if(document.getElementById(id+extra).getAttribute('selected') == "true"){
      if($first != true) $productExtras = $productExtras + ", "; else $first = false;
      $productExtras = $productExtras + document.getElementById(extra + 'xtrinfo').getAttribute('name');
      $productPrice = parseFloat($productPrice) + parseFloat(document.getElementById(extra + 'xtrinfo').getAttribute('price'));
      $productID = $productID + extra;
  }
});
  // applying multiplier
  $productPrice = ($productPrice * $amount).toFixed(2);

  // calculating main prices
  window.subPrice = parseFloat(window.subPrice) + parseFloat($productPrice);
  window.totalPrice = parseFloat(window.totalPrice) + 2.00 + parseFloat($productPrice);


  // adding to UI
  if (document.getElementById('cart' + $productID)){ // product not unique - need to change current
    $uniqueProductName = document.getElementById('cart' + $productID + 'name').innerHTML;
    $uniqueProductPrice = document.getElementById('cart' + $productID + 'price').innerHTML;
    document.getElementById('cart' + $productID + 'name').innerHTML = (parseInt($amount) + parseInt($uniqueProductName.substring(0,$uniqueProductName.indexOf('x')))) + "x " + document.getElementById(id + 'name').innerHTML;
    document.getElementById('cart' + $productID + 'price').innerHTML = "€" + (parseFloat($productPrice) + parseFloat($uniqueProductPrice.substring(1, $uniqueProductPrice.length))).toFixed(2);
  }
  else addToCartUI($productName, $productExtras, $productPrice, $productID); // product is unique

  document.getElementById('sub-price').innerHTML = "€" + window.subPrice.toFixed(2);
  document.getElementById('total-price').innerHTML = "€" + window.totalPrice.toFixed(2);
}

function addToCartUI(productName,productExtras,productPrice, productID){
  document.getElementById('cart_products').innerHTML += '<div id="cart' + productID + '" class="order-item">  <div class="w-clearfix">  <div id="cart' + productID +'name" class="item-name">' + productName +  '</div>  <div id="cart' + $productID +'price"class="item-price">€' + productPrice + '</div>  </div>  <div class="subinfo-for-order w-clearfix">  <div class="item-subinfo">' + productExtras + '</div>  <button style="background-color: rgb(0,0,0,0);" onclick="removeFromCart(' + productID + ')" class=" remove-product">Verwijderen</button>  </div>  </div>';
}

function removeFromCart(productID){
  document.getElementById('cart' + productID).remove();

}

/*  $(document).ready(function() {

        window.cart = <?php echo json_encode($cart) ?>;

        updateCartButton();

        $('.add-to-cart').on('click', function(event){

            var cart = window.cart || [];
            cart.push({'id':$(this)data('id'), 'name':$(this).data('name'), 'price':$(this).data('price'), 'qty':$(this).prev('input').val()});
            window.cart = cart;

            $.ajax('/add-to-cart', {
                type: 'POST',
                data: {"_token": "{{ csrf_token() }}", "cart":cart},
                success: function (data, status, xhr) {

                }
            });

            updateCartButton();
        });
    })

    function updateCartButton() {

        var count = 0;
        window.cart.forEach(function (item, i) {

            count += Number(item.qty);
        });

        $('#items-in-cart').html(count);
    }

    function addToCart(){

    }
*/
