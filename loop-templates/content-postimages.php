 <?php $attachments = new Attachments( 'post_images' ); /* pass the instance name */ ?>
<?php if( $attachments->exist() ) : ?>
  <?php
    $attachments_length = $attachments->total();
    $className = "post-images";
    if ($attachments_length > 1) {
      $className = $className." multiple-images";
    }
  ?>

  <ul class="<?php echo $className ?>">
    <?php while( $attachment = $attachments->get() ) : ?>
      <li>
        <img src="<?php echo $attachments->src( 'index-gallery' )  ?>" />
      </li>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>