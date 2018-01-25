<?php
include("veri.php");//veritabanı bağlantımızı sayfamıza ekliyoruz.
?>
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
		<a href="index.php" style="margin-left:40%; width:20%; " class="btn btn-danger btn-lg">ANASAYFAYA DÖN..!</a>
		</div>
		<div class="container">
			<div class="col-md-6">
				<form action="" method="post">
					<table class="table">
						<tr>
							<td>DERS</td>
							<td><input type="text" name="ders" class="form-control" ></td>
						</tr>
						
						<tr>
							<td>ÖĞRENCİ NUMARASI</td>
							<td><input type="text" name="ogrNo" class="form-control" ></td>
						</tr>
						
						
						<tr>
							<td>VİZE NOTU</td>
							<td><input type="text" name="vize" class="form-control" ></td>
						</tr>
						
						<tr>
							<td>FİNAL NOTU</td>
							<td><input type="text" name="final" class="form-control" ></td>
						</tr>
						
					
						
						<tr>
							<td></td>
							<td><input class="btn btn-primary"  type="submit" value="Yeni Veri Ekle"></td>
						</tr>
						
						
					</table>
					
				</form>
				<?php
					if($_POST) { //sayfada post olup olmadığını kontrol ediyoruz.
						$ders=$_POST['ders'];//sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz.
						$ogrNo=$_POST['ogrNo'];
						$vize=$_POST['vize'];
						$final=$_POST['final'];
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
						if($ders<>"" && $ogrNo<>""){ //veri alanlarının dolu olup olmadığı kontrol ediliyor.
							if($baglanti->query("insert into notlis(ogrNo, dersAdi, vize, final, ortalama, durum) values ('$ogrNo','$ders','$vize','$final','$ortalama','$durum')"))//veri ekleme sorgumuzu yazıyoruz.
							{
								echo "Veri Ekleme Başarılı..";
							}
							else
							{
								echo "Veri Ekleme Başarısız.. ";
							}
						}						
					}
				?>
			</div>
			<div class="col-md-7">
				<table class="table">
					<tr>
						<th>ID</th>
						<th>DERS</th>
						<th>ÖĞRENCİ NUMARASI</th>
						<th>VİZE NOTU</th>
						<th>FİNAL NOTU</th>
						<th>ORTALAMA NOTU</th>
						<th>GEÇTİ/KALDI</th>
					</tr>
					<?php 
						$sorgu = $baglanti->query("SELECT * FROM notlis"); // notlistesi tablosundaki tüm verileri çekiyoruz.
						while ($sonuc=$sorgu->fetch(PDO::FETCH_ASSOC)){
							$id=$sonuc['id'];
							$ogrNo=$sonuc['ogrNo'];
							$dersAdi=$sonuc['dersAdi'];
							$vize=$sonuc['vize'];
							$final=$sonuc['final'];
							$ortalama=$sonuc['ortalama'];
							$durum=$sonuc['durum'];
						
					?>
					
							<tr>
								<td><?php echo $id;?></td>
								<td><?php echo $dersAdi;?></td>
								<td><?php echo $ogrNo;?></td>
								<td><?php echo $vize;?></td>
								<td><?php echo $final;?></td>
								<td><?php echo $ortalama;?></td>
								<td><?php echo $durum;?></td>
								<td><a href="duzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
								<td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
							</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>