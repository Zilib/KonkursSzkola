<?php
/*
Template Name: Galeria-Album
*/
get_header();
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$wp_query = new WP_QUERY(array(
			'post_type' => 'page',
			'post_parent'=> $post->ID,
			'posts_per_page' => 6,
			'paged' =>$paged,
			'date_query'=> array(
				array(
					'after' => '2017-9-4' ,
					'before' => '2018-9-3'
				)
			)
));
			WyszukiwarkaGaleria($wp_query,"","Nie znaleziono żadnej Galerii");
get_footer();
?>
