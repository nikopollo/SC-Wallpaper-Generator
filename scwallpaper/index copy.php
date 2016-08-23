<?php
$logos=array("logo_1"=>"Logo1", "logo_2"=>"Logo2", "logo_3"=>"Logo3", "logo_4"=>"Logo4", "logo_5"=>"Logo5", "logo_6"=>"Logo6", "logo_7"=>"Logo7", "logo_8"=>"Logo8", "logo_9"=>"Logo9", "logo_10"=>"Logo10", "logo_11"=>"Logo11", "logo_12"=>"Logo12", "logo_13"=>"Logo13", "logo_14"=>"Logo14", "logo_15"=>"Logo15");	
$sizes=array("1366x768", "1920x1080", "1280x800", "1440x900", "1280x1024", "2560x2048");	
if (empty($_POST['logo'])) $_POST['logo']="logo_1";
if (empty($_POST['size'])) $_POST['size']="1366x768";
if (empty($_POST['color'])) $_POST['color']="cccccc";
else $_POST['color']=str_replace("#", "", $_POST['color']);
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Star Citizen Wallpaper Generator</title>
	<link href="/css/styles.css" rel="stylesheet" />
	<script src="/js/code.js"></script>
	<meta property="og:url"           content="http://scwallpaper.com/" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Star Citizen Wallpapers" />
	<meta property="og:description"   content="Wallpaper Generator for Star Citizen" />
	<meta property="og:image"         content="http://scwallpaper.com/generate.php?<?php print "color=".trim($_POST['color'])."&size=1200x630&logo=".trim($_POST['logo']);?>" />
</head>
<body>
<div class="left">
	<div class="form">
		<form action="/" method="post">
			<p>
				<?php 
					foreach($logos as $id=>$logo)
					{
						if ((!empty($_POST['logo']) and $_POST['logo']==$id) or (empty($_POST['logo']) and $id=="logo_1"))
						print "<input type='radio' name='logo' value='$id' id='logo_$id' checked='checked' /> <label for='logo_$id'><img src='images/".$id.".png' alt='$logo' title='$logo' /></label>";
						else print "<input type='radio' name='logo' value='$id' id='logo_$id' /> <label for='logo_$id'><img src='images/".$id.".png' alt='$logo' title='$logo' /></label>";
					} ?>
			</p>
			<p>Size: 
				<select name='size'>
					<?php 
					foreach($sizes as $size)
					{
						if (!empty($_POST['size']) and $_POST['size']==$size) 
						print '<option value="'.$size.'" selected="selected">'.$size.'</option>';
						else print '<option value="'.$size.'">'.$size.'</option>';
					} ?>	
				</select>
			</p>
			<p>
				<input type='text' name='color' id='color' value='<?php if (!empty($_POST['color'])) print $_POST['color']; else print "#cccccc";?>' />
			</p>
			<p><input type='submit' value='Generate'></p>
		</form>
	</div>
</div>
<div class="right">
	<div class='image'>
	<?php 
	
	print "<a href='/generate.php?color=".trim($_POST['color'])."&size=".trim($_POST['size'])."&logo=".trim($_POST['logo'])."&dl=1'>
		<img src='/generate.php?color=".trim($_POST['color'])."&size=".trim($_POST['size'])."&logo=".trim($_POST['logo'])."' alt='wallpaper'>
		</a>";
	?>	
	</div>
</div>
<script>
$("#color").spectrum({
    color: "#<?php print $_POST['color']?>",
    preferredFormat: "hex",
    showButtons: false,
    flat: true
});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73401930-1', 'auto');
  ga('send', 'pageview');

</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your share button code -->
<div class="fb-share-button" 
	data-href="<?php print "http://scwallpaper.com/index.php?color=".trim($_POST['color'])."&size=".trim($_POST['size'])."&logo=".trim($_POST['logo']);?>" 
	data-layout="button_count">
</div>
<div class='footer'>Developed by: <a href='http://mrgall.com/'>Oleg Bozhenko</a></div>
</body>
</html>