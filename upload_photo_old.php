<?php
include("header.php");
include("config.php");
$user_email =  mysqli_real_escape_string($conn,$_GET['email']);

$msg = $_SESSION['msg'];

function fn_resize($image_resource_id,$width,$height)
{

$target_width =300;
$target_height =300;
$target_layer=imagecreatetruecolor($target_width,$target_height);
imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
return $target_layer;
}



if($_SERVER["REQUEST_METHOD"] == "POST")
{
$file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$file_size = $_FILES['image']['size'];
  echo($file_size);
  if($file_size > 1500000)
  {
     $msg = '<div class="alert alert-danger alert-dismissible">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     File too large. File must be less than 1.5 Mb
    </div>';
  }
  else
  {

    if($file!=null && $file!="")
    {
      $file = $_FILES['image']['tmp_name'];
      $source_properties = getimagesize($file);
      $image_type = $source_properties[2];

      if( $image_type == IMAGETYPE_JPEG )
        {
$image_resource_id = imagecreatefromjpeg($file);
$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
imagejpeg($target_layer,'temp.jpg');
$blob = addslashes(file_get_contents('./temp.jpg', true));
   $q = "UPDATE tb_user SET photo= '$blob' where user_email = '$user_email'";
  $conn->query($q);
}
      elseif( $image_type == IMAGETYPE_GIF )
        {
$image_resource_id = imagecreatefromgif($file);
$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
imagejpeg($target_layer,'temp.jpg');
$blob = addslashes(file_get_contents('./temp.jpg', true));
   $q = "UPDATE tb_user SET photo= '$blob' where user_email = '$user_email'";
  $conn->query($q);

}
      elseif( $image_type == IMAGETYPE_PNG )
        {
        $image_resource_id = imagecreatefrompng($file);
        $target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
        imagejpeg($target_layer,'temp.jpg');
        $blob = addslashes(file_get_contents('./temp.jpg', true));
        $q = "UPDATE tb_user SET photo= '$blob' where user_email = '$user_email'";
          $conn->query($q);
        
      }
      else
      {
        $image_resource_id = imagecreatefrompng($file);
        $target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
        imagejpeg($target_layer,'temp.jpg');
        $blob = addslashes(file_get_contents('./temp.jpg', true));
        $q = "UPDATE tb_user SET photo= '$blob' where user_email = '$user_email'";
  $conn->query($q);

      }
    }
$str = "select photo from tb_user where user_email = '$user_email'";
$result = $conn->query($str);
if($result==null) echo "nonos";
while(($r = mysqli_fetch_array($result))!=null)
{
  $output = "<br> <br> <img src = 'data:image/jpeg;base64,".base64_encode( $r[0])."' width='300' height='300' /><br> <br>";

}
}
}

?>

<!--
<script>
var uploadImage = document.getElementById("form");

uploadImage.onchange = function() {
  if(this.files[0].size > 131072){
     alert("File is too big!");
     this.value = "";
  };
};

</script>
-->

<!-- <pre> -->
<main>
  
  <div class="bg_color_2">
    <div class="container margin_60_35">
      <div id="register">
        
        <h1>Upload Your Photo(optional)</h1>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <form method="POST" enctype="multipart/form-data" id="form">
              <div class="box_form">
				  <div id="info" class="clearfix"> <?= "$msg";?> </div>
                <div class="form-group">
                  <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png" required />
                </div>

                <input type="submit" class="btn_1" value="Upload" />
                <?= "$output";?>
                <?php
                                  if(isset($_SESSION['login_user']))
                                    {
                                   echo ('<p class="text-center"><a href="./welcome.php" class="btn_1 medium">Proceed</a></p>');
                                  }
                                  
                                  else
                                  {
                                    echo('<p class="text-center"><a href="./login.php" class="btn_1 medium">Proceed</a></p>');
                                  }
                                  
                                  ?>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
</main>
<?php
include("footer.php");
?>