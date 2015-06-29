<?php
/*
 * Template Name: Contact
 */
get_header();
?>
<div class="container-fluid results">
    <div class="container contact-wrap">
        <div class="col-sm-12">
            <h1><?php echo the_title(); ?></h1>
        </div>
        <div class="col-sm-7">
            
            <h2 id="contact-question">Have a question about RMC products?</h2>
            <h2 id="contact-filling">Contact Our team by filling out the contact form</h2>
            <h3>Reliance Worldwide Corporation</h3>
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
            <div class="contact-form" id="contact-form">
                <form method="post" class="form-contact" id="contact" action="javascript:send_mail();">
                    <div class="form-group fields-group">
                        <input type="text" class="fields form-control" name="name" id="name" placeholder="your name..." required=""/>
                        <input type="text" class="fields form-control" name="company" id="company" placeholder="company name..." required=""/>
                        <input type="email" class="fields form-control" name="email" id="email" placeholder="your email..." required=""/>
                        <input type="text" class="fields form-control" name="phone" id="phone" placeholder="your phone..."/>
                        <textarea class="fields form-control" name="message" id="message" placeholder="your message..." required=""></textarea>
                        <button type="submit" class="btn btn-default register-button">Send</button>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
</div>
<script>
    function send_mail(){
	$.ajax({
		url:'<?php echo admin_url('admin-ajax.php'); ?>',
		method:'POST',
		data:{
			action:'send_mail',
			name:$('#name').val(),
                        company:$('#company').val(),
                        email:$('#email').val(),
                        phone:$('#phone').val(),
                        message:$('#message').val(),
				
		}
	}).done(function(response){
		var sel = $("#contact-form"); // SELECT THE SECOND DROP DOWN WITH THE ID MODELS
                //sel.empty(); 
		$('#contact-form').html(response);
	})
}
</script>






<?php get_footer(); ?>
