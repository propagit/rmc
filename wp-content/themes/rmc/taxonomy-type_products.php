<?php
get_header();
?>


<div class="container-fluid products-category-wrap">
    <div class="container products-category-content">
        <h1><?php echo get_queried_object()->name; ?></h1>
        <h3><?php echo get_queried_object()->description; ?></h3>
        <p>Filter Products</p>
        <div class="search-product">
            <div class="search-left col-sm-6">
                <select  onchange="selectedProduct(this.value)">
                    <?php
                    $args = array(
                        'child_of' => get_queried_object()->term_id,
                        'taxonomy' => get_queried_object()->taxonomy,
                        'hide_empty' => 0,
                        'hierarchical' => true,
                        'depth' => 1,
                        'title_li' => '',
                        'style' => none
                    );
                    $sub_categories = get_categories($args);
                    if ($sub_categories) {
                        foreach ($sub_categories as $sub_category) {
                            ?>
                            <option value="<?php echo $sub_category->term_id; ?>"><?php echo $sub_category->name; ?></option>          
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="search-right col-sm-6">
                <input type="text" id="search-product" name="search-product" placeholder="enter product name..."/>
            </div>
        </div>
        <div id="selectedProduct">
        </div>
        
    </div>
</div>

<script>

function selectedProduct(selectedValue)
 {
      if (window.XMLHttpRequest){ xmlhttpp=new XMLHttpRequest(); }else{ xmlhttpp=new ActiveXObject("Microsoft.XMLHTTP"); }
    //make the ajax call
    $.ajax({
        url: '<?php echo bloginfo("template_directory").'/selected-product.php';  ?>',
        type: 'POST',
        data: {option : selectedValue},
        success: function() {
            console.log("Data sent!");
        }
    });
    document.getElementById("selectedProduct").innerHTML = xmlhttpp.responseText;
}
</script>






<?php get_footer(); ?>