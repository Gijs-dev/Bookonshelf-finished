<?php
session_start();
session_destroy();
header("Location: ..\Index.php?Page=Login");
exit;
?>