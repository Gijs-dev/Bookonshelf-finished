<?php
include '../../Private/Connection.php';

$Firstname = $_POST['Firstname'];
$Midname = $_POST['Midname'];
$Lastname = $_POST['Lastname'];
$Residence = $_POST['Residence'];
$Street = $_POST['Street'];
$Housenumber = $_POST['Housenumber'];
$Postalcode = $_POST['Postalcode'];
$Email = $_POST['Email'];
$Birthdate = $_POST['Birthdate'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Role = $_POST['Role'];

$sql = "INSERT INTO users(Username,Password,Role,Firstname,Midname,Lastname,Residence,Street,Housenumber,Postalcode,Email,Birthdate) 
        VALUES (:Username, :Password, :Role, :Firstname, :Midname, :Lastname, :Residence, :Street, :Housenumber, :Postalcode, :Email, :Birthdate)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':Firstname' , $Firstname);
$stmt->bindParam(':Midname' , $Midname);
$stmt->bindParam(':Lastname' , $Lastname);
$stmt->bindParam(':Residence', $Residence);
$stmt->bindParam(':Street' , $Street);
$stmt->bindParam(':Housenumber' , $Housenumber);
$stmt->bindParam(':Postalcode' , $Postalcode);
$stmt->bindParam(':Email' , $Email);
$stmt->bindParam(':Birthdate' , $Birthdate);
$stmt->bindParam(':Username', $Username);
$stmt->bindParam(':Password', $Password);
$stmt->bindParam(':Role', $Role);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

header("Location: ../Index.php?Page=Login");




