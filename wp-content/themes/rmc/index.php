<?php
/**
  Template Name: Home
 */
get_header();
?>
<div class="container-fluid">
    <div class="container home-wrapper">
        <div id="slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo bloginfo('template_directory').'/img/HomePage.jpg';?>"/>
                </div>
                <div class="item">
                    <div class="item-text">
                        <h1>Austrlia's Pemier Choice For Plumbing Products</h1>
                        <h2>World Leaders In Water Control Valves and Push-Fit Plumbing Fittings</h2>
                    </div>
                    <img src="<?php echo bloginfo('template_directory').'/img/HomePage1.jpg';?>"/>
                </div>
            </div>
            <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left left-arrow" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right right-arrow" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    
    
    <div class="container">
    	<div class="col-xs-12 x-gutters v-slider">
    		<img src="<?php echo bloginfo('template_directory') . '/img/rmcPlaceholder.jpg';?>" />
        </div>
    </div>
</div>







<?php
get_footer();
?>




