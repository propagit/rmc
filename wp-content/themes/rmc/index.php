<?php
/**
  Template Name: Home
 */
get_header();
?>
<div class="container-fluid">
    <div class="container home-wrapper">
        <div id="slider" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner" role="listbox">
                <?php
                $active_item = "active";
                if (have_rows('slider', 'option')):
                    while (have_rows('slider', 'option')):the_row();
                        $slider_image = get_sub_field('slider_image', 'option');
                        $slider_description1 = get_sub_field('slider_description1', 'option');
                        $slider_description2 = get_sub_field('slider_description2', 'option');
                        ?>

                        <div class="item <?php echo $active_item; ?>">
                            <div class="item-text">
                                <h1><?php echo $slider_description1; ?></h1>
                                <h2><?php echo $slider_description2; ?></h2>
                            </div>
                            <img src="<?php echo $slider_image['url']; ?>"/>
                        </div>

                        <?php
                        $active_item = "";
                    endwhile;
                endif;
                ?>

            </div>
            <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                <span class="slide-btn"><i class="fa fa-caret-left"></i></span>
            </a>
            <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                <span class="slide-btn"><i class="fa fa-caret-right"></i></span>
            </a>
        </div>
    </div>


    <div class="container">
        <div class="col-xs-12 x-gutters v-slider">
            <img src="<?php echo bloginfo('template_directory') . '/img/rmcPlaceholder.jpg'; ?>" />
        </div>
    </div>
    <div class="container">
        <div class="jump-points-wrapper">
            <div class="jump-points-header">
                <h2>Browse Products By Category</h2>
            </div>
            <div class="jump-points">
                <?php if (have_rows('jump_points', 'option')): ?>
                    <ul>
                        <?php
                        $jp_first="id='jp-first'";
                        while (have_rows('jump_points', 'option')): the_row();
                            $jumppoint_image = get_sub_field('jump_point_image', 'option');
                            $jumppoint_text = get_sub_field('jump_point_text', 'option');
                            $category_link = get_sub_field('url_name','option');
                            ?>
                            <li <?php echo $jp_first;?>>
                                <a href="<?php echo site_url().'/type_products/'.$category_link.'/';?>">    
                                    <img src="<?php echo $jumppoint_image['url']; ?>"/></a>
                                <p><?php echo $jumppoint_text; ?></p>
                            </li>

                            <?php
                            $jp_first="";
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>







<?php
get_footer();
?>




