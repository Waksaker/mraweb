<?php
// Resize image using GD library (PHP)
$image = imagecreatefromjpeg("assets/images/logos/mim.png");
$resized = imagescale($image, 192, 192);
imagepng($resized, "icon-192.png");
?>