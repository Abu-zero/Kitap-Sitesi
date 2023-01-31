<?php

require_once("baglan.php");
require_once("header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {		
	die("Bu sayfa sadece GET metodu içindir.");
}else if(!isset($_GET["id"])){
	header("Location: index.php");
	die();
}
$kat_id=$_GET["id"];
$sql="SELECT kitap.*, kategori.kisim FROM kategori INNER JOIN kitap ON kitap.katid = kategori.katid AND kategori.katid=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i", $kat_id);
if($stmt->execute()===true){
	$result = $stmt->get_result();
	if($result->num_rows < 1 ){ 
	die("Kitap bulunamadı!"); 
	}
	$rows=$result->fetch_all(MYSQLI_ASSOC);
}
else{
	echo "Hata= ".$sql." ".$stmt->error;
}
?>
<h1 style="text-align:center;"><?= $rows[0]["kisim"] ?></h1>
<div class="row">
<?php
	foreach($rows as $row) { ?>
		<div class="column">
        <a href="./kitaptema.php?id=<?= $row['id']?>" style="text-decoration:none; color:black;">
        <div class="card" >
		<img id="resim2" src="<?= $row["resim"] ?>">
		<p class="yaz1"> <?= $row["isim"] ?> </h1>
		<p class="yaz3" > <?= $row["yazar"] ?> </p>
		<p class="yaz3" >  <?= $row["yil"] ?> </p>
        </div>
	    </a>
    </div>
	<?php
	}
	?>
</div>