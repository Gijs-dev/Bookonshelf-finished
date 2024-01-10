<?php
include "../Private/Connection.php"
?>

<?php
if(isset($_GET['Page']))
{
    $Page  = $_GET['Page'];
}
else
{
    $Page = 'Home';
}
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <title> Bookonshelf </title>
    <link rel="stylesheet" href="Styling.css" />
</head>
<body>
<?php
session_start();
if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] == true)
{
    if ($_SESSION["Role"] == 'Admin')
    {
        include 'Includes/navitems/Admin.nav.php';
    }
    else
    {
        include 'Includes/navitems/Customer.nav.php';
    }
}
else
{
    include 'Includes/navitems/Guest.nav.php';
}
include 'Includes/'. $Page . '.inc.php';
?>
</body>
</html>