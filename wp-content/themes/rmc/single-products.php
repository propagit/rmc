<?php
get_header();
?>
<div class="container-fluid product-details-wrapper results">
    <div class="container product-details-content">
        <?php
        $category_terms = get_the_terms(get_queried_object()->ID, 'type_products');?>
        <div class="product-breadcrumb">
            <p>
        <?php foreach($category_terms as $category_term){?>
                <a href="<?php echo site_url().'/type_products/'. $category_term->slug; ?>"><span style="color: #4f91cd;"><?php echo $category_term->name;?></span></a>
                <i class="fa fa-angle-right"></i>
            <?php
            } echo the_title(); ?></p>
        </div>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                $product_image = get_field('product_image');
                $product_title = get_the_title();
                $product_description = get_field('description');
                $product_sizes = get_field('product_sizes');
                ?>
                <h1><?php echo $product_title; ?></h1>
                <div class="col-sm-6 product-details-left-wrap">
                    <div class="product-details-left">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a>
                            </li>
                            <li role="presentation">
                                <a href="#sizes" aria-controls="sizes" role="tab" data-toggle="tab">Sizes</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active product-details" id="description">
                                <div class="product-long-description">
                                    <p><?php echo $product_description; ?></p>
                                </div>
                                <div class="product-details-brochure">
                                    <?php
                                    if (have_rows('brochures')):
                                        while (have_rows('brochures')):the_row();
                                            $product_brochure = get_sub_field('brochure_file');
                                            ?>
                                            <p><i class="fa fa-file-pdf-o"></i>
                                                <a href="<?php echo $product_brochure['url']; ?>" target="child"><?php echo $product_brochure['filename']; ?></a></p>

                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                                <div class="share-links">
                                    <p><span style="padding-right: 30px;">Share</span> 
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>"><i class="fa fa-facebook-square"></i></a> 
                                        <a href="https://twitter.com/home?status=<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>"><i class="fa fa-twitter-square"></i> </a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>&title=<?php echo the_title();?>&summary=&source="><i class="fa fa-linkedin-square"></i></a> 
                                        <i class="fa fa-pinterest-square"></i> 
                                        <i class="fa fa-instagram"></i> 
                                        <i class="fa fa-envelope-square"></i></p>
                                </div>
                                <a href="<?php echo home_url().'/contact';?>"><div class="product-enquire">
                                    ENQUIRE ABOUT THIS PRODUCT
                                    </div></a>
                            </div>
                            <div role="tabpanel" class="tab-pane fade product-size" id="sizes">   
                                <tr>
                                    <td><?php echo $product_sizes; ?></td>
                                </tr>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 product-details-right-wrap">
                    <div class="product-details-right">
                        <img src="<?php echo $product_image['url']; ?>"/>
                    </div>
                </div>


                <?php
            }
        }
        ?>
    </div>
</div>






<?php get_footer(); ?>

