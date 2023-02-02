<!DOCTYPE html>
<html lang="en">
@php
    $title = $attributes['title'] ?? 'Quản lý Nailsalon';
@endphp

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="DSAThemes" />
    <meta name="description" content="La Notte - Nail Salon HTML5 Template" />
    <meta name="keywords"
        content="DSAThemes, Beauty, Salon, Beauty Parlour, Nails, Manicure, Pedicure, Care, Health, Massage" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- SITE TITLE -->
    <title>{{ $title }}</title>

    <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="{{ asset('client/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('client/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('client/images/apple-touch-icon-152x152.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('client/images/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('client/images/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('client/images/apple-touch-icon.png') }}" />
    <link rel="icon" href="{{ asset('client/images/apple-touch-icon.png') }}" type="image/x-icon" />

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500;700;800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap"
        rel="stylesheet" />

    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- FONT ICONS -->
    <link href="{{ asset('client/css/flaticon.css') }}" rel="stylesheet" />

    <!-- PLUGINS STYLESHEET -->
    <link href="{{ asset('client/css/menu.css') }}" rel="stylesheet" />
    <link id="effect" href="{{ asset('client/css/dropdown-effects/fade-down.css') }}" media="all"
        rel="stylesheet" />
    <link href="{{ asset('client/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/css/flexslider.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/css/datetimepicker.min.css') }}" rel="stylesheet" />

    <!-- TEMPLATE CSS -->
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet" />

    <!-- ON SCROLL ANIMATION -->
    <link href="{{ asset('client/css/animate.css') }}" rel="stylesheet" />

    <!-- RESPONSIVE CSS -->
    <link href="{{ asset('client/css/responsive.css') }}" rel="stylesheet" />
    {{ $header ?? '' }}
</head>

<body>
    <!-- PAGE CONTENT
  ============================================= -->
    <div id="page" class="page">>
        @include('client.include.header')

        {{ $slot }}

        @include('client.include.footer')
    </div>
    <!-- END PAGE CONTENT -->

    <!-- EXTERNAL SCRIPTS
  ============================================= -->
    <script src="{{ asset('client/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('client/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('client/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('client/js/jquery.scrollto.js') }}"></script>
    <script src="{{ asset('client/js/menu.js') }}"></script>
    <script src="{{ asset('client/js/materialize.js') }}"></script>
    <script src="{{ asset('client/js/datetimepicker.js') }}"></script>
    <script src="{{ asset('client/js/jquery.vide.min.js') }}"></script>
    <script src="{{ asset('client/js//imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('client/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('client/js/wow.js') }}"></script>

    <!-- Custom Script -->
    <script src="{{ asset('client/js/custom.js') }}"></script>

    <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
    <!--
  <script>
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-XXXXX-X']);
      _gaq.push(['_trackPageview']);

      (function() {
          var ga = document.createElement('script');
          ga.type = 'text/javascript';
          ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
              '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(ga, s);
      })();
  </script>
  -->

    <script src="{{ asset('client/js/changer.js') }}"></script>
    <script defer src="{{ asset('client/js/styleswitch.js') }}"></script>
	{{ $script ?? '' }}
</body>

</html>
