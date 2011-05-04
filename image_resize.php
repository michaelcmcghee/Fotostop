<?php

// The file
$orgFilename = $_FILES['image']['name'];
$target = "img/thumbs";
$filename = "img/".$_FILES['image']['name'];


// Set a maximum height and width
$width = 300;
$height = 600;

// Content type

header('Content-type: image/jpeg');

// Get new dimensions
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}

// Resample
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// Output
imagejpeg($image_p, 'img/thumbs/'.$orgFilename);

header('Location:winner_admin.php');

?>

