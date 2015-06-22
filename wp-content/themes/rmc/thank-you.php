<?php
/*
 * Template Name: Thank You
 */
get_header();
?>
<div class="container-fluid">
    <div class="container contact-wrap">
        <div class="col-sm-12">
            <h1><?php echo the_title(); ?></h1>
        </div>
        <div class="col-sm-7">
            <h3>Reliance Worldwide Corporation</h3>
            <h2>Have a question about RMC products?</br>
                Contact Our team by filling out the contact form</h2>
            <p><i class="fa fa-home"></i> 27-28 Chapman Place</br>
                Eagle Farm, QLD 4009</br>
                Australia</p>
            <p><i class="fa fa-phone"></i> <?php echo the_field("header_number", "option"); ?></br>
                <i class="fa fa-print"></i> 1-800-062-669</br>
                <i class="fa fa-envelope-o"></i> <a href="mailto: sales@relianceworldwide.com.au">sales@relianceworldwide.com.au</a></p>
            <div class="contact-social-links">
                <p>Connect With Us</p>
                <a href="<?php echo the_field("facebook_link", "option"); ?>"><i class="fa fa-facebook-square"></i></a>
                <a href="<?php echo the_field("facebook_link", "option"); ?>"><i class="fa fa-twitter-square"></i></a>
                <a href="<?php echo the_field("facebook_link", "option"); ?>"><i class="fa fa-youtube-square"></i></a>
            </div>
        </div>
        <div class="col-sm-5 contact-form-wrap">
            <div class="contact-form">
                <h1>Thank you for your mail. Shortly some of our stuff will look your question.</h1>
            </div>
        </div>

    </div>
</div>







<?php get_footer(); ?>

