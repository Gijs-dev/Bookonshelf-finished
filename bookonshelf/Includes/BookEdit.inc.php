<?php
$BookId = $_GET['BookId'];

$sql = "SELECT `Author`, `Genre`, `ISBN`, `Language`, `Pages`, `Copies`, `Image` FROM `books` WHERE BookId = :BookId";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':BookId', $BookId);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result)
{
    $Author = $result['Author'];
    $Genre = $result['Genre'];
    $ISBN = $result['ISBN'];
    $Language = $result['Language'];
    $Pages = $result['Pages'];
    $Copies = $result['Copies'];
    $Image = $result['Image'];
}

?>

<form action="../../bookonshelf/php/BookEdit.php" method="post">
    <label>Schrijver</label>
    <input type="text" name="Author" value="<?php echo htmlspecialchars($Author); ?>" />
    <br>
    <br>
    <label>Genre</label>
    <input type="text" name="Genre" value="<?php echo htmlspecialchars($Genre); ?>" />
    <br>
    <br>
    <label>ISBN</label>
    <input type="text" name="ISBN" value="<?php echo htmlspecialchars($ISBN); ?>" />
    <br>
    <br>
    <label>Taal</label>
    <input type="text" name="Language" value="<?php echo htmlspecialchars($Language); ?>" />
    <br>
    <br>
    <label>Pagina's</label>
    <input type="text" name="Pages" value="<?php echo htmlspecialchars($Pages); ?>" />
    <br>
    <br>
    <label>Exemplaren</label>
    <input type="text" name="Copies" value="<?php echo htmlspecialchars($Copies); ?>" />
    <br>
    <br>
    <input type="hidden" name="ID" value="<?php echo htmlspecialchars($BookId); ?>" />
    <br>
    <br>
    <label for="img">Select image:</label>
    <input type="file" id="img" name="Image" accept="image/*" value="<?php echo htmlspecialchars($Image); ?>">
    <br>
    <br>
    <button type="submit">Voeg boek toe</button>
</form>
