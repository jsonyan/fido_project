<!DOCTYPE html>
<html>
<head>
<title>APLAB - Gestor de <?php echo isset($mod_activo) ? $mod_activo : "prueba"?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" media="screen">
<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/aplab.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/datepicker.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/lightbox.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url(); ?>js/lightbox.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
    <![endif]-->
    <style>
        #map img {
          max-width: none;
        }
        #id_mapa img {
          max-width: none;
        }
    </style>    
</head>
<body data-spy="scroll" data-target="#user_menu" onLoad="load();" > <!--	 onunload="GUnload();"		--> 
<div class="container">		
