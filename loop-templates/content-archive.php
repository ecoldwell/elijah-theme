
<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<div class="entry-content">
			<section class="main-post-layout" id="location-content">
				<div class="post-text-content">
					<?php the_title( '<h1 class="entry-title then-now-link">', '</h1>' ); ?>
					<?php the_content(); ?>
				</div>
				<div class="post-gallery-content slideshow" id="post-gallery-content">
				<div class="close">
					<p>X</p>
				</div>
				<?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
				<?php if( $attachments->exist() ) : ?>
				  <ul class="post-images data-slick product-photos">
				    <?php while( $attachments->get() ) : ?>
				      <li class="post-images-image">
				        <a class="lightbox-link" href="#">
				        <img class="title"src= "<?php echo $attachments->src( 'lightbox' )  ?>" target="_blank" title="<?php echo $attachments->field( 'caption' ); ?>" rel="gallery" alt=""><?php echo $attachments->field( 'caption' ); ?>
				         
				        </a>
				         <div class="slide-count-wrap">
				         	<span class="left"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
				           <span class="current"></span> /
				           <span class="total"></span>
				           <span class="right"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
				        </div>
				      </li>

				    <?php endwhile; ?>

				  </ul>
				<?php endif; ?>
				</div>

			</section>
			</div>
			<section class="flex-content">
							<?php

							// check if the flexible content field has rows of data
							if( have_rows('content') ):

							     // loop through the rows of data
							    while ( have_rows('content') ) : the_row();

							        if( get_row_layout() == 'image_text' ): ?>
							        <div class="image-text">
								        <div class="image">
								        	<?php 
								        $image = get_sub_field('image') ?>
								        <img src="<?php echo $image['url']; ?>" alt="">
								        </div>
							        	<div class="text">
								        <?php
								        	the_sub_field('text'); ?>
								        </div>
							        </div>
				
							        <?php 

							        elseif( get_row_layout() == 'text_image' ): ?>
							        <div class="image-text">
							        	<div class="text">
							        	<?php 
							        		the_sub_field('text'); ?>
							        		
							        	</div>
							        	<div class="image">
							        		<?php  
							        	$image = get_sub_field('image') ?>
							        	<img src="<?php echo $image['url']; ?>" alt="">
							        	</div>
							        </div>
							        	<?php 
							        	elseif( get_row_layout() == 'full_width_text' ): ?>
							        	<div class="full-width-text">
							        		<div class="text">
							        		<?php 
							        			the_sub_field('full_width_text'); ?>
							        			
							        		</div>
							        	</div>
							        		<?php 
							        	

							        endif;

							    endwhile;

							endif;

							?>
						</section>
			</div>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<script>

var $gallery = $('.data-slick');
var slideCount = null;

	$(function(){
		$gallery.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 250,
        fade: true,
        cssEase: 'linear',
        swipe: true,
        swipeToSlide: true,
        arrows: false,
        touchThreshold: 10,
        focusOnSelect: true
    	});
	});	
	$gallery.on('init', function(event, slick){
	  slideCount = slick.slideCount;
	  setSlideCount();
	  setCurrentSlideNumber(slick.currentSlide);
	});

	$gallery.on('beforeChange', function(event, slick, currentSlide, nextSlide){
	  setCurrentSlideNumber(nextSlide);
	});

	function setSlideCount() {
	  var $el = $('.slide-count-wrap').find('.total');
	  $el.text(slideCount);
	}

	function setCurrentSlideNumber(currentSlide) {
	  var $el = $('.slide-count-wrap').find('.current');
	  $el.text(currentSlide + 1);
	}
	$('.left').click(function(){
	  $('.data-slick').slick('slickPrev');
	})

	$('.right').click(function(){
	  $('.data-slick').slick('slickNext');
	})

	$('.data-slick').click(function() {
	  $gallery.slick('slickGoTo', parseInt($gallery.slick('slickCurrentSlide'))+1);
	});
	$('.hero-landing-location-page').on('click', function (e){
		$.smoothScroll({
			scrollTarget: '.whole-content'
		});
	});
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
	$('.then-now-link').on("click", function(){
		document.getElementById('post-gallery-content').classList.add("show");
	});
	$('.close').on("click", function(){
		document.getElementById('post-gallery-content').classList.remove("show");
	});

</script>
