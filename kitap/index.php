<?php
require_once("baglan.php");
require_once("header.php");
//tablo yoksa tabloyu oluşturmak için
$sql= "CREATE TABLE IF NOT EXISTS kitap(
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`isim` VARCHAR(50) NULL DEFAULT '' COLLATE 'utf8mb4_unicode_ci',
	`yazar` VARCHAR(50) NULL DEFAULT '' COLLATE 'utf8mb4_unicode_ci',
	`yil` INT(11) NULL DEFAULT NULL,
	`resim` VARCHAR(500) NULL DEFAULT '' COLLATE 'utf8mb4_unicode_ci',
	`ozet` VARCHAR(500) NULL DEFAULT '' COLLATE 'utf8mb4_unicode_ci',
	`katid` INT(11) NOT NULL DEFAULT '0',
	`rating` INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=7";
?>

<div class="row">

<?php 

$sql= "SELECT * FROM kitap";
$result=$conn->query($sql);
        
		while($row = $result->fetch_assoc()) { ?>
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
				
<?php } ?>

</div>
<?php
require_once("footer.php");
?>