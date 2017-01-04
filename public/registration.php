<?php include "../include/reg_profile.php";
require_once('../include/connection.php'); ?>

<div id="main">
    <div class="registration_description">
        <form method="POST">
            <fieldset>

                <legend>Registration:</legend>
                Full Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="firstname" ><br><br>
                Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="email" ><br><br>
                phone number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="mobile" ><br><br>
                Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="password" name="password_one" ><br><br>
                Confirm password:&nbsp;
                <input type="password" name="password_two" ><br><br>
                <input type="submit" value="Submit">
            </fieldset>
        </form> 
    </div>
</div>

<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    $flag = TRUE;
    if(isset($_POST['firstname'])) {
        $firstname=$_POST['firstname'];
        if (substr($firstname, 0, 1)>"Z" || substr($firstname, 0, 1)<"A") { 
            echo '<script>alert("First Name, First letter is only capital letter")</script>';
            die();

            $flag = FALSE;
        }
    }
    else{

        echo '<script>alert("Valid Name please")</script>';
        die();
        $flag = FALSE;
    }
    if(isset($_POST['email'])) {
        $email=$_POST['email'];
        $value = explode("@", $email);
        if(count($value)==2){
            $value = explode(".", $value[1]);
            if(count($value)<=1){
            echo '<script>alert("Valid email please")</script>';
            die();
            $flag = FALSE;
            }
        }
        else{
            echo '<script>alert("Valid email please")</script>';
            die();
            $flag = FALSE;
         }
    }
    else{
        echo '<script>alert("Valid email please")</script>';
        die();
        $flag = FALSE;
    }

    if(isset($_POST['mobile'])) {
        $mobile=$_POST['mobile'];
        if(!(strlen($mobile)==11)){
            echo '<script>alert("Valid mobile please")</script>';
            die();
            $flag = FALSE;
        }
    }
    else{
        echo '<script>alert("Valid mobile please")</script>';
        die();
        $flag = FALSE;
    }

    if(isset($_POST['password_one'])) {
        $password_one=$_POST['password_one'];
        if(strlen ($password_one)<4){
            echo '<script>alert("Valid Password please")</script>';
            die();
            $flag = FALSE;
        }
    }
    else{
        echo '<script>alert("Valid password please")</script>';
        die();
        $flag = FALSE;
    }
    if(isset($_POST['password_two'])) {
        $password_two=$_POST['password_two'];
        if(strlen ($password_two)<4){
            echo '<script>alert("Valid Password please")</script>';
            die();
            $flag = FALSE;
        }
    }
    else{
        echo '<script>alert("re enter same  password please")</script>';
        die();
        $flag = FALSE;
    }
    $admin=0;
    if($password_one== $password_two){
        $insert_Query = "INSERT INTO user(first_name,email,phone_number,
        password,admin) VALUES ('";
        $insert_Query .= mysqli_real_escape_string($conn, $firstname);
        $insert_Query .= "','" ;
        $insert_Query .=  mysqli_real_escape_string($conn, $email);
        $insert_Query .= "','" ;
        $insert_Query .=  mysqli_real_escape_string($conn, $mobile);
        $insert_Query .= "','" ;
        $insert_Query .=  mysqli_real_escape_string($conn, $password_one);
        $insert_Query .= "','" ;
        $insert_Query .=  mysqli_real_escape_string($conn, $admin);
        $insert_Query .=  "')";
        echo "fajsdfjajdsjfajds";
        try{
            $insert_Result = mysqli_query($conn, $insert_Query);
            echo "fajsdfjajdsjfajds";
            if($insert_Result)
            {
                echo "fajsdfjajdsjfajds";
                if(mysqli_affected_rows($conn) > 0)
                {
                    echo 'Data Inserted';
                }else{
                    echo 'Data Not Inserted';
                }
            }
        } 
        catch (Exception $ex) {
            echo 'Error Insert '.$ex->getMessage();
        }
    }
}
 ?>



<?php include "../include/footer.php" ?>