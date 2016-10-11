<?php 

	get_header();

		if(have_posts()) :
			while(have_posts()) : the_post()?>

				<div style='float: left; width: 10%;'>
					<h1> <?php the_title(); ?> </h1>
				</div>
				<div style='float: right; width: 70%;'>
					<?php the_content(); ?>
				</div>
			<?php endwhile;
		endif;

	get_footer();

?>