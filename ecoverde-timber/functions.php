<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['foo']   = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		// $context['menu']  = new Timber\Menu();
		$context['menu'] = new \Timber\Menu( 'top-menu' );
		$context['site']  = $this;
		return $context;
	}

	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}

new StarterSite();

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
