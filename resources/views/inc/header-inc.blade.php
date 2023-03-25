

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glacier - Purchase Request</title>
    <link rel="icon" href="{{ asset('wms/img/img/GILILOGO3.png') }}" type="image/png">
    <!-- JQUERY CDN -->
    <script src="{{ asset('wms/plugins/jquery/dist/jquery.min.js ')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS Files -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/bootstrap-5.1.3/css/bootstrap.css')}}">
    
    <!----===== Boxicon CSS ===== -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/boxicons-2.1.4/css/boxicons.min.css ')}}">

    <!----===== Datatable CSS ===== -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <!----===== Toast Plugin CSS ===== -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/toast/css/izitoast.min.css')}}"/>
    <script src="{{ asset('wms/js/toastr.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('wms/css/toastr.min.css')}}">
    <!----===== Tabulator CSS ===== -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/tabulator-tables/dist/css/tabulator_bootstrap5.min.css')}}">

    <!----===== SELECT2 CSS ===== -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/select2-develop/dist/css/select2.min.css')}}">
    <script src="{{ asset('wms/js/select2.min.js') }}"></script>
    <!----===== TOAST CSS ===== -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/toast/css/izitoast.min.css')}}">

    <!----===== OWL CSS ===== -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/OwlCarousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('wms/plugins/OwlCarousel/dist/assets/owl.theme.default.min.css')}}">

    <!----===== SLICK CSS ===== -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('wms/plugins/slick-theme.css')}}">

    <!-- ===== Customized CSS ===== -->
    <link rel="stylesheet" href="{{ asset('wms/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('wms/css/login.css')}}">
    
    <link rel="stylesheet" href="assets/css/modal.css">
    <link rel="stylesheet" href="assets/css/maintenance.css">
    <link rel="stylesheet" href="assets/css/inbound.css">
    <link rel="stylesheet" href="assets/css/outbound.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  
      
      <style>
        .alert {
          transition: opacity 0.5s ease-in-out;
        }

        .container{
          margin-left: 1%;
        }

        footer {
            height: 40px;
            position: fixed;
            text-align: center;
            bottom: 0;
            width: 100%;
          }
        .center {
             text-align: center;
        }
          
        .camelCase{
          text-transform: capitalize;
        }


      </style>
</head>
<body>
    
    @include('inc.sidebar-inc')
 
    <div class="home">
        @include('inc.navbar-inc')