@extends('backend.buyer.layouts.app')
@section('content')
<main class="main">
    <div class="container-fluid mt-2">



        <a class="btn btn-outline-dark btn-block btn-sm mb-2 d-lg-none" data-toggle="collapse" href="#search-section"
            role="button" aria-expanded="false" aria-controls="searchSection">
            <i class="fal fa-search-plus"></i> 
            Search
        </a>

        @yield('component')
    </div>

    </div>

    </div>

    <div class="page-load-status">
        <div class="loader-ellipse infinite-scroll-request">
            <span class="loader-ellipse-dot"></span>
            <span class="loader-ellipse-dot"></span>
            <span class="loader-ellipse-dot"></span>
            <span class="loader-ellipse-dot"></span>
        </div>
        <p class="infinite-scroll-last">No more rebates</p>
        <p class="infinite-scroll-error">No more pages to load</p>
    </div>

    </div>

    <script>
    $(function() {
        $('#search-form').on('shown.bs.collapse', '.collapse', function() {
            $(this).parents('form').find("[data-toggle=collapse] i").toggleClass(
                "fa-plus fa-minus");
        }).on('hidden.bs.collapse', '.collapse', function() {
            $(this).parents('form').find("[data-toggle=collapse] i").toggleClass(
                "fa-minus fa-plus");
        }).find('#category-id').multiselect({
            maxHeight: 300,
            buttonWidth: '100%',
            buttonClass: 'btn btn-category',
            nonSelectedText: 'Select categories',
            includeSelectAllOption: true,
            selectAllText: 'Select all categories',
            allSelectedText: 'All categories'
        });

        $('#deals').infiniteScroll({
            path: '.next a',
            append: '.page',
            status: '.page-load-status'
        }).on('append.infiniteScroll', function() {
            $('[data-toggle=tooltip]').tooltip();
            Project.initLazyLoader();
        });

    });
    </script>
    <script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a17677794ca7129"></script>
    <script>
    typeof addthis.share !== 'undefined' && addthis.share();
    </script>
    <!-- Hotjar Tracking Code for www.influencerpulse.com -->
    <script>
    (function(h, o, t, j, a, r) {
        h.hj = h.hj || function() {
            (h.hj.q = h.hj.q || []).push(arguments)
        };
        h._hjSettings = {
            hjid: 756120,
            hjsv: 6
        };
        a = o.getElementsByTagName("head")[0];
        r = o.createElement("script");
        r.async = 1;
        r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
        a.appendChild(r);
    })(window, document, "https://static.hotjar.com/c/hotjar-", ".js?sv=");
    </script>
</main>
@endsection