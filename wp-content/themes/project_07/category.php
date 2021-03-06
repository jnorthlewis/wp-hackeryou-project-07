<?php get_header(); ?>

<div class="main">
  <div class="container">
    
    <?php get_sidebar(); ?>

    <div class="content categoryPage">

      <h1>Category Archives: <?php single_cat_title(); ?></h1>
      <?php
        $category_description = category_description();
        if ( ! empty( $category_description ) )
          echo '' . $category_description . '';
         get_template_part( 'loop', 'category' );
        ?>

    </div> <!-- /.content -->


  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>