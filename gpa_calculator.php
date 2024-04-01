<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title>GPA Calculator</title>
</head>

<body class="container pad2">
    <div class="wrapper">
      <div class="heading">
        <h2>GPA Calculator</h2>
        <img src="flower.png" alt="flower icon"/>
      </div>

      <div class="form-wrapper">
        <form method="post" action="">
          <label for="num_courses">Number of Courses:</label>
          <input type="number" name="num_courses" id="num_courses" min="1" required style="padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
background-color: #f8fffd;
color: #01a082;"><br>
          <div id="course_fields"></div>
          <input type="submit" name="calculate" value="Calculate GPA">
        </form>
      </div>
    </div>
</body>
</html>

<script>
    document.getElementById('num_courses').addEventListener('input', function(){
    var numCourses = parseInt(this.value);
    var courseFields = document.getElementById('course_fields');
    courseFields.innerHTML = '';

    for(var i = 0; i < numCourses; i++){
        courseFields.innerHTML += `
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name[]" required><br>
            <label for="credit_units">Credit Units:</label>
            <input type="number" name="credit_units[]" min="1" required style="padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
background-color: #f8fffd;
color: #01a082;"><br>
            <label for="scores">Score:</label>
            <input type="text" name="scores[]" required><br><br>
        `;
        }
     });
</script>

<?php

//db
$conn = mysqli_connect('localhost','root','','gpadb');

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['calculate'])){
    $num_courses = $_POST['num_courses'];
    $course_names = $_POST['course_name'];
    $credit_units = $_POST['credit_units'];
    $scores = $_POST['scores'];
    $total_credit_units = 0;
    $total_points = 0;


   //Insert data into database
   for($i = 0; $i < $num_courses; $i++){
    $course_name = mysqli_real_escape_string($conn, $course_names[$i]);
    $credit_unit = mysqli_real_escape_string($conn, $credit_units[$i]);
    $score = mysqli_real_escape_string($conn, $scores[$i]);

    $sql = "INSERT INTO courses (course_name, credit_units, score) VALUES ('$course_name', '$credit_unit', '$score')";
    mysqli_query($conn, $sql);
   }


    // Calculate total credit units and points
    for($i = 0; $i < count($credit_units); $i++){
        $total_credit_units += $credit_units[$i];
        $grade = calculateGrade($scores[$i]);
        $total_points += $credit_units[$i] * $grade;
    }

    // Calculate GPA
    $gpa = $total_points / $total_credit_units;

    echo "<h3>Your GPA is: " . number_format($gpa, 2) . "</h3";
}

function calculateGrade($score){
    if(is_numeric($score)){
        if($score >= 75){
            return 4.0; // A
        }elseif($score >= 70){
            return 3.5; // AB
        }elseif($score >= 65){
            return 3.0; // B
        }elseif($score >= 60){
            return 2.5; // BC
        }elseif($score >= 55){
            return 2.0; // C
        }elseif($score >= 50){
            return 1.5; // CD
        }elseif($score >= 45){
            return 1.0; // D
        }elseif($score >= 40){
            return 0.5; // E
        }else{
            return 0.0; // F
        }
    }else{
        switch(strtoupper($score)){
            case 'A':
                return 4.0;
            case 'AB':
                return 3.5;
            case 'B':
                return 3.0;
            case 'BC':
                return 2.5;
            case 'C':
                return 2.0;
            case 'CD':
                return 1.5;
            case 'D':
                return 1.0;
            case 'E':
                return 0.5;
            default:
                return 0.0;
        }
    }
}


?>