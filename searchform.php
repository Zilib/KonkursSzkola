<?php
$AktualnyRok = date('Y');
$AktualnyMiesiac = date('m');
global $post;
?>
<?php
	$NazwaMiesiaca = array(
		"Styczeń",
		"Luty",
		"Marzec",
		"Kwiecień",
		"Maj",
		"Czerwiec",
		"Lipiec",
		"Sierpień",
		"Wrzesień",
		"Październik",
		"Listopad",
		"Grudzień"
	);
 if(is_search() || is_home() || isset($post->ID) && ($post->ID == 1822) ): ?>
 <div style="float:right;width:50%;text-align: right;">
		<a href="#Wyszukiwarka" class="btn btn-default" data-toggle="collapse" id="Search">
	<i class="fa fa-search" aria-hidden="true" style="font-size:3.3rem;"></i>
	<span style="font-size:2rem;">Wyszukiwarka</span>
	</a>
</div>
<div id="Wyszukiwarka" class="main-container collapse in" >
	<form role="search" method="get" action="<?php echo site_url('/'); ?>">
		<div class="form-row">
				<div class="col-md-4">
				<label for="Klucz">Słowo klucz</label>
				<input type="text" value="" id="Klucz" name="s" class="form-control" placeholder="Słowo klucz" />
				<span data-title="Pomoc">Wyszukuje, podany ciąg znaków na całej stronie</span>
			</div>
			<?php if(isset($post->ID) && $post->ID == 1822):?>
			<div class="col-md-8">
			<?php else:?>
				<div class="col-md-4">
			<?php endif;?>
				<label for="tag">Szukaj według tagów</label>
				<input type="text" class="form-control" placeholder="Studniówka, Astronautyka" name="tag" id="tag">
				<span data-title="Pomoc">Wyszukuje, określone słowo jako kategorie</span>
			</div>
			<?php if((isset($post->post_type) && $post->post_type == 'post') || is_search() ): ?>
			<div class="col-md-4">
				<label for="Kategoria">Wybierz kategorię</label>
				<?php
				$args = array(
	'show_option_all'    => __('Wszystkie kategorie'),
	'show_option_none'   => '',
	'orderby'            => 'ID', 
	'order'              => 'ASC',
	'show_count'         => 0,
	'hide_empty'         => 1, 
	'child_of'           => 0,
	'exclude'            => '',
	'echo'               => 1,
	'selected'           => 0,
	'hierarchical'       => 0, 
	'name'               => 'Kategoria',
	'id'                 => 'Kategoria',
	'class'              => 'form-control',
	'depth'              => 0,
	'tab_index'          => 0,
	'taxonomy'           => 'category',
	'hide_if_empty'      => false);
		wp_dropdown_categories( $args );
				?>
			</div>				
		<?php endif; ?>
	</div>
	<div class="form-row" style="margin-top:10px;">
			<div class="col-md-6">
			<label for="Rok">Wybierz rok szkolny</label>
			<select class="form-control" name="Rok" id="Rok">
				<option  value="">Wszystkie lata</option>
				<?php
				if($AktualnyMiesiac<9){
				for($i=2016;$i<$AktualnyRok;$i++){
						echo '<option value="'.$i.'">'.$i.'/'.($i+1).'</option>';
					}
				}
				else if ($AktualnyMiesiac>=9)
				{
				for($i=2016;$i<=$AktualnyRok;$i++){
						echo '<option value="'.$i.'">'.$i.'/'.($i+1).'</option>';
					}
				}
				?>
			</select>
			</div>
			<div class="col-md-6">
			<label for="Miesiac">Wybierz miesiąc</label>
			<select class="form-control" name="Miesiac" id="Miesiac">
				<option value="">Wszystkie miesiące</option>
				<?php
					for($i=1;$i<=12;$i++)
					{
							echo '<option value="'.$i.'">'.$NazwaMiesiaca[$i-1].'</option>';
					}
				?>
			</select>
			</div>
			<?php if(is_page()){?>
				<input type="hidden" value="<?php echo $post->post_parent == 0 ? $post->ID : $post->post_parent ?>" name="Strona" />
			<?php }else if(!is_home() && get_query_var("Strona") == 1822){?>
				<input type="hidden" value="<?php echo "1822" ?>" name="Strona" />
				<?php };

			?>
		</div>
		<input type="submit" class="btn btn-primary" value="Wyszukaj" style="margin-right:10px;margin-top: .5rem;float:right;" />
	</form>
</div>
<?php endif;?>
<div id="MNumerek"><h2>Szczęśliwy Numerek: <b><?php echo get_option('Numerek');?></b></h2></div>
<div style="clear:both;"></div>