<div class="ekle">
<!--Post metoduyla ekle.php'ye istek gönderme-->
<form method="POST" action="/ekle.php" enctype="multipart/form-data">
<p>KİTAP BİLGİSİ</p>
<p>İsim</p>
<input type="text" class="input-field" name="isim" value="">
<p>Yazar</p>
<input type="text" class="input-field" name="yazar" value="">
<p>Yıl</p>
<input type="text" class="input-field" name="yil" value="">
<p>Resim</p>
<input type="file" class="input-field" name="resim">
<p>Kategori</p>
<select name="katid" class="select-field">
<?php
		require_once("baglan.php");
		$sql="SELECT * FROM `kategori`"; //kategori tablosundan verileri alma
		$result=$conn->query($sql); //sorguyu çalıştır
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC); //değerleri array olarak veritabanından al
        
		while($row = $result->fetch_assoc()) { //veriler bitene kadar verileri al ?> 
			
			<option value=<?= $row['katid'] ?>> <?= $row["kisim"] //alınan verileri göster ?></option><?php 
		}
		$conn->close();
		
	?>
</select>
<p>Özet</p>
<textarea style="width:30%; height:150px;" name="ozet"></textarea></br></br>
<input name="gonder" type="submit" value="Gönder">

</div>

