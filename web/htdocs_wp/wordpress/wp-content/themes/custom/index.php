<?php 

	get_header();

		if (have_posts()) : 
			while(have_posts()) : the_post() ?>
				<?php echo get_the_author_meta('user_level'); ?>
				<h3 class='post-name'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class='post-info'><?php the_time('F j, Y g:i a'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?> "><?php echo the_author(); ?></a> | Posted in
					<?php 
						$categories = get_the_category();
						$separator = ', ';
						$output = '';

						foreach ($categories as $category) {
							$output .= '<a href="'. get_category_link($category->term_id) .'">'. $category->cat_name .'</a>' . $separator;
						}

						echo trim($output, $separator);
					?>
				</p>
				<p><?php the_content(); ?> </p>

			<?php endwhile;
		endif;
	get_footer();

?>