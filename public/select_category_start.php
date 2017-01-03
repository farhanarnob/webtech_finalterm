<?php include "../include/header_profile.php";
require_once('../include/connection.php'); 
?>
<div id="main" style="margin:20px 350px;padding:100px 133px;">

  <form method="post" action='question.php' id="blog_post_form" enctype="multipart/form-data">
    <table>
      <tr>
        <td>
          <br><pre>Select category      : </pre><br>
        </td>
        <td>
          <select name="category">
            <option value="1" >CS</option>
            <option value="2">EEE</option>
            <option value="3" >COMMERCE</option>
            <option value="4" >ARTS</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" value="start" style="float: right;" >
        </td>
      </tr>
    </table>
  </form>
</div>
<?php

if(($_POST["category"]!="")
  && $_SERVER['REQUEST_METHOD'] === 'POST'){
  $category = 1;
  // echo ($var_dump($_POST["first_question"]));
  if($_POST["category"]=="eee"){
    $category = 2;
  }else if($_POST["category"]=="commerce"){
    $category = 3;
  }else if($_POST["category"]== "arts"){
    $category = 4;
  }

  $insert_Query = "INSERT INTO question_table(CATEGORY, QUESTION,FIRST_OPTION,SECOND_OPTION,
   THIRD_OPTION,FOURTH_OPTION ,RESULT) VALUES ('";
  $insert_Query .= $category;
  $insert_Query .= "','" ;
  $insert_Query .= mysqli_real_escape_string($conn, $_POST["question_title"]);
  $insert_Query .= "','" ;
  $insert_Query .=  mysqli_real_escape_string($conn, $_POST["first_question"]);
  $insert_Query .= "','" ;
  $insert_Query .=  mysqli_real_escape_string($conn, $_POST["second_question"]);
  $insert_Query .= "','" ;
  $insert_Query .=  mysqli_real_escape_string($conn, $_POST["third_question"]);
  $insert_Query .= "','" ;
  $insert_Query .=  mysqli_real_escape_string($conn, $_POST["forth_question"]);
  $insert_Query .= "','" ;
  $insert_Query .=  mysqli_real_escape_string($conn, $_POST["answer"]);
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