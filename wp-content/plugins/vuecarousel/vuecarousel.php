<?php
/*
Plugin Name: Carousel
Description: Works with photos with filtering possibility
Version: 1.0
*/


function get_works(){
    $works = get_posts(array('numberposts' => 10, 'category_name' => 'works'));
    foreach ($works as $item) {
        //$image = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID) );


        $workArea = get_post_meta( $item->ID, 'work-area', true );
        //$image = get_post_meta( $item->ID, '' );
        $args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_mime_type' => 'image', 'post_parent' => $item->ID );
        $attachments = get_posts( $args );



        $item->post_title = trim(strip_tags($item->post_title));
        $item->post_content = trim(strip_tags($item->post_content));


        $item->workingArea = $workArea;
        $item->image = $attachments[0];
    }

    return $works;
}


function handle_shortcode() {
    return 'Our works carousel widget';
}

//add_shortcode('Carousel', 'handle_shortcode');

function enqueue_scripts(){

    wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js', [], '2.6.14');

    wp_enqueue_script('app', plugin_dir_url( __FILE__ ) . 'app.js', [], '1.0', true);
    add_filter('script_loader_tag', 'add_type_attribute' , 10, 2);

    function add_type_attribute( $tag, $handle) {

        if ( 'app' === $handle ) {
            $src = plugin_dir_url( __FILE__ ) . 'app.js';
            $tag = '<script type="module"  type="text/javascript"  src="' . esc_url( $src ) . '" ></script>';
        }

        return $tag;
    }


    wp_localize_script('app', 'works', get_works());

}

enqueue_scripts();

/*
function func_load_vuescripts() {
    // Register Vue.js and scripts
    echo "aq var2 ";
    wp_register_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js');
    wp_register_script('appjs', plugin_dir_url( __FILE__ ) . 'app.js', 'wpvue_vuejs', true );
}
add_action('wp_enqueue_scripts', 'func_load_vuescripts');


// Create shortscode function
function func_wp_vue() {

    // Load Vue.js and scripts
    echo "aq var1 ";
    wp_enqueue_script('vue');
    wp_enqueue_script('appjs');

    wp_localize_script('appjs', 'works', get_works());

    return file_get_contents(plugin_dir_path(__FILE__) . './VueCarousel.vue');
}

// Add shortscode
add_shortcode( 'wpvue', 'func_wp_vue' );*/





