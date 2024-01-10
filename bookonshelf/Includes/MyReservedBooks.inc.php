<?php

$UserId = $_SESSION['UserId'];

$sql = "SELECT `UserId`, `BookId`, `Image` FROM `reserved` WHERE `UserId` = :UserId";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':UserId', $UserId);

$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo '<div class="books">';
foreach ($rows as $row) {
    echo '<div class="book">';
    echo '<img src="Images/' . $row['Image'] . '" alt="' . $row['Image'] . '">';
    echo '</div>';
}

echo '</div>';

