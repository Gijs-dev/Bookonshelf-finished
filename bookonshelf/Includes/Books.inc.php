<?php
include "/xampp/htdocs/Private/Connection.php";

$sql = "SELECT `BookId`, `Author`, `Genre`, `ISBN`, `Language`, `Pages`, `Copies`, `Image` FROM `books`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<div class="books">';
foreach ($rows as $row)
{
    echo '<div class="book">';
    echo '<img src="Images/' . $row['Image'] . '" alt="' . $row['Image'] . '">';

    echo '<p id="information">Schrijver: ' . $row['Author'] . '</p>';
    echo '<p id="information">Genre: ' . $row['Genre'] . '</p>';
    echo '<p id="information">ISBN: ' . $row['ISBN'] . '</p>';
    echo '<p id="information">Taal: ' . $row['Language'] . '</p>';
    echo '<p id="information">Pages: ' . $row['Pages'] . '</p>';
    echo '<p id="information">Exemplaren: ' . $row['Copies'] . '</p>';

    if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] == true)
    {
        if ($_SESSION["Role"] == 'Admin')
        {
            echo '<form action="../../bookonshelf/php/BookDelete.php" method="post">';
            echo '<input type="hidden" name="BookId" value="' . $row['BookId'] . '">';
            echo '<button class="AdminButtonDelete" type="submit">Verwijderen</button>';
            echo '</form>';

            echo '<form action="./Index.php?Page=BookEdit" method="get">';
            echo '<input type="hidden" name="Page" value="BookEdit">';
            echo '<input type="hidden" name="BookId" value="' . $row['BookId'] . '">';
            echo '<button class="AdminButtonEdit" type="submit">Edit</button>';
            echo '</form>';

        }
        else
        {
            if ($row['Copies'] == 0)
            {
                echo '<form action="../../bookonshelf/php/BookReserved.php" method="post">';
                echo '<input type="hidden" name="BookId" value="' . $row['BookId'] . '">';
                echo '<input type="hidden" name="Image" value="' . $row['Image'] . '">';
                echo '<button class="AdminButtonDelete" type="submit">Reserveren</button>';
                echo '</form>';
            }

            if ($row['Copies'] >= 1)
            {
                echo '<form action="../../bookonshelf/php/BookLend.php" method="post">';
                echo '<input type="hidden" name="BookId" value="' . $row['BookId'] . '">';
                echo '<input type="hidden" name="Image" value="' . $row['Image'] . '">';
                echo '<button class="AdminButtonEdit" type="submit">Leen</button>';
                echo '</form>';
            }
        }
    }

    echo '</div>';

}
echo '</div>';
?>

