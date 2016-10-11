<?php 

	get_header();

		if(have_posts()) :
			while(have_posts()) : the_post()?>

				<h1> <?php the_title(); ?> </h1>
				
				<?php 
					
					if (has_children() OR $post->post_parent > 0) { ?>
						<span class='parent-link'><a href=" <?php echo get_the_permalink(get_top_ancestor_id()); ?> "> <?php echo get_the_title(get_top_ancestor_id()); ?> </a></span>
						<nav class="child-link-navs">
							<ul>
								<?php wp_list_pages(['child_of' => get_top_ancestor_id(), 'title_li' => '']); ?>
							</ul>
						</nav>
				<?php }
				?>

				<?php the_content(); ?>
			<?php endwhile;
		endif;

	get_footer();

?>