<?php
/* 
Template Name: One Page
*/
get_header();
global $post; 
?>
<main id="Strona">	
<div id="Contents" class="sticky-top">
		<h3 class="Zap"  style="border:none;margin:0;">Spis treści</h3>
		<?php echo do_shortcode('[lista]'); ?>
		<a href="#Strona" class="OneMenu" style="color:black;"><i style="font-size:4rem;display:block;text-align:center;margin-top:10px;" class="fa fa-arrow-up"></i></a>
	</div>
			<?php $Page = new wp_query(array(
			'post_type' => 'page',
			'paged' =>1,
			'orderby'   => 'menu_order',
			'order'     => 'ASC',
			'posts_per_page' => -1,
			'post_parent'=> $post->ID
				));
			if($Page->have_posts() ) :
				while($Page->have_posts() ) :
					$Page->the_post();
					echo '<div class="OnePage" id="A'.get_the_id().'">'; 
					//Nagłówek
					echo '<h2 class="Zap" style="margin:0;">'.get_the_title().'</h2>';
					echo '<div class="OneTresc">';
					echo '<span>';
					echo the_content();
					edit_post_link('Edytuj stronę','<p style="margin-top:10px;text-align:center;">','</p>'); 
					echo '</span>';
					echo '</div>';
					echo '</div>';
				endwhile;
			endif;
				?>
</main>
<?php
get_footer();
?>