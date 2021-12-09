<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\cart;

class ShopController extends Controller
{

    public $base_uri = "https://tester.darcheni.com/";
    public $horeka_api_key = "Aly Baba-MbZE3Kc6r8";

    public function launchMainShop(Request $request){

      /*
        -=-=-=-=- Horeka API base variables -=-=-=-=-
      */


      /*
        -=-=-=-=- Horeka Systemen API Handling -=-=-=-=-
      */

      $client = new Client([
        'base_uri' => $this->base_uri . 'shop-api/'
      ]);

      // -- Fetching product data from Horeka API
      $productJson = $client->request('GET', 'products/api=' . $this->horeka_api_key);
      $productData = json_decode($productJson->getBody());

      // -- Fetching category data from Horeka API
      $categoryJson = $client->request('GET', 'categories/api=' . $this->horeka_api_key);
      $categoryData = json_decode($categoryJson->getBody());

      // -- Fetching extra data from Horeka API and identify them for each product in multidimensional array
      /*
      $extrasJson = $client->request('GET', 'extras/api=' . $this->horeka_api_key);
      $extrasData = json_decode($extrasJson->getBody());
      */

      foreach($productData as $product){
        $extrasPerProductJson = $client->request('GET', 'extra-products/' . $product->{'id'} . '/api=' . $this->horeka_api_key);
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
      $shopJson = $client->request('GET', 'api=' . $this->horeka_api_key);
      $shopData = json_decode($shopJson->getBody());
      $shop_name = $shopData->{'shop_name'};
      $shop_details = $shopData->{'details'};
      $logo_uri = $this->base_uri . 'uploads/shop/' . $shopData->{'image'};
      $domain_name = $shopData->{'domain_name'};
      // {{ $product_base_uri }}{{ $product->{'image'} }}


      // -- Retreiving AJAX cart data from cookies
      $cart = session()->get('cart');
      if ($cart == null) $cart = [];



      return view('index', [
      // -- products and category values from shop data
      'products' => $productData,
      'product_base_uri' => $this->base_uri . "uploads/product/",
      //'extras' => $extrasData,
      'categories' => $categoryData,
      'extras_identifier' => $extrasIdentifier,

      // -- main shop info
      'shop_name' => $shop_name,
      'logo_uri' => $logo_uri,
      'shop_details' => $shop_details,
      'domain_name' => $domain_name,

      // -- AJAX cart cookie values
      'cart' => $request->session()->get('cart')
    ]);
    }

    public function launchCheckOut(Request $request){

      /*
        -=-=-=-=- Horeka API base variables -=-=-=-=-
      */


      /*
        -=-=-=-=- Horeka Systemen API Handling -=-=-=-=-
      */

      $client = new Client([
        'base_uri' => $this->base_uri . 'shop-api/'
      ]);

      // - -Fetching shop data from Horeka API
      $shopJson = $client->request('GET', 'api=' . $this->horeka_api_key);
      $shopData = json_decode($shopJson->getBody());
      $shop_name = $shopData->{'shop_name'};
      $shop_details = $shopData->{'details'};
      $logo_uri = $this->base_uri . 'uploads/shop/' . $shopData->{'image'};
      $domain_name = $shopData->{'domain_name'};
      // {{ $product_base_uri }}{{ $product->{'image'} }}


      // -- Retreiving AJAX cart data from cookies
      $cart = session()->get('cart');
      if ($cart == null) $cart = [];



      return view('verwerkbestelling.index', [
      // -- main shop info
      'shop_name' => $shop_name,
      'logo_uri' => $logo_uri,
      'shop_details' => $shop_details,
      'domain_name' => $domain_name,
      'cart' => $request->session()->get('cart')
    ]);
    }

    public function addToCart(Request $request){
      $productId = $request->input('product');
      $selectedExtraIds = str_split($request->input('extras'));
      $extras = '';
      // Starting Horeka API client
      $client = new Client([
        'base_uri' => $this->base_uri . 'shop-api/'
      ]);

      // -- Fetching Single Product Data from Horeka API
      $singleProductJson = $client->request('GET', 'product/' . $productId . '/api=' . $this->horeka_api_key);
      $singleProductData = json_decode($singleProductJson->getBody());

      // -- Fetching extras data from Horeka API
      $productExtrasJson = $client->request('GET', 'extra-products/' . $productId . '/api=' . $this->horeka_api_key);
      $productExtras = json_decode($productExtrasJson->getBody());

      $totalPrice = $singleProductData->{'price'};
      $uniqueProductId = strval($productId);
      // Retreiving selected extras details
      for ($i=0; $i<count($selectedExtraIds); $i++){
        foreach($productExtras as $productExtra){
          if($productExtra->{'id'} == $selectedExtraIds[$i]){
            $totalPrice += $productExtra->{'price'};
            $uniqueProductId = $uniqueProductId . strval($productExtra->{'id'});
            $extras = $extras . strval($productExtra->{'extras_name'} . ', ');
          }
        }
      }


      // Setting new cart base values to current cart
      $currentCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
      $cart = new Cart($currentCart);
      // creating the product variable
      $product[0] = $uniqueProductId; // route done
      $product[1] = $productId; // route done
      $product[2] = $selectedExtraIds; // route done
      $product[3] = $totalPrice; // route done
      $product[4] = substr($extras, 0, -2); // route done
      $product[5] = $singleProductData->{'product_name'};
      $product[6] = $request->input('Amount');

      // retreiving API product info
      $cart->add($product);
      session()->put('cart', $cart);
      return redirect()->back();
    }

    public function removeFromCart(Request $request){
    // simply get the Unique value and remove it from array after which we update the session cookie
    $uniqueId = $request->input('uniqueId');
    $cart = $request->session()->get('cart');
    $cart->remove($uniqueId);
    session()->put('cart', $cart);
    return redirect()->back();
    }
}
