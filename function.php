<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "guviintern");

// IF
if (isset($_POST["action"])) {
  if ($_POST["action"] == "register") {
    register();
  } else if ($_POST["action"] == "login") {
    login();
  }
}

// REGISTER
function register()
{
  global $conn;
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $age = $_POST["age"];
  $phonenumber = $_POST["phonenumber"];

  if (empty($username) || empty($password) || empty($email) || empty($age) || empty($phonenumber)) {
    echo "Please Fill Out The Form!";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
  if (mysqli_num_rows($user) > 0) {
    echo "Username Has Already Taken";
    exit;
  }

  $query = "INSERT INTO tb_user VALUES('',  '$username', '$email','$password','$age','$phonenumber')";
  mysqli_query($conn, $query);
  echo "Registration Successful";
}

// LOGIN
function login()
{
  global $conn;

  $email =  $_POST["email"];
  $password = $_POST["password"];

  $user = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");

  if (mysqli_num_rows($user) > 0) {

    $row = mysqli_fetch_assoc($user);

    if ($password == $row['password']) {
      echo "Login Successful";
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
    } else {
      echo "Wrong Password";
      exit;
    }
  } else {
    echo "User Not Registered";
    exit;
  }
}
