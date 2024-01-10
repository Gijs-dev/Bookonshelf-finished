<?php
include '../../Private/Connection.php'
?>

<?php
$Author = $_POST['Author'];
$Genre = $_POST['Genre'];
$ISBN = $_POST['ISBN'];
$Language = $_POST['Language'];
$Pages = $_POST['Pages'];
$Copies = $_POST['Copies'];
$Image = $_POST['Image'];

$sql = "INSERT INTO books(Author, Genre, ISBN, Language, Pages, Copies, Image) VALUES (:Author, :Genre, :ISBN, :Language, :Pages, :Copies, :Image)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':Author', $Author);
$stmt->bindParam(':Genre', $Genre);
$stmt->bindParam(':ISBN', $ISBN);
$stmt->bindParam(':Language', $Language);
$stmt->bindParam(':Pages', $Pages);
$stmt->bindParam(':Copies', $Copies);
$stmt->bindParam(':Image', $Image);


$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

header("Location: ../Index.php?Page=BookAdd ");
?>