<?php
require 'function.php';
if (isset($_SESSION["id"])) {
    header("Location: index.php");
}
?>
<?php require './html/login.html'; ?>
<?php require 'script.php'; ?>