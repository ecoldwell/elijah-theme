 <?php get_header();  ?>
	 <?php // Start the loop ?>
       <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>  
       <div class="show" id="overlay">   
			<?php
			if ( is_active_sidebar( 'custom-header-widget' ) ) : ?>
			    <div id="header-widget-area" class="landing-page-background" role="complementary">
			    <?php dynamic_sidebar( 'custom-header-widget' ); ?>
			    </div>
			     
			<?php endif; ?>
			</div>
	

			<div class="main-nav">
			    <?php wp_nav_menu( array(
			      'menu' => 'main-menu',
			      'container' => false,
			      'theme_location' => 'primary'
			    )); ?>
			</div>
			<header class="entry-header landing-page">
			 
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			    <section class="our-story">
			    	<?php the_content(); ?>
			    </section>
			</header><!-- .entry-header -->

				<section class="hero-landing-location-page" id="location-hero">
				<div class="main-nav landing-nav">
				</div>
					<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
				</section>
			<?php
			 
			if ( is_active_sidebar( 'custom-home-listings' ) ) : ?>
			    <div id="custom-home-listings" class="chw-widget-area widget-area" role="complementary">
			    <?php dynamic_sidebar( 'custom-home-listings' ); ?>
			    </div>
			     
			<?php endif; ?>
      <?php endwhile; //end the loop?>
  <?php get_footer() ?>  
      <script>
      	$( document ).ready(function() {
      	  document.getElementById("overlay").classList.add("show");
      	  setTimeout(function() {
      	    document.body.classList.remove("loading");
      	  }, 600);

      	  if (!window.isMobile) {
      	    $("body").mouseleave(function () {
      	      document.getElementById("overlay").classList.add("show");
      	    });
      	    $("body").mouseenter(function () {
      	      document.getElementById("overlay").classList.remove("show");
      	    });
      	  } else {
      	    $("#overlay").on("click", function () {
      	      document.getElementById("overlay").classList.remove("show");
      	    });
      	  }


      	});
      </script>