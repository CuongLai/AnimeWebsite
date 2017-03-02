<?php
include 'includeFiles/head.php';
include 'includeFiles/dbInfo.php';

print '<body>';
$currentPage = 'addAnime';
include 'includeFiles/nav.php';
include 'includeFiles/script.php';

print '<div class="content">';
?>
<div class="top">
  <p class="title">Add an anime</p>
</div>
<form method="post"><div class="btnDiv">
<p class="addLabel">Anime name</p><input type="text" name="name" class="addText" placeholder="Anime name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>"/>
<p class="addLabel">KissAnime URL</p><input type="text" name="kiss" class="addText" placeholder="KissAnime URL" value="<?php if(isset($_POST['kiss'])){ echo $_POST['kiss'];}?>"/>
<p class="addLabel">Crunchyroll URL</p><input type="text" name="crunchy" class="addText" placeholder="Crunchyroll URL" value="<?php if(isset($_POST['crunchy'])){ echo $_POST['crunchy'];}?>"/>
<p class="addLabel">MyAnimeList URL</p><input type="text" name="mal" class="addText" placeholder="MAL URL" value="<?php if(isset($_POST['mal'])){ echo $_POST['mal'];}?>"/>
<input type="submit" name="submit" value="Add" class="button">
<input type="submit" name="back" value="Cancel" class="button">
</div></form>

<?php
if (isset($_POST["back"]))
{
  header("Location:watched.php");
  exit;
}
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
print '</div>';
print '</body>';
include 'includeFiles/footer.php';
?>
