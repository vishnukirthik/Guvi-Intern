<?php
require 'function.php';
if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id"));
} else {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Profile</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/welcome.css">
</head>

<body>
  <div class="card" style="width: 18rem;">
    <img src="./image/profile.svg" class="card-img-top" alt="profile">
    <div class="card-body">
      <h5 class="card-title">Profile</h5>
      <p class="card-text">
      <Details> This includes username,age,email,phonenumber</Details>
      </p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><?php echo "Name: ";
                                  echo $user["username"] ?></li>
      <li class="list-group-item"><?php echo "Age: ";
                                  echo $user["age"] ?></li>
      <li class="list-group-item"><?php echo "Email: ";
                                  echo $user["email"] ?></li>
      <li class="list-group-item"><?php echo "Phonenumber: ";
                                  echo $user["phonenumber"] ?></li>
    </ul>
    <div class="card-body">
      <a href="./json/datafetch.php" class="card-link">other Interns data</a>
    </div>
  </div>
</body>

</html>