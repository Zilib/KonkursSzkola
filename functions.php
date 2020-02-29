<?php
function register_my_menus() {
  register_nav_menus(
    array(
      'poziome-menu-lewe' => __( 'Poziome lewe menu' ),
      'poziome-menu-prawe' => __( 'Poziome prawe menu' ),
      'stopka-menu' => __( 'Menu w stopce' ),
      'menu-jezyki' => __('Menu z jezykami'),
      'Projekty-menu' =>__('Projekty')));
 }
// The CSS files for your theme
 require_once('bs4navwalker.php');
  function Lewe_Menu()
{
	wp_nav_menu([
		 'theme_location'  => 'poziome-menu-lewe',
		 'container'       => 'false',
		 'container_id'    => 'bs4navbar',
		 'container_class' => 'collapse navbar-collapse',
		 'menu_id'         => false,
		 'menu_class'      => 'nav navbar-nav mr-auto scrollable-menu',
		 'depth'           => 2,
		 'fallback_cb'     => 'bs4navwalker::fallback',
		 'walker'          => new bs4navwalker()
	   ]);
} 
  function Jezyki()
{
	wp_nav_menu([
		 'theme_location'  => 'menu-jezyki',
		 'container'       => 'false',
		 'container_id'    => 'bs4navbar',
		 'container_class' => 'collapse navbar-collapse',
		 'menu_id'         => false,
		 'menu_class'      => '',
		 'depth'           => 2,
		 'fallback_cb'     => 'bs4navwalker::fallback',
		 'walker'          => new bs4navwalker()
	   ]);
} 
 function Prawe_Menu()
{
	wp_nav_menu([
		 'theme_location'  => 'poziome-menu-prawe',
		 'container'       => 'false',
		 'container_id'    => 'bs4navbar',
		 'container_class' => 'collapse navbar-collapse',
		 'menu_id'         => false,
		 'menu_class'      => 'nav navbar-nav ml-auto scrollable-menu',
		 'depth'           => 2,
		 'fallback_cb'     => 'bs4navwalker::fallback',
		 'walker'          => new bs4navwalker()
	   ]);
}
function Stopka()
{
  wp_nav_menu([
     'theme_location'  => 'stopka-menu',
     'container'       => 'false',
     'container_id'    => 'bs4navbar',
     'container_class' => 'collapse navbar-collapse',
     'menu_id'         => false,
     'menu_class'      => 'false',
     'depth'           => 2,
     'fallback_cb'     => 'bs4navwalker::fallback',
     'walker'          => new bs4navwalker()
     ]);
}
function Projekty()
{
  wp_nav_menu([
     'theme_location'  => 'Projekty-menu',
     'container'       => 'false',
     'container_id'    => 'bs4navbar',
     'container_class' => 'collapse navbar-collapse',
     'menu_id'         => false,
     'menu_class'      => 'false',
     'depth'           => 2,
     'fallback_cb'     => 'bs4navwalker::fallback',
     'walker'          => new bs4navwalker()
     ]);
}
function dodaj_zmienne_do_zapytania($zmienna)
{
  $zmienna[] = "Strona";
  $zmienna[] = "tag";
  $zmienna[] = "Rok";
  $zmienna[] = "Miesiac";
  return $zmienna;
}
function Synonimy_nazw_zapytan_wyszukiwania($query)
{
  if(!is_admin() & $query->is_main_query() && is_search()):
  	if(isset($_GET['tag']))
  		$Tag = $_GET['tag'];
    // Dla każdej strony, wyszukiwanie osobno wpisów
    if(isset($_GET['Miesiac']) && isset($_GET['Rok']) && $_GET['Rok'] == '' && $_GET['Miesiac'] == '' && isset($_GET['Strona']) && $_GET['Strona'] == 1822 && $_GET['s'] == '' && $_GET['tag'] ==''  )
    {
          wp_redirect(get_the_permalink(1822));
          exit;
    }
       if(isset($_GET["Strona"])){
          $query->set("post_parent",$_GET['Strona']);
          $query->set("posts_per_page",6);
       }
       else if(!isset($_GET["Strona"]))
       {
        $query->set("post_parent__not_in",array(1822));
       }
       if(isset($_GET['tag']))
       	$query->set("tag",$_GET['tag']);
       if(isset($_GET["Kategoria"]))
       {
        $query->set("cat",$_GET["Kategoria"]);
       }
       if(isset($_GET['Rok']) && $_GET['Rok'] != ''){
        $Rok = $_GET['Rok'];
          $query->set("date_query",array(
            'after' => $Rok."-9-1",
            'before' =>($Rok+1)."-8-31"
          ));
       }
       if(isset($_GET["Miesiac"]) && $_GET['Miesiac'] != '')
          $query->set("monthnum",$_GET["Miesiac"]);

  endif;
}
function WyszukiwarkaGaleria($wp_query,$Tytul,$ErrorMSG)
{?>
  <div id="Galeria" style="min-height: 20vh;">  
 <?php if ($wp_query->have_posts()) :?>
  <h2 class="Zap">Galeria</h2>
  <?php if($Tytul != "") {?>
  <h2 class="Zap" style="border:none;padding:0px;"><?php echo $Tytul; ?></h2> <?php }?>
  <?php $i =0; ?>
   <?php while ($wp_query->have_posts()) : $wp_query->the_post();
      $Zdj = get_field('zdj_album');
      $Tytul = get_field('tytulalbumu');
      $Alt = get_field('tekst_alternatywny');
      if(!$Zdj || !$Tytul || !$Alt ){echo get_the_id();}
      ?>        <?php if($i>0 && $i%3 ==0) echo '</div><div style="width:100%;overflow:auto;border-bottom:1px solid rgba(0,0,0,0.05);">';
              if($i==0) echo '<div style="width:100%;overflow:auto;border-bottom:1px solid rgba(0,0,0,0.05);">'; ?>
      <article class="Album">

        <?php echo '<a href="'.get_permalink().'"><img src="'.$Zdj.'" alt="'.$Alt.'" /></a>'; ?>
        <h2><?php echo '<a href="'.get_permalink().'">'.$Tytul.'</a>';?></h2>
      </article>
      <?php
      $i++;
   endwhile;
   if($i%4 != 0) echo '</div>';
        echo '<div id="Paginacja" class="text-center">';
      echo paginate_links();
      echo '</div>';
      wp_reset_postdata();
      wp_reset_query();
 else:
  echo '<h2 class="Zap">Galeria</h2>';
  echo '<h2 class="Zap" style="border:none;padding:0px;">'.$ErrorMSG.'</h2>';?>
   <div style="width:100%;font-size:4rem;text-align: center;margin-bottom:20px;overflow:hidden;margin-top:6vh;">
   <style>span a:hover{text-decoration: none;}</style>
   <span><?php echo '<a style="color:rgba(0,0,0,0.5);" href="'.get_the_permalink(1822).'">Powrót do poprzedniej galerii</a>'?></span>
</div>
   <?php endif;?>
</div>
<?php }
function Cofnij()
{
		 $previous = "javascript:history.go(-1)";
	if(isset($_SERVER['HTTP_REFERER'])):
    $previous = $_SERVER['HTTP_REFERER'];
    ?>
<div style="width:100%;font-size:4rem;text-align: center;margin-bottom:20px;">
   <style>span a:hover{text-decoration: none;}</style>
   <span><?php echo '<a style="color:rgba(0,0,0,0.5);" href="'.$previous.'">Powrót do poprzedniej strony</a>'?></span>
  </div>
<?php 
else:?>
<div style="width:100%;font-size:4rem;text-align: center;margin-bottom:20px;">
   <style>span a:hover{text-decoration: none;}</style>
   <span><?php echo '<a style="color:rgba(0,0,0,0.5);" href="'.get_home_url().'">Powrót na stronę główną</a>'?></span>
  </div>
<?php endif;
}
function WyszukiwarkaPosty($wp_query,$Tytul,$ErrorMSG)
{ 
?>
	<main id="Aktualnosci">
				
				
				<?php					
    if($wp_query->have_posts() ) :
    	?><h1 class="Zap"><?php echo $Tytul;?></h1>
    	<div id="Tresc"><?php
        while ($wp_query->have_posts() ) : $wp_query->the_post();?>
		<div class="Artykul">
            <h2><?php echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';?></h2>
			<?php the_post_thumbnail( 'thumbnail' ); ?>
			 <div class="ArtykulTresc">

			<?php
			 $Tresc = get_the_content();
			//echo truncate(mb_strimwidth($Tresc, 0, 340,'...'));
			 echo truncate($Tresc,300);
			if (strlen(get_the_content()) > 300){
				echo '<a href="'.esc_attr(get_the_permalink()).'"> Czytaj dalej</a>';
			}
		
			 ?>
			</div>
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
            else:
  echo '<h2 class="Zap" style="min-height: 30vh;">'.$ErrorMSG.'</h2>';
  Cofnij();
    endif;?>
     </div>
    </main>

<?php
}
function create_new_archive_post_status(){
	register_post_status( 'Archiwum', array(
		'label'                     => _x( 'Zaarchiwizuj', 'post' ),
		'public'                    => false,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true

	) );
}
function Glowny_Post_Dodaj_Stan()
{
    ?>
    <script>
    jQuery(document).ready(function($){
        $("select#post_status").append("<option value=\"Archiwum\" <?php selected('Archiwum', $post->post_status); ?>>Archiwum</option>");
    });
    </script>
    <?php
}
add_action('admin_footer-edit.php','edit_box');
 
