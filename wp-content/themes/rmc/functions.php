<?php
register_nav_menus ();

/* Creating Option Section */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/* Products Post Type */

add_action( 'init', 'codex_products_init' );
/**
 * Register a Products post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_products_init() {
	$labels = array(
		'name'               => _x( 'Products', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Product', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Product', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'product', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Product', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Product', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Product', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Product', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Products', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Products', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Products:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No products found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No product found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'products' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail')
	);

	register_post_type( 'products', $args );
}

/* end products */

add_action( 'init', 'create_products_taxonomies', 0 );

// create taxonomie, products_or_brochures Types for the post type "products_or_brochures"
function create_products_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Type Products', 'taxonomy general name' ),
		'singular_name'     => _x( 'Type Product', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Type Products' ),
		'all_items'         => __( 'All Type Products' ),
		'parent_item'       => __( 'Parent Type Product' ),
		'parent_item_colon' => __( 'Parent Type Product:' ),
		'edit_item'         => __( 'Edit Type Products' ),
		'update_item'       => __( 'Update Type Products' ),
		'add_new_item'      => __( 'Add New Type Product' ),
		'new_item_name'     => __( 'New Type Product Name' ),
		'menu_name'         => __( 'Type Products' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => true
	);

	register_taxonomy( 'type_products', array( 'products' ), $args );
}

/* end taxonomi Type Products Or Brochures from Products Or Brochures */

function select_product(){
    echo $_POST['option'];
}

add_action( 'wp_ajax_the_ajax_hook_2', 'select_product' );
add_action( 'wp_ajax_nopriv_the_ajax_hook_2', 'select_product' );


/* Stores */

add_action( 'init', 'codex_stores_init' );
/**
 * Register a Products post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_stores_init() {
	$labels = array(
		'name'               => _x( 'Stores', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Store', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Store', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Store', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'store', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Store', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Store', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Store', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Store', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Stores', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Stores', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Stores:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No stores found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No stores found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'stores' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail')
	);

	register_post_type( 'stores', $args );
}

/* end stores */


# locations
add_action( 'wp_ajax_get_locations', 'get_locations' );
add_action( 'wp_ajax_nopriv_get_locations', 'get_locations' );

# stores
add_action( 'wp_ajax_get_stores', 'get_stores' );
add_action( 'wp_ajax_nopriv_get_stores', 'get_stores' );

# surrounding stores
add_action( 'wp_ajax_surrouding_stores', 'surrouding_stores' );
add_action( 'wp_ajax_nopriv_surrouding_stores', 'surrouding_stores' );

#products
add_action( 'wp_ajax_get_products', 'get_products' );
add_action( 'wp_ajax_nopriv_get_products', 'get_products' );

#send mail
add_action( 'wp_ajax_send_mail', 'send_mail' );
add_action( 'wp_ajax_nopriv_send_mail', 'send_mail' );


function get_locations(){
	# uname, pword, db name
	$mydb = new wpdb(postcode_uname,postcode_pword,postcode_db,'localhost');
	
	
	$keyword = $_POST['keyword'];
	
	$sql = "SELECT * FROM postcodes 
				WHERE
				(
					postcode LIKE '" . $keyword . "%' 
					OR 
					suburb LIKE '" . $keyword . "%'
				)";
	
	$rows = $mydb->get_results($sql);
	$out = '';
	if($rows){
		foreach($rows as $row){
			$out .= 
			'<li 
				data-postcode="' . $row->postcode . '" 
				data-suburb="' . ucwords(strtolower($row->suburb)) . '" 
				data-state="' . strtoupper($row->state) . '"
				data-lat="' . $row->lat . '"
				data-lon="' . $row->lon . '"
			>' 
				. $row->postcode . ' [ ' . $row->state . ' ] - ' . ucwords(strtolower($row->suburb)) . 
			'</li>';	
		}
	}
	echo $out;
	
	# do not remove the exit
	exit;
}

function get_stores()
{
	$postcode = $_POST['postcode'];
	$suburb = $_POST['suburb'];
	# uname, pword, db name
	$wp_db = new wpdb(DB_USER,DB_PASSWORD,DB_NAME,'localhost');
	$sql = "SELECT pm.post_id 
			FROM wp_postmeta pm
			WHERE 
				(pm.meta_key = 'suburb' AND pm.meta_value = '$suburb')
			OR
				(pm.meta_key = 'postcode' AND pm.meta_value = " . $postcode . ")
			GROUP BY pm.post_id";
	$rows = $wp_db->get_results($sql);
	$stores = '';	
	if($rows){
		foreach($rows as $row){
			$post_id = $row->post_id;
			$post = get_post($post_id);
			$stores .= '<div class="col-sm-4 location-part">
							<h2>' . get_post_meta( $post_id, 'suburb', true ) . '</br> ' . $post->post_title . '</h2>
							<p>' . get_post_meta( $post_id, 'address_1', true ) . ' ' . get_post_meta( $post_id, 'address_2', true ) . ',</br>
								' . get_post_meta( $post_id, 'suburb', true ) . ' ' . get_post_meta( $post_id, 'state', true ) . ' ' . get_post_meta( $post_id, 'postcode', true ) . '</br>
								Australia</p>
							<p class="location-mark"><i class="fa fa-map-marker"></i>
								<a class="fancybox-media" href="#"> View Map</a></p>
						</div>';
		}
	}
	echo $stores;
	exit;
}

