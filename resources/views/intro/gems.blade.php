@extends('intro.layouts.app')
@section('content')
<div class="container">
    <div class="row mt-5 pt-4">
        <div class="col-12">
            <h2>Choose Your Marketplace</h2>
        </div>
        <div class="col-4 mt-2">
            <div class="input-group">
                <select class="input-group form-control" id="marketplace" onchange="initFields();">
                    <option value="1" selected>amazon.in</option>
                    <option value="2">amazon.com</option>
                    <option value="3">amazon.fr</option>
                    <option value="4">amazon.de</option>
                    <option value="5">amazon.ca</option>
                    <option value="6">amazon.it</option>
                    <option value="7">amazon.es</option>
                    <option value="8">amazon.co.uk</option>
                    <option value="9">amazon.com.au</option>
                </select>
            </div>
        </div>
    </div>


    <!-- 1st Promotional URLs Start -->
    <div class="row pt-3">
        <div class="col-12 mt-2">
            <h2>1. 2-Step Via Brand</h2>
            <p>Target specific keywords when sending customers to Amazon by restricting products by brand and keyword. Use ASIN and price to narrow down the list if needed.</p>
            <p>Example: <span id="matketplace_exmple_url_1">https://www.amazon.in/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords=sugar+scrub&field-brand=FOREST+HEAL&rh=i:aps,ssx:relevance</span></p>
            <p>Required fields: Brand (strlen = 14, alphanumeric), keyword</p>
            <p></p>Optional fields: ASIN, Minimum price (float), Maximum price (float)</p>
        </div>
        <div class="col-4">

                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="brand_1"  placeholder="Brand">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="keyword_1" placeholder="Keyword">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="assin_1" placeholder="ASSIN">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="min_price_1" placeholder="Min. Price">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="max_price_1" placeholder="Max. Price">
                </div>

                <button  class="btn btn-primary mb-2" onclick="gen_1()">Generate</button>

                <div class="form-group mb-2">
                    <input type="text"  class="form-control"  placeholder="Generated URL" id="generated_url_receiver_1">
                </div>

                <button type="button" class="btn btn-secondary" onclick="url_copy_1()">Copy URL</button>
                <button type="button" class="btn btn-secondary" onclick="new_tab_1()">Open URL</button>

        </div>
    </div>
    <!-- 1st Promotional URLs End -->


    <!-- 2nd Promotional URLs Start -->
    <div class="row pt-5 mt-2">
        <div class="col-12 mt-2">
            <h2>2. 2-Step Via Hidden Keyword</h2>
            <p>Target specific keywords when sending customers to Amazon by restricting products using ASIN as hidden keyword.</p>
            <p>Example: <span id="matketplace_exmple_url_2">https://www.amazon.in/s/ref=nb_sb_noss_1?url=search-alias%3Daps&field-keywords=note+9+screen+protector&hidden-keywords=B07FY25MWP&rh=i:aps,ssx:relevance</span></p>
            <p>Required fields: Keywords, ASIN</p>
        </div>
        <div class="col-4">

                <div class="form-group mb-2 d-flex">
                    <input type="text" class="form-control" id="keyword_2" placeholder="Keyword"> <span class="text-secondary pl-2">(mandatory)</span>
                </div>
                <div class="form-group mb-2 d-flex">
                    <input type="text" class="form-control" id="assin_2" placeholder="ASSIN"> <span class="text-secondary pl-2">(mandatory)</span>
                </div>

                <button  class="btn btn-primary mb-2" onclick="gen_2()">Generate</button>

                <div class="form-group mb-2">
                    <input type="text"  class="form-control"  placeholder="Generated URL" id="generated_url_receiver_2">
                </div>

                <button type="button" class="btn btn-secondary" onclick="url_copy_2()">Copy URL</button>
                <button type="button" class="btn btn-secondary" onclick="new_tab_2()">Open URL</button>

        </div>
    </div>
    <!-- 2nd Promotional URLs end -->


    <!-- 3rd Promotional URL Start -->
    <div class="row pt-5 mt-2">
        <div class="col-12 mt-2">
            <h2>3. 2-Step Via Field-ASIN</h2>
            <p>Target specific keywords when sending customers to Amazon and restrict ASIN using field-asin.</p>
            <p>Example: <span id="matketplace_exmple_url_3">https://www.amazon.in/s/?keywords=hand+soap+refill&ie=UTF8&field-asin=B00023DIBI&rh=i:aps,ssx:relevance</span></p>
            <p>Required fields: Keywords, ASIN</p>
        </div>
        <div class="col-4">

                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="keyword_3" placeholder="Keyword">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="assin_3" placeholder="ASSIN">
                </div>

                <button  class="btn btn-primary mb-2" onclick="gen_3()">Generate</button>

                <div class="form-group mb-2">
                    <input type="text"  class="form-control"  placeholder="Generated URL" id="generated_url_receiver_3">
                </div>

                <button type="button" class="btn btn-secondary" onclick="url_copy_3()">Copy URL</button>
                <button type="button" class="btn btn-secondary" onclick="new_tab_3()">Open URL</button>

        </div>
    </div>
    <!-- 3rd Promotional URL end -->


    <!-- 4th Promotional URLs Start -->
    <div class="row pt-5">
        <div class="col-12 mt-2">
            <h2>4. Canonical URL</h2>
            <p>Search-engine friendly Amazon URL.</p>
            <p>Example: <span id="matketplace_exmple_url_4">https://www.amazon.com/Samsung-Galaxy-S10-Screen-Protector/dp/B07NQ2MBSW/</span></p>
            <p>Required fields: 5 keywords, ASIN</p>
        </div>
        <div class="col-4">

                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="keyword_4_1"  placeholder="Keyword 1">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="keyword_4_2" placeholder="Keyword 2">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="keyword_4_3" placeholder="Keyword 3">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="keyword_4_4" placeholder="Keyword 4">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="keyword_4_5" placeholder="Keyword 5">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="assin_4" placeholder="ASSIN">
                </div>

                <button  class="btn btn-primary mb-2" onclick="gen_4()">Generate</button>

                <div class="form-group mb-2">
                    <input type="text"  class="form-control"  placeholder="Generated URL" id="generated_url_receiver_4">
                </div>

                <button type="button" class="btn btn-secondary" onclick="url_copy_4()">Copy URL</button>
                <button type="button" class="btn btn-secondary" onclick="new_tab_4()">Open URL</button>

        </div>
    </div>
    <!-- 4th Promotional URLs End -->


     <!-- 5th Promotional URL Start -->
     <div class="row pt-5 mt-2">
        <div class="col-12 mt-2">
            <h2>5. Add To Cart</h2>
            <p>Send traffic directly to ‘add to cart’ page.</p>
            <p>Example: <span id="matketplace_exmple_url_5">Example: https://www.amazon.com/gp/aws/cart/add.html?ASIN.1=B0752BLWNB&Quantity.1=1</span></p>
            <p>Required fields: ASIN, quantity</p>
        </div>
        <div class="col-4">

                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="assin_5" placeholder="Assin">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="quantity_5" placeholder="Quantity">
                </div>

                <button  class="btn btn-primary mb-2" onclick="gen_5()">Generate</button>

                <div class="form-group mb-2">
                    <input type="text"  class="form-control"  placeholder="Generated URL" id="generated_url_receiver_5">
                </div>

                <button type="button" class="btn btn-secondary" onclick="url_copy_5()">Copy URL</button>
                <button type="button" class="btn btn-secondary" onclick="new_tab_5()">Open URL</button>

        </div>
    </div>
    <!-- 5th Promotional URL end -->


     <!-- 6th Promotional URLs Start -->
     <div class="row pt-5">
        <div class="col-12 mt-2">
            <h2>6. Buy Together</h2>
            <p>Send traffic to a cart page that combines 2 or more products.</p>
            <p>Example: <span id="matketplace_exmple_url_6">Example: https://www.amazon.com/gp/aws/cart/add.html?ASIN.1=B00SUZWGHM&Quantity.1=1&ASIN.2=B00809ERAM&Quantity.2=1</span></p>
            <p>Required fields: ASIN x 2, quantity</p>
        </div>
        <div class="col-4">

                <div class="form-group mb-2 d-flex">
                    <input type="text" class="form-control m-1" id="assin_6_1"  placeholder="ASSIN 1">
                    <input type="text" class="form-control m-1" id="quantity_6_1"  placeholder="Quantity 1">
                </div>
                <div class="form-group mb-2 d-flex">
                    <input type="text" class="form-control m-1" id="assin_6_2"  placeholder="ASSIN 2">
                    <input type="text" class="form-control m-1" id="quantity_6_2"  placeholder="Quantity 2">
                </div>
                <div class="form-group mb-2 d-flex">
                    <input type="text" class="form-control m-1" id="assin_6_3"  placeholder="ASSIN 3">
                    <input type="text" class="form-control m-1" id="quantity_6_3"  placeholder="Quantity 3">
                </div>
                <div class="form-group mb-2 d-flex">
                    <input type="text" class="form-control m-1" id="assin_6_4"  placeholder="ASSIN 4">
                    <input type="text" class="form-control m-1" id="quantity_6_4"  placeholder="Quantity 4">
                </div>

                <button  class="btn btn-primary mb-2" onclick="gen_6()">Generate</button>

                <div class="form-group mb-2">
                    <input type="text"  class="form-control"  placeholder="Generated URL" id="generated_url_receiver_6">
                </div>

                <button type="button" class="btn btn-secondary" onclick="url_copy_6()">Copy URL</button>
                <button type="button" class="btn btn-secondary" onclick="new_tab_6()">Open URL</button>

        </div>
    </div>
    <!-- 6th Promotional URLs End -->


    <!-- 7th Promotional URL Start -->
    <div class="row pt-5 mt-2">
        <div class="col-12 mt-2">
            <h2>7. Targeted ASIN Search URL</h2>
            <p>Generates an Amazon search result page of a list of ASINs that you specify</p>
        </div>
        <div class="col-4">

                <div class="form-group mb-2">
                    <textarea class="p-2" name="market_place_7" id="textarea_marketplace_7" cols="30" rows="4"></textarea>
                </div>

                <button  class="btn btn-primary mb-2" onclick="gen_7()">Generate</button>

                <div class="form-group mb-2">
                    <input type="text"  class="form-control"  placeholder="Generated URL" id="generated_url_receiver_7">
                </div>

                <button type="button" class="btn btn-secondary" onclick="url_copy_7()">Copy URL</button>
                <button type="button" class="btn btn-secondary" onclick="new_tab_7()">Open URL</button>

        </div>
    </div>
    <!-- 7th Promotional URL end -->


    <!-- 8th Promotional URL Start -->
    <div class="row pt-5 mt-2">
        <div class="col-12 mt-2">
            <h2>8. Walmart 2-Step Via Brand</h2>
            <p>Target specific keywords when sending customers to Walmart by restricting products by brand and keyword.</p>
            <p>Example: <span id="matketplace_exmple_url_8">Example: https://www.walmart.com/search/?cat_id=0&facet=brand%3ALipozene&query=diet+pills</span></p>
            <p>Required fields: ASIN, quantity</p>
        </div>
        <div class="col-4">

                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="keyword_8" placeholder="Keyword">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="brand_8" placeholder="Brand">
                </div>

                <button  class="btn btn-primary mb-2" onclick="gen_8()">Generate</button>

                <div class="form-group mb-2">
                    <input type="text"  class="form-control"  placeholder="Generated URL" id="generated_url_receiver_8">
                </div>

                <button type="button" class="btn btn-secondary" onclick="url_copy_8()">Copy URL</button>
                <button type="button" class="btn btn-secondary" onclick="new_tab_8()">Open URL</button>

        </div>
    </div>
    <!-- 8th Promotional URL end -->


     <!-- 9th Promotional URL Start -->
     <div class="row pt-5 mt-2">
        <div class="col-12 mt-2">
            <h2>9. Walmart 2-Step Via Seller</h2>
            <p>Target specific keywords when sending customers to Walmart by restricting products by seller and keyword.</p>
            <p>Example: <span id="matketplace_exmple_url_9">Example: https://www.walmart.com/search/?cat_id=0&facet=retailer%3APalos+Buddies&query=laundry+sheets</span></p>
            <p>Required fields: Keywords, Store Name</p>
        </div>
        <div class="col-4">

                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="keyword_9" placeholder="Keyword">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control" id="store_name_9" placeholder="Store Name">
                </div>

                <button  class="btn btn-primary mb-2" onclick="gen_9()">Generate</button>

                <div class="form-group mb-2">
                    <input type="text"  class="form-control"  placeholder="Generated URL" id="generated_url_receiver_9">
                </div>

                <button type="button" class="btn btn-secondary" onclick="url_copy_9()">Copy URL</button>
                <button type="button" class="btn btn-secondary" onclick="new_tab_9()">Open URL</button>

        </div>
    </div>
    <!-- 9th Promotional URL end -->



