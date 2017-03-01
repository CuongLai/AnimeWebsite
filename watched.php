<?php
include 'includeFiles/head.php';

$server = 'webdb.uvm.edu';
$username = 'chlai_admin';
$password = 'PZ8meTUQxCbMfnBA';
$dbname = 'CHLAI_AnimeDB';

$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}
?>

<?php
print '<body>';
include 'includeFiles/nav.php';
include 'includeFiles/script.php';

$sql = "SELECT pmkAnimeId, fldAnimeName, fldWatchLink, fldMalLink FROM tblAnime";
$result = $conn->query($sql);

print '<div class="content">';
print '   <table>';
print '<tr><th>Name</th><th>Links</th></tr>';
if ($result->num_rows > 0)
{
  while($row = $result->fetch_assoc())
  {
    print '<tr>';
    print '<td>' . $row["fldAnimeName"] . '</td>';
    print '<td><a href="'.$row['fldWatchLink'].'">' . 'Watch' . '</a>';
    print '<a href="'.$row['fldMalLink'].'">' . 'MAL' . '</a></td>';
    print '</tr>';
  }
  print '   </table>';
  print '</div>';
}

print '</body>';
?>

  <!-- <div class='content'>
    <table>
      <tr>
        <th>Anime Name</th>
        <th>Links</th>
      </tr>
    </table>
  </div> -->


<?php
include 'includeFiles/footer.php'
?>

</html>

<!-- php -->
<!-- $password = 'fU6EJV6!L08Ihqoh4mFF^3mb#CzVTXEj9fM'; -->


<!-- <form method="post">
<p>Password</p>
<input type="text" name="password" required/>
<input type="submit" id="submit" name="submit" value="submit" tabindex="900" class="submit">
</form> -->

<!-- php -->
<!-- if (isset($_POST["submit"]))
{
  $passGuess = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");
  if ($passGuess !== $password)
  {
    echo 'Wrong password. Admin notified.';
  }
  else
  {
    $_SESSION['login'] = true;
  }
} -->
