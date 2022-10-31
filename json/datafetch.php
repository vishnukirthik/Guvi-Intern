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

$items = array();

$SqlQry = "SELECT * FROM tb_user;";

$stmt = $conn->prepare($SqlQry);

$stmt->execute();

$stmt->bind_result($id, $username, $email, $password, $age, $phonenumber);

while ($stmt->fetch()) {
    $temp = [
        'id' => $id,
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'age' => $age,
        'phonenumber' => $phonenumber
    ];

    array_push($items, $temp);
}
echo json_encode($items);
