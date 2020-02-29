<?php 
$Konkursy = new WP_QUERY(array(
			'posts_per_page' => 2,
			'paged' => 1,
			'cat' => array(3,4)

)); 	
	if($Konkursy->have_posts()) :
		$i=0;?>
		<aside id="Konkursy">
		<div id="NaglowekKonkursy">
			<h1 class="Przedstawienie">Wydarzenia / Konkursy w szkole</h1>
		</div>
		<div id="KontentKonkursy">
			<?php
		while($Konkursy->have_posts() ) : $Konkursy->the_post();
		
			$ID_POST = get_the_ID();
			$Zdjecie = get_field('zdjecie',$ID_POST);
			$DataF = "D d/m/Y";
			$Stamp = strtotime(get_field('data'));
			if($i == 0)
			{	?>
					<article class="Wydarzenie">
						<h1><?php echo get_field("tytul",$ID_POST); ?></h1>
						
						<?php if($Zdjecie  != '')
						echo '<img src="'.$Zdjecie.'" alt="Konkurs/Wydarzenie" />';
?>				
						<ul>
							<?php
							if(get_field('data',$ID_POST) != '' && get_field('tekst_przed_data') != '')
								echo '<li><span class="pkt"><b>'.get_field('tekst_przed_data').' </b>'.date_i18n($DataF,$Stamp).'</span></li>';
						////////////////////////////////////////////////////////////////
							 if(get_field('info1',$ID_POST) != '')
							echo '<li><span class="pkt">'.get_field('info1',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
							 if(get_field('info2',$ID_POST) != '')
							echo '<li><span class="pkt">'.get_field('info2',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
							 if(get_field('info3',$ID_POST) != '')
							echo '<li><span class="pkt">'.get_field('info3',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
							 if(get_field('info4',$ID_POST) != '')
							echo '<li><span class="pkt">'.get_field('info4',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
							 if(get_field('info5',$ID_POST) != '')
							echo '<li><span class="pkt">'.get_field('info5',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
						  if(get_field('regulamin',$ID_POST) != '' && get_field('show',$ID_POST) == true)
							echo '<li><span class="pkt"><a href="'.get_field('regulamin',$ID_POST).'">Regulamin</a></li>';
							 ?>
						</ul>
					
					</article>
				<?php
			}
			elseif($i == 1)
			{
				if(get_field('tytul') != ''){
					?>
									<article class="Wydarzenie Dwa">
						<h1><?php echo get_field("tytul",$ID_POST); ?></h1>
						
						<?php
						if($Zdjecie != '')
						echo '<img src="'.$Zdjecie.'" alt="Konkurs/Wydarzenie"/>';
						?>
						<ul>
							<?php
							if(get_field('data',$ID_POST) != '')
								echo '<li><span class="pkt"><b>Data rozpoczęcia: </b>'.get_field('data',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
							 if(get_field('info1',$ID_POST) != '')
							echo '<li><span class="pkt">'.get_field('info1',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
							 if(get_field('info2',$ID_POST) != '')
							echo '<li><span class="pkt">'.get_field('info2',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
							 if(get_field('info3',$ID_POST) != '')
							echo '<li><span class="pkt">'.get_field('info3',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
							 if(get_field('info4',$ID_POST) != '')
							echo '<li><span class="pkt">'.get_field('info4',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
							 if(get_field('info5',$ID_POST) != '')
							echo '<li><span class="pkt">'.get_field('info5',$ID_POST).'</span></li>';
						////////////////////////////////////////////////////////////////
						 if(get_field('regulamin',$ID_POST) != '' && get_field('show',$ID_POST) == true)
							echo '<li><a href="'.get_field('regulamin',$ID_POST).'">Regulamin</a></li>';
							 ?>
						</ul>
					
					</article>

			<?php }}
			$i++;
		endwhile;
		$i=0;?>
				<span style="display:block;text-align:center;font-size:1.8rem;"><a style="color:black;font-weight:bold;font-style:italic;" href='<?=get_home_url();?>/?cat=3'>Zobacz wszystkie konkursy !</a></span><br />
		<span style="display:block;text-align:center;font-size:1.8rem;padding-bottom: 15px;"><a style="color:black;font-weight:bold;font-style:italic;" href='<?=get_home_url();?>/?cat=4'>Zobacz wszystkie wydarzenia !</a></span>
	</div>
</aside>
<?php endif;
 wp_reset_postdata();
 ?>