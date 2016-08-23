<?php
if (!empty($_GET['color'])) $color=$_GET['color'];
else die("no color found");	
if (!empty($_GET['size'])) $size=$_GET['size'];
else die("no size found");	
if (!empty($_GET['logo'])) $logo=$_GET['logo'];
else die("no logo found");	
if (strlen($color)!=6) die("color invalid");	
if (count(explode("x", $size))!=2)	die("size invalid");
if (!is_file("images/".$logo.".png")) die("logo invalid");
$sizes=explode("x", $size);
if (count($sizes)!=2 or !is_numeric($sizes[0]) or !is_numeric($sizes[1])) die("size invalid");
list($width, $height) = getimagesize("images/".$logo.".png");
if ($width>$sizes[0] or $height>$sizes[1]) die("size invalid");
if ($sizes[0]>10000 or $sizes[1]>10000) die("size invalid");
$colors = sscanf($color, "%02x%02x%02x");
if (count($colors)!=3) die("color invalid");

if (!empty($_GET['dl']) and $_GET['dl']=="1") 
{
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename=scwallpaper.com-'.$logo.'-'.$color.'-'.$size.'.png');
	header('Content-Transfer-Encoding: binary');
}
else header('Content-Type: image/png');
$im = @imagecreatetruecolor($sizes[0], $sizes[1]);
imagesavealpha($im, true);
$im_color = imagecolorallocate($im, $colors[0], $colors[1], $colors[2]);
imagefill($im, 0, 0, $im_color);
$im_logo = imagecreatefrompng("images/".$logo.".png");
$center_x=round($sizes[0]/2)-round($width/2);
$center_y=round($sizes[1]/2)-round($height/2);;
imagecopy($im, $im_logo, $center_x, $center_y, 0, 0, $width, $height);
imagepng($im);
imagedestroy($im);
?>