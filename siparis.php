<?php
include("baglanti.php");
session_start();
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

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
          <h2>Su Takip Sistemi</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Sipariş Vermek İçin Formu Doldurun</h4>
          <form class="needs-validation" novalidate action="" method="POST">

          			<?php
          		if(isset($_POST["siparisVer"]))
          		{
              
              $sorgu="SELECT * FROM musteri where kod=".$_POST["kod"];
          		$sonuc=$baglanti->query($sorgu);
          		$kayit=$sonuc->fetch_assoc();
          		if($sonuc->num_rows>0)
          		{
          			if($kayit["onay"]==1)
          			{
          			$sorgu2="INSERT INTO `siparis` (`idsiparis`, `musteri`, `tane`) VALUES 
          			(NULL, '".$_POST["kod"]."', '".$_POST["tane"]."')";
          			$baglanti->query($sorgu2);
          			?>
          				<div class="alert alert-success" role="alert">
			  			Siparişiniz başarıyla alındı.
						</div>
						<?php

          		    }
          		    if($kayit["onay"]==0)
          		    {
          		    	?>
          		    	<div class="alert alert-warning" role="alert">
			  			Müşteri kaydınız onaylanmamış.
						</div>
						<?php
          		    }
          		}
          		else
          	{ 
                $_SESSION["siparis_giris"]=true;
                header("Location:crud.php");
            }
          
          }

          	?>

			<hr class="mb-4">
            <div class="mb-3">
              <label for="username">Müşteri Kodunuz</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">#sbh_</span>
                </div>
                <input type="text" class="form-control" id="username" name="kod" placeholder="156" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>
			


           
            
            <hr class="mb-4">
			 <div class="mb-3">
                <label for="country">Kaç Tane</label>
                <select class="custom-select d-block w-100" id="country" name="tane" >
                  <option value="">Seçiniz...</option>
                  <option>1</option>
                  <option>2</option>
                </select>

				   </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="siparisVer">Sipariş Ver</button>
          </form>
        </div>
      </div>




      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Umut Ekici</p>
        <ul class="list-inline">
        </ul>
      </footer>
    </div>

  </body>
</html>



<?php
$baglanti->close();
?>









