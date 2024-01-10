<?php
session_start();
include "../../Private/Connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $BookId = $_POST['BookId'];
    $UserId = $_SESSION['UserId'];
    $Image = $_POST['Image'];

    $stmt = $conn->prepare("INSERT INTO reserved (UserId, BookId, Image)  VALUES(:UserId, :BookId, :Image)");

    $stmt->bindParam(':UserId', $UserId);
    $stmt->bindParam(':BookId', $BookId);
    $stmt->bindParam(':Image', $Image);
    $stmt->execute();

    header('location: ../index.php?page=MyReservedBooks');
}
