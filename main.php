<?php include 'includeFiles/head.php' ?>

<body>

  <?php $currentPage = 'main'; ?>

  <?php include 'includeFiles/nav.php' ?>
  <?php include 'includeFiles/script.php' ?>

  <div class="content">
    <img class="banner" src="images/currentlybanner.png" alt="banner">
    <div class="top">
      <p class="title">Currently Watching</p>
    </div>

    <div class="text">
      <a class="card" href="http://www.crunchyroll.com/naruto-shippuden">
        <img class='watch' src="http://img1.ak.crunchyroll.com/i/spire1/958243dc68ae929a6b9cb834165112471456969325_full.jpg" alt="shippuden">
        <p>Naruto Shippuden</p>
      </a>

      <a class="card" href="http://www.crunchyroll.com/masamune-kuns-revenge">
        <img class='watch' src="http://img1.ak.crunchyroll.com/i/spire1/ffa692e515077369d17480ff259d7d5e1483617006_full.jpg" alt="masamune">
        <p>Masamune-kun no Revenge</p>
      </a>

      <a class="card" href="http://kissanime.ru/Anime/Kaichou-wa-Maid-sama">
        <img class='watch' src="https://myanimelist.cdn-dena.com/images/anime/6/25254.jpg" width="298px" height="445px" alt="maidsama">
        <p>Kaichou wa Maid-Sama!</p>
      </a>
    </div>
  </div>

</body>

<?php include 'includeFiles/footer.php' ?>

</html>
