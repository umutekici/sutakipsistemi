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

  		<?php
  			if(empty($_SESSION["giris_yapildi"]))
  			{
  		?>
    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <p class="lead">Su Takip Sistemi</p>
      </div>

      <div class="row">
        
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Yönetim Paneli Giriş</h4>
          <form class="needs-validation" novalidate method="POST" action="">

			

        <?php

    if(isset($_POST["giris"]))
    {
          if(!(@$_SESSION["kod"]))
              {
                  $_SESSION["kod"] =3;
                  if ($_SESSION["kod"] =3) {
                    ?>
                    <div class="alert alert-danger" role="alert">
            Bilgileriniz yanlış... Kalan Hakkınız(<?=$_SESSION["kod"]?>)
          </div>
                <?php
                  }
                  
              }
              else
              {
                  $count = $_SESSION["kod"] - 1;
                  $_SESSION["kod"] = $count;
                  if($_SESSION["kod"]==0)
                  {
                    die("Giriş hakkınız doldu.Lütfen daha sonra giriş yapınız");
                  }
                    ?>
                  
                    
            <div class="alert alert-danger" role="alert">
            Bilgileriniz yanlış... Kalan Hakkınız(<?=$_SESSION["kod"]?>)
          </div>
          <?php

              }
  
    $sorgu="SELECT * FROM musteri where kod=".$_POST["kod"];
    $sonuc=$baglanti->query($sorgu);
    $kayit=$sonuc->fetch_assoc();
   
    if($sonuc->num_rows>0)
    {
      if($kayit["yonetici"]==1)
      {
        $_SESSION["giris_yapildi"]=true;
        header("Location:yonetim.php");
      }
      if($kayit["yonetici"]==0)
      {
        ?>
         <div class="alert alert-warning" role="alert">
        Bu kayıt yönetici kaydı değil
      </div>
      <?php
      }


    }
    else
    {
      ?>
      <div class="alert alert-warning" role="alert">
        Bu kayıt yönetici kaydı değil
      </div>
      <?php
    }

    }
?>
			<hr class="mb-4">
            <div class="mb-3">
              <label for="username">Yönetici Kodunuz</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">#sbh_yntc_</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="" name="kod" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

           
            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="giris">Giriş Yap</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Umut Ekici</p>
        <ul class="list-inline">
        </ul>
      </footer>
    </div>

    <?php
}
else
{
	header("Location:yonetim.php");
}

?>


  </body>
</html>



<?php
	$baglanti->close();
?>









