<?php
//yalnızca kitapekle.php'de post isteği yapmak için ekle.php'yi oluşturdum bu yüzden elle girildiğinde bu sayfanın gözükmesini istemedğimden get isteklerini kabul etmiyorum ve kullanıcıyı ana sayfaya yönlendiriyorum 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		
		header('HTTP/1.0 404 Not Found');
		die("<h1>Aradığınız sayfa bulunamadı.</h1><br>
		    <a href='/index.php'>Anasayfaya dönmek için tıklayın.</a>");
}
//baglan.php ekledim
require_once "baglan.php";
//kitap eklemek için veritabanı sorgusu
$sql= "INSERT INTO kitap(isim,yazar,yil,resim,ozet,katid) VALUES(?,?,?,?,?,?)";
//sorguyu hazırlamak için
$stmt=$conn->prepare($sql);

$resim = upload_resim();
  if ($resim){
	  echo "Resim yüklendi.";
  }
  else{
	  echo "Resim yüklenemedi.";
  }
//kullanıcıdan alınan değerleri sorguya ekle
  $stmt->bind_param("ssissi", $_POST['isim'], $_POST['yazar'], $_POST['yil'], $resim, $_POST['ozet'], $_POST['katid']);
//sorguyu çalıştırıp başarılı olup olmadığını kontrol etme
if($stmt->execute()===true){
	echo "Kitap eklendi.";
}
else{
	echo "Hata= ".$sql." ".$stmt->error;
}
//resmi kontrol edip yükleme fonksiyonu
function upload_resim(){
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["resim"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	// resim olduğunu kontrol etme
	if(isset($_POST["gonder"])) {
	$check = getimagesize($_FILES["resim"]["tmp_name"]);
	if($check !== false) {
		$uploadOk = 1;
	} else {
		$uploadOk = 0;
		}
	}
	
	// aynı resim tekrar gönderildimi kontrol etme
	if (file_exists($target_file)) {
		return $target_file;
	}
	
	// boyutunu sorgulama
	if ($_FILES["resim"]["size"] > 500000) {
	echo "Dosya boyutu çok büyük";
	$uploadOk = 0;
	}
	
	// format kontrol etme
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
	echo "Desteklenmeyen format";
	$uploadOk = 0;
	}
	
	// bütün işlemler yapıldımı kontrol etme
	if ($uploadOk == 0) {
	return false;
	// eğer herşey doğruysa resmi yükleme
	} else {
	if (move_uploaded_file($_FILES["resim"]["tmp_name"], $target_file)) {
		return $target_file;
	} else {
		return false;
		}
	}
}
//baglantıyı kapama
$conn->close();
?>