function surrouding_stores(){
	$latitude = $_POST['lat'];
	$longitude = $_POST['lon'];
	$postcode = $_POST['postcode'];
	$suburb = $_POST['suburb'];
	
	$mydb = new wpdb(postcode_uname,postcode_pword,postcode_db,'localhost');
	
	# radius is in miles 5 KM
	$radius = 3.125;
	
	$formula = "
				(
					(69.1 * (lat - " . $latitude . ")) * 
					(69.1 * (lat - " . $latitude . "))
				) + ( 
					(69.1 * (lon - " . $longitude . ") * COS(" . $latitude . " / 57.3)) * 
					(69.1 * (lon - " . $longitude . ") * COS(" . $latitude . " / 57.3))
				)
				";
	
	$sql_pcodes = "SELECT postcode
					FROM
						postcodes
					WHERE
						$formula < " . pow($radius, 2) . " 
					GROUP BY 
						postcode
					ORDER BY 
						$formula ASC";
					
	
	$rows = $mydb->get_results($sql_pcodes);
	
	$postcodes = array();
	$i = 0;
	if($rows){
		foreach($rows as $row){
			$postcodes[$i++] = $row->postcode;	
		}
	}
	
	# uname, pword, db name
	$wp_db = new wpdb(DB_USER,DB_PASSWORD,DB_NAME,'localhost');
	
	# already found stores
	$sql = "SELECT pm.post_id 
			FROM wp_postmeta pm
			WHERE 
				(pm.meta_key = 'suburb' AND pm.meta_value = '$suburb')
			OR
				(pm.meta_key = 'postcode' AND pm.meta_value = " . $postcode . ")
			GROUP BY pm.post_id";
	$rows_stores = $wp_db->get_results($sql);
	$stores = array();
	$s = 0;
	if($rows_stores){
		foreach($rows_stores as $row){
			$stores[$s++] = $row->post_id;	
		}
	}
	
	
	# surrounding stores
	$sql = "SELECT pm.post_id 
			FROM wp_postmeta pm
			WHERE 
				pm.meta_key = 'postcode' 
			AND 
				pm.meta_value IN (" . implode(',',$postcodes) . ")
			AND pm.post_id NOT IN (" . implode(',',$stores) . ")
			GROUP BY pm.post_id";
	$surrounding_stores = $wp_db->get_results($sql);
	
	$surrounding = '';	
	if($surrounding_stores){
		foreach($surrounding_stores as $row){
			$post_id = $row->post_id;
			$post = get_post($post_id);
			$surrounding .= '<div class="col-sm-4 location-part">
							<h2>' . get_post_meta( $post_id, 'suburb', true ) . '</br> ' . $post->post_title . '</h2>
							<p>' . get_post_meta( $post_id, 'address_1', true ) . ' ' . get_post_meta( $post_id, 'address_2', true ) . ',</br>
								' . get_post_meta( $post_id, 'suburb', true ) . ' ' . get_post_meta( $post_id, 'state', true ) . ' ' . get_post_meta( $post_id, 'postcode', true ) . '</br>
								Australia</p>
							<p class="location-mark"><i class="fa fa-map-marker"></i>
								<a class="fancybox-media" href="#"> View Map</a></p>
						</div>';
		}
	}
	echo $surrounding;
	exit;
		
}

function get_products()
{

    $product_name = $_POST['product_name'];
    if(!$product_name){
        $product_name=' ';
    }
	# uname, pword, db name
	$wp_db = new wpdb(DB_USER,DB_PASSWORD,DB_NAME,'localhost');
	$sql = "SELECT pm.ID 
                            FROM wp_posts pm
			WHERE 
                            pm.post_title LIKE '" . $product_name . "%'
                            AND pm.post_type = 'products'
			GROUP BY pm.ID";
	$rows = $wp_db->get_results($sql);

	$products = '';	
	if($rows){
		foreach($rows as $row){
			$post_id = $row->ID;
			$post = get_post($post_id);
                        $image = get_post_meta( $post_id, 'product_image', true );
                        $image_post = get_post($image);
                        $image_name = $image_post->guid;
                        #$products = print_r($post);
			$products .= '<div class="col-sm-3 product-list">
                            <div class="product-list-image">
                            <a href="'. site_url() . '/'.$post->post_name.'"> '
                                . '<img src="'. $image_name .'" /> </a></div>
                                    <div class="product-list-content">
                                    <a href="'. site_url() . '/'.$post->post_name.'"><h3>'.$post->post_title.'</h3></a>
                                        <p>'.  get_post_meta($post_id, "short_description",true).'</p> </div> </div>';
		}
	}
	echo $products;
	exit;
}

