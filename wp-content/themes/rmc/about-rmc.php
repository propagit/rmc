<?php
/**
 * Template Name: About
 */
get_header();?>

<div class="container-fluid">
    <div class="container about-wrapper">
        <div class="about-content-wrap">
            <h1><?php echo the_field("about_header"); ?></h1>
            <h3><?php echo the_field("about_second_header"); ?></h3>
            <h2><?php echo the_field("content_header"); ?></h2>
            <div class="about-content">
                <?php
                $about_image = get_field("about_image");
                ?>
                <img src="<?php echo $about_image['url'];?>"/>
                <p><?php echo the_field("about_content");?></p>
            </div>
        </div>
    </div>
</div>








<?php
get_footer();
?>

