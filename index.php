<?php
session_start();
$password = 'fU6EJV6!L08Ihqoh4mFF^3mb#CzVTXEj9fM';
?>
<form method="post">
<p>Password</p>
<input type="text" name="password" required/>
<input type="submit" id="submit" name="submit" value="submit" tabindex="900" class="submit">
</form>

<?php
$access = false;
if (isset($_POST["submit"]))
{
  $passGuess = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");
  if ($passGuess !== $password)
  {
    die("Wrong password. Admin notified.");
  }
  else
  {
    header("Location:main.php");
    exit;
  }
}
?>
