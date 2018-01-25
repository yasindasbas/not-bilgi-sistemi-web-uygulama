<?php
	include("veri.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>BİLGİLERİ DÜZENLE</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS.css">
	</head>
	<body>
		<div class="ortala">
			<a href="ekle.php" style="margin-left:40%;width:20%;" class="btn btn-danger btn-lg">GERİYE DÖN..!</a>
		</div>
		<?php 
			$sorgu = $baglanti->query("SELECT * FROM notlis WHERE id =".(int)$_GET['id']); //id değeri ile düzenlenecek verileri veritabanından alacak sorgu
			$sonuc =$sorgu->fetch(PDO::FETCH_ASSOC); //sorgu çalıştırılıp veriler alınıyor
		?>
		<div class="container">
			<div class="col-md-6">
				<form action="" method="post">
					<table class="table">
						<tr>
							<td>DERS</td>
							<td><input type="text" name="ders" class="form-control" value="<?php echo $sonuc['dersAdi']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"></td>
						</tr>
						
						<tr>
							<td>ÖĞRENCİ NUMARASI</td>
							<td><input type="text" name="ogrNo" class="form-control" value="<?php echo $sonuc['ogrNo']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"></td>
						</tr>
						
						
						<tr>
							<td>VİZE NOTU</td>
							<td><input type="text" name="vize" class="form-control" value="<?php echo $sonuc['vize']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"></td>
						</tr>
						
						<tr>
							<td>FİNAL NOTU</td>
							<td><input type="text" name="final" class="form-control" value="<?php echo $sonuc['final']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"></td>
						</tr>
						
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
				<?php 

					if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
	
						$ders=$_POST['ders'];//sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz.
						$ogrNo=$_POST['ogrNo'];
						$vize=$_POST['vize'];
						$final=$_POST['final'];
						$ortalama=($vize*0.4)+($final*0.6);
						if($vize<>"" && $final<>""){
							$ortalama=($vize*0.4)+($final*0.6);
						}else{
							$ortalama="--";
							if($vize==""){
								$vize="--";
							}
							if($final==""){
								$final="--";
							}
						}
						if($ortalama<>"--"){
							if($ortalama<=44 || $final<=44){
								$durum="KALDI";
							}else{
								$durum="GEÇTİ";
							}
						}else{
							$durum="--";
						}

						if ($ders<>"" && $ogrNo<>"" ) { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
		
							if ($baglanti->query("UPDATE notlis SET dersAdi = '$ders', ogrNo = '$ogrNo', vize = '$vize', final = '$final', ortalama = '$ortalama', durum = '$durum' WHERE id =".$_GET['id'])) // Veri güncelleme sorgumuzu yazıyoruz.
							{
								header("location:ekle.php"); // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
							}
							else
							{
								echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
							}

						}
					}
				?>
			
	</body>
</html>