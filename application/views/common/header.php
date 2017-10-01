<html>
<head>
	<title><?php echo $title; ?></title>
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/header.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css"); ?>" />
	
	<script src="<?php echo base_url("assets/js/common/jquery-3.2.1.min.js"); ?>" defer></script>
	
	<?php echo $additional_files; ?>
</head>
<body>
<div class="header">
</div>
<div class="container">