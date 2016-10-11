<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo('name'); ?></title>

	<?php wp_head(); ?>
</head>
<body>

	<div class='container'>
		<div class='col-md-12'>
			<header>
				<h1><a href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?> </a></h1>
				<p><?php bloginfo('description'); ?>
				
					<?php if(is_page('portfolio')){?>
						<span>- This is home page</span>
					<?php }  ?></p>

				<nav class='page-navs'>
					<?php wp_nav_menu(['theme_location'=> 'primary']); ?>
				</nav>
				<hr/>
			</header>
		

	