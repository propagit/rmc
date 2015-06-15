<div class="container-fluid">
    <div class="container">
        <div class="footer-wrapper">
            <div class="scroll-to-top">`
                <img src="<?php echo bloginfo('template_directory') . '/img/back-to-top.jpg'; ?>" id="top"/>
            </div>
            <div class="social-media">
                <p>JOIN US ON</p>
                <div class="social-media-links">
                    <a href="<?php echo the_field("facebook_link", "option"); ?>"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo the_field("twitter_link", "option"); ?>"><i class="fa fa-twitter"></i></a>
                    <a href="<?php echo the_field("youtube_link", "option"); ?>"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-menu hidden-sm hidden-xs">
                <hr>
                <?php wp_nav_menu(array('menu' => 'Footer Menu', 'theme_location' => 'primary')); ?>
            </div>
            <div class="footer-logo-wrap">
                <div class="footer-logo">
                    <?php $footer_logo = get_field("footer_logo", "option"); ?>
                    <img src="<?php echo $footer_logo['url']; ?>" class="img-responsive"/>
                </div>
                <div class="footer-bottom-text">
                    <p><?php echo the_field("footer_text", "option"); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="sb-slidebar sb-right">
    <?php wp_nav_menu(array('menu' => 'Top Menu')); ?>
</div>

<script type="text/javascript" src="<?php echo bloginfo('template_directory') . '/js/jquery-1.11.2.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory') . '/js/jquery.mobile.custom.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory') . '/js/bootstrap.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory') . '/js/slidebars.min.js'; ?>"></script>
<script>
    $('#top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
    $(window).scroll(function () {
        var offset = 120;

        var height = $(window).height();
        var scrollTop = $(window).scrollTop();
        var obj = $(".footer-wrapper");
        var pos = obj.position();
        if (height + scrollTop - offset > pos.top) {
            $('.scroll-to-top').slideDown();
        }
        else {
            $('.scroll-to-top').slideUp();
        }
    });
</script>
<script>
    (function ($) {
        $(document).ready(function () {
            $.slidebars();
        });
    })(jQuery);
</script>

</body>
