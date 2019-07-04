<?php
session_start();
include("baglanti.php");
include("guncelle.php");
?>

<?php
	
	if(isset($_POST["sil"]))
	{
		$sorgu="DELETE FROM `musteri` WHERE `musteri`.`idmusteri` = ".$_POST["sil"];
		$baglanti->query($sorgu);
	}
?>


<?php
	
	if(isset($_POST["cikis"]))
	{

		session_destroy();
		header("Location:yonetim_giris.php");
		die();


	}
	if(empty($_SESSION["giris_yapildi"]))
	{
		header("Location:yonetim_giris.php");
		die();

	}
?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Umut EKİCİ</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
  </head>

  <body class="bg-light">
	<form action="" method="POST">
    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Yönetim Paneli</h2>
        <p class="lead">Su Takip Sistemi</p>
      </div>
<button name="cikis" type="submit">Çıkış</button>
      <div class="row">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Kod</th>
      <th scope="col">Ad Soyad</th>
      <th scope="col">Telefon</th>
      <th scope="col">Onay</th>
      <th scope="col">İşlem</th>
    </tr>
  </thead>
  <tbody>

  			<?php

  				$sorgu="SELECT * FROM musteri";
  				$sonuc=$baglanti->query($sorgu);
  				while ($kayit=$sonuc->fetch_assoc()) 
  				{
  					
  					?>
  				

		<tr>
			<td><?=$kayit["idmusteri"]?></td>
			<td><?=$kayit["kod"]?></td>
			<td><?=$kayit["ad_soyad"]?></td>
			<td><?=$kayit["telefon"]?></td>
			<td><?=$kayit["onay"]?></td>
			<td>
				<button name="duzenle" type="submit" value="<?=$kayit["idmusteri"]?>">Düzenle</button>
				<button name="sil" type="submit" value="<?=$kayit["idmusteri"]?>">Sil</button></td>
		</tr>
		<?php
	}
		?>
  </tbody>
  
  </table>
        
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Umut Ekici</p>
        <ul class="list-inline">
        </ul>
      </footer>
    </div>
</form>



  </body>
</html>













