<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>NOT SİSTEMİ</title>
		<link rel="stylesheet" href="CSS.css">
	</head>
	<body>
		<form action="yonetici.php" method="POST">
			<section>
				<input class="giris-yap" type="text" name="akademisyen-no" placeholder="Akademisyen No"/>
				<input class="giris-yap" type="password" name="aparola" placeholder="Şifreniz"/>
				<button>GİRİŞ YAP</button>
				<h3>Şifremi Unuttum</h3><input class="radio-button" name="" value="" type="checkbox"/><h2>Beni Hatırla</h2>
			</section>
		</form>
		<form action="ogrenci.php" method="POST">
		
			<section>
				<input class="giris-yap" type="text" name="ogrenci-no" placeholder="Ögrenci Numarası"/>
				<input class="giris-yap" type="password" name="oparola" placeholder="Şifreniz"  />
				<button> GİRİŞ YAP </button>
				<h3>Şifremi Unuttum</h3><input class="radio-button" name="" value="" type="checkbox"/><h2>Beni Hatırla</h2>
			</section>
		</form>
	</body>
</html>	