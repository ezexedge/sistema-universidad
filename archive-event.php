<?php

get_header();

?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg')?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">
      
        Todos los eventos
      
      </h1>
      <div class="page-banner__intro">
        <p>Estos son todos nuestros eventosss</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">

    <?php


$today = date('Ymd');
$homePageEvents = new WP_Query(array(
  'paged' => get_query_var('paged',3),
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

    )
  )
));

        while($homePageEvents->have_posts()){
          $homePageEvents->the_post(); ?>


<div class="event-summary">
<a class="event-summary__date t-center" href="#">
              <span class="event-summary__month">
                <?php
                
                $eventDate = new DateTime(get_field('event_date'));

                echo $eventDate->format('M');

                ?>
              </span>
              <span class="event-summary__day"><?php

                echo $eventDate->format('d');
              
              ?></span>
            </a>
            <div class="event-summary__content s">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
              <p><?php  wp_trim_words(get_the_content(),18); ?> <a href="#" class="nu gray">Learn more</a></p>
            </div>
          </div>



          <?php
        }


        echo paginate_links(array(

          'total' => $homePageEvents->max_num_pages
      
        ));
    ?>

    <hr class="section-break">

    <p>mira los eventos anterioes <a href="<?php echo site_url('/past-event') ?>">ver los eventos anteoriores</a> </p>

  </div>

<?php
get_footer();

?>