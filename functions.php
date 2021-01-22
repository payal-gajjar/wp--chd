<?php 


/* Scripts & Styles */
add_action('wp_enqueue_scripts', 'bootstrap_scripts_enqueue');
function bootstrap_scripts_enqueue()
{
	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'new_style', get_stylesheet_directory_uri().'/style.css' );
    wp_enqueue_style('fontawesome-css', get_stylesheet_directory_uri().'/css/font-awesome.min.css', false, NULL, 'all');
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css');
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js', array());
    wp_enqueue_style('fonts','https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');  
    wp_enqueue_style( 'slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_script( 'slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
   wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), true  );
}

add_action( 'wp_enqueue_scripts', 'prac_assets' );
function prac_assets() {
  wp_localize_script('custom-js', 'object', array('ajax_url' => admin_url('admin-ajax.php')));
   
}

/* portfolio function */
add_action( 'wp_ajax_get_list_data', 'get_list_data' );
add_action( 'wp_ajax_nopriv_get_list_data', 'get_list_data' );
function get_list_data() {
     $offset = absint($_POST['offset']);
    $args = array(
        'post_type' => 'portfolios',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC',
        'offset'=> $offset
    );
    
    $the_query = new WP_Query( $args );
    ob_start ();
    if ($the_query->have_posts()){
        ?>
        <div class="row">
        <?php while ($the_query->have_posts() ) : $the_query->the_post(); 
        ?>
             <div class="col-xl-3 col-lg-3 col-md-12">
             <div class="port-box">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                <div class="p-content">
                <div class="title"><?php echo the_title();?></div>
                <div class="sub-title"><?php echo the_content();?></div>
             </div>
             </div>
             
          </div>
        <?php endwhile;?>
        </div>
    <?php   
    }
    else{ 
        echo "<div class='notfound'>Sorry, we couldn't portfolio.</div>";
    }
    wp_reset_postdata();
    $response = ob_get_contents();
    ob_end_clean();
     $args['offset'] = $offset + 4;
    $portfolio = new WP_Query($args);
    $count = $portfolio->post_count;
    echo json_encode(array('html'=>$response,'count'=>$count)); 
    exit;
}



/* Register portfolio CPT */
add_action( 'init', 'practical_register_portfolio' );
function practical_register_portfolio() {
    $labels = array(
        'name'               => _x( 'Portfolio', 'post type general name' ),
        'singular_name'      => _x( 'Portfolio', 'post type singular name' ),
        'menu_name'          => _x( 'Portfolio', 'admin menu' ),
        'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Portfolio' ),
        'add_new_item'       => __( 'Add New Portfolio' ),
        'new_item'           => __( 'New Portfolio' ),
        'edit_item'          => __( 'Edit Portfolio' ),
        'view_item'          => __( 'View Portfolio' ),
        'all_items'          => __( 'All Portfolio' ),
        'search_items'       => __( 'Search Portfolio' ),
        'parent_item_colon'  => __( 'Parent Portfolio:' ),
        'not_found'          => __( 'No History found.' ),
        'not_found_in_trash' => __( 'No History found in Trash.' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolios' ),
        'menu_icon'          => 'dashicons-portfolio',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor','excerpt', 'thumbnail' )
    );
    register_post_type( 'portfolios', $args );
}

/* Register client logo CPT */
add_action( 'init', 'practical_register_logo' );
function practical_register_logo() {
    $labels = array(
        'name'               => _x( 'Logo', 'post type general name' ),
        'singular_name'      => _x( 'Logo', 'post type singular name' ),
        'menu_name'          => _x( 'Logo', 'admin menu' ),
        'name_admin_bar'     => _x( 'Logo', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Logo' ),
        'add_new_item'       => __( 'Add New Logo' ),
        'new_item'           => __( 'New Logo' ),
        'edit_item'          => __( 'Edit Logo' ),
        'view_item'          => __( 'View Logo' ),
        'all_items'          => __( 'All Logo' ),
        'search_items'       => __( 'Search Logo' ),
        'parent_item_colon'  => __( 'Parent Logo:' ),
        'not_found'          => __( 'No History found.' ),
        'not_found_in_trash' => __( 'No History found in Trash.' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'logos' ),
        'menu_icon'          => 'dashicons-buddicons-buddypress-logo',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor','excerpt', 'thumbnail' )
    );
    register_post_type( 'logos', $args );
}


