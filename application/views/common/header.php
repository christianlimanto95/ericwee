<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>ericwee - <?php echo $title; ?></title>
	<style>
		@font-face {
			font-family: copperplate-bold;
			src: url(<?php echo base_url("assets/fonts/Copperplate_Gothic_Bold_Regular.ttf"); ?>);
		}

		@font-face {
			font-family: copperplate-light;
			src: url(<?php echo base_url("assets/fonts/Copperplate_Gothic_Light_Regular.ttf"); ?>);
		}
	</style>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css"); ?>" />
	<?php echo $additional_css; ?>
</head>
<body>
<div class="div-mobile"></div>
<div class="loading-container">
	<div class="loading-text" data-content-type="text"><?php echo $opening_words; ?></div>
</div>
<div class="white-background">
</div>
<a class="logo" href="<?php echo base_url(); ?>">
	<div class="logo-image" style="background-image: url('assets/icons/logo.svg');"></div>
	<div class="logo-text" data-content-type="text">ERICWEEPHOTO</div>
</a>
<div class="menu" id="menu">
	<div class="menu-text">
		<div class="menu-text-close">close</div>
		<div class="menu-text-menu">menu</div>
	</div>
	<div class="menu-icon">
		<div class="menu-icon-line menu-icon-line-1"></div>
		<div class="menu-icon-line menu-icon-line-2"></div>
		<div class="menu-icon-line menu-icon-line-3"></div>
	</div>
</div>
<div class="menu-inside">
	<div class="menu-inside-menu-container">
		<a href="services" class="menu-inside-menu menu-inside-menu-1">
			<div class="menu-inside-menu-text" data-content-type="text">SERVICES</div>
			<div class="menu-inside-menu-line"></div>
		</a>
		<a href="works" class="menu-inside-menu menu-inside-menu-2">
			<div class="menu-inside-menu-text" data-content-type="text">WORKS</div>
			<div class="menu-inside-menu-line"></div>
		</a>
		<a href="contact" class="menu-inside-menu menu-inside-menu-3">
			<div class="menu-inside-menu-text" data-content-type="text">CONTACT</div>
			<div class="menu-inside-menu-line"></div>
		</a>
	</div>
</div>
<div class="container">