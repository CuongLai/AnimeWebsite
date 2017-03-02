<?php
include 'includeFiles/head.php';
include 'includeFiles/dbInfo.php';

$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}

print '<body>';
$currentPage = 'watched';
include 'includeFiles/nav.php';
include 'includeFiles/script.php';

$query = "SELECT pmkAnimeId, fldAnimeName, fldKissLink, fldCrunchyLink, fldMalLink FROM tblAnime";
$result = $conn->query($query);

print '<div class="content">';

print '<div class="top"><p class="title">Completed anime</p></div>';
?>
<form method="post">
<div class="btnDiv">
<input type="text" class="txtSearch" name="txtSearch" placeholder="Search watched anime"><input type="submit" name="search" value="Search" class="searchBtn">
<input type="submit" name="submit" value="Add an anime" class="button"></div>
</form>
<?php
if (isset($_POST[submit]))
{
  header("Location:addAnime.php");
  exit;
}

print '<table>';
print '<tr><th>Name</th><th>KissAnime</th><th>Crunchyroll</th><th>MyAnimeList</th></tr>';
if (isset($_POST[search]))
{
  $searchQuery = htmlentities($_POST["txtSearch"], ENT_QUOTES, "UTF-8");
  $sql = "SELECT * FROM tblAnime WHERE fldAnimeName LIKE '%{$searchQuery}%'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      print '<tr>';
      print '<td class="nameRow">' . $row["fldAnimeName"] . '</td>';
      print '<td>';
      if (!empty($row['fldKissLink']))
      {
        print '<a href="'.$row['fldKissLink'].'">';
        print '<img src="images/kissanime.png" alt="kissIcon"></a>';
      }
      print '</td><td>';
      if (!empty($row['fldCrunchyLink']))
      {
        print '<a href="'.$row['fldCrunchyLink'].'">';
        print '<img src="images/crunchyroll.png" alt="crunchyIcon"></a>';
      }
      print '</td><td>';
      print '<a href="'.$row['fldMalLink'].'"><img src="images/mal-icon.png" alt="MalIcon"></a>';
      print '</td></tr>';
    }
  }
}
else
{
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      print '<tr>';
      print '<td class="nameRow">' . $row["fldAnimeName"] . '</td>';
      print '<td>';
      if (!empty($row['fldKissLink']))
      {
        print '<a href="'.$row['fldKissLink'].'">';
        print '<img src="images/kissanime.png" alt="kissIcon"></a>';
      }
      print '</td><td>';
      if (!empty($row['fldCrunchyLink']))
      {
        print '<a href="'.$row['fldCrunchyLink'].'">';
        print '<img src="images/crunchyroll.png" alt="crunchyIcon"></a>';
      }
      print '</td><td>';
      print '<a href="'.$row['fldMalLink'].'"><img src="images/mal-icon.png" alt="MalIcon"></a>';
      print '</td></tr>';
    }
  }
}
print '   </table>';
print '</div>';

print '</body>';
include 'includeFiles/footer.php'
?>
</html>
