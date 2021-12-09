<!DOCTYPE html><!--  Last Published: Tue Nov 30 2021 13:46:00 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="619b7419f5b32f01dcd4600b" data-wf-site="619b7419f5b32f8143d4600a">
<head>
  <meta charset="utf-8">
  <title>Online Bestellen {{ $shop_name }} - {{ $shop_details }}</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/components.css" rel="stylesheet" type="text/css">
  <link href="css/alybaba.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Karla:200,300,regular,500,600,700,800,200italic,300italic,italic,500italic,600italic,700italic,800italic","Spectral:200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <style>
  ::-webkit-scrollbar {
    width: 10px;
}
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.0);
    border-radius: 10px;
}
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(81, 84, 82,0.0);
}
  ::-webkit-scrollbar-corner       { display: none; height: 0px; width: 0px; }
</style>
</head>
<body class="body">
  <div class="hero-bar">
    <div data-poster-url="videos/bg3-poster-00001.jpg" data-video-urls="videos/bg3-transcode.mp4,videos/bg3-transcode.webm" data-autoplay="true" data-loop="true" data-wf-ignore="true" class="hero-bg-video w-background-video w-background-video-atom"><video autoplay="" loop="" style="background-image:url(&quot;videos/bg3-poster-00001.jpg&quot;)" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
        <source src="videos/bg3-transcode.mp4" data-wf-ignore="true">
        <source src="videos/bg3-transcode.webm" data-wf-ignore="true">
      </video></div>
    <div class="container w-container">
      <div class="w-layout-grid hero-grid">
        <div id="w-node-f45ef1e5-b357-aa3a-851a-0e2e0ef120f5-0ef120f1" class="hero-text">
          <div class="top-hero-div">
            <div class="line"></div>
            <div class="text-block-2">Welkom bij {{ $shop_name }}</div>
            <div class="line"></div>
          </div>
          <h1 class="hero-heading">{{ $shop_details }}</h1>
        </div><img src="images/logo-alybaba-.png" loading="lazy" height="" id="w-node-f45ef1e5-b357-aa3a-851a-0e2e0ef120fd-0ef120f1" srcset="images/logo-alybaba--p-500.png 500w, images/logo-alybaba--p-800.png 800w, images/logo-alybaba--p-1080.png 1080w, images/logo-alybaba--p-1600.png 1600w, images/logo-alybaba-.png 1899w" sizes="(max-width: 991px) 120px, 180px" alt="" class="image">
      </div>
    </div>
  </div>
  <div class="bar">
    <div class="container w-container">
      <a href="#" class="hoe-werkt-het">Hoe werkt het?</a>
    </div>
  </div>
  <div class="categories-bar">
    <div class="container nopad w-container">
      <div data-delay="4000" data-animation="slide" class="category-slider w-slider" data-autoplay="false" data-easing="ease-in-out-quad" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
        <div class="mask w-slider-mask">
          @foreach ($categories as $category)
          <div class="slide w-slide">
            <div class="category-button">
              <a href="#{{ $category->{'name'} }}" class="w-inline-block">{{ $category->{'name'} }}</a>
            </div>
          </div>
          @endforeach
        </div>
        <div class="left-arrow w-slider-arrow-left">
          <div class="icon w-icon-slider-left"></div>
        </div>
        <div class="right-arrow w-slider-arrow-right">
          <div class="icon-2 w-icon-slider-right"></div>
        </div>
        <div class="hidden w-slider-nav w-round"></div>
      </div>
    </div>
  </div>
  <div class="container w-container">
    <div class="w-layout-grid main-ordering-grid main-shop">
      <div id="w-node-_5bbf39f7-9fa1-0e7c-2ad8-7173a0e19a7f-dcd4600b" class="sticky-orderlist-holder w-clearfix">
        <div data-w-id="b372a054-ceed-0089-a6da-554e59f675b0" style="opacity:0" class="order-list main-shop">
          <div class="order-information">
            <h3>Jouw bestelling</h3>
            <div id="cart_products" class="products-scroller main-shop">
              @if ($cart != null) @foreach ($cart->uniqueProducts as $key => $cartProduct)
              <div class="order-item">
                <div class="w-clearfix">
                  <div class="item-name">{{ $cartProduct['amount'] }} x {{ $cartProduct['name'] }}</div>
                  <div class="item-price">€ {{ number_format($cartProduct['price'], 2) }}</div>
                </div>
                <div class="subinfo-for-order w-clearfix">
                  <div class="item-subinfo"> {{ $cartProduct['extras'] }} </div>
                  <form method="POST" action="verwijderen">
                    @csrf
                    <input type="hidden" name="uniqueId" value="{{ $key }}">
                    <button type="submit" style="background-color: rgb(0,0,0,0);" class="remove-product">Verwijderen</button>
                  </form>
              </div>
              </div>
              @endforeach @endif
            </div>
            <a data-w-id="a9759669-7f43-2017-4e98-5fa1b5f324d8" href="#" class="close-order-block">x</a>
            <div class="order-item total">
              <div class="subinfo-for-order w-clearfix">
                <div class="item-subinfo">Subtotaal</div>
                <a href="#" class="remove-product" id="sub-price">@if ($cart != null) @if ($cart->subPrice > 0) € {{ number_format($cart->subPrice, 2) }} @else --- @endif @else --- @endif </a>
              </div>
              <div class="subinfo-for-order w-clearfix">
                <div class="item-subinfo">Bezorgkosten</div>
                <a href="#" class="remove-product">€2.00</a>
              </div>
              <div class="total w-clearfix">
                <div class="item-name">Totaal</div>
                <div id="total-price" class="item-price">@if ($cart != null) @if ($cart->totalPrice > 2) € {{ number_format($cart->totalPrice, 2) }} @else --- @endif @else --- @endif </div>
              </div>
            </div>
          </div>
          <div class="finish-order-div">
            <a href="voltooien" class="important-button w-button">Bestelling Voltooien</a>
            <div class="of">of</div>
            <a href="#" class="annuleren">Bestelling annuleren</a>
          </div>
        </div>
      </div>
      <div id="w-node-_0687af3d-0e11-42a2-f64b-0250f19b86e7-dcd4600b" class="assortment">
        <div class="hidden_embed w-embed">@foreach ($categories as $category)</div>
        <div id="s" class="whole-category-assortment">
          <div class="w-embed">
            <div id="{{ $category->{'name'} }}"></div>
          </div>
          <div data-w-id="9474acb4-e8b9-cf89-d2de-ce91691bbe56" style="opacity:0" class="category-head main-shop">
            <h2>{{ $category->{'name'} }}</h2>
            <div class="line no-marg normal-width"></div>
          </div>
          <div class="w-layout-grid product-listing main-shop">
            @foreach ($products as $product)
            @if ($product->{'category_id'} == $category->{'id'})
            <div id="w-node-bce4ac1b-5ed0-8320-46ed-b4d9f75ad62f-dcd4600b" class="product">
              <div style="opacity:0;display:none" class="product-pop-up">
                <div class="form-block">
                  <a data-w-id="0efb55b5-d834-de69-a30a-7545ff493741" href="#" class="close">x</a>
                  <form id="{{ $product->{'id'} }}" onsubmit="addToCart({{ $product->{'id'} }})" method="POST" action="toevoegen">
                    <div class="product-pop-up-holder">
                      <div class="main-product">
                        <div class="large-product-image-holder"><img src="{{ $product_base_uri }}{{ $product->{'image'} }}" loading="lazy" sizes="100vw" alt="" class="larger-product-image"></div>
                        <h3 class="product-name" id="{{ $product->{'id'} }}name">{{ $product->{'product_name'} }}</h3>
                        <div class="product-price" price="{{ $product->{'price'} }}" id="{{ $product->{'id'} }}price">€{{ $product->{'price'} }}</div>
                        <p class="product-description">{{ $product->{'details'} }}</p>
                      </div>
                      <div class="extras-for-product">
                        <div class="text-block">Extraatje toevoegen?</div>
                        @foreach ( $extras_identifier[$product->{'id'}] as $extra )
                        <button selected="false" onclick="selectExtra({{ $product->{'id'} }}, {{ $extra[2] }})" id="{{ $product->{'id'} }}{{ $extra[2] }}" style="display: block; padding-left: 0px !important; background-color: rgba(0, 0, 0, 0)" type="button">
                          <span id="{{ $product->{'id'} }}{{ $extra[2] }}label" class="w-form-label" for="extra-11"> {{ $extra[0] }}
                            <strong class="extra-price">- €{{ $extra[1] }}
                            </strong>
                            <div id="{{ $extra[2] }}xtrinfo" price="{{ $extra[1] }}" name="{{ $extra[0] }}" style="display:none;">
                          </span>
                        </button>
                        @endforeach
                      </div>
                    </div>
                    <div class="add-to-cart w-clearfix"><input type="number" class="select-amount w-input" maxlength="256" name="Amount" min="1" data-name="Amount" value="1" placeholder="Aantal" id="{{ $product->{'id'} }}amount" required="">
                      <div class="add-amount">
                        <button type="button" onclick="incrementProduct({{ $product->{'id'} }},'+');" style="background-color: rgba(0, 0, 0, 0)" href="#" class="amount-button">+</button>
                        <button type="button" onclick="incrementProduct({{ $product->{'id'} }},'-');" style="background-color: rgba(0, 0, 0, 0)" href="#" class="amount-button">-</button>
                      </div>
                      @csrf
                      <input id="{{ $product->{'id'} }}extras" type="hidden" name="extras" value="">
                      <input type="hidden" name="product" value="{{ $product->{'id'} }}">
                      <input id="submit" type="submit" value="+ Toevoegen Aan Bestelling" data-wait="Bezig.." class="important-button add-to-cart w-button">
                    </div>
                  </form>
                  <div class="w-form-done">
                    <div>+Toegevoegd aan winkelwagen</div>
                  </div>
                  <div class="w-form-fail">
                    <div>Er is iets fout gegaan!</div>
                  </div>
                </div>
                <div data-w-id="bce4ac1b-5ed0-8320-46ed-b4d9f75ad656" class="closepopupdetection"></div>
              </div>
              <a data-w-id="bce4ac1b-5ed0-8320-46ed-b4d9f75ad657" style="opacity:0" href="#" class="product-preview w-inline-block">
                <div class="product-image-holder"><img src="{{ $product_base_uri }}{{ $product->{'image'} }}" loading="lazy" width="176" sizes="176px" alt="" class="product-image"></div>
                <div class="product-information-holder w-clearfix">
                  <div>{{ $product->{'product_name'} }}</div>
                  <div class="item-price">€{{ $product->{'price'} }}</div>
                </div>
              </a>
            </div>
              @endif
              @endforeach
          </div>
        </div>
        <div class="hidden_embed w-embed">@endforeach</div>
      </div>
    </div>
  </div>
  <footer id="footer" class="footer-2 wf-section">
    <div class="container w-container">
      <div class="footer-flex-container">
        <a href="#" class="footer-logo-link"><img src="images/logo-alybaba-.png" srcset="images/logo-alybaba--p-500.png 500w, images/logo-alybaba--p-800.png 800w, images/logo-alybaba--p-1080.png 1080w, images/logo-alybaba--p-1600.png 1600w, images/logo-alybaba-.png 1899w" sizes="165px" alt="" class="footer-image"></a>
        <div>
          <h2 class="footer-heading">Informatie</h2>
          <ul role="list" class="w-list-unstyled">
            <li>
              <a href="#" class="footer-link">Privacy beleid</a>
            </li>
            <li>
              <a href="#" class="footer-link">Algemene voorwaarden</a>
            </li>
            <li>
              <a href="#" class="footer-link">Cookie beleid</a>
            </li>
          </ul>
        </div>
      </div>
      <div>{{ $domain_name }} © Alle rechten voorbehouden - <a href="https://horekasystemen.nl" target="_blank" class="horeka">Een <strong class="bold-text">Horeka </strong>systeem</a>
      </div>
    </div>
  </footer>
  <div class="bestel-footer">
    <div class="container w-container">
      <a data-w-id="42d3efb1-8efd-36ad-edab-90603ace5d0d" href="#" class="important-button order-button w-button">Open bestelMenu</a>
      <div data-w-id="f78929d1-2998-28f2-b4ac-02e90d97b73c" style="opacity:0" class="order-list hidden-on-shop-pc">
        <div class="order-information">
          <h3>Jouw bestelling</h3>
          <div class="products-scroller">
          @if ($cart != null) @foreach ($cart->uniqueProducts as $key => $cartProduct)
              <div class="order-item">
                <div class="w-clearfix">
                  <div class="item-name">{{ $cartProduct['amount'] }} x {{ $cartProduct['name'] }}</div>
                  <div class="item-price">€ {{ number_format($cartProduct['price'], 2) }}</div>
                </div>
                <div class="subinfo-for-order w-clearfix">
                  <div class="item-subinfo"> {{ $cartProduct['extras'] }} </div>
                  <form method="POST" action="verwijderen">
                    @csrf
                    <input type="hidden" name="uniqueId" value="{{ $key }}">
                    <button type="submit" style="background-color: rgb(0,0,0,0);" class="remove-product">Verwijderen</button>
                  </form>
              </div>
              </div>
          @endforeach @endif
          </div>
          <a data-w-id="f78929d1-2998-28f2-b4ac-02e90d97b74c" href="#" class="close-order-block">x</a>
          <div class="order-item total">
            <div class="subinfo-for-order w-clearfix">
              <div class="item-subinfo">Subtotaal</div>
              <a href="#" class="remove-product" id="sub-price">@if ($cart != null) @if ($cart->subPrice > 0) € {{ number_format($cart->subPrice, 2) }} @else --- @endif @else --- @endif </a>
            </div>
            <div class="subinfo-for-order w-clearfix">
              <div class="item-subinfo">Bezorgkosten</div>
              <a href="#" class="remove-product">€2.00</a>
            </div>
            <div class="total w-clearfix">
              <div class="item-name">Totaal</div>
              <div id="total-price" class="item-price">@if ($cart != null) @if ($cart->totalPrice > 2) € {{ number_format($cart->totalPrice, 2) }} @else --- @endif @else --- @endif </div>
            </div>
          </div>
        </div>
        <div class="finish-order-div">
          <a href="voltooien" class="important-button w-button">Bestelling Voltooien</a>
          <div class="of">of</div>
          <a href="#" class="annuleren">Bestelling annuleren</a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=619b7419f5b32f8143d4600a" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/alybaba.js" type="text/javascript"></script>
  <script src="js/horekafunctionality.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
