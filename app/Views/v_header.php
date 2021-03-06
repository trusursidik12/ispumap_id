<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="aqms, air quality monitoring system, air quality, kualitas udara, ispu, polusi, polusi udara, emisi, emisi, kendaraan, emisi cerobong, emisi genset, emisi stack, kalibrasi, kalibrasi gas, kalibrasi gas analyzer, kalibrasi gas detektor, kalibrasi gas meter, kalibrasi cems, kalibrasi aqms, kalibrasi gas analyzer otomotif, rata, cems, gas detector, gas analyzer, lingkungan hidup, klhk, kebakaran hutan, kebarakan lahan, karhutla, laboratorium, pembangkit, uji profisiensi, uji antara, uji kinerja, uji performa, bumb test">
    <meta name="keywords" content="aqms, air quality monitoring system, air quality, kualitas udara, ispu, polusi, polusi udara, emisi, emisi, kendaraan, emisi cerobong, emisi genset, emisi stack, kalibrasi, kalibrasi gas, kalibrasi gas analyzer, kalibrasi gas detektor, kalibrasi gas meter, kalibrasi cems, kalibrasi aqms, kalibrasi gas analyzer otomotif, rata, cems, gas detector, gas analyzer, lingkungan hidup, klhk, kebakaran hutan, kebarakan lahan, karhutla, laboratorium, pembangkit, uji profisiensi, uji antara, uji kinerja, uji performa, bumb test">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ISPUMAP.ID</title>
    <link href="<?= base_url(); ?>/img/favicon.ico" rel="icon">
    <link href="<?= base_url(); ?>/img/favicon.ico" rel="apple-touch-icon">
    <link rel="icon" href="<?= base_url(); ?>/img/favicon.ico">

    <link rel="stylesheet" href="<?= base_url(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/font-awesome.min.css">
    <!--leaflet CSS-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!--leaflet JS; note to self; this must be after the css-->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin="">
    </script>
    <script src="<?= base_url(); ?>/js/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>/ispumaps_stylesheet.css">
    <style>
        .ispu-form .form-control {
            width: 100%;
            height: 60px;
            padding: 0 15px;
            border: none !important;
            border-bottom: 1px solid !important;
            border-color: #c0c0c0 !important;
            border-radius: 0;
            font-size: 12px;
            font-style: italic;
            color: #2f2f2f;
            background-color: transparent;
        }
    </style>
</head>

<body class="bg-light">
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="sonar-load"></div>
        </div>
    </div>
    <!-- Preloader End -->