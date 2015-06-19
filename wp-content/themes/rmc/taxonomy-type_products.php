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
        <div id="models">
            
        </div>
        
    </div>
</div>

<script>

function selectedProduct(selectedValue)
 {
      var search_val= selectedValue; 
     
        // IF A VALUE EXISTS
	     if(search_val) {
	     
            // RUN AN AJAX CALL
	     	jQuery.ajax({
	        	url: 'http://localhost/propagate/rmc/wp-json/posts?type[]=post&type[]=products&filter[posts_per_page]=99&filter[taxonomy]=type_products&filter[orderby]=name&filter[order]=asc', // URL USING JSON REST API
	        	type: 'GET',
	        	data: 'filter[term]=' + search_val, // PASS IN THE VALUE OF THE DROP DOWN AS A ID (CHECK AGAINST TERMS OF THE TAXONOMY 'MAKE')
	            dataType: 'JSON',
	            success:function(data) {
              		var sel = $("#models"); // SELECT THE SECOND DROP DOWN WITH THE ID MODELS
				    sel.empty(); // JUST MAKE SURE ITS EMPTY
				    for (var i=0; i<data.length; i++) { // LOOP THROUGH EACH POST FOUND BY THE AJAX CALL
				      sel.append('<option value="' + data[i].ID + '">' + data[i].acf["short_description"] + '</option>'); // SET POSTS INTO HTML OPTIONS AND APPEND TO MODELS DROP DOWN
				    }
	              	
		        },
		        error: function(errorThrown){
	            	alert('error');
	            	console.log(errorThrown);
	            }
	        });   
	    }
}
</script>






<?php get_footer(); ?>