function edit_box() { 
	echo "<script>
	jQuery(document).ready( function() {
		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"Archiwum\">Zaarchiwizuj</option>' );
	});
	</script>";
}
class Thumbnail_walker extends Walker_Page {
        function start_el(&$output, $page, $depth = 0, $args = array(), $current_page = 0) {
        if ( $depth )
            $indent = str_repeat("\t", $depth);
        else
            $indent = '';
        extract($args, EXTR_SKIP);
        $css_class = array('page_item', 'page-item-'.$page->ID);
        $css = implode(' ',$css_class);
        $output .= $indent . '<li class="' . $css . '"><a href="#A' .$page->ID. '" class="OneMenu">'.get_the_title($page->ID).'</a>';
        if ( !empty($show_date) ) {
            if ( 'modified' == $show_date )
                $time = $page->post_modified;
            else
                $time = $page->post_date;
            $output .= " " . mysql2date($date_format, $time);
        }
      }
    }
function Pokaz_podstrony() {
  global $post;
  $thumb_menu = new Thumbnail_walker();
  $ID;
  if(is_page() && $post->post_parent)
  { 
    $ID = $post->post_parent;
  }
  else {
    $ID = $post->ID;
  }
  $Lista = (wp_list_pages(array(
    'title_li' => '',
    'child_of' => $ID,
    'echo' => 0,
    'walker' => $thumb_menu,
  )));
  if($Lista)
  {
    $Zwroc = '<ul>'.$Lista.'</ul>';
  }
  return $Zwroc;
}
$defaults = array(
    'default-image' => get_template_directory_uri().'/Img/header.jpg',
    'random-default' => false,
    'width' => 0,
    'height' => 0,
    'flex-height' => false,
    'flex-width' => false,
    'default-text-color' => '',
    'header-text' => true,
    'uploads' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
    'video' => false,
    'video-active-callback' => 'is_front_page',
);
// wspieranie tagów
function tags_support_all() {
  register_taxonomy_for_object_type('post_tag', 'page');
}
function tags_support_query($wp_query) {
  if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}
