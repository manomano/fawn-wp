<?php
/*
Plugin Name: Carousel
Description: Works with photos with filtering possibility
Version: 1.0
*/


function get_works(){
    $works = get_posts(array('numberposts' => 10, 'category_name' => 'works'));
    foreach ($works as $item) {
        $workArea = get_post_meta( $item->ID, 'work-area', true );
        $item->post_title = trim(strip_tags($item->post_title));
        $item->post_content = trim(strip_tags($item->post_content));
        $item->workingArea = $workArea;
    }

    return $works;
}


function handle_shortcode() {
    return 'Our works carousel widget';
}
add_shortcode('Carousel', 'handle_shortcode');

function enqueue_scripts(){


    wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js', [], '2.6.14');



    //wp_enqueue_script('vue-carousel', plugin_dir_url( __FILE__ ) . 'vue-carousel.vue', [], '1.0', true);
    wp_enqueue_script('app', plugin_dir_url( __FILE__ ) . 'app.js', [], '1.0', true);
    wp_localize_script('app', 'works', get_works());

}

enqueue_scripts();