</div>

<script>
var marketplace = "https://www.amazon.in";
function initFields() {
  var marketplaceval = document.getElementById("marketplace").value;

  switch (marketplaceval) {
    case "1":
      marketplace = "https://www.amazon.in";
      break;
    case "2":
      marketplace = "https://www.amazon.com";
      break;
    case "3":
      marketplace = "https://www.amazon.fr";
      break;
    case "4":
      marketplace = "https://www.amazon.de";
      break;
    case "5":
      marketplace = "https://www.amazon.ca";
      break;
    case "6":
      marketplace = "https://www.amazon.it";
      break;
    case "7":
      marketplace = "https://www.amazon.es";
      break;
    case "8":
      marketplace = "https://www.amazon.co.uk";
      break;
    case "9":
      marketplace = "https://www.amazon.com.au";
      break;
    default:
      break;
  }
  var example_url_1 =
    marketplace +
    "/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords=sugar+scrub&field-brand=FOREST+HEAL&rh=i:aps,ssx:relevance";
  document.getElementById("matketplace_exmple_url_1").innerHTML = example_url_1;
  var example_url_2 =
    marketplace +
    "/s/ref=nb_sb_noss_1?url=search-alias%3Daps&field-keywords=note+9+screen+protector&hidden-keywords=B07FY25MWP&rh=i:aps,ssx:relevance";
  document.getElementById("matketplace_exmple_url_2").innerHTML = example_url_2;
  var example_url_3 =
    marketplace +
    "/s/?keywords=hand+soap+refill&ie=UTF8&field-asin=B00023DIBI&rh=i:aps,ssx:relevance";
  document.getElementById("matketplace_exmple_url_3").innerHTML = example_url_3;
  var example_url_4 =
    marketplace + "/Samsung-Galaxy-S10-Screen-Protector/dp/B07NQ2MBSW/";
  document.getElementById("matketplace_exmple_url_4").innerHTML = example_url_4;
  var example_url_5 =
    marketplace + "/gp/aws/cart/add.html?ASIN.1=B0752BLWNB&Quantity.1=1";
  document.getElementById("matketplace_exmple_url_5").innerHTML = example_url_5;
  var example_url_6 =
    marketplace +
    "/gp/aws/cart/add.html?ASIN.1=B00SUZWGHM&Quantity.1=1&ASIN.2=B00809ERAM&Quantity.2=1";
  document.getElementById("matketplace_exmple_url_6").innerHTML = example_url_6;
  var example_url_8 =
    marketplace + "/search/?cat_id=0&facet=brand%3ALipozene&query=diet+pills";
  document.getElementById("matketplace_exmple_url_8").innerHTML = example_url_8;
  var example_url_9 =
    marketplace +
    "/search/?cat_id=0&facet=retailer%3APalos+Buddies&query=laundry+sheets";
  document.getElementById("matketplace_exmple_url_9").innerHTML = example_url_9;
}

