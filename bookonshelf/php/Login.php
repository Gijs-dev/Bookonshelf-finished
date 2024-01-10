<?php
session_start();
$loggedIn = false;
include "../../Private/Connection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$Username = $_POST['Username'];
$Password = $_POST['Password'];

try {
$sql = "SELECT UserId, Username, Password, Role FROM users WHERE Username = :username AND Password = :password";
$stmt = $conn->prepare($sql);
$stmt->bindParam("username", $Username);
$stmt->bindParam("password", $Password);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
echo 'Het connecten met de database is niet gelukt';
}

if ($stmt->rowCount() == 1) {
$_SESSION["LoggedIn"] = true;
$_SESSION["Role"] = $result["Role"];
$_SESSION['UserId'] = $result["UserId"];
header("Location: ../Index.php?Page=Home");
exit();
}
else
{
$_SESSION["LoggedIn"] = false;
header("Location: ../Index.php?Page=Login");
exit();
}
}
