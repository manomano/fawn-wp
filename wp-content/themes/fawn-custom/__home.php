<?php
get_header();

global $post;

$all_required_categories = [
    array( 'numberposts' => 10, 'category_name' => 'works' ),
    array( 'numberposts' => 10, 'category_name' => 'services' ),
    array( 'numberposts' => 1, 'category_name' => 'aboutus-one' ),
    array( 'numberposts' => 1, 'category_name' => 'aboutus-two' ),
    array( 'numberposts' => 1, 'category_name' => 'service-general' ),
];

$thePosts = [];
foreach($all_required_categories as $args){
    $thePosts[$args['category_name']] = get_posts( $args );
}

foreach(['works', 'services', 'aboutus-one', 'aboutus-two', 'service-general'] as $key){

    foreach($thePosts[$key] as $item){
        $item->post_title = trim(strip_tags($item->post_title));
        $item->post_content = trim(strip_tags($item->post_content));
    }
}


//$data = explode('<!-- /wp:heading -->', $str);
//echo strip_tags($data[0]);
/* echo $thePosts['aboutus-one'][0]->post_title?>*/


?>
<div class="grid-container">
    <div class="left-grid">
        <div class="title-big"><?php echo $thePosts['aboutus-one'][0]->post_title ?>

        </div>
    </div>
    <div class="right-grid">
        <div class="paragraph-item"><?=$thePosts['aboutus-one'][0]->post_content?></div>
        <div class="btn-container-item">
            <div class="learn-more">
                <div class="circle"></div>
                discuss the project
            </div>
        </div>
    </div>

    <div class="left-grid">
        <div class="title-big">
            <?php echo $thePosts['aboutus-two'][0]->post_title ?>
        </div>
    </div>
    <div class="about">
        <div class="paragraph-item"><?=$thePosts['aboutus-two'][0]->post_content?></div>

        <div class="learn-more">
            <div class="ellipse"></div>
            Learn more
        </div>

    </div>
    <div class="about-image">

    </div>

    <div class="left service">
        <div class="title-big"><?php echo $thePosts['service-general'][0]->post_title ?></div>
    </div>
    <div class="right relative service">
        <div class="paragraph abs-top  modifier-width-25"><?=$thePosts['service-general'][0]->post_content?></div>
    </div>
    <div class="services">
        <div class="container">
            <div></div>
            <div></div>
        </div>

    </div>
    <div class="services">ori</div>
</div>

<?php



get_footer();