<?php

namespace App\Models;

class Cart
{
  public $uniqueProducts = null;
  public $subPrice = 0;

  function __construct($currentCart){
    if ($currentCart){
      $this->uniqueProducts = $currentCart->uniqueProduct;
      $this->totalPrice = $currentCart->totalPrice;
      $this->subPrice = $currentCart->subPrice;
    }
    // else there is no cart yet

    function addToCart($product){

      $uniqueProductId = $product[0]
      $productId = $product[1];
      $extraIds = $product[2];
      $price = $product[3];
      $storedProduct = [
        'amount' => 0,
        'name' => $productId,
        'extras' => $extrasIds,
        'price' => $price
      ];

      // is current product actually unique?
      if (in_array($uniqueProductIds, $this->uniqueProducts)){
        // not unique
        $storedProduct = $this->uniqueProducts['uniqueProductId'];
      }
      $storedProduct['amount']++;
      $storedProduct['price'] = $storedProduct['amount'] * $storedProduct['price'];
      $this->uniqueProducts['uniqueProductId'] = $storedProduct;
      $subPrice += $storedProduct['price'];
    }
  }
}
