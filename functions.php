<?php


function university_files(){
    wp_enqueue_style('custom-google-font','https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_script('main-university-js', 'http://localhost:3000/bundled.js' ,NULL,'1.0',true);
//    wp_enqueue_style('university_main_styles', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts','university_files');



function university_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_image_size('professorLandscape', 400, 260, true);
  
    add_image_size('professorPortrait', 480, 650, true);

}

add_action('after_setup_theme','university_features');



function university_adjust_queries($query){

    if( !is_admin() AND is_post_type_archive('program')){
        $query->set('orderby','title');
        $query->set('order','ASC');
        $query->set('posts_per_page','-1');
    }



    if( !is_admin() AND is_post_type_archive('event')){
        $query->set('posts_per_page','-1');
    }

}


add_action('pre_get_posts','university_adjust_queries');

?>