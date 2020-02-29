<?php
get_header();
?>
	<main id="Aktualnosci">
			<div id="Tresc">
				
				<?php
				if ( have_posts() ) :
				
					while ( have_posts() ) : the_post();
					echo '<h1 class="Zap">'.get_the_category()[0]->name.'</h1>';?>

					<div class="Artykul Main">
						<h2><?php the_title(); ?></h2>
					<?php	the_post_thumbnail( 'thumbnail' );the_content(); edit_post_link('Edytuj wpis','<p style="margin-top:10px;">','</p>');  ?>
					<span class="Info"><small><?php echo get_the_date();echo ', <time>'.get_the_time().'</time>';echo "<br />";echo get_the_author(); ?></small></span>
					</div>
					<?php
						endwhile;
endif;
Cofnij(); ?>


				</div>
				</main>
<?php
get_footer();
?>