<?php

$UserId = $_SESSION['UserId'];

$sql = "SELECT `UserId`, `BookId`, `Image` FROM `borrowed` WHERE `UserId` = :UserId";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':UserId', $UserId);

$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo '<div class="books">';
foreach ($rows as $row) {
    echo '<div class="book">';
    echo '<img src="Images/' . $row['Image'] . '" alt="' . $row['Image'] . '">';
    echo '<form action="../../bookonshelf/php/ReturnBook.php" method="post">';
    echo '<input type="hidden" name="BookId" value="' . $row['BookId'] . '">';
    echo '<input type="hidden" name="Image" value="' . $row['Image'] . '">';
    echo '<button class="AdminButtonDelete" type="submit">Breng boek terug</button>';
    echo '</form>';
    echo '</div>';
}

echo '</div>';

