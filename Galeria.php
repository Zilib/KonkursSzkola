<?php
		$Galeria = new WP_QUERY(array(
			'posts_per_page' => 3,
			'post_type' => 'page',
			'paged' =>1,
			'post_parent'=> 1822

));
		if($Galeria->have_posts()) :?>
			<aside id="NowaGaleria">
		<div id="NaglowekGaleria">
			<h4 class="Przedstawienie">Najnowsze albumy w galerii</h4>
		</div>
		<?php
			while($Galeria->have_posts() ) : $Galeria->the_post();
			$Zdj = get_field('zdj_album');
			$Tytul = get_field('tytulalbumu');
			$Alt = get_field('tekst_alternatywny');?>
			<article class="Album">
				<?php echo '<a href="'.get_permalink().'"><img src="'.$Zdj.'" alt="'.$Alt.'" /></a>'; ?>
				<h2><?php echo '<a href="'.get_permalink().'">'.$Tytul.'</a>';?></h2>
			</article>
			<?php endwhile;wp_reset_query();endif;?>
	</aside>