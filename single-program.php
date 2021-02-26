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
  <p><a class="metabox__blog-home-link" href="<?php echo site_url('/programs'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to Programs </a> <span class="metabox__main"><?php the_title();?></span></p>
</div>
<?php 
}
?>
<div class="generic-content">
    <?php the_content(); ?>
</div>



<?php
$today = date('Ymd');
          $relatedProfessors = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'professor',
            
            'orderby' => 'title',
            'order' =>  'ASC',
            'meta_query' => array(
            
              array(
                'key' => 'related_programs',
                'compare' => 'LIKE',
                'value' => '"'. get_the_ID()  .'"'

              )
            )
          ));

          if($relatedProfessors->have_posts()){

          echo '<hr class="section-break">';
          echo '<h2  class="headline headline--medium"> Professor ' .  get_the_title()  . '    </h2>';

            echo '<ul>';
          while($relatedProfessors->have_posts()){
              
              $relatedProfessors->the_post();
              ?>

                <li class="professor-card__list_item">
                
                 <a class="professor-card" href="<?php the_permalink(); ?>" >
                    <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape');?>" />
                    <span class="professor-card__name"><?php the_title();?></span>
                 </a>
                 </li>

              <?php
          }

          echo '</ul>';

          }

          wp_reset_postdata();
?>





<?php
$today = date('Ymd');
          $homePageEvents = new WP_Query(array(
            'posts_per_page' => 2,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value',
            'order' =>  'ASC',
            'meta_query' => array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'

              ),
              array(
                'key' => 'related_programs',
                'compare' => 'LIKE',
                'value' => '"'. get_the_ID()  .'"'

              )
            )
          ));

          if($homePageEvents->have_posts()){

          echo '<hr class="section-break">';
          echo '<h2  class="headline headline--medium"> Upcoming ' .  get_the_title()  . ' Events   </h2>';


          while($homePageEvents->have_posts()){
              
              $homePageEvents->the_post();

              get_template_part('template-parts/content-event'); 

          }

          }
?>


</div>



<?php }

get_footer();

?>