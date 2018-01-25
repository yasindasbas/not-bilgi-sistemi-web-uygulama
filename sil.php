<?php
	if ($_GET)
	{
		include("veri.php");
		
		if ($baglanti->query("DELETE FROM notlis WHERE id =".(int)$_GET['id']))
		{
			header("location:ekle.php");
		}
	}
?>