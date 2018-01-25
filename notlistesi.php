
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>NOT GİRİŞ SİSTEMİ</title>
		<link rel="stylesheet" href="CSS.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="ortala">
		<a href="index.php" style="margin-left:40%;width:20%;" class="btn btn-danger btn-lg">ANASAYFAYA DÖN..!</a>
		</div>
	</body>
</html>
<?php
include("veri.php");//veritabanı bağlantımızı sayfamıza ekliyoruz.
?>
<div class="col-md-7">
				<table class="table">
					<tr>
						<th>ID</th>
						<th>DERS</th>
						<th>VİZE NOTU</th>
						<th>FİNAL NOTU</th>
						<th>ORTALAMA NOTU</th>
						<th>GEÇTİ/KALDI</th>
					</tr>
					<?php 
					
						$sorgu = $baglanti->query("SELECT * FROM notlis WHERE ogrNo =".(int)$_GET['oNo']); // notlistesi tablosundaki tüm verileri çekiyoruz.
						while ($sonuc=$sorgu->fetch(PDO::FETCH_ASSOC)){
							$id=$sonuc['id'];
							$dersAdi=$sonuc['dersAdi'];
							$vize=$sonuc['vize'];
							$final=$sonuc['final'];
							$ortalama=$sonuc['ortalama'];
							$durum=$sonuc['durum'];
						
					?>
					
							<tr>
								<td><?php echo $id;?></td>
								<td><?php echo $dersAdi;?></td>
								<td><?php echo $vize;?></td>
								<td><?php echo $final;?></td>
								<td><?php echo $ortalama;?></td>
								<td><?php echo $durum;?></td>
							</tr>
					<?php
						}
					?>
				</table>
			</div>