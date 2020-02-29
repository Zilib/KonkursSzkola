<?php if(has_nav_menu('menu-jezyki') && is_home()):?>
<div id="Langs">
	<b style="padding:2px;">Choose lang:</b>
	<?php Jezyki();
	endif;
		?>
		<button type="button" class="close" aria-label="Close" onclick="Off();">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<footer id="Stopka">
			<article class="Pudelko">
			<div id="Linki">
				<h6>Tu nas znajdziecie</h6>
				<a id="YT" href="https://www.youtube.com/user/podwale11">
				<i class="fa fa-youtube" aria-hidden="true"></i>
			</a>
				<a id="Facebook" href="https://www.facebook.com/Zesp%C3%B3%C5%82-Szk%C3%B3%C5%82-nr-1-im-W%C5%82adys%C5%82awa-Grabskiego-w-Lublinie-209248459098312/">
				<i class="fa fa-facebook-square" aria-hidden="true"></i>
			</a>
		</div>
		</article>
		<?php if(has_nav_menu('stopka-menu')):?>
		<article class="StopkaLinki">
			<h6>Ważne linki</h6>
			<?php Stopka();?>
		</article>
				<?php if(has_nav_menu('Projekty-menu')): ?>
		<div id="Projekty">
			<h6>Projekty</h6>
			<?php Projekty(); ?>
		</div>
		<?php endif;endif;?>
		<article class="Pudelko right">
			<h6>Certyfikaty</h6>
			<img src="<?=get_template_directory_uri(); ?>/Img/NoweCertyfikaty/Pani.png" alt="Konkurs jesiennej poezji śpiewanej">
			<img src="<?=get_template_directory_uri(); ?>/Img/NoweCertyfikaty/Tarcza.png" alt="Ranking szkół perspektyw">
			<img src="<?=get_template_directory_uri(); ?>/Img/NoweCertyfikaty/dab.png" alt="Dąb pamięci">
			<img src="<?=get_template_directory_uri(); ?>/Img/Certyfikaty/innowacja.png" alt="Szkoła innowacji">
			<img src="<?=get_template_directory_uri(); ?>/Img/Certyfikaty/przed.png" alt="Szkoła przedsiębiorczości">
			<img src="<?=get_template_directory_uri(); ?>/Img/Certyfikaty/spiewajaca.png" alt="Śpiewająca Polska">
			<img src="<?=get_template_directory_uri(); ?>/Img/Certyfikaty/logozjazd.jpg" alt="60ciolecie Grabskiego">
			<img src="<?=get_template_directory_uri(); ?>/Img/NoweCertyfikaty/Iso.png" alt="Certyfikat ISO">
			<img src="<?=get_template_directory_uri(); ?>/Img/Certyfikaty/grabski.png" alt="Klub przyjaciół grabskiego">
		</article>
		<span id="Autor">&copy;Adrian Bielec 2018<a href="https://bip.lublin.eu/bip/zs1/index.php?t=200&id=6859" style="position: absolute;bottom:1px;right:10px;"><img alt="Bip" src="<?=get_template_directory_uri(); ?>/Img/bip.png"></a></span>	
	</footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
 <script src="<?=get_template_directory_uri(); ?>/Scroll.js"></script>
 <script>
 	function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
	if(getCookie("Lang") != "Off")
	{
		document.getElementById('Langs').style.display = 'block';
	}
 	function Off()
 	{
 		document.getElementById('Langs').style.display = 'none';
 		let data = new Date();
 		data.setTime(data.getTime() + 1 * 3600 * 1000);
 		document.cookie = "Lang=Off; expires="+data.toUTCString() +"path=/";
 	}
 	
 </script>
<?php wp_footer();?>
</body>
</html>