<?php
include 'includeFiles/head.php';
include 'includeFiles/dbInfo.php';

print '<body>';
$currentPage = 'addAnime';
include 'includeFiles/nav.php';
include 'includeFiles/script.php';
?>

<form method="post">
<h3>Enter the anime's name</h3><input type="text" name="name" placeholder="Anime name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>"/>
<h3>Enter the KissAnime URL</h3><input type="text" name="kiss" placeholder="KissAnime URL" value="<?php if(isset($_POST['kiss'])){ echo $_POST['kiss'];}?>"/>
<h3>Enter the Crunchyroll URL</h3><input type="text" name="crunchy" placeholder="Crunchyroll URL" value="<?php if(isset($_POST['crunchy'])){ echo $_POST['crunchy'];}?>"/>
<h3>Enter the MyAnimeList URL</h3><input type="text" name="mal" placeholder="MAL URL" value="<?php if(isset($_POST['mal'])){ echo $_POST['mal'];}?>"/>
<input type="submit" name="submit" value="Add" class="button">
</form>

<?php
if (isset($_POST["submit"]))
{
  $conn = new mysqli($server, $username, $password, $dbname);
  if ($conn->connect_error)
  {
    die("Connection failed: " . $conn->connect_error);
  }

  $name = htmlentities($_POST["name"], ENT_QUOTES, "UTF-8");
  $kissUrl = htmlentities($_POST["kiss"], ENT_QUOTES, "UTF-8");
  $crunchyUrl = htmlentities($_POST["crunchy"], ENT_QUOTES, "UTF-8");
  $malUrl = htmlentities($_POST["mal"], ENT_QUOTES, "UTF-8");

  $kissValid = false;
  $crunchyValid = false;
  $malValid = false;
  if ($name !== "")
  {
    if (strpos($kissUrl, 'kissanime.ru') !== false)
    {
      $kissValid = true;
    }
    if (strpos($crunchyUrl, 'crunchyroll.com') !== false)
    {
      $crunchyValid = true;
    }
    if (strpos($malUrl, 'myanimelist.net') !== false)
    {
      $malValid = true;
    }
    if ($kissValid === true && $crunchyValid === true && $malValid === true)
    {
      $query = "INSERT INTO tblAnime (fldAnimeName, fldKissLink, fldCrunchyLink, fldMalLink) VALUES ('$name', '$kissUrl', '$crunchyUrl', '$malUrl')";
      if ($conn->query($query) === TRUE)
      {
        header("Location:watched.php");
        exit;
      }
      else
      {
        echo "Error: " . $query . "<br>" . $conn->error;
      }
    }
    else
    {
      echo "You can only enter URLs that correspond to kissanime.ru, crunchyroll.com, and myanimelist.net.";
    }
  }
  else
  {
    echo 'You cannot leave the name blank.';
  }
}
print '</body>';
include 'includeFiles/footer.php';
?>
