<?php
function theme_styles() {
	// Swiper 7.0.3
	wp_enqueue_style( 'swiper_css', get_template_directory_uri() . '/modules/swiper/swiper-bundle.min.css' );

	// Font
	wp_enqueue_style( 'inclusive_sans_font', 'https://fonts.googleapis.com/css2?family=Inclusive+Sans&display=swap' );
	wp_enqueue_style( 'roboto_font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap');
	
	// Main CSS
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {
	global $wp_scripts;
	// Swiper 7.0.3
	wp_enqueue_script( 'swiper_js', get_template_directory_uri() . '/modules/swiper/swiper-bundle.min.js');
	wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js');
}
add_action( 'wp_enqueue_scripts', 'theme_js');

function wp_theme_support() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'wp_theme_support' );

// Initialise les menus
register_nav_menus( array(
	'main_menu' => __('Navigation principale', 'text_domain'), 
	));
register_nav_menus( array(
	'footer_menu_1' => __('Navigation pied de page - Colonne 1', 'text_domain'), 
	));
register_nav_menus( array(
	'footer_menu_2' => __('Navigation pied de page - Colonne 2', 'text_domain'), 
	));

// Menu Walker
// class Menu_Walker extends Walker {
// 	public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
// 	public $db_fields = array(
// 		'parent' => 'menu_item_parent',
// 		'id'     => 'db_id',
// 	);
// 	public $max_pages = 1;
// 	public $has_children;

// 	public function start_lvl( &$output, $depth = 0, $args = array() ) {
// 		$output .= "<ul class='sub-menu'>";
//     }
// 	public function end_lvl( &$output, $depth = 0, $args = array() ) {
// 		$output .= "</ul>";
//     }

//     public function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
// 		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
// 		if ($item->url && $item->url != '#') {
// 			$output .= '<a href="' . $item->url . '">';
// 		} else {
// 			$output .= '<span>';
// 		}
// 		$output .= $item->title;
// 		if ($item->url && $item->url != '#') {
// 			$output .= '</a>';
// 		} else {
// 			$output .= '</span>';
// 		}
//     }
//     public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		
//     }
// }

add_image_size( 'vignette', 360, 210, true );

// Affiche les images mises en avant
function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );

// Autoriser les fichiers SVG
function wpc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

// Ajouter feuille de style pour l'admin
function admin_css() {
    $admin_handle = 'admin_css';
    $admin_stylesheet = get_template_directory_uri() . '/css/admin.css';
    wp_enqueue_style($admin_handle, $admin_stylesheet);
}
add_action('admin_print_styles', 'admin_css', 11);

// Ajouter les options ACF
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' => 'Paramètres généraux',
		'menu_title' => 'Paramètres',
		'menu_slug' => 'general-settings',
		'redirect' => false,
	));
	acf_add_options_sub_page(array(
		'page_title' => 'Haut de page',
		'menu_title' => 'Haut de page',
		'parent_slug' => 'general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' => 'Pied de page',
		'menu_title' => 'Pied de page',
		'parent_slug' => 'general-settings',
	));
}

//Ajouter des blocs gutemberg
if (function_exists('acf_register_block_type')) {
   add_action('acf/init', 'register_acf_block_types');
}
function register_acf_block_types(){
	acf_register_block_type(array(
		'name' => 'exemple',
		'title' => __('Exemple'),
		'description' => __('Exemple'),
		'render_template' => 'blocs/bloc-exemple.php',
		'icon' => "customizer",
		'keywords' => array('exemple'),
	));
}

// Ajouter des styles de blocs
if ( function_exists( 'register_block_style' ) ) {
	register_block_style('core/paragraph', 
		array(
			'name' => 'exemple',
			'label' => __('exemple', 'txtdomain'),
			'description' => 'Lorem ipsum sit dolor amet',
		)
	);
};

// Définir un palette de couleurs
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Couleur 1', 'themeLangDomain' ),
		'slug'  => 'color-1',
		'color' => '#030305',
	),
	array(
		'name'  => __( 'Couleur 2', 'themeLangDomain' ),
		'slug'  => 'color-2',
		'color' => '#FFFFFF',
	),
));

// Définir des tailles de police
add_theme_support( 'editor-font-sizes', array(
    array(
        'name' => __( 'Small', 'themeLangDomain' ),
        'size' => 14,
        'slug' => 'small',
    ),
	array(
        'name' => __( 'Regular', 'themeLangDomain' ),
        'size' => 16,
        'slug' => 'regular',
    ),
	array(
        'name' => __( 'Lead', 'themeLangDomain' ),
        'size' => 18,
        'slug' => 'lead',
    ),
	array(
        'name' => __( 'Medium', 'themeLangDomain' ),
        'size' => 24,
        'slug' => 'medium',
    ),
	array(
        'name' => __( 'Big', 'themeLangDomain' ),
        'size' => 36,
        'slug' => 'big',
    ),
));

// Désactiver la customisation des couleurs et des polices
add_theme_support( 'disable-custom-font-sizes' );
add_theme_support( 'disable-custom-colors' );