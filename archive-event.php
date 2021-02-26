<?php

get_header();
pageBanner(array(
  'title'=> 'All events',
  'subtitle' => 'informacion de todos los eventos'
));


?>


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
          $homePageEvents->the_post(); 


          get_template_part('template-parts/content','event');
          

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