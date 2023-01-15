<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package industry-drive
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'industry-drive' ); ?></a>

	<header id="masthead" class="site-header id_header header">
		<div class="id_grid_container">
			<div class="id_row">
				<div class="column1">
				<form action="/industry-dive-new" method="get">
					
				<div class="search">  
				<input placeholder="Search" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
				
				<span class="fa fa-search"></span>

				</div>
				</form>
				</div>
				<div class="column2">
					<div class="logo">
						<a href="<?php echo get_home_url(); ?>">
						 <h2><?php echo get_bloginfo(); ?></h2>
						 <p><?php echo get_bloginfo( 'description'); ?></p>
						</a>
					</div>
				</div>
				<div class="column3">
					<a href="">Subscribe</a>
				</div>
			</div>

		
			<nav class="navbar">
				<input type="checkbox" id="nav" class="hidden">
				<label for="nav" class="nav-toggle">
					<span></span>
					<span></span>
					<span></span>
				</label>
				<div class="wrapper">
				<ul class="menu">
				<?php wp_nav_menu(
									array(
										'theme_location'  => 'menu-1',
										//'menu_class'      => 'nav-item',
										//'container_class' => 'primary-menu-container',
										//'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
										'fallback_cb'     => false,
									)
								);
						?>	
				
				</ul>
				</div>
			</nav>
			
			
		</div><!-- .id_grid_container -->

	</header><!-- #masthead -->