function alpha_sort_terms($terms) {
  remove_filter('get_the_terms','alpha_sort_terms');
  foreach ( $terms as $term ) {
    $newterms[$term->term_id] = $term;
  }
  ksort($newterms);
  return $newterms;
}

add_filter('get_the_terms','alpha_sort_terms');

function send_mail(){
    $to = 'zack@propagate.com.au';
	#$to = 'kaushtuv@propagate.com.au';
	$subject = 'Question about RMC product from '.$_POST['name'];
	$headers = "From: " . strip_tags($_POST['email']) . "\r\n";
	#$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	
	$message = '<html><body>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
        $message .= "<tr><td><strong>Company:</strong> </td><td>" . strip_tags($_POST['company']) . "</td></tr>";
	$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
	$message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";
        $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";
        
        
	
	$message .= "</table>";
	$message .= "</body></html>";
	
	mail($to, $subject, $message, $headers);
	#wp_mail( $to, $subject, $message, $headers );
	
	$thank_you.= '<div class="contact-form" id="contact-form">'
                . '<h2>Thank You</h2>';
        echo $thank_you;
        exit;
}

function import_stores()
{
	/*die();
	exit;*/	
/* import stores */


		
		# 0 - Desc
		# 1 - Name
		# 2 - Address 1
		# 3 - Address 2
		# 4 - Suburb
		# 5 - State
		# 6 - Postcode
	
		
		
		# incase the csv all comes as one big array
		# - open document as UTF 8 in text editor and save that should fix that
		#$wpdb = new wpdb(wp_db_uname,wp_db_pword,wp_db,'localhost');
		$file = get_theme_root().'/rmc/csv/rmc_stores.csv';
		/*if (($handle = fopen($file, "r")) !== FALSE) {
   			 while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
				echo '<pre>'.print_r($data,true).'</pre><br>';	 
			 }
		}*/
		$post_ID_auto_increment = 365;
		$count = 0;
		#if(0){
		if (($handle = fopen($file, "r")) !== FALSE) {
   			 while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
        		
				#echo '<pre>'.print_r($data,true).'</pre><br>';	
				
				$store = array(								   
								   'post_author' => 1,
								   'post_date' => date('Y-m-d H:i:s'),
								   'post_date_gmt' => date('Y-m-d H:i:s'),
								   'post_content' => trim(ucwords(strtolower($data[0]))),
								   'post_title' => trim($data[1]),
								   'post_status' => 'publish',
								   'comment_status' => 'closed',
								   'ping_status' => 'closed',
								   'post_name' => str_replace('-',' ',strtolower($data[1])),
								   'post_modified' => date('Y-m-d H:i:s'),
								   'post_modified_gmt' => date('Y-m-d H:i:s'),
								   'post_type' => 'stores',
								   'guid' => site_url() . '/?post_type=stores&#038;p=' . ($count + $post_ID_auto_increment)
								);
				
				# add post
				$insert_id = wp_insert_post( $store );
				
				#if(0){
				if($insert_id){
					# add meta
					#$attributes = array('_edit_last','_edit_lock','address','_address','suburb','_suburb','state','_state','postcode','_postcode','address_1','_address_1','address_2','_address_2');
					add_post_meta( $insert_id, '_edit_last', 1 );
					add_post_meta( $insert_id, '_edit_lock', time() . ':' . 1 );
					add_post_meta( $insert_id, 'suburb', trim(ucwords(strtolower($data[4]))));
					add_post_meta( $insert_id, '_suburb','field_558cab98e013a'); # local field_558a44f7c014a
					add_post_meta( $insert_id, 'state', trim(ucwords(strtolower($data[5]))));
					add_post_meta( $insert_id, '_state','field_558cabaee013b' ); # local field_558a4507c014b
					add_post_meta( $insert_id, 'postcode', trim(ucwords(strtolower($data[6]))));
					add_post_meta( $insert_id, '_postcode','field_558cabe4e013c'); # local field_558a457ac014c
					add_post_meta( $insert_id, 'address_1',trim(ucwords(strtolower($data[2]))));
					add_post_meta( $insert_id, '_address_1', 'field_558cab74e0138' ); # local field_558a44dac0149
					add_post_meta( $insert_id, 'address_2', trim(ucwords(strtolower($data[3]))));
					add_post_meta( $insert_id, '_address_2','field_558cab90e0139'); # local field_558b9c3887f55
				
				} # if insert id

						
				
				
        		$count++;
    		}
   		 fclose($handle);
		}
		echo $count . ' - Records added';
		
		
}
