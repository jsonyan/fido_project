<!DOCTYPE html>
<html>
<head>
<title>APLAB - <?php echo isset($mod_activo) ? "Gestor ".$mod_activo : "Inicio"?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" media="screen">
<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/aplab.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/datepicker.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/lightbox.css" rel="stylesheet">

<script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/oculta.js"></script>

    <script type="text/javascript">
        function validatePass(pass, repass) {
        if (pass.value != repass.value || pass.value == '' || repass.value == '') {
        repass.setCustomValidity('Error!! La Contrase�as no son iguales');
        } else {
        repass.setCustomValidity('');
        }}
    </script>


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">		
