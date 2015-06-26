<?php
/**
  Template Name: Home
 */
get_header();
?>
<div class="container-fluid results">
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

	<!-- news -->
    <div class="container">
        <div class="col-sm-12 xg vertical-carousel">
        	<div id="newsCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-content">
                    <div class="carousel-inner">
    
                          <?php 
                           $active = true;
                           $indicators = '';
                           $count = 0;
                           $total_news_items = 0;
                           if (have_rows('news', 'option')){
                                while (have_rows('news', 'option')){ 
                                the_row();
                                $heading = get_sub_field('news_heading', 'option');
                                $image = get_sub_field('news_image', 'option');
                                $long_desc = get_sub_field('news_long_description', 'option');
                                $short_desc = get_sub_field('news_short_description', 'option');
                           ?>
                                <div class="item <?php echo $active ? 'active' : '';?>">
                                
                                    <div class="caption col-sm-7 col-xs-12 xg">
                                        <h4><?php echo sprintf("%02d", $count + 1) . '.'; ?></h4>
                                        <h1><?php echo $heading; ?></h1>
                                        <p><?php echo $long_desc; ?></p>
                                    </div>
                                    <div class="col-sm-5 col-xs-12 xg">
                                        <img src="<?php echo $image['url']; ?>"/>
                                    </div>
                                </div>
                           
                           <?php 
                                $indicators .= '<li data-target="#newsCarousel" data-slide-to="' . $count . '" ' . ( $active ? 'class="active"' : '' ) . '>
                                                    <h4><span> ' . sprintf("%02d", $count + 1) . '. </span>' . $heading . '</h4>
                                                    <p> ' . $short_desc . '</p>
                                                </li>';
                                $active = false;
                                $count++;
								$total_news_items++;
                                } # while
                           } # if have rows
                           ?>
                  
                        
                    </div>
                </div>
                <div class="carousel-indicator-wrap visible-lg" id="news-carousel-indicators">
                 	<ol class="carousel-indicators">
                    	<?php echo $indicators; ?>
                  	</ol>
            	</div>
			
            <a class="left carousel-control hidden-lg" href="#newsCarousel" role="button" data-slide="prev">
                <span class="slide-btn"><i class="fa fa-caret-left"></i></span>
            </a>
            <a class="right carousel-control hidden-lg" href="#newsCarousel" role="button" data-slide="next">
                <span class="slide-btn"><i class="fa fa-caret-right"></i></span>
            </a>
            </div><!-- carousel-->
            
     		
        </div>
    </div>
    <!-- news -->
	<script>
		$(function(){
			$('#newsCarousel').carousel({
			  interval: 5000
			});
			
			var v_counter = 0;
			var v_topOffset = 31;
			$('#newsCarousel').on('slide.bs.carousel',function(){
				var warp = $('#news-carousel-indicators .carousel-indicators');
				var indi = $('#news-carousel-indicators .carousel-indicators li.active');	
				var slideNo = indi.attr('data-slide-to');
				var height = indi.height();
				
				// if end of file reached scroll top
				if(slideNo == '<?=$total_news_items - 1;?>'){
					warp.animate({ scrollTop: 0});
					v_counter = -1;		
				}
				if(v_counter == 2){
					v_counter = -1;
					warp.animate({ scrollTop: (height * 3) + v_topOffset});	
					
				}
	
				v_counter++;
				
			});
		}); //ready

	</script>
    
    <div class="container hidden-xs">
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




