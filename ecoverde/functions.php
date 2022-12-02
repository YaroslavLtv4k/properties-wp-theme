<?php

// CSS and JS Support
function add_theme_scripts() {
	wp_enqueue_style( 'ecoverde_style', get_stylesheet_uri() );

	wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'carousel', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'themeDefault', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css' );
	wp_enqueue_style( 'magnificPopup', get_stylesheet_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_style( 'flaticon', get_stylesheet_directory_uri() . '/css/flaticon.css' );
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/style.css' );
	// My code (not all)
	wp_enqueue_style( 'add-styles', get_stylesheet_directory_uri() . '/css/add.css' );


	// JS
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', '', '', true);
	wp_enqueue_script( 'jqueryMigrate', get_template_directory_uri() . '/js/jquery-migrate-3.0.1.min.js', '', '', true);
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', '', '', true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', '', '', true);
	wp_enqueue_script( 'jqueryEasing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', '', '', true);
	wp_enqueue_script( 'jqueryWaypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', '', '', true);
	wp_enqueue_script( 'jqueryStellar', get_template_directory_uri() . '/js/jquery.stellar.min.js', '', '', true);
	wp_enqueue_script( 'owlCarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', '', '', true);
	wp_enqueue_script( 'jqMagnificPopup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', '', '', true);
	wp_enqueue_script( 'animateNumber', get_template_directory_uri() . '/js/jquery.animateNumber.min.js', '', '', true);
	wp_enqueue_script( 'scrollax', get_template_directory_uri() . '/js/scrollax.min.js', '', '', true);
	wp_enqueue_script( 'mainJs', get_template_directory_uri() . '/js/main.js', '', '', true);
	wp_enqueue_script( 'owlCarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', '', '', true);
	
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

//Theme Options
add_theme_support('menus');

//Menus
register_nav_menus(

	array(
		'top-menu' => 'Top Menu Location',
	)

);

// Add classes to <a> on menu
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

// Add classes to <li> on menu
function add_menu_list_item_class($classes, $item, $args) {
  if (property_exists($args, 'list_item_class')) {
      $classes[] = $args->list_item_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);


// Wigets
register_sidebar(array(

	'name'           => 'footer widget area',
	'id'             => 'footer_sidebar',
	'class'          => '',
	'before_widget'  => '<div class="col-md">
            <div class="ftco-footer-widget mb-4">',
    'after_widget'   => '</div></div>',
    'before_title'   => '<h2 class="ftco-heading-2">',
    'after_title'    => '</h2>',
));







// Breadcrumbs
function ecoverde_the_breadcrumb(){
	global $post;
	if(!is_home()){ 
	   echo '<span class="mr-2"><a href="'.site_url().'">Home <i class="fa fa-chevron-right"></i></a></span> ';
	   if (get_post_type() === 'property') { //is Property
			echo '<span class="mr-2">';
			echo '<a href="'.site_url().'/properties">Properties <i class="fa fa-chevron-right"></i></a></span>';
			echo '</span>';
		}
		if(is_single()){ // posts
		the_category(', ');
		echo '<span class="mr-2">';
			the_title();
		echo '</span>';
		}

		elseif (is_page('front-page')) {
			echo '<style> .breadcrumbs{display:none} </style>';
		}
		elseif (is_page()) { // pages
			if ($post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<span class="mr-2"><a href="' . get_permaspannk($page->ID) . '">' . get_the_title($page->ID) . '</a></span>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo $crumb . ' ';
			}
			echo the_title();
		}
		elseif (is_category()) { // category
			global $wp_query;
			$obj_cat = $wp_query->get_queried_object();
			$current_cat = $obj_cat->term_id;
			$current_cat = get_category($current_cat);
			$parent_cat = get_category($current_cat->parent);
			if ($current_cat->parent != 0) 
				echo(get_category_parents($parent_cat, TRUE, '  '));
			single_cat_title();
		} elseif (is_404()) { // if page not found
			echo '<span class="mr-2">Error 404</span>';
		}
	 
		if (get_query_var('paged')) // number of page
			echo ' (' . get_query_var('paged').'- page)';
	 
	} else { // home
	   $pageNum=(get_query_var('paged')) ? get_query_var('paged') : 1;
	   if($pageNum>1)
	      echo '<span class="mr-2"><a href="'.site_url().'"><i class="fa fa-home" aria-hidden="true"></i>Home</a></span>  '.$pageNum.'- page</span>';
	   else
	      echo '<span class="mr-2"><i class="fa fa-home" aria-hidden="true"></i>Home</span>';
	}
}




