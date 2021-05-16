
<?php

    if(!is_user_logged_in()){
        wp_redirect(esc_url(site_url('/')));
        exit;
    }


    get_header();
    while(have_posts()){
     the_post(); ?>
     
     <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg')?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title();?></h1>
      <div class="page-banner__intro">
        <p>Learn how the school of your dreams got started.</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">
    
        <ul class="min-list link-list " id="my-notes">

            <?php
                $userNotes = new WP_Query(array(
                    'post_type' => 'note',
                    'post_per_page' => -1,
                    'author' => get_current_user_id()
                ));

                while($userNotes->have_posts()){
                    $userNotes->the_post(); ?>

                    <li>
                        <input class="note-title-field" value="<?php echo get_the_title(); ?>">
                        <span class="edit-note">
                        <i class="fa fa-pencil"></i>
                            Edit
                        </span>
                        <span class="delete-note">
                        <i class="fa fa-trash-o"></i>
                            Eliminar
                        </span>
                        <textarea class="note-body-field" ><?php echo wp_strip_all_tags(get_the_content());  ?></textarea>
                    </li>

               <?php }
            
            ?>

        </ul>

        
  </div>
  
    <?php }

    get_footer();

?>