<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
			<main class="site-main" id="main">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>


				<?php if ( have_posts() ) : ?>
			  <div class="main-nav landing-nav">
			      <?php wp_nav_menu( array(
			        'menu' => 'main-menu',
			        'container' => false,
			        'theme_location' => 'primary'
			      )); ?>
			  </div>
			<div class="cat-header">

			<ul>
			 
			     <li>
			        <?php if (function_exists('z_taxonomy_image_url')): ?>
			           <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
			        <?php else: ?>
			           <img src="<?php stylesheet_directory_url(); ?>/images/placeholder.jpg" />
			        <?php endif; ?>
			     </li>

			</ul>
			       <h1></h1>
			       <p class="des"> <?php echo category_description( $category_id ); ?> 

					</p>
	
				
			</div>


					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'archive' );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
