<?php
//To fetch the mysql data into json format.please click GuviDB in welcome page .
$servername = "localhost";
$username = "root";
$password = "";
$database = "guviintern";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection error : " . $conn->connect_error);
}
$response = array();
$posts = array();
$query = "SELECT * FROM tb_user;";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $age = $row['age'];
    $phonenumber = $row['phonenumber'];
    $posts[] = array('id' => $id, 'username' => $username, 'email' => $email, 'password' => $password, 'age' => $age, 'phonenumber' => $phonenumber);
}
$response['posts'] = $posts;
//echo json_encode($response);
$fp= fopen('profile.json','w');
fwrite($fp,json_encode($response));
fclose($fp);
