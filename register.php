<?php
include './database/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="./css/register.css">
</head>

<body>
  <form method="post">
    <div id="frm"><br>
      <h2>Register Form</h2><br>
      <input type="email" name="email" class="inputs" required placeholder="E-mail"><br><br>
      <input type="password" name="password" class="inputs" required placeholder="Password"><br><br>
      <input type="submit" value="Register" id="btn" name="register"><br><br>
      <a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
      <?php
      if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $cnnt->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          echo "<script>alert('Email is already registered. Please try another one.');</script>";
        } else {
          $insertQuery = "INSERT INTO users (email, password) VALUES (?, ?)";
          $insertStmt = $cnnt->prepare($insertQuery);
          $insertStmt->bind_param("ss", $email, $password);

          if ($insertStmt->execute()) {
            header('Location: login.php');
          }
          $insertStmt->close();
        }

        $stmt->close();
      }

      ?>
    </div>
  </form>
</body>

</html>