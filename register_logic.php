<?php
//include the database connection
include 'db_connect.php';

//Handle student registration
if(isset($_POST['register'])){
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $reg_number = mysqli_real_escape_string($conn, $_POST['reg_number']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $student_level = mysqli_real_escape_string($conn, $_POST['student_level']);

    $sql = "INSERT INTO students (firstname, lastname, reg_number, department, student_level) VALUES ('$firstname', '$lastname', '$reg_number', '$department', '$student_level')";
    mysqli_query($conn, $sql);
    echo "<p>Registration successful. You will be redirected to the login page shortly.</p>";
    echo "<meta http-equiv='refresh' content='2;url=login.php'>";
}
?>