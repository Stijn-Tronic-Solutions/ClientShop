<?php

namespace App\Models;

class Cart
{
  public $uniqueProducts = null;
  public $subPrice = 0.00;
  public $totalPrice = 2.00;

  function __construct($currentCart){
    if ($currentCart){
      $this->uniqueProducts = $currentCart->uniqueProducts;
      $this->subPrice = $currentCart->subPrice;
      $this->totalPrice = $currentCart->totalPrice;
    }
    // else there is no cart yet
  }

  function add($product){

    $uniqueProductId = $product[0];
    $productId = $product[1];
    $extraIds = $product[2];
    $price = $product[3];
    $extras = $product[4];
    $productName = $product[5];
    $amount = $product[6];

    $storedProduct = [
      'amount' => 0,
      'name' => $productName,
      'productId' => $productId,
      'extraIds' => $extraIds,
      'extras' => $extras,
      'price' => $price
    ];

    // is current product actually unique?
    if ($this->uniqueProducts != null) if (isset($this->uniqueProducts[$uniqueProductId])){
      // not unique
      $storedProduct = $this->uniqueProducts[$uniqueProductId];
      $this->subPrice -= $storedProduct['price'];
      $this->totalPrice -= $storedProduct['price'];
      $storedProduct['price'] = $storedProduct['price'] / $storedProduct['amount'];
    }
    $storedProduct['amount'] = $storedProduct['amount'] + $amount;
    $storedProduct['price'] = $storedProduct['amount'] * $storedProduct['price'];
    $this->uniqueProducts[$uniqueProductId] = $storedProduct;
    $this->subPrice += $storedProduct['price'];
    $this->totalPrice += $storedProduct['price'];
  }

  function remove($uniqueId){
    $this->subPrice -= $this->uniqueProducts[$uniqueId]['price'];
    $this->totalPrice -= $this->uniqueProducts[$uniqueId]['price'];
    unset($this->uniqueProducts[$uniqueId]);

  }

}
