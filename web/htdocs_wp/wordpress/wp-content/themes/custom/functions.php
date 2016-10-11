<?php 


	function init_head(){
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_script('jquery');
	}

	add_action('wp_enqueue_scripts', 'init_head');
	register_nav_menus(['primary' => __('Primary Menu'), 'footer' => __('Footer Menu')]);
	add_filter('show_admin_bar', '__return_false');

	function get_top_ancestor_id(){
		global $post;

		if ($post->post_parent) {
			return array_reverse(get_post_ancestors($post->ID))[0];
		}

		return $post->ID;
	}

	function has_children(){
		global $post;

		return count(get_pages('child_of='.$post->ID));
	}
?>