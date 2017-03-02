<?php
if (!$_SESSION['login'])
{
  header("Location:index.php");
  exit;
}
else
{
  header("Location:main.php");
  exit;
}
?>
