<?php
/**
 * Template Name: Terms and Conditions
 */
get_header();
?>

<div class="container-fluid">
    <div class="container about-wrapper">
        <div class="about-content-wrap">
            <h1><?php echo the_title(); ?></h1>
            <div class="about-content">
                <?php print_r(the_post())	?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>