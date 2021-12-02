<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ShopController extends Controller
{
    public function launchMainShop(){

      /*
        -=-=-=-=- Horeka API base variables -=-=-=-=-
      */

      $base_uri = "https://tester.darcheni.com/";
      $horeka_api_key = "Aly Baba-MbZE3Kc6r8";


      /*
        -=-=-=-=- Horeka Systemen API Handling -=-=-=-=-
      */

      $client = new Client([
        'base_uri' => $base_uri . 'shop-api/'
      ]);

      // -- Fetching product data from Horeka API
      $productJson = $client->request('GET', 'products/api=' . $horeka_api_key);
      $productData = json_decode($productJson->getBody());

      // -- Fetching category data from Horeka API
      $categoryJson = $client->request('GET', 'categories/api=' . $horeka_api_key);
      $categoryData = json_decode($categoryJson->getBody());

      // -- Fetching extra data from Horeka API and identify them for each product in multidimensional array
      /*
      $extrasJson = $client->request('GET', 'extras/api=' . $horeka_api_key);
      $extrasData = json_decode($extrasJson->getBody());
      */

      foreach($productData as $product){
        $extrasPerProductJson = $client->request('GET', 'extra-products/' . $product->{'id'} . '/api=' . $horeka_api_key);
        $extrasPerProductData = json_decode($extrasPerProductJson->getBody());
        $extrasInProductCount = 0;
        foreach($extrasPerProductData as $extraProductData){
          $extrasIdentifier[$product->{'id'}][$extrasInProductCount][0] = $extraProductData->{'extras_name'};
          $extrasIdentifier[$product->{'id'}][$extrasInProductCount][1] = $extraProductData->{'price'};
          $extrasIdentifier[$product->{'id'}][$extrasInProductCount][2] = $extraProductData->{'id'};
          $extrasInProductCount++;
        }
      }

      // - -Fetching shop data from Horeka API
      $shopJson = $client->request('GET', 'api=' . $horeka_api_key);
      $shopData = json_decode($shopJson->getBody());
      $shop_name = $shopData->{'shop_name'};
      $shop_details = $shopData->{'details'};
      $logo_uri = $base_uri . 'uploads/shop/' . $shopData->{'image'};
      $domain_name = $shopData->{'domain_name'};
      // {{ $product_base_uri }}{{ $product->{'image'} }}


      // -- Retreiving AJAX cart data from cookies
      $cart = session()->get('cart');
      if ($cart == null) $cart = [];



      return view('index', [
      // -- products and category values from shop data
      'products' => $productData,
      'product_base_uri' => $base_uri . "uploads/product/",
      //'extras' => $extrasData,
      'categories' => $categoryData,
      'extras_identifier' => $extrasIdentifier,

      // -- main shop info
      'shop_name' => $shop_name,
      'logo_uri' => $logo_uri,
      'shop_details' => $shop_details,
      'domain_name' => $domain_name,

      // -- AJAX cart cookie values
      'cart' => $cart
    ]);
    }

    public function getExtras(){


    }

    public function addToCart(Request $request){
      session()-put('cart', $request->post('cart'));

      return response()->json([
        'status' => 'added'
      ]);

    }
}
