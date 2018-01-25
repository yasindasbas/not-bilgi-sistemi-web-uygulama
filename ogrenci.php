<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
	include("veri.php");
	
	$oNo=$_POST['ogrenci-no'];
	$oparola=$_POST['oparola'];
	
	$sorgu = $baglanti->query("SELECT ogrNo,ogrSıfre FROM ogrenci");
	$i=0;
	while($sonuc=$sorgu->fetch(PDO::FETCH_ASSOC)){
		$ogrNo=$sonuc['ogrNo'];
		$ogrparola=$sonuc['ogrSıfre'];
		
		if($oNo == $ogrNo && $oparola == $ogrparola){
			$i=1;
			?>
			<a href="notlistesi.php?oNo=<?php echo $oNo; ?>" style="margin-left:40%; width:20%;" class="btn btn-primary btn-lg">NOT LİSTESİNİ GÖR..!</a>
			<div class="ortala">
				<a href="index.php" style="margin-left:40%; width:20%; " class="btn btn-danger btn-lg">ANASAYFAYA DÖN..!</a>
			</div>
<?php	}
	} 
	if($i == 0){
		?>
		<div class="alert alert-warning" role="alert">
			HATALI GİRİŞ YAPTINIZ..!
		</div>
	<?php } ?>