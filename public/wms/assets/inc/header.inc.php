<?php include('app/Controller/check_session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glacier - Warehouse Management System</title>

    <!-- JQUERY CDN -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    
    <!-- Bootstrap CSS Files -->
    <link rel="stylesheet" href="node_modules/bootstrap-5.1.3/css/bootstrap.css">
    
    <!----===== Boxicon CSS ===== -->
    <link rel="stylesheet" href="node_modules/boxicons-2.1.4/css/boxicons.min.css">

    <!----===== Datatable CSS ===== -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"> -->

    <!----===== Toast Plugin CSS ===== -->
    <link rel="stylesheet" href="node_modules/toast/css/izitoast.min.css"/>

    <!----===== Tabulator CSS ===== -->
    <link rel="stylesheet" href="node_modules/tabulator-tables/dist/css/tabulator_bootstrap5.min.css">

    <!----===== SELECT2 CSS ===== -->
    <link rel="stylesheet" href="node_modules/select2-develop/dist/css/select2.min.css">

    <!----===== TOAST CSS ===== -->
    <link rel="stylesheet" href="node_modules/toast/css/izitoast.min.css">

    <!----===== OWL CSS ===== -->
    <link rel="stylesheet" href="node_modules/OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/OwlCarousel/dist/assets/owl.theme.default.min.css">

    <!----===== SLICK CSS ===== -->
    <link rel="stylesheet" href="node_modules/slick/slick.css">
    <link rel="stylesheet" href="node_modules/slick/slick-theme.css">
    
    <!-- ===== Customized CSS ===== -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/modal.css">
    <link rel="stylesheet" href="assets/css/maintenance.css">
    <link rel="stylesheet" href="assets/css/inbound.css">
    <link rel="stylesheet" href="assets/css/outbound.css">
</head>
<body>

    <?php include('./inc/sidebar.inc.php'); ?>
    <div class="home">
        <?php include('./inc/navbar.inc.php'); ?>
