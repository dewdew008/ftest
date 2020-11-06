<?php
session_start();
 require ("connection.php");

$original_image = $_SESSION['filename'];
$name_array = explode('.', $original_image);
$result_image = 'with-credit/result_'.$name_array[0].'.'.$name_array[1];
$watermark_image = 'img/wt/wt.png';

//set size
$result_image_width = 640;
$result_image_height = 480;
$quality = 100;

//get info pic
$info = getimagesize($original_image);
$imgtype = image_type_to_mime_type($info[2]);

switch ($imgtype) {
 case 'image/jpeg':
  $source = imagecreatefromjpeg($original_image);
  break;
 case 'image/gif':
  $source = imagecreatefromgif($original_image);
  break;
 case 'image/png':
  $source = imagecreatefrompng($original_image);
  break;
 default:
  die('Invalid image type.');
}

$source_width = imagesx($source);
$source_height = imagesy($source);
$source_ratio = $source_width / $source_height ;

if ($result_image_width/$result_image_height > $source_ratio) {
 $new_image_width = $result_image_width;
 $new_image_height = $result_image_width/$source_ratio;
} else {
 $new_image_width = $result_image_height*$source_ratio;
 $new_image_height = $result_image_height;
}

$new_image = imagecreatetruecolor(round($new_image_width), round($new_image_height));
imagecopyresampled($new_image, $source, 0, 0, 0, 0, $new_image_width, $new_image_height, $source_width, $source_height);

$new_x_mid = $new_image_width / 2;
$new_y_mid = $new_image_height / 2;
$old_x_mid = $result_image_width / 2;
$old_y_mid = $result_image_height / 2;

$final_source = imagecreatetruecolor($result_image_width, $result_image_height);
imagecopyresampled($final_source, $new_image, 0, 0, ($new_x_mid - $old_x_mid), ($new_y_mid - $old_y_mid), $result_image_width, $result_image_height, $result_image_width, $result_image_height);

$watermark_info = getimagesize($watermark_image);
$imgtype = image_type_to_mime_type($watermark_info[2]);
switch ($imgtype) {
  case 'image/jpeg':
   $watermark_source = imagecreatefromjpeg($watermark_image);
   break;
  case 'image/gif':
   $watermark_source = imagecreatefromgif($watermark_image);
   break;
  case 'image/png':
   $watermark_source = imagecreatefrompng($watermark_image);
   break;
  default:
   die('Invalid watermark type.');
}

$watermark_image_width = imagesx($watermark_source);
$watermark_image_height = imagesy($watermark_source);
imagecopy($final_source, $watermark_source, $result_image_width - $watermark_image_width, $result_image_height - $watermark_image_height, 0, 0, $result_image_width , $result_image_height);

imagejpeg($final_source, $result_image, $quality);
imagedestroy($final_source);

?>
<img src="<?php echo $result_image ; ?>" >