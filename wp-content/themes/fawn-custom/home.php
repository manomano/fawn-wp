<?php
get_header();

global $post;

$all_required_categories = [
    array('numberposts' => 10, 'category_name' => 'works'),
    array('numberposts' => 10, 'category_name' => 'services'),
    array('numberposts' => 1, 'category_name' => 'aboutus-one'),
    array('numberposts' => 1, 'category_name' => 'aboutus-two'),
    array('numberposts' => 1, 'category_name' => 'service-general'),
];

$thePosts = [];
foreach ($all_required_categories as $args) {
    $thePosts[$args['category_name']] = get_posts($args);
}




foreach (['works', 'services', 'aboutus-one', 'aboutus-two', 'service-general'] as $key) {

    foreach ($thePosts[$key] as $item) {
        $item->post_title = trim(strip_tags($item->post_title));
        if(!$key=='services'){
            $item->post_content = trim(strip_tags($item->post_content));
        }
    }
}



?>

    <div class="main-container">
        <div class="flex ">
            <div class="left relative about">
                <div class="title-big"><?php echo $thePosts['aboutus-one'][0]->post_title ?></div>
            </div>
            <div class="right">
                <div class="flex flex-mod-align">
                    <div class="paragraph"><?= $thePosts['aboutus-one'][0]->post_content ?></div>
                    <div class="btn-container-item">
                        <button class="round-button">
                            discuss<br/>the project
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="left padding-30">
                <div class="title-big-ord"><?php echo $thePosts['aboutus-two'][0]->post_title ?></div>
            </div>
            <div class="right padding-30">
                <div>
                    <div class="paragraph narrow"><?= $thePosts['aboutus-two'][0]->post_content ?></div>
                    <div class="btn-container-item">
                        <button class="ellipse-button">
                            <span>learn more</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex image-div">

        </div>
        <div class="flex reset-height">
            <div class="left">
                <div class="title-big-ord"><?php echo $thePosts['service-general'][0]->post_title ?></div>
            </div>
            <div class="right">
                <div class="paragraph narrow"><?= $thePosts['service-general'][0]->post_content ?></div>
            </div>

        </div>

        <?php foreach ($thePosts['services'] as  $key=>$item ) {

            $list = explode('<!-- /wp:heading -->', $item->post_content);
            ?>
            <div class="flex reset-height padding-v-10">
                <div class="left flex reset-height reset-flex-alignment">
                    <div class="num">
                        <div class="ellipse-num"><?=formatNumeration($key+1)?></div>
                    </div>
                    <div class="title-big-list">
                        <?= $item->post_title ?>
                    </div>

                </div>
                <div class="right plain-flex">
                    <div class="list">
                        <?php foreach($list as $listItem){ ?>
                            <div><?=strip_tags($listItem)?></div>
                        <?php } ?>
                    </div>
                    <div class="learn-more-container">
                        <button class="ellipse-button">Learn More</button>
                    </div>


                </div>
            </div>
        <?php } ?>

        <div class="flex image-div">
            <div id="mount">

            </div>
        </div>

    </div>


<?php


get_footer();