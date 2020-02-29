<?php get_header();?>

	<main id="Aktualnosci">
				<h1 class="Zap">Aktualności</h1>
				<div id="Tresc">
				        <?php		
				if ( get_query_var( 'paged' ) ) { $AktualnaStrona = get_query_var( 'paged' ); }
				elseif ( get_query_var( 'page' ) ) { $AktualnaStrona = get_query_var( 'page' ); }
				else { $AktualnaStrona = 1; }	
				$wp_query = new WP_QUERY(array(
				'posts_per_page' => 3,
				'paged' => $AktualnaStrona));						
    if($wp_query->have_posts() ) :
        while ($wp_query->have_posts() ) : $wp_query->the_post();
		global $more;
		$more = 0;?>
		<div class="Artykul">
            <h2><?php echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';?></h2>
			<?php the_post_thumbnail( 'thumbnail' ); ?>

			<?php
			 $Tresc = get_the_content();
			
			 echo '<p>'.truncate($Tresc,300);
			if (strlen(get_the_content()) > 300){
				echo '<a href="'.esc_attr(get_the_permalink()).'"> Czytaj dalej</a>';
			}
		
			 ?>
			</p>
			<span class="Info"><small><?php echo get_the_date();echo ', <time>'.get_the_time().'</time>';echo "<br />";echo get_the_author(); ?></small></span>
			<?php 
			
			edit_post_link('Edytuj wpis','<p style="margin-top:10px;">','</p>'); ?>
		</div>
        <?php 
            endwhile;
			echo '<div id="Paginacja" class="text-center">';

			echo paginate_links();
			echo '</div>';
			wp_reset_postdata();
            else: ?>
    <p><?php esc_html_e( 'Nie ma postów.' ); ?></p>
<?php endif;?>
	</div>
	</main>
		<?php  
			if(is_front_page())
	{include (TEMPLATEPATH . '/Konkursy.php');
		 include (TEMPLATEPATH . '/Galeria.php'); 
		 } get_footer();?>