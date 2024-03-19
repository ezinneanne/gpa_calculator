<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
<link rel="stylesheet" href="styles.css">
    <title>Student Registration</title>
</head>

<body class="container pad2">
    <div class="wrapper">
      <div class="heading">
        <h2>GPA Calculator</h2>
        <img src="flower.png" alt="flower icon"/>
      </div>
    
<div class="form-wrapper">
    <!-- Student Registration Form -->
    <h3 class="color">Student Registration</h3>
    <form method="post" action="">
        <label>First Name:</label>
        <input type="text" name="firstname" required><br>
        <label>Last Name:</label>
        <input type="text" name="lastname" required><br>
        <label>Registration Number:</label>
        <input type="text" name="reg_number" required><br>
        <label>Department:</label>
        <input type="text" name="department" required><br>
        <label>Student Level:</label>
        <input type="text" name="student_level" required><br>
        <input type="submit" name="register" value="Register">
    </form>
    </div>
    <a href="login.php">Login Instead</a>
    <?php include 'register_logic.php'?>
    </div>
  </body>
  </html>


