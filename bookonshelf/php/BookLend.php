<?php
session_start();
include "../../Private/Connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $BookId = $_POST['BookId'];
    $UserId = $_SESSION['UserId'];
    $Image = $_POST['Image'];

    $stmt = $conn->prepare("INSERT INTO borrowed (UserId, BookId, Image)  VALUES(:UserId, :BookId, :Image)");

    $stmt->bindParam(':UserId', $UserId);
    $stmt->bindParam(':BookId', $BookId);
    $stmt->bindParam(':Image', $Image);
    $stmt->execute();


        $stmt = $conn->prepare("UPDATE books SET Copies = Copies - 1 where BookId = :BookId ");
        $stmt->bindParam(':BookId', $BookId);
        $stmt->execute();
        header('location: ../index.php?page=MyLendedBooks');
}