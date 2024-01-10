<?php
include '../../Private/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $BookId = $_POST['BookId'];

    $stmt = $conn->prepare("DELETE FROM books WHERE BookId = :BookId");
    $stmt->bindParam(':BookId', $BookId, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../Index.php?Page=Home ");
    exit();
}
