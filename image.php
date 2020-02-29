<?php
get_header();
?>
	<main id="Aktualnosci">
			<div id="Tresc">
				<h1 class="Zap">Aktualnosci</h1>
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
					?>
					<div class="Artykul Main">
						<h2><?php the_title(); ?></h2>
					<?php	the_post_thumbnail( 'thumbnail' );the_content(); ?>
					<span class="Info"><small><?php echo get_the_date();echo ', <time>'.get_the_time().'</time>';echo "<br />";echo get_the_author(); ?></small></span>
					</div>
					<?php
						endwhile;
endif;
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])):
    $previous = $_SERVER['HTTP_REFERER'];
    ?>
    <div class="previous">
   <style type="text/css">
   span a:hover
   {
      text-decoration: none;
   }
   </style>
   <span><?php echo '<a style="color:rgba(0,0,0,0.5);font-size:1.4rem;" href="'.$previous.'">Wróć do poprzedniej strony</a>'?></span>
</div>
<?php endif;?>


				</div>
				</main>
<?php
get_footer();
?>