<?php include "../include/header.php";
require_once('../include/connection.php');
 ?>
<form  id="submission_answer_form" method="POST">
    <div id="main">
        <script>
            time_starting();
        </script>
        <?php 
            if($_POST["category"]!=""){
                $category = $_POST["category"];
                $sql = "SELECT QUESTION,FIRST_OPTION, SECOND_OPTION, THIRD_OPTION,FOURTH_OPTION FROM question_table where category=".$category;
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $question = $row["QUESTION"];
                    $first_option = $row["FIRST_OPTION"];
                    $second_option = $row["SECOND_OPTION"];
                    $third_option = $row["THIRD_OPTION"];
                    $fourth_option = $row["FOURTH_OPTION"];
                    echo '<h2>'.$question.'</h2>'.
                    '<input type="radio" name="gender" value="'.'1'.'">'.$first_option.'<br>'.
                    '<input type="radio" name="gender" value="'.'2'.'">'.$second_option.'<br>'.
                    '<input type="radio" name="gender" value="'.'3'.'">'.$third_option.'<br>'.
                    '<input type="radio" name="gender" value="'.'4'.'">'.$fourth_option.'<br>';
                    }
                }else {
                    echo "0 results";
                }
                $conn->close();
                }
         ?>

        <h2>1. Which of the following methods cannot be used to enter data in a cell </h2>
        <input type="radio" name="gender" value="male" checked> Pressing an arrow key<br>
        <input type="radio" name="gender" value="female"> Pressing the Tab key<br>
        <input type="radio" name="gender" value="other"> Pressing the Esc key<br>
        <input type="radio" name="gender" value="other"> Clicking on the formula bar<br>
        <div id="submission_div">
        <button onclick="submission_answer()" id="submit_button">SUBMIT NOW</button>
        </div>
        <div id="timer_question">
        <p id="current_time">Start</p>
        </div>

    </div>
<?php include "../include/footer.php" ?>