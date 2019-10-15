<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>public/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="apple-mobile-web-app-status-bar" content="#aa7700">

    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-store" />
    <meta http-equiv="expires" content="-1" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <title>
      <?= $Judul; ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/font-awesome/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?=base_url();?>public/vendor/material-dashboard/material-dashboard.css?v=2.1.0'" rel="stylesheet" />
    <link href="<?=base_url();?>public/css/custom-style.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?=base_url();?>public/vendor/demo/demo.css" rel="stylesheet" />
    <style>
    a.page-link.text-white:hover{ color: #9c27b0; }
    .page-link:hover, .page-link:focus {border-radius: 100px;background-color: #b958c9;transition: ease-in-out;}
    .col-xl{min-width: 1300px !important;}
    </style>
    <link rel="stylesheet" href="<?= base_url().'public\vendor\datatables\datatables.min.css';?>">
    <!-- Sweet Alert script -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Jquery UI -->
    <link href="<?=base_url();?>public/css/jquery-ui.css" rel="stylesheet" />
    <link rel="manifest" href="<?=base_url();?>public/js/manifest.json">
    <script src="<?= base_url().'public/vendor/js/core/jquery.min.js'; ?>" type="text/javascript"></script>
    <script src="<?=base_url();?>public/js/jquery-ui.min.js"></script>
    
      <script>
      $( function() {
        $( "#datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true
        });
      } );
  </script>
  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
  </head>
  <body>