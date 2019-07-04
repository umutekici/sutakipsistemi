<?php
include("baglanti.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Umut EKİCİ</title>
</head>
<body>
		<?php

			if(isset($_POST["duzenle"]))
			{
				$sorgu="SELECT * FROM musteri where idmusteri=".$_POST["duzenle"];
				$sonuc=$baglanti->query($sorgu);
				$kayit=$sonuc->fetch_assoc();
		?>
        <div class="container mt-3">
    		<h4 class="mb-3">Otomatik Su Siparişi İçin Güncelle Formu</h4>
          
          <form class="needs-validation" action="" method="POST">
            
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Adınız Soyadınız</label>
                <input type="hidden" name="idmusteri" value="<?=$kayit["idmusteri"]?>">
                <input type="text" class="form-control" id="firstName" placeholder="" name="ad_soyad" 
                value="<?=$kayit["ad_soyad"]?>">
              </div>
              
            </div>

            <div class="mb-3">
              <label for="username">Kod</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">#sab_</span>
                </div>
				
                <input type="text" class="form-control" id="username" placeholder="156" name="kod" 
                value="<?=$kayit["kod"]?>" style="text-align:center">
  				<div class="input-group-prepend">
                  <span class="input-group-text">_uha#</span>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Telefon <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="email" name="telefon" value="<?=$kayit["telefon"]?>" placeholder="0 505 888 99 33">

            </div>

            <div class="mb-3">
              <label for="email">onay<span class="text-muted"></span></label>
              <input type="text" class="form-control" id="email" name="onay" value="<?=$kayit["onay"]?>" placeholder="0 505 888 99 33">

            </div>

             <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="guncelle">Bilgilerimi Güncelle</button>


		</form>
	 </div>

		<?php
		}
		?>

			<?php

				if(isset($_POST["guncelle"]))
				{
					$sorgu="UPDATE `musteri` SET `ad_soyad` = '".$_POST["ad_soyad"]."', 
					`telefon` = '".$_POST["telefon"]."',
					`onay` ='".$_POST["onay"]."' WHERE `musteri`.`idmusteri` =".$_POST["idmusteri"];
					$baglanti->query($sorgu);
				}

			?>

</body>
</html>