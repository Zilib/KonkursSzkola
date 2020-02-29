<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8">
<title><?php wp_title(); ?> <?php bloginfo('name'); ?></title>
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous" rel="stylesheet">
<link  href="https://fonts.googleapis.com/css?family=Lato" rel="preload" as="style" onload="this.rel='stylesheet'">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta name="keywords" content="zs1,zespół szkół nr 1,podwale,zespół,szkół,lublin,nr 1,1,technikum ekonomiczno-handlowe,technikum,ekonomista,handlowiec,ekonomiczno-handlowe,technik informatyk,technik wędkarz,technik organizacji reklamy,liceum nr xv w lublinie,szkoła lublin,szkoła średnia">
<meta name="author" content="Adrian Bielec">
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" />
<style>#NaglowekKonkursy:after{background-image: url('<?=get_template_directory_uri(); ?>/Img/Jezyk.JPG');}#NaglowekGaleria:after{background-image: url('<?=get_template_directory_uri(); ?>/Img/Galeria/Ola.jpg');}</style>

<?php wp_head();?> 
</head>
<body>
<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
<header id="Top">
		<div id="Background" style="background-image:url('<?=header_image(); ?>');"></div>
		<div id="Llogo">
		<a href="<?=get_home_url(); ?>"><img src="<?=get_template_directory_uri(); ?>/Img/Logo.png" id="Logo" alt="Logo" /></a>
	</div>
		<article id="Numerek">
			<div class="Tl">
				<h3>Szczęśliwy numerek</h3>
				<span class="Lucky"><?php echo get_option('Numerek');?></span>
			</div>
		</article>
</header>

	<nav id="Menu" class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color:rgba(255,255,255,0.9);">
	<div class="container-fluid">	  
		<?php echo '<a href="'.get_home_url().'">';?>
		<img src="<?=get_template_directory_uri(); ?>/Img/Z1.png" width="70" height="70" alt="ZS1">
		</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	<div class="collapse navbar-collapse" id="navbarNav">

<?php Lewe_Menu();
	  Prawe_Menu();
 ?> 
	</div>
	</div>
	</nav>
<?php get_search_form();?>
