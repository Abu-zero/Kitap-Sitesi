<?php
require_once("baglan.php");
require_once("header.php");
$kitap_id = $_GET["id"];
//kategori tablosunda kisim kısmını kitap tablosuna ekliyoruz
$sql="SELECT kitap.*, kategori.kisim FROM kitap INNER JOIN kategori ON kitap.katid = kategori.katid AND kitap.id=?";
//eklenicek değerler için sql'i hazırladık 
$stmt=$conn->prepare($sql);
$stmt->bind_param("i", $kitap_id);
//sorguyu çalıştırıp başarılı olup olmadığını kontrol etme
if($stmt->execute()===true){
	$result = $stmt->get_result();
	if($result->num_rows < 1 ){ 
	die("Kitap bulunamadı!"); 
	}
    $data = $result->fetch_assoc();
}
else{
	echo "Hata= ".$sql." ".$stmt->error;
}
?>
<input type="hidden" id="kid" value="<?= $data['id'] ?>"/>
<br>
<div id="kart">
  
  <div id="cover" style="display: flex; flex: 2;flex-direction: column; text-align: center;align-items: center;margin: 2%;">
  <div style="width: 100%;">  
    <img src="<?= $data['resim']?>" style="max-width: 80%; max-height: 100%;">
  </div>
    <p id="yaz" style="font-size: 20px;">
       Kitap Adı: <?= $data['isim']?> </br>
       Yazar: <?= $data['yazar']?> </br>
       İlk Baskı Yılı: <?= $data['yil']?> </br>
       Kategori: <?= $data['kisim']?>
	    </p>
  </div>

  <div id="detail" style="margin: 5%; flex: 8;">

      <i style="font-size: 25px; word-break: break-word;">
        <?= $data['ozet']?>
</i>

  </div>

</div>
<br>

  <hr>
  </br>

<form id="cadd" onsubmit="return yorumlar.add(this)">
    <h1>Kitap Hakkındaki Düşünceleriniz</h1>
    <input type="text" id="yisim" placeholder="İsim" required>
    <textarea id="yorum" placeholder="Yorum" required></textarea>
	<select style="border-radius:10px;" id="yildiz">
      <option value="★" >★</option>
      <option value="★★" >★★</option>
      <option value="★★★" >★★★</option>
      <option value="★★★★" >★★★★</option>
	  <option value="★★★★★" >★★★★★</option>
    </select></br></br>
    <input type="submit" value="Gönder"/>
</form>
</br>
<hr>
<div id="yorumlar"></div>
</br>
<script src="yorum.js"></script>
<hr>