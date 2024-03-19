<?php
//include the database connection
include 'db_connect.php';

// Handle student login
if(isset($_POST['login'])){
    $reg_number = mysqli_real_escape_string($conn, $_POST['reg_number']);

    $sql = "SELECT * FROM students WHERE reg_number='$reg_number'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        // Student found, proceed to calculate GPA
        $student = mysqli_fetch_assoc($result);
        $display_form = 'calculator'; // Set display_form to 'calculator' after successful login
        echo "<meta http-equiv='refresh' content='2;url=gpa_calculator.php'>";
    }else{
        echo "<p>Student not found. Please register first.</p>";
        echo "<meta http-equiv='refresh' content='2;url=register.php'>";
    }
}

?>