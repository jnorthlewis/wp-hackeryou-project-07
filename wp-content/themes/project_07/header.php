<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!-- GOOGLE FONTS -->
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Serif:400,400italic' rel='stylesheet' type='text/css' />

  <?php // Load our CSS ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header class="top">
  <div class="container">
    <div class="headerLogoNav clearfix">
      <h1 class="blogName ">
        <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
        </a>
      </h1>

      <?php wp_nav_menu( array(
        'container' => false,
        'theme_locations' => 'primary'
      )); ?>
    </div><!--END .innerContainer-->
  </div> <!-- /.container -->
</header><!--/.header-->

