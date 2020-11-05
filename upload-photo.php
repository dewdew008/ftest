<?php
    session_start();
 require ("connection.php");
 $u_name = $_SESSION['username'];
$user_stmt = $db->prepare("select * from member where member.username='$u_name'");
$user_stmt->execute();
$user = $user_stmt->fetch(PDO::FETCH_ASSOC);
$u_id = $user['user_id'];
 if(isset($_POST['btn_upload'])) {
     $filetmp = $_FILES['file_img']['tmp_name'];
     $filename = $u_id.'_'.$_FILES['file_img']['name'];
     $filetype = $_FILES['file_img']['type'];
     $filepath = 'img/customer/' . $filename;
     $filetitle = strip_tags($_POST['img-title']);
     $filesize = $_FILES['file_img']['size'];


     if ($filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/gif") {
         move_uploaded_file($filetmp, $filepath);
         echo $filesize;
         $stmt = $db->prepare("INSERT INTO photo(img_id,img_name,img_path,img_type,img_title,img_watermark,user_id)
                VALUES(?,?,?,?,?,?,?)");
         if ($stmt->execute([null, $filename, $filepath, $filetype, $filetitle,test($filepath,$filename) ,$u_id])) {
             header("Location: index.php");
         } else {
             echo "Something went wrong!";
         }
     }else{
         $_SESSION['error'] = "สามารถเก็บได้เฉพาะไฟล์ <strong>JPEG</strong>  หรือ <strong>PNG</strong> เท่านั้น";
     }
 }
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Upload Photo</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php"><strong style="font-family: monospace;font-size: 30px">SHOOTING</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-auto">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="cart-profile.php?userID=<?php echo $user['user_id']; ?>">
                            <?php
                            echo $user['firstname']." ".$user['lastname'];
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?logout=1" class="nav-link btn btn-danger"><strong>Logout</strong></a>
                    </li>

                </ul>

            </div>
        </div>

    </div>
</nav>
    <div class="container">
        <?php
            if(isset($_SESSION['error'])){
             ?>
                <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                </div>
                <?php
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="photo-field">
                <input type="file" name="file_img" required>
            </div>
            <div class="title-field">
                <input type="text" name="img-title" placeholder="Image Title" required>
            </div>
            <input type="submit"  value="Upload Image" name="btn_upload" class="btn_upload">
        </form>
        <a href="index.php">Back to cart</a>
    </div>

</body>
</html>
<?php 
function test ($filepath,$filename) 
{
  
$original_image = $filepath;
$name_array = explode('.', $filename);
$result_image = 'img/with-credit/result_'.$name_array[0].'.'.$name_array[1];
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

return $result_image;
}
?>