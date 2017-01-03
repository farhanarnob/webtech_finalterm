<?php include "../include/header_profile.php";
require_once('../include/connection.php'); 
?>
<div id="main" style="margin:20px 350px;padding:100px 133px;">

  <form method="post" id="blog_post_form" enctype="multipart/form-data">
    <table>
      <tr>
        <td>
          <pre>Post title  : </pre><br>
        </td>
        <td>
          <input type="text" placeholder="post tile" name="post_title" ><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <pre>Post details: </pre>
        </td>
        <td>
          <textarea rows="4" cols="50" name="post_details" form="blog_post_form"></textarea><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <pre>Image upload: </pre>
        </td>
        <td>
          <input type="file" name="image_upload" id="image_upload">
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" style="float: right;">
        </td>
      </tr>
    </table>
  </form>
</div>
<?php

if(isset($_POST["post_title"]))
{
  $target_dir = "image/";
  $target_image = $target_dir . basename($_FILES["image_upload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_image,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image_upload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_image) && $target_image!="image/") {
      $target_image ="1".$target_image;
  }
  // Check file size
  if ($_FILES["image_upload"]["size"] > 1500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  // && $imageFileType != "gif" ) {
  //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  //     $uploadOk = 0;
  // }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["image_upload"]["tmp_name"], $target_image)) {
          echo "The file ". basename( $_FILES["image_upload"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
  $post_head=$_POST["post_title"];
  $post_body =$_POST["post_details"];
  if(isset($_POST["image"])){
    $image=$_POST["image"];
  }else{
     $image="image";
  }
  // echo "$post_body";

  $insert_Query = "INSERT INTO blogpost(post_head, post_body,image) VALUES ('";
  $insert_Query .= mysqli_real_escape_string($conn, $post_head);
  $insert_Query .= "','" ;
  $insert_Query .=  mysqli_real_escape_string($conn, $post_body);
  $insert_Query .= "','" ;
  $insert_Query .=  $target_image;
  $insert_Query .=  "')";

  try{
      $insert_Result = mysqli_query($conn, $insert_Query);
      
      if($insert_Result)
      {
          if(mysqli_affected_rows($conn) > 0)
          {
              echo 'Data Inserted';
          }else{
              echo 'Data Not Inserted';
          }
      }
  } catch (Exception $ex) {
      echo 'Error Insert '.$ex->getMessage();
  }
}
?>

<?php include "../include/footer.php" ?>