// Marketplace 1 Generate
function gen_1(event) {
  //event.preventDefault();
  var brand_1 = document.getElementById("brand_1").value;
  brand_1 = brand_1.match(/[^ ]+/g).join("+");
  var keyword_1 = document.getElementById("keyword_1").value;
  keyword_1 = keyword_1.match(/[^ ]+/g).join("+");
  var assin_1 = document.getElementById("assin_1").value;
  assin_1 = assin_1.match(/[^ ]+/g).join("+");
  var min_price_1 = document.getElementById("min_price_1").value;
  var max_price_1 = document.getElementById("max_price_1").value;
  var generated_url =
    marketplace +
    "/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords=" +
    keyword_1 +
    "&field-brand=" +
    brand_1 +
    "&field-asin=" +
    assin_1 +
    "&low-price=" +
    min_price_1 +
    "&high-price=" +
    max_price_1 +
    "";
  //$('#matketplace_exmple_url_1').html(example_url);
  // console.log(generated_url);
  document.getElementById("generated_url_receiver_1").value = generated_url;
  // document.write(generated_url);
}
// JS of copy link button
function url_copy_1() {
  var copyText = document.getElementById("generated_url_receiver_1");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
//   JS of open URL button
function new_tab_1() {
  var copyText = document.getElementById("generated_url_receiver_1").value;
  window.open(copyText, "_blank");
}

// Marketplace 2 Generate
function gen_2() {
  var keyword_2 = document.getElementById("keyword_2").value;
  keyword_2 = keyword_2.match(/[^ ]+/g).join("+");
  var assin_2 = document.getElementById("assin_2").value;
  assin_2 = assin_2.match(/[^ ]+/g).join("+");
  var generated_url =
    marketplace +
    "/s/ref=nb_sb_noss_1?url=search-alias%3Daps&field-keywords= " +
    keyword_2 +
    "note+9+screen+protector&hidden-keywords=" +
    assin_2 +
    "&rh=i:aps,ssx:relevance";
  //$('#matketplace_exmple_url_2').html(example_url);
  // console.log(generated_url);
  document.getElementById("generated_url_receiver_2").value = generated_url;
  // document.write(generated_url);
}
// JS of copy link button
function url_copy_2() {
  var copyText = document.getElementById("generated_url_receiver_2");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
//   JS of open URL button
function new_tab_2() {
  var copyText = document.getElementById("generated_url_receiver_2").value;
  window.open(copyText, "_blank");
}

// Marketplace 3 Generate
function gen_3() {
  var keyword_3 = document.getElementById("keyword_3").value;
  keyword_3 = keyword_3.match(/[^ ]+/g).join("+");
  var assin_3 = document.getElementById("assin_3").value;
  assin_3 = assin_3.match(/[^ ]+/g).join("+");
  var generated_url =
    marketplace +
    "/s/ref=nb_sb_noss_1?url=search-alias%3Daps&field-keywords= " +
    keyword_3 +
    "note+9+screen+protector&hidden-keywords=" +
    assin_3 +
    "&rh=i:aps,ssx:relevance";
  //$('#matketplace_exmple_url_3').html(example_url);
  // console.log(generated_url);
  document.getElementById("generated_url_receiver_3").value = generated_url;
  // document.write(generated_url);
}
// JS of copy link button
function url_copy_3() {
  var copyText = document.getElementById("generated_url_receiver_3");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
//   JS of open URL button
function new_tab_3() {
  var copyText = document.getElementById("generated_url_receiver_3").value;
  window.open(copyText, "_blank");
}

// Marketplace 4 Generate
function gen_4() {
  var keyword_4_1 = document.getElementById("keyword_4_1").value;
  keyword_4_1 = keyword_4_1.match(/[^ ]+/g).join("+");
  var keyword_4_2 = document.getElementById("keyword_4_2").value;
  keyword_4_2 = keyword_4_2.match(/[^ ]+/g).join("+");
  var keyword_4_3 = document.getElementById("keyword_4_3").value;
  keyword_4_3 = keyword_4_3.match(/[^ ]+/g).join("+");
  var keyword_4_4 = document.getElementById("keyword_4_4").value;
  keyword_4_4 = keyword_4_4.match(/[^ ]+/g).join("+");
  var keyword_4_5 = document.getElementById("keyword_4_5").value;
  keyword_4_5 = keyword_4_5.match(/[^ ]+/g).join("+");
  var assin_4 = document.getElementById("assin_4").value;
  assin_4 = assin_4.match(/[^ ]+/g).join("+");
  var generated_url =
    marketplace +
    "/" +
    keyword_4_1 +
    "-" +
    keyword_4_2 +
    "-" +
    keyword_4_3 +
    "-" +
    keyword_4_4 +
    "-" +
    keyword_4_5 +
    "/dp/" +
    assin_4 +
    "/";
  //$('#matketplace_exmple_url_4').html(example_url);
  // console.log(generated_url);
  document.getElementById("generated_url_receiver_4").value = generated_url;
  // document.write(generated_url);
}
// JS of copy link button
function url_copy_4() {
  var copyText = document.getElementById("generated_url_receiver_4");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
//   JS of open URL button
function new_tab_4() {
  var copyText = document.getElementById("generated_url_receiver_4").value;
  window.open(copyText, "_blank");
}

// Marketplace 5 Generate
function gen_5() {
  var assin_5 = document.getElementById("assin_5").value;
  assin_5 = assin_5.match(/[^ ]+/g).join("+");
  var quantity_5 = document.getElementById("quantity_5").value;
  quantity_5 = quantity_5.match(/[^ ]+/g).join("+");
  var generated_url =
    marketplace +
    "/gp/aws/cart/add.html?ASIN.1=" +
    assin_5 +
    "&Quantity.1=" +
    quantity_5 +
    "";
  //$('#matketplace_exmple_url_5').html(example_url);
  // console.log(generated_url);
  document.getElementById("generated_url_receiver_5").value = generated_url;
  // document.write(generated_url);
}
// JS of copy link button
function url_copy_5() {
  var copyText = document.getElementById("generated_url_receiver_5");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
//   JS of open URL button
function new_tab_5() {
  var copyText = document.getElementById("generated_url_receiver_5").value;
  window.open(copyText, "_blank");
}

// Marketplace 6 Generate
function gen_6() {
  var assin_6_1 = document.getElementById("assin_6_1").value;

  var quantity_6_1 = document.getElementById("quantity_6_1").value;

  var assin_6_2 = document.getElementById("assin_6_2").value;

  var quantity_6_2 = document.getElementById("quantity_6_2").value;

  var assin_6_3 = "&ASIN.3=" + document.getElementById("assin_6_3").value;

  var quantity_6_3 = document.getElementById("quantity_6_3").value;

  var assin_6_4 = document.getElementById("assin_6_4").value;

  var quantity_6_4 = document.getElementById("quantity_6_4").value;
  var generated_url =
    marketplace +
    "/gp/aws/cart/add.html?ASIN.1=" +
    assin_6_1 +
    "&Quantity.1=" +
    quantity_6_1 +
    "&ASIN.2=" +
    assin_6_2 +
    "&Quantity.2=" +
    quantity_6_2;
  //$('#matketplace_exmple_url_6').html(example_url);
  // console.log(generated_url);
  document.getElementById("generated_url_receiver_6").value = generated_url;
  // document.write(generated_url);
}
// JS of copy link button
function url_copy_6() {
  var copyText = document.getElementById("generated_url_receiver_6");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
//   JS of open URL button
function new_tab_6() {
  var copyText = document.getElementById("generated_url_receiver_6").value;
  window.open(copyText, "_blank");
}

// Marketplace 7 Generate
function gen_7() {
  var textarea_7 = document.getElementById("textarea_marketplace_7").value;
  var generated_url = marketplace + "/s/?k=" + textarea_7 + "&ref=nb_sb_noss";
  //$('#matketplace_exmple_url_7').html(example_url);
  // console.log(generated_url);
  document.getElementById("generated_url_receiver_7").value = generated_url;
  // document.write(generated_url);
}
// JS of copy link button
function url_copy_7() {
  var copyText = document.getElementById("generated_url_receiver_7");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
//   JS of open URL button
function new_tab_7() {
  var copyText = document.getElementById("generated_url_receiver_7").value;
  window.open(copyText, "_blank");
}

// Marketplace 8 Generate
function gen_8() {
  var keyword_8 = document.getElementById("keyword_8").value;
  var brand_8 = document.getElementById("brand_8").value;
  var generated_url =
    marketplace +
    "/search/?cat_id=0&facet=brand%3" +
    keyword_8 +
    "&query=" +
    brand_8 +
    "";
  //$('#matketplace_exmple_url_8').html(example_url);
  // console.log(generated_url);
  document.getElementById("generated_url_receiver_8").value = generated_url;
  // document.write(generated_url);
}
// JS of copy link button
function url_copy_8() {
  var copyText = document.getElementById("generated_url_receiver_8");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
//   JS of open URL button
function new_tab_8() {
  var copyText = document.getElementById("generated_url_receiver_8").value;
  window.open(copyText, "_blank");
}

// Marketplace 9 Generate
function gen_9() {
  var keyword_9 = document.getElementById("keyword_9").value;
  var store_name_9 = document.getElementById("store_name_9").value;
  var generated_url =
    marketplace +
    "/search/?cat_id=0&facet=retailer%" +
    store_name_9 +
    "&query=" +
    keyword_9 +
    "";
  //$('#matketplace_exmple_url_9').html(example_url);
  // console.log(generated_url);
  document.getElementById("generated_url_receiver_9").value = generated_url;
  // document.write(generated_url);
}
// JS of copy link button
function url_copy_9() {
  var copyText = document.getElementById("generated_url_receiver_9");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
//   JS of open URL button
function new_tab_9() {
  var copyText = document.getElementById("generated_url_receiver_9").value;
  window.open(copyText, "_blank");
}

</script>
@endsection
