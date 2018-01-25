<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
	include("veri.php");
	
	$aNo=$_POST['akademisyen-no'];
	$aparola=$_POST['aparola'];
	
	$sorgu = $baglanti->query("SELECT yoneticiNo,yoneticiSifre FROM yonetici");
	$i=0;
	while($sonuc=$sorgu->fetch(PDO::FETCH_ASSOC)){
		$yoneticiNo=$sonuc['yoneticiNo'];
		$yoneticiSifre=$sonuc['yoneticiSifre'];
		
		if($aNo == $yoneticiNo && $aparola == $yoneticiSifre){
			$i=1;
			header("Location:ekle.php");
		}
	}
	if($i == 0){
		header("Location:index.php");
		?>
		<div class="alert alert-warning" role="alert">
			HATALI GİRİŞ YAPTINIZ..!
		</div>
		
	<?php } ?>