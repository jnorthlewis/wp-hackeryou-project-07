<?php get_header(); ?>

<div class="main">
  <div class="container">

    <!-- S I D E B A R -->
    <?php get_sidebar(); ?> 

    <div class="content singleBlog">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          
          <div class="featImg"><?php the_post_thumbnail( $size, $attr ); ?></div>
          <h1 class="entry-title"><?php the_title(); ?></h1>

          <div class="entry-meta postDate">
            <?php echo get_the_date(); ?>
          </div><!-- .entry-meta -->

          <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->

          <div class="entry-utility clearfix">
            <!--<?php hackeryou_posted_in(); ?>-->
            <!--<?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>-->
        
          <!-- CATEGORY BUTTON -->
          <p class="categoryButton"><?php the_category(', '); ?></p>
          
          </div><!-- .entry-utility -->
        </div><!-- #post-## -->

        <div id="nav-below" class="navigation">
          <p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
        </div><!-- #nav-below -->


        <?php comments_template( '', true ); ?>


      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

  

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>