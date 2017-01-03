<?php include "../include/header_profile.php";
require_once('../include/connection.php'); 
?>
<div id="main" style="margin:20px 350px;padding:100px 133px;">

  <form method="post" id="blog_post_form" enctype="multipart/form-data">
    <table>
      <tr>
        <td>
          <br><pre>Category      : </pre><br>
        </td>
        <td>
          <select name="category">
            <option value="cs" >CS</option>
            <option value="eee">EEE</option>
            <option value="commerce" >COMMERCE</option>
            <option value="arts" >ARTS</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <pre>Question      : </pre><br>
        </td>
        <td>
          <input type="text" placeholder="Question" name="question_title" ><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <pre>First option  : </pre><br>
        </td>
        <td>
           <input type="text" placeholder="First option" name="first_question" ><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <pre>Second option : </pre><br>
        </td>
        <td>
          <input type="text" placeholder="Second option" name="second_question" ><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <pre>Third option  : </pre><br>
        </td>
        <td>
           <input type="text" placeholder="Third option" name="third_question" ><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <pre>Fourth option : </pre><br>
        </td>
        <td>
          <input type="text" placeholder="Fourth option" name="forth_question" ><br><br>
        </td>
      </tr>
      <tr>
        <td>
          <pre>Answer        : </pre><br>
        </td>
        <td>
           <input type="text" placeholder="If fourth write 4" name="answer" ><br><br>
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

if($_SERVER['REQUEST_METHOD'] === 'POST'
  && isset($_POST["first_question"]) 
  && isset($_POST["second_question"])
  && isset($_POST["third_question"]) 
  && isset($_POST["forth_question"])
  && isset($_POST["answer"])
  && ($_POST["question_title"]!="")){
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

