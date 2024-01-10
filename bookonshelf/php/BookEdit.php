<?php
include '../../Private/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $BookId = $_POST['ID'];
    $Author = $_POST['Author'];
    $Genre = $_POST['Genre'];
    $ISBN = $_POST['ISBN'];
    $Language = $_POST['Language'];
    $Pages = $_POST['Pages'];
    $Copies = $_POST['Copies'];
    $Image = $_POST['Image'];

    $sql = "UPDATE books SET Author = :Author, Genre = :Genre, ISBN = :ISBN, Language = :Language, Pages = :Pages, Copies = :Copies, Image = :Image WHERE BookId = :BookId";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':Author', $Author);
    $stmt->bindParam(':Genre', $Genre);
    $stmt->bindParam(':ISBN', $ISBN);
    $stmt->bindParam(':Language', $Language);
    $stmt->bindParam(':Pages', $Pages);
    $stmt->bindParam(':Copies', $Copies);
    $stmt->bindParam(':Image', $Image);
    $stmt->bindParam(':BookId', $BookId);

    $stmt->execute();

    header('location: ../index.php?page=Home');
}
