<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="baseurl" content="{{ url('/admin') }}">
    <meta name="apiBaseurl" content="{{ url('/api') }}">
    <meta name="appUrl" content="{{ url('/') }}">
    <meta name="appTimeZone" content="{{ config('app.app_timezone') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <script src="{{ config('app.coure_ui_asset_url').'js/coreui_js/charts.js' }}" defer></script>
    <script src="{{ config('app.coure_ui_asset_url').'js/coreui_js/colors.js' }}" defer></script>
    <script src="{{ config('app.coure_ui_asset_url').'js/coreui_js/main.js' }}" defer></script>
    <script src="{{ config('app.coure_ui_asset_url').'js/coreui_js/popovers.js' }}" defer></script>
    <script src="{{ config('app.coure_ui_asset_url').'js/coreui_js/tooltips.js' }}" defer></script>
    <script src="{{ config('app.coure_ui_asset_url').'js/coreui_js/widgets.js' }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ config('app.ui_asset_url').'frontend/simplelineicons.github.io-master/css/simple-line-icons.css' }}" rel="stylesheet"> 
    <link href="{{ config('app.node_modules_path').'node_modules/@coreui/icons/css/coreui-icons.min.css' }}" rel="stylesheet">
    <link href="{{ config('app.node_modules_path').'node_modules/flag-icon-css/css/flag-icon.min.css' }}" rel="stylesheet">
    <link href="{{ config('app.node_modules_path').'node_modules/font-awesome/css/font-awesome.min.css' }}" rel="stylesheet">
    <link href="{{ config('app.node_modules_path').'node_modules/simple-line-icons/css/simple-line-icons.css' }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" integrity="sha512-QKC1UZ/ZHNgFzVKSAhV5v5j73eeL9EEN289eKAEFaAjgAiobVAnVv/AGuPbXsKl1dNoel3kNr6PYnSiTzVVBCw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.css" integrity="sha512-9Tu/Gu0+bXW+oGrTGJOeNz2RG4MaF52FznXCciXFrXehFTLF6phJnJFNVOU2mmj9FWIXk9ap0H1ocygu1ZTRqg==" crossorigin="anonymous" />
    <link href="{{ config('app.node_modules_path').'node_modules/select2/dist/css/select2.min.css' }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    <link href="{{ config('app.coure_ui_asset_url').'sass/coreui_css/style.css' }}" rel="stylesheet">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/toastr.css') }}" rel="stylesheet">

    <script src="{{ asset('public/js/app.js') }}" defer></script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    {{--<div id="app">--}}
    @auth
    @include('layouts.partials.header')
    @endauth
    <div class="app-body">
        @auth
        @include('layouts.partials.sidebar')
        @endauth
        <main class="main">
            @yield('content')
        </main>
        @auth
        @include('layouts.partials.asidemenu')
        @endauth
    </div>
    @auth
    <footer class="app-footer">
        <div>
            <a href="{{route("frontend-home")}}" target="_blank">{{ config('app.name', 'Laravel') }}</a>
            <span>&copy; {{date('Y')}} {{ config('app.name', 'Laravel') }}.</span>
        </div>
        <div class="ml-auto">
            <span>Powered by</span>
            <a href="{{route("frontend-home")}}" target="_blank">{{ config('app.name', 'Laravel') }}</a>
        </div>
    </footer>
    @include('layouts.partials.modals')
    @endauth
    <script src="{{ config('app.node_modules_path').'node_modules/jquery/dist/jquery.min.js' }}"></script>
    <script src="{{ config('app.node_modules_path').'node_modules/popper.js/dist/umd/popper.min.js' }}"></script>
    <script src="{{ config('app.node_modules_path').'node_modules/bootstrap/dist/js/bootstrap.min.js' }}"></script>
    <script src="{{ config('app.node_modules_path').'node_modules/pace-progress/pace.min.js' }}"></script>
    <script src="{{ config('app.node_modules_path').'node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js' }}"></script>
    <script src="{{ config('app.node_modules_path').'node_modules/select2/dist/js/select2.min.js' }}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/js/select2.min.js"></script>--}}
    <script src="{{ config('app.node_modules_path').'node_modules/@coreui/coreui/dist/js/coreui.min.js' }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="application/javascript">
        var stripe = Stripe("{{ config('app.app_strip_api_key') }}");
        var elements = stripe.elements();
        if ($('#card-element').length > 0) {
            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                    // Add your base input styles here. For example:
                    fontSize: '16px',
                    color: "#32325d",
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');
        }

        $(document).on('click', '.js-del-btn', function () {
            var id = $(this).attr("data-id");
            var model = $(this).attr("data-model");
            var route = $(this).attr("data-route");
            $('#deleteConfirmModal').modal('show');
            $('.del-btn-confirm').attr('data-id', id);
            $('.del-btn-confirm').attr('data-model', model);
            var baseurl = $('meta[name=baseurl]').attr("content");
            $('.del-btn-confirm').attr('href', baseurl + '/delete/' + model + '/' + route + '/' + id); // axios.get('/user?ID=12345')
            //     .then(function (response) {
            //         console.log(response);
            //     })
            //     .catch(function (error) {
            //         console.log(error);
            //     });
        });
        $(document).on("click",".modal-carsetting-btn",function(e){
            e.preventDefault();
            $("#deleteConfirmModalCarsetting").modal('show');
            var route = $(this).attr("data-route");

            $('.car-btn-confirm-carsetting-admin').attr('href',route);
        });

    </script>
    @include('layouts.partials.axios')
    @include('layouts.partials.scripts')
    @stack('scripts')
</body>

</html>