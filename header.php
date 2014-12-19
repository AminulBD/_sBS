<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _sBS
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-main-navigation-toggle">
				        <span class="sr-only"><?php echo __( 'Toggle Navigation', PROJECT_TEXT_DOMAIN ) ?></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
			    	</button>
			    	<a class="navbar-brand" href="<?php echo home_url(); ?>">
			        	<?php bloginfo('name'); ?>
			        </a>
			    </div>

		        <?php
		            wp_nav_menu( array(
		                'menu'              => 'primary',
		                'theme_location'    => 'primary',
		                'depth'             => 10,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse',
		        		'container_id'      => 'site-main-navigation-toggle',
		                'menu_class'        => 'nav navbar-nav navbar-right',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
		        ?>
		    </div><!-- /.container -->
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="container">