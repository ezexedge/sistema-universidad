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
}

add_action('after_setup_theme','university_features');



?>