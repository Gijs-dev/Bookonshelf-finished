<?php
session_start();
include "../../Private/Connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $BookId = $_POST['BookId'];
    $UserId = $_SESSION['UserId'];
    $Image = $_POST['Image'];

    $stmt = $conn->prepare("DELETE FROM borrowed WHERE UserId = :UserId AND BookId = :BookId");
    $stmt->bindParam(':UserId', $UserId);
    $stmt->bindParam(':BookId', $BookId);
    $stmt->execute();

    $stmt = $conn->prepare("UPDATE books SET Copies = Copies + 1 WHERE BookId = :BookId");
    $stmt->bindParam(':BookId', $BookId);
    $stmt->execute();

    $stmt = $conn->prepare("SELECT * FROM reserved WHERE BookId = :BookId ORDER BY UserId ASC LIMIT 1");
    $stmt->bindParam(':BookId', $BookId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch();
        $stmt = $conn->prepare("DELETE FROM reserved WHERE UserId = :UserId");
        $stmt->bindParam(':UserId', $result['UserId']);
        $stmt->execute();

        $stmt = $conn->prepare("INSERT INTO borrowed (BookId, UserId, Image) VALUES (:BookId, :UserId, :Image)");
        $stmt->bindParam(':BookId', $BookId);
        $stmt->bindParam(':UserId', $result['UserId']);
        $stmt->bindParam(':Image', $Image);
        $stmt->execute();

        header('location: ../index.php?page=Home');
    }
}
?>
