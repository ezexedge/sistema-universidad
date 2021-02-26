<?php

    get_header();

    while(have_posts()){
     the_post(); 
     pageBanner();
     ?>




  <div class="container container--narrow page-section">


<?php

$theParent = wp_get_post_parent_id(get_the_ID()); 

if(!$theParent) { ?>

<div class="metabox metabox--position-up metabox--with-home-link">
  <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to blog </a> <span class="metabox__main"><?php the_title();?></span></p>
</div>
<?php 
}
?>
<div class="generic-content">
    <?php the_content(); ?>
</div>

</div>



<?php }

get_footer();

?>