<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		
		header('HTTP/1.0 404 Not Found');
		die("<h1>Aradığınız sayfa bulunamadı.</h1><br>
				<a href='/index.php'>Anasayfaya dönmek için tıklayın.</a>");
		
}

require_once("baglan.php");

$sql =	"CREATE TABLE IF NOT EXISTS `yorumlar` (
      `yorum_id` INT(11) NOT NULL AUTO_INCREMENT,
      `kitap_id` INT(11) NOT NULL,
      `zaman` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `yisim` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
      `yorum` TEXT NOT NULL COLLATE 'utf8mb4_unicode_ci',
	  `yildiz` VARCHAR(50) NOT NULL COLLATE
      PRIMARY KEY (yorum_id)
    )
    COLLATE='utf8mb4_unicode_ci'
    ENGINE=InnoDB
    AUTO_INCREMENT=13";
		
$result = $conn->query($sql);
switch ($_POST['req']) {
  // yorumu gösterme
  case "goster";
    // bütün yorumları alma
    try {
      $stmt = $conn->prepare("SELECT `yisim`, `zaman`, `yorum`, `yildiz` FROM `yorumlar` WHERE `kitap_id`=? ORDER BY `zaman` ASC");
	  $stmt->bind_param("i", $_POST['kid']);
      $stmt->execute();
	  $result = $stmt->get_result();
	if($result->num_rows < 1 ){
		die();
	}
    } 
	catch (Exception $ex) {
      die($ex->getMessage());
    }
    // yorumları ilgili kitabın altında array alıp gösterme
    while ($row = $result->fetch_assoc()) { ?>
    <div class="crow">
      <div class="chead">
        <div class="isim"><?=$row['yisim']?></div>
        <div class="ctime">[<?=$row['zaman']?>]</div>
      </div>
	  <hr>
      <div class="mesaj"><?=$row['yorum']?></div>
	  <div style="margin-left:1%; font-weight:bold; " class="yildiz"><?=$row['yildiz']?></div>
	  </br>
    </div>
    <?php }
    break;
  // yorum ekleme
  case "ekle":
    // kontrol etme
    if (!isset($_POST['kid']) || !isset($_POST['yisim']) || !isset($_POST['yorum']) || !isset($_POST['yildiz'])) {
      die("Lütfen Formu Eksiksiz Doldurunuz.");
    }
    // girilen bilgileri veri tabanına ekleme
    try {
	  $kid=$_POST['kid'];
	  $yisim=htmlentities($_POST['yisim']);
	  $yorum=htmlentities($_POST['yorum']);
	  $yildiz=htmlentities($_POST['yildiz']);
      $stmt = $conn->prepare("INSERT INTO `yorumlar` (`kitap_id`, `yisim`, `yorum`, `yildiz`) VALUES (?,?,?,?)");
	  $stmt->bind_param("isss", $kid, $yisim, $yorum, $yildiz);
	  $stmt->execute();
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
    echo "OK";
    break;
}


?>
