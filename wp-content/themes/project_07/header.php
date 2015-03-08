<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />


  <!-- GOOGLE FONTS -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic' rel='stylesheet' type='text/css' />

  <?php // Load our CSS ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header class="top">
  <div class="container">
    <div class="headerLogoNav clearfix">
      <div class="blogTitle">
        <h1 class="blogName">
          <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
          </a>
        </h1>
        <h2 class="blogTagline">
          <?php bloginfo( 'description' ); ?>
        </h2>
      </div><!--END .blogTitle-->
      
      <div class="menuButton clearfix">
        <p>menu</p>
      </div><!--END .menuButton-->
      <div class="dropDown">
      <?php wp_nav_menu( array(
        'container' => false,
        'theme_locations' => 'primary'
      )); ?>
      </div><!--END .dropDown-->
    
    </div><!--END .headerLogoNav-->
  </div> <!-- /.container -->
</header><!--/.header-->

