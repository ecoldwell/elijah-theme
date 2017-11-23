<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
 
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">


		<div class="entry-meta">

			<?php //understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->
	<div class="show" id="overlay">
	<section class="hero-landing-location-page" id="location-hero">
	<div class="main-nav landing-nav">
	</div>
		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	</section>
	</div>

	<div class="whole-content">
		<div class="main-nav">
		    <?php wp_nav_menu( array(
		      'menu' => 'main-menu',
		      'container' => false,
		      'theme_location' => 'primary'
		    )); ?>
		</div>

	<div class="entry-content">
		<section class="main-post-layout" id="location-content">
			<div class="post-text-content">
				<?php the_title( '<h1 class="entry-title then-now-link">', '</h1>' );  ?>
				<?php the_content(); ?>
			</div>
			<div class="post-gallery-content slideshow post-gallery-content-cat" id="post-gallery-content-cat">
			<div class="close">
				<p>X</p>
			</div>
			<div class="post-gallery-content slideshow">
			<?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
			<?php if( $attachments->exist() ) : ?>
			  <ul class="post-images data-slick product-photos" id="data-slick post-gallery-content-cat">
			    <?php while( $attachments->get() ) : ?>
			      <li class="post-images-image">
			        <a class="lightbox-link" target="_blank">
			        <img class="title"src= "<?php echo $attachments->src( 'lightbox' )  ?>" title="<?php echo $attachments->field( 'caption' ); ?>" rel="gallery"><?php echo $attachments->field( 'caption' ); ?>
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
		</div>

		</section>
		<div class="full-width-text">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php the_content(); ?>

			<?php the_field('full_width_text') ?>
		</div>
			<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

<?php
if ( is_active_sidebar( 'static-hero' ) ) : ?>
    <div id="static-hero" class="chw-widget-area widget-area" role="complementary">
    <?php dynamic_sidebar( 'static-hero' ); ?>
    </div>
     
<?php endif; ?>

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

		document.getElementById('post-gallery-content-cat').classList.add("show");
	});
	$('.close').on("click", function(){
			document.getElementById('post-gallery-content-cat').classList.remove("show");
		});

</script>
