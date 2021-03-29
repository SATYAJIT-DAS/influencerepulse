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
    <div class="row">
        <div class="col-12 mt-2">
            <h2>1. 2-Step Via Brand</h2>
            <p>Target specific keywords when sending customers to Amazon by restricting products by brand and keyword. Use ASIN and price to narrow down the list if needed.</p>
            <p>Example: <span id="matketplace_exmple_url_1">https://www.amazon.in/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords=sugar+scrub&field-brand=FOREST+HEAL&rh=i:aps,ssx:relevance</span></p>
            <p>Required fields: Brand (strlen = 14, alphanumeric), keyword</p>
            <p></p>Optional fields: ASIN, Minimum price (float), Maximum price (float)</p>
        </div>
        <div class="col-4">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="brand"  placeholder="Brand">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="keyword" placeholder="Keyword">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="assin" placeholder="ASSIN">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="min_price" placeholder="Min. Price">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="max_price" placeholder="Max. Price">
                </div>
                <button  class="btn btn-primary" onclick="gen_1()">Generate</button>
            </form>
        </div>
    </div>

</div>

<script>
     var marketplace = 'https://www.amazon.in';
    function initFields() {
        var marketplaceval =  $('#marketplace').val();

        switch (marketplaceval) {
            case '1':
                marketplace = 'https://www.amazon.in';
                break;
            case '2':
                marketplace = 'https://www.amazon.com';
                break;
            case '3':
                marketplace = 'https://www.amazon.fr';
                break;
            case '4':
                marketplace = 'https://www.amazon.de';
                break;
            case '5':
                marketplace = 'https://www.amazon.ca';
                break;
            case '6':
                marketplace = 'https://www.amazon.it';
                break;
            case '7':
                marketplace = 'https://www.amazon.es';
                break;
            case '8':
                marketplace = 'https://www.amazon.co.uk';
                break;
            case '9':
                marketplace = 'https://www.amazon.com.au';
                break;
            default:
                break;
        }
        var example_url = marketplace+'/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords=sugar+scrub&field-brand=FOREST+HEAL&rh=i:aps,ssx:relevance';
        $('#matketplace_exmple_url_1').html(example_url);
    }
    function gen_1() {
        var brand =  $('#brand').val();
        var keyword =  $('#keyword').val();
        keyword = keyword.replace(" ", "+");
        var assin =  $('#assin').val();
        var min_price =  $('#min_price').val();
        var max_price =  $('#max_price').val();
        var generated_url = marketplace+'/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords='+keyword+'&field-brand=FOREST+HEAL&rh=i:aps,ssx:relevance';
        //$('#matketplace_exmple_url_1').html(example_url);
        console.log(generated_url);



    }



</script>
@endsection
