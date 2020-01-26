<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}

	function register_post_types() {
		// Portfolio
		$labels = array(
			'name'          => _x( 'Portfolio', 'post type general name' ),
			'singular_name' => _x( 'Portfolio', 'post type singular name' ),
			'add_new' 		=> _x( 'Add New', 'Item' ),
			'add_new_item'  => __( 'Add New Portfolio Item' ),
			'edit_item'     => __( 'Edit Portfolio Item' ),
			'new_item'      => __( 'New Portfolio Item' ),
			'all_items'     => __( 'All Portfolio Items' ),
			'view_item'     => __( 'View Portfolio Item' ),
			'search_items'  => __( 'Search Portfolio Items' ),
			'not_found'     => __( 'No Portfolio Items found' ),
			'not_found_in_trash' => __( 'No Portfolio Items found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Portfolio'
		);
		$args = array(
			'labels'        => $labels,
			'description'   => 'Individual Portfolio Item Data',
			'public'        => true,
			'menu_icon'     => 'dashicons-book',
			'menu_position' => 3,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
			'has_archive'   => false,
			'rewrite'       => array( 'with_front' => false ),
		);
		register_post_type( 'portfolio', $args );	
	}

	function register_taxonomies() {
    // Custom Portfolio Categories
    register_taxonomy(
        'portfolio-category',
        'portfolio',
        array(
            'public' => false,
            'hierarchical' => true,
            'labels' => array(
                'name' => 'Portfolio Categories',
                'singular_name' => 'Portfolio Category',
                'add_new_item' => 'Create Portfolio Category',
            ),
            'show_ui' => true,
            'show_admin_column' => true,
        )
    );
	}

	function add_to_context( $context ) {
		//$context['foo'] = 'bar';
		//$context['stuff'] = 'I am a value set in your functions.php file';
		//$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu'] = new \Timber\Menu( 'Main Menu' );
		$context['site'] = $this;
		return $context;
	}

	function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

}

new StarterSite();
