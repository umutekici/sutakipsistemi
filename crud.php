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

          if(!empty($_SESSION["siparis_giris"]))
          {
          ?>
          <div class="container">
          <div class="alert alert-danger text-center mt-3" role="alert">
              Sipariş verebilmek için üye olmalısınız...
            </div>
          </div>
          <?php
           $_SESSION["siparis_giris"]=false;
           session_destroy();
          }
      
      ?>




    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>SU Takip Sistemi</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Kampanyalar</span>
            
            <?php

              if(empty($_POST["kaydet"]))
              {
                $sorgu="SELECT * FROM kampanya";
                $sonuc=$baglanti->query($sorgu);
                while ($kayit=$sonuc->fetch_assoc()) 
                {
                  if($kayit["tarih"]=="2018-05-12")
                {
            ?>

          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div class="text-warning">
                <h6 class="my-0"><?=$kayit["slogan"]?></h6>
                <small class="text-warning"><?=$kayit["icerik"]?></small>
              </div>
              <span class="text-warning"><?=$kayit["fiyat"]?> tl</span>
            </li>
            <?php

              }
              ?>

              <?php
                if(strtotime($kayit["tarih"])>strtotime("2018-05-12"))
                {
              ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div class="text-success">
                <h6 class="my-0"><?=$kayit["slogan"]?></h6>
                <small class="text-success"><?=$kayit["icerik"]?></small>
              </div>
              <span class="text-success"><?=$kayit["fiyat"]?> tl</span>
            </li>

              <?php
                }
              ?>

              <?php
                if(strtotime($kayit["tarih"])<strtotime("2018-05-12"))
                {
              ?>
              <li class="list-group-item d-flex justify-content-between lh-condensed mt-3">
              <div class="text-danger">
                <h6 class="my-0"><?=$kayit["slogan"]?></h6>
                <small><?=$kayit["icerik"]?></small>
              </div>
              <span class="text-danger"><?=$kayit["fiyat"]?> tl</span>
            </li>
          </ul>
                <?php
              }
              ?>

          <?php
             }
            }
          ?>



          <?php

          /*

          if(isset($_POST["liste_kaydet"]))
          {
            $sorgu="SELECT * FROM liste where eposta='".$_POST["eposta"]."' ";
            $sonuc=$baglanti->query($sorgu);
            if($sonuc->num_rows>0)
            {
              
              ?>
              <div class="alert alert-danger" role="alert">
                Daha önceden listeye kaydolmuşsunuz...
            </div>
            <?php

            }
            else
            {
              $sorgu2="INSERT INTO `liste` (`idliste`, `eposta`) VALUES (NULL, '".$_POST["eposta"]."');";
              $baglanti->query($sorgu2);
          
            }
          }

          */

          ?>
          
          <form class="card p-2" action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" name="eposta" placeholder="example@gmail.com">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary" name="liste_kaydet">Kaydet</button>
              </div>
            </div>
          </form>
        </div>
          <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Otomatik Su Siparişi İçin Müşteri Kaydı</h4>
          <form class="needs-validation" action="" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Adınız</label>
                <input type="text" class="form-control" id="firstName" placeholder="" name="ad" value="" >
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Soyadınız</label>
                <input type="text" class="form-control" id="lastName" placeholder="" name="soyad" value="" >
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Kod</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">#sab_</span>
                </div>
                <?php

                 
                  if(empty($_POST["kaydet"]))
                  {
                      $kod="SELECT * FROM musteri";
                      $sonuc=$baglanti->query($kod);

                      $kodlar=array();

                      while ($kayit=$sonuc->fetch_assoc()) {
                          
                          array_push($kodlar,$kayit["kod"]);
                      }

                      $max_kod=max($kodlar);

                      $mkod=$max_kod+1;
                  
                  ?>

                <input type="text" class="form-control" id="username" placeholder="" name="kod" disabled
                value="<?=$mkod?>"
                  <?php
                  }
                
                  ?>
                 style="text-align:center">
                <div class="input-group-prepend">
                  <span class="input-group-text">_uha#</span>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Telefon <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="email" name="telefon" placeholder="0 505 888 99 33">

            </div>

            <div class="mb-3">
              <label for="address">Adres</label>
              <textarea class="form-control" id="address" name="adres" placeholder="Çağış Kampüsü" > </textarea>

            </div>

            <div class="row">
              <div class="col-md-5 mb-6">
                <label for="country">İlçe</label>
                <select class="custom-select d-block w-100" name="ilce" id="country" >
                  <option value="">Choose...</option>
                  <option>Karesi</option>
                  <option>Altıeylül</option>
                </select>

				   </div>
				<div class="col-md-5 mb-6">
                <label for="country">İl</label>
                <select class="custom-select d-block w-100" name="il" id="country" >
                  <option value="">Choose...</option>
                  <option>Balıkesir</option>
                  <option>İstanbul</option>
                </select>

              </div>

         
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="sozlesme_kabul" value="1" id="same-address">
              <label class="custom-control-label" for="same-address">Sözleşmeyi kabul ediyorum...</label>
            </div>
           
            <hr class="mb-4">

            <h4 class="mb-3">Ödeme Yöntemi</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="odeme_yontemi" type="radio" value="kredi" class="custom-control-input" checked >
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="odeme_yontemi" type="radio" value="banka" class="custom-control-input" >
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="odeme_yontemi" type="radio" value="PayPal" class="custom-control-input" >
                <label class="custom-control-label" for="paypal">PayPal</label>
              </div>
            </div>
           
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="kaydet">Bilgilerimi Kaydet</button>
          </form>
        </div>
      </div>
      

      <?php
        
        if(isset($_POST["kaydet"]))
      	{
          $kod="SELECT * FROM musteri";
          $sonuc=$baglanti->query($kod);

          $kodlar=array();

          while ($kayit=$sonuc->fetch_assoc()) {
              
              array_push($kodlar,$kayit["kod"]);
          }

          $max_kod=max($kodlar);

          $mkod=$max_kod+1;

      		$yonetici=0;
      		$onay=0;
          
          $ad_soyad=$_POST["ad"]." ".$_POST["soyad"];
      		$sorgu="INSERT INTO `musteri` (`idmusteri`, `ad_soyad`, `kod`, `telefon`, `adres`, `ilce`, `il`, 
          `sozlesme_kabul`, `odeme_yontemi`, `onay`, `yonetici`) 
          VALUES (NULL, '".$ad_soyad."', '".$mkod."','".$_POST["telefon"]."', '".$_POST["adres"]."', 
          '".$_POST["ilce"]."', '".$_POST["il"]."', '".$_POST["sozlesme_kabul"]."', '".$_POST["odeme_yontemi"]."','".$onay."', '".$yonetici."');";
      		$baglanti->query($sorgu);


        }
      ?>
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








