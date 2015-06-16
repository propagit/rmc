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
                <div class="item active">
                    <div class="item-text">
                        <h1>Australia's Premier Choice <br>For Plumbing Products</h1>
                        <h2>World Leaders In Water Control Valves <br>and Push-Fit Plumbing Fittings</h2>
                    </div>
                    <img src="<?php echo bloginfo('template_directory') . '/img/banner1.jpg'; ?>"/>
                </div>
                <div class="item">
                    <div class="item-text">
                        <h1>The Worlds Choice For<br>Push-Fit Plumbing Fittings</h1>
                        <h2>Controlling the flow of water the world<br>over for more than 30 years</h2>
                    </div>
                    <img src="<?php echo bloginfo('template_directory') . '/img/banner2.jpg'; ?>"/>
                </div>
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
        <div class="jump-points-header">
            <h2>Browse Products By Category</h2>
        </div>
        <div class="jump-points">

            
            <ul>
               
                <li>
                    
                    <img src="<?php echo bloginfo('template_directory').'/img/jump-point1.png';?>"/>
                    <p>Valves & Plumbing</p>
                </li>
                <li>
                    
                    <img src="<?php echo bloginfo('template_directory').'/img/jump-point2.png';?>"/>
                    <p>Meters & Mains</p>
                </li>
                <li>
                        <img src="<?php echo bloginfo('template_directory').'/img/jump-point3.png';?>"/>
                    <p>Backflow Prevention</p>
                </li>
                <li>
                    
                    <img src="<?php echo bloginfo('template_directory').'/img/jump-point4.png';?>"/>
                    <p>SharkBite Push-Fit</p>
                </li>


            </ul>
        </div>
    </div>
</div>







<?php
get_footer();
?>




