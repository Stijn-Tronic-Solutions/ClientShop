<!DOCTYPE html><!--  Last Published: Tue Dec 07 2021 19:08:00 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="619b7419f5b32f6693d4600c" data-wf-site="619b7419f5b32f8143d4600a">
<head>
  <meta charset="utf-8">
  <title>Bestelling voltooien</title>
  <meta content="Bestelling voltooien" property="og:title">
  <meta content="Bestelling voltooien" property="twitter:title">
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
<body>
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
  <div class="finish-order-section wf-section">
    <div class="container w-container">
      <h2>Je bestelling afronden</h2>
      <div class="pay-form w-form">
        <form id="email-form" name="email-form" data-name="Email Form">
          <h3>Een kort overzicht van je bestelling</h3>
          <div style="height: auto;" class="products-scroller">
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
            <input type="text" class="w-input" maxlength="256" name="Belangrijke-opmerking" data-name="Belangrijke opmerking" placeholder="Belangrijke opmerking? Noteer dat hier." id="Belangrijke-opmerking" required="">
          </div>
          <div data-w-id="4823b5cb-fb62-32e6-cebb-83826542d371" style="opacity:0" class="w-layout-grid bestelling-verwerken-grid">
            <h3 id="w-node-_3775fbd1-b15a-10ef-d904-8755aaff0a5b-93d4600c">Hoe wil je de bestelling verwerken?</h3>
            <a id="w-node-_842708ae-ea0a-cc35-46e4-ca6b8dd6d7a3-93d4600c" href="#" class="verwerk-option-link hidden w-inline-block">
              <div class="verwerk-option-content"><img src="images/undraw_Eating_together_re_ux62-1.svg" loading="lazy" alt="" class="verwerk-option-image">
                <div class="verwerk-text">Hier opeten</div>
              </div>
            </a>
            <a id="w-node-b3a88585-5e8a-44db-aa8a-eaf369bc0740-93d4600c" href="#" class="verwerk-option-link w-inline-block">
              <div class="verwerk-option-content"><img src="images/undraw_On_the_way_re_swjt.svg" loading="lazy" alt="" class="verwerk-option-image">
                <div class="verwerk-text">bezorgen</div>
              </div>
            </a>
            <a id="w-node-_9ce2a1ff-c40b-26ec-1df4-5799fad0585a-93d4600c" href="#" class="verwerk-option-link w-inline-block">
              <div class="verwerk-option-content"><img src="images/undraw_takeout_boxes_ap54.svg" loading="lazy" alt="" class="verwerk-option-image">
                <div class="verwerk-text">afhalen</div>
              </div>
            </a>
          </div>
          <div class="online-order-requirements">
            <h3>Jouw gegevens</h3>
            <div class="details-inputs w-row">
              <div class="w-col w-col-6"><input type="text" class="special-input w-input" maxlength="256" name="name" data-name="Name" placeholder="Naam" id="name" required=""><input type="email" class="special-input w-input" maxlength="256" name="Email" data-name="Email" placeholder="E-Mail Adres" id="Email" required=""><input type="text" class="special-input w-input" maxlength="256" name="Adres" data-name="Adres" placeholder="Adres" id="Adres" required="">
                <div class="w-clearfix"><input type="text" class="special-input half left w-input" maxlength="256" name="Postal-Code" data-name="Postal Code" placeholder="Postcode" id="Postal-Code" required=""><input type="text" class="special-input half right w-input" maxlength="256" name="Location" data-name="Location" placeholder="Plaats" id="Location" required=""></div><label class="w-checkbox privacy-policy-check"><input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" required="" class="w-checkbox-input checkbox"><span class="w-form-label" for="checkbox">Ik ga akkoord met het <a href="#">privacybeleid</a></span></label>
              </div>
              <div class="column w-col w-col-6"><img src="images/undraw_personal_data_29co.svg" loading="lazy" alt="" class="personal-information-image"></div>
            </div>
          </div><input type="submit" value="Afrekenen" data-wait="Aan het verwerken..." class="important-button w-button">
        </form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form.</div>
        </div>
      </div>
    </div>
  </div>
  <div class="bestel-footer credits nothidden">
    <div class="container w-container">
      <a href="/" class="important-button return-to-order-phase w-button">Terug naar bestellen</a><img src="images/Logo.png" loading="lazy" width="88" alt="" class="ffb-footer-image">
      <div class="credit-line">Een <strong>Horeka</strong> systeem</div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=619b7419f5b32f8143d4600a" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/alybaba.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