function MaksymalnaDlugoscTytulu( $title ) {
$max = 25;
if( strlen( $title ) > $max && (is_home() || is_search()) ) {
return mb_strimwidth($title, 0, $max,'...');
} else {
return $title;
}
}

add_filter( 'the_title', 'MaksymalnaDlugoscTytulu');
//+ Jonas Raoni Soares Silva
//@ http://jsfromhell.com
function truncate($text, $length, $suffix = '&hellip;', $isHTML = true) {
    $i = 0;
    $simpleTags=array('br'=>true,'hr'=>true,'input'=>true,'image'=>true,'link'=>true,'meta'=>true);
    $tags = array();
    if($isHTML){
        preg_match_all('/<[^>]+>([^<]*)/', $text, $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
        foreach($m as $o){
            if($o[0][1] - $i >= $length)
                break;
            $t = substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
            // test if the tag is unpaired, then we mustn't save them
            if($t[0] != '/' && (!isset($simpleTags[$t])))
                $tags[] = $t;
            elseif(end($tags) == substr($t, 1))
                array_pop($tags);
            $i += $o[1][1] - $o[0][1];
        }
    }
    //https://stackoverflow.com/questions/3161634/php-limit-text-string-not-including-html-tags źródło
    // output without closing tags
    $output = substr($text, 0, $length = min(strlen($text),  $length + $i));
    // closing tags
    $output2 = (count($tags = array_reverse($tags)) ? '</' . implode('></', $tags) . '>' : '');

    // Find last space or HTML tag (solving problem with last space in HTML tag eg. <span class="new">)
    // Bielec Adrian eddited that, because it doesn't work well with PHP 7
    $ToEnd1 = preg_split('/<.*>| /', $output, -1, PREG_SPLIT_OFFSET_CAPTURE);
    $ToEnd2 = end($ToEnd1);
    $pos = (int)end($ToEnd2);
//    $pos = (int)end(end(preg_split('/<.*>| /', $output, -1, PREG_SPLIT_OFFSET_CAPTURE)));
    // Append closing tags to output
    $output.=$output2;

    // Get everything until last space
    $one = substr($output, 0, $pos);
    // Get the rest
    $two = substr($output, $pos, (strlen($output) - $pos));
    // Extract all tags from the last bit
    preg_match_all('/<(.*?)>/s', $two, $tags);
    // Add suffix if needed
    if (strlen($text) > $length) { $one .= $suffix; }
    // Re-attach tags
    $output = $one . implode($tags[0]);

    //added to remove  unnecessary closure
    $output = str_replace('</!-->','',$output); 

    return $output;
}


function my_cron_schedules($schedules){
    if(!isset($schedules["5min"])){
        $schedules["5min"] = array(
            'interval' => 1*60,
            'display' => __('Once every 5 minutes'));
    }
    if(!isset($schedules["30min"])){
        $schedules["30min"] = array(
            'interval' => 30*60,
            'display' => __('Once every 30 minutes'));
    }
    return $schedules;
}
add_filter('cron_schedules','my_cron_schedules');

if ( ! wp_next_scheduled( 'Numerek' ) ) {
  wp_schedule_event( time(), 'daily', 'Numerek' );
}

add_action( 'Numerek', 'SzczesliwyNumerek' );

function SzczesliwyNumerek() {
	$Dzisiaj = current_time('l');
	if($Dzisiaj == "Saturday" || $Dzisiaj == "Sunday"){
		update_option('Numerek',"Wolne!");
	}
	else{
  $TXTNR = get_option("Numerek");
  $numerek = rand(1,32);
  while((string)$TXTNR == (string)$numerek)
  	 $numerek = rand(1,32);
  	update_option('Numerek',"$numerek");
 }
}


// Wspieranie tagów
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');
add_theme_support( 'custom-header', $defaults );
add_shortcode( 'lista', 'Pokaz_podstrony' );
add_action( 'post_submitbox_misc_actions', 'Glowny_Post_Dodaj_Stan');
add_action( 'init', 'create_new_archive_post_status' );
add_option('Numerek','255','','yes');
//Usuń Jquery, żeby nie robić zbędnego zamieszania.
//wp_deregister_script( 'jquery' );
add_filter( 'query_vars', 'dodaj_zmienne_do_zapytania' );
add_action("pre_get_posts", "Synonimy_nazw_zapytan_wyszukiwania");
add_action( 'init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' ); 
add_post_type_support( 'page', 'excerpt' );
?>