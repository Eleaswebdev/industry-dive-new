<?php
/**
 * industry-drive functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package industry-drive
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function industry_drive_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on industry-drive, use a find and replace
		* to change 'industry-drive' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'industry-drive', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'industry-drive' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'industry_drive_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'industry_drive_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function industry_drive_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'industry_drive_content_width', 640 );
}
add_action( 'after_setup_theme', 'industry_drive_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function industry_drive_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Newsletter Sidebar', 'industry-drive' ),
			'id'            => 'newsletter',
			'description'   => esc_html__( 'Add widgets here.', 'industry-drive' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Menu Sidebar', 'industry-drive' ),
			'id'            => 'footer_menu',
			'description'   => esc_html__( 'Add widgets here.', 'industry-drive' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Copyright Widget', 'industry-drive' ),
			'id'            => 'copyright_widget',
			'description'   => esc_html__( 'Add widgets here.', 'industry-drive' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'industry_drive_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function industry_drive_scripts() {

	wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/assets/js/vendor/jquery-3.5.1.js','','','true' );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/plugin/slick.min.js','','','true' );
	wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/assets/js/plugin/jquery-ui/jquery-ui.js','','','true' );
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.2', 'all');

	wp_enqueue_style( 'industry-drive-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'industry-drive-style', 'rtl', 'replace' );

	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.1', 'all');
	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '1.1', 'all');
	wp_enqueue_style( 'font','https://fonts.googleapis.com/css2?family=Khand:wght@300;400;500;600;700&display=swap');
	wp_enqueue_style( 'font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

	wp_enqueue_script('jquery');
	wp_register_script( 'loadmore_script', get_stylesheet_directory_uri() . '/assets/js/functions.js', '','','true'  );
	wp_localize_script( 'loadmore_script', 'loadmore_params', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
	) );
	

 	wp_enqueue_script( 'loadmore_script' );
}
add_action( 'wp_enqueue_scripts', 'industry_drive_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * estimated reading time
 */

function reading_time() {
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);
	
	if ($readingtime == 1) {
	$timer = " minute";
	} else {
	$timer = " minutes";
	}
	$totalreadingtime = $readingtime . $timer;
	
	return $totalreadingtime;
}

/**
 * load more functionality
 */

function id_loadmore_ajax_handler(){
	$type = $_POST['type'];
	$category = isset($_POST['category']) ? $_POST['category']: '';
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';
	$args['posts_per_page'] =  $_POST['limit'];
	if($type == 'archive'){
		$args['category_name'] = $category;
	}
	query_posts( $args );

	?>	

   
	<?php
	$count = 7;  
	if( have_posts() ) :
		while(have_posts()): the_post();
	?>
	<div class="item_<?php echo $count;?> id_featured_body">
	<?php
			
				
	$featured_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );  ?>
	<img src="<?php echo $featured_url; ?>">
	<div class="id_featured_content">
		<?php
		$cat = get_the_category( $post->ID );
		$posttags = get_the_tags();
		foreach($cat as $cd){
			foreach($posttags as $tag) {
			echo "<h3 class='cat_name_$count'>LATEST ARTICLE | $tag->name</h3>";
			}
		}
		?>
		<h1 class="title_<?php echo $count; ?>"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></h1>
		<p class="subtitle_<?php echo $count; ?>"><span><a href=""><?php echo reading_time(); ?> read |</a></span><span><a href="<?php echo the_permalink(); ?>"> Read more</a></span></p>
	</div>
	<?php $count++; ?>
	</div>
    <?php endwhile; endif; ?>		
   <?php 
	die;
}
add_action('wp_ajax_loadmore','id_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore','id_loadmore_ajax_handler');