<?php
/**
 * Template Name: Resources
 */
get_header();
?>
<div class="container-fluid resources-wrap">
    <div class="container resources-content">
        <h1>RMC Resources</h1>
        <h3>To find information on all RMC products use the data table below to search, sort and download</h3>
        <div class="resources-top-part col-xs-12">
            <div class="col-sm-9 resources-left-wrap">
                <div class="col-xs-12 resources-content-left-header">
                    <h3>Download The Official Product Brochures</h3>
                </div>
                <div class="product-brochures col-xs-12">
                    <?php if (have_rows("head_brochures")): ?>
                        <ul>
                            <?php
                            while (have_rows("head_brochures")):the_row();
                                $brochure_name = get_sub_field("brochure_name");
                                $brochure_image = get_sub_field("brochure_image");
                                $brochure_file = get_sub_field("brochure_file");
                                ?>
                                <li>
                                    <a href="<?php
                                    if ($brochure_file):echo $brochure_file;
                                    else: echo '#';
                                    endif;
                                    ?>"><img src="<?php echo $brochure_image['url']; ?>"/></a>
                                    <p><?php echo $brochure_name; ?></p>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3 resources-right-wrap">
                <div class="col-xs-12 resources-content-right-header">
                    <h3>Watch our latest Product Video</h3>
                </div>
                <div class="resources-video">
                    <?php echo the_field("the_video"); ?>
                    <p><?php echo the_field("video_text"); ?></p>
                </div>

            </div>
        </div>
        <div class="resources-table col-xs-12 table-responsive">
            <table class="table">
                <thead>
                    <tr id="table-search-header">
                        <th>
                            <?php echo get_search_form(); ?>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Resource Title</th>
                        <th>Category</th>
                        <th>Size</th>
                        <th>Type</th>
                        <th class="download">Download</th>
                    </tr>
                </thead>
                <?php
                $args = array(
                    'post_type' => 'products',
                    'post_per_page' => -1
                );
                $the_querry = new WP_Query($args);
                if ($the_querry->have_posts()) {
                    while ($the_querry->have_posts()) {
                        $the_querry->the_post();
                        $name = get_the_title();
                        if (get_field("brochure")) {
                            $brochure = get_field("brochure");
                            $type_file = "<i class=\"fa fa-file-pdf-o\"></i> PDF";
                        }
                        if (get_field("video")) {
                            $video = get_field("video");
                            $type_file = "<i class=\"fa fa-file-video-o\"></i> VIDEO";
                        }
                        $category_terms = get_the_terms(0, 'type_products');
                        if ($category_terms) {
                            foreach ($category_terms as $category_term) {
                                $category = $category_term->name;
                            }
                        }
                        ?>
                        <tr>
                            <td>
                                <p><?php echo $name; ?></p>
                            </td>
                            <td>
                                <p><?php echo $category; ?></p>
                            </td>
                            <td>
                                <?php echo size_format(filesize(get_attached_file($brochure['ID']))); ?>
                            </td>
                            <td>
        <?php echo $type_file; ?>
                            </td>
                            <td class="download">
                                <a href="<?php if ($brochure) {
            echo $brochure['url'];
        } elseif ($video) {
            echo $video['url'];
        } ?>" download><i class="fa fa-download"></i></a>
                            </td>
                        </tr>
    <?php
    }
}
wp_reset_postdata();
?>
            </table>
        </div>
    </div>
</div>






<?php
get_footer();
?>
