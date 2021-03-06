<?php
/**
 * Template Name: Terms and Conditions
 */
get_header();
?>

<div class="container-fluid results">
    <div class="container about-wrapper">
        <div class="about-content-wrap">
            <h1><?php echo the_title(); ?></h1>
            <div class="about-content">
                <?php echo the_field("terms_content");?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>