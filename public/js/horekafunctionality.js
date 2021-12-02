function incrementProduct(id, upDown){
  $amountInput = document.getElementById(id+'amount');
  if (upDown == "+") $amountInput.value = parseInt($amountInput.value) + 1;
  else if (upDown == "-") {
    if ($amountInput.value > 1) $amountInput.value = parseInt($amountInput.value) - 1;
  }
  // Else just don't do a thing
  return;
}


function addToCart(id){

//  document.getElementById(id)
//  addToCartUI(productName, "none", productPrice);
}

function addToCartUI(productName, productExtras, productPrice){
  document.getElementById('cart_products').innerHTML += '<div class="order-item">  <div class="w-clearfix">  <div class="item-name">' + productName +  '</div>  <div class="item-price">€' + productPrice + '</div>  </div>  <div class="subinfo-for-order w-clearfix">  <div class="item-subinfo">' + productExtras + '</div>  <a href="#" class="remove-product">Verwijderen</a>  </div>  </div>';
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
