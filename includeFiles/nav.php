<div class="hidden-menu">
  <a href="#" class="toggle-nav-btn"><img src='images/menu.png' alt='menu'></a>
  <a href="main.php" class="logo2"><img src="images/logo.png" alt="logo"></a>
</div>
<nav class="toggle hidden">
  <ul>
     <a href="main.php" class="logo"><img src="images/logo.png" alt="logo"></a>
     <a href='#' class='exit-btn'><img src='images/exitbtn.png' alt='exitbtn'></a>

     <?php
     print '<li><a href="main.php "';
     if ($currentPage == 'main')
     {
       print ' class="current" ';
     }
     print '>Currently Watching</a></li>';

     print '<li><a href="watched.php "';
     if ($currentPage == 'watched')
     {
       print ' class="current" ';
     }
     if ($currentPage == 'addAnime')
     {
       print ' class="current" ';
     }
     print '>Watched</a></li>';
     ?>
     <li><a href="https://myanimelist.net/" target="_blank">My Anime List</a></li>
     <li><a href="http://anichart.net/airing" target="_blank">Anichart</a></li>
  </ul>
</nav>
