<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="container pad2">
<div class="wrapper">
      <div class="heading">
        <h2>GPA Calculator</h2>
        <img src="flower.png" alt="flower icon"/>
      </div>

      <div class="form-wrapper">


    <h3 class="color pad2">Student Login</h3>
    <form method="post" action="">
        <label>Registration Number:</label>
        <input type="text" name="reg_number" required><br>
        <input type="submit" name="login" value="Login">
    </form>
</div>
</div>
    <?php include 'login_logic.php'?>
</body>
</html>