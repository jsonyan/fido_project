<!DOCTYPE html>
<html>
<head>
<title>APLAB - Modificacion de datos</title>
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
repass.setCustomValidity('Error!! La Contraseñas no son iguales');
} else {
repass.setCustomValidity('');
}}
</script>
<style type="text/css">

.box-nombres{
    margin: 0;
    border-bottom-right-radius: 6px;
    border-bottom-left-radius: 6px;
    padding: 10px 0;
    color: white;
    background-color: #7421cb;
    display: block; 
    text-align: center;
    font-size: 130%;   
}
</style>


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">		
