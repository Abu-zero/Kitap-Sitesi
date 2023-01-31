<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="./theme.css">
</head>
<body>
<nav style="margin:1%;">
<ul>
  <li><a href="/index.php">AnaSayfa</a></li>
  <li><a href="">Kategoriler</a>
  <ul>
  <?php
        require_once("baglan.php");
		$sql="SELECT * FROM `kategori`";
		$result=$conn->query($sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
		while($row = $result->fetch_assoc()) { ?>
			
			<li><a href="./kategori.php?id=<?= $row['katid'] ?>"> <?= $row['kisim'] ?> </a></li>
		<?php
		}
  ?>
  </ul>
  </li>
  <li><a href="/hakkimizda.php">Hakkımızda</a></li>
  <li><a href="/iletisim.php">İletişim</a></li>
</ul>
</nav>
<hr>
<p style="font-size:20px; text-align:center;">KİTAP OKUMAK GÜZELDİR...</p>
<hr>