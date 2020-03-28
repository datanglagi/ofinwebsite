<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="This is a boilerplate for a Bootstrap 4.1.1 project">
    <meta name="keywords" content="HTML, CSS, JS, Sass, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Henrik H. Boelsmand">
    <title>Cek Up Oke Finansial</title>
      
    <link rel="shortcut icon" href="favicon.ico">

    <!-- build:css -->
    <link rel="stylesheet" href="assets/css/main.css">

    
   
  </head>

  <body>


<!-- Navigation -->
     <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img src="https://www.okefinansial.com/wp-content/uploads/2019/11/logoofinbaru.png">
          </a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
         
        </div>
      </nav>
    
<header>
  
</header>

<!-- Page Content -->

<!-- Portofolio Section -->

<div class="container">
  <h1 class="my-4">Financial Health Check UP</h1>



  <div class="deskripsi">  
    <h2>Yuk, cek kondisi kesehatan keuangan Anda</h2>
    <h3>Ketahui kondisi kesehatan Anda dalam waktu kurang dari 10 menit.</h3>
    <p>Anda dapat mengetahui kondisi likuiditas, utang, tabungan, solvabilitas dan lainnya hanya dengan mengisi data-data yang dibutuhkan. Sistem kami akan melakukan pengecekan dan hasil pengecekan akan segera dikirim ke email Anda. </p>
  </div>
  
<div class="container">
  <form method="post" action="generatepdf.php"> 

    <div class="blue-border">
      <h5><b>Identitas</b></h5>
      
      <div class="form-group row">
        <label for="name" class="col-sm-4 col-form-label">Nama</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="name" placeholder="" name="name">
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
          <input type="email" class="form-control" id="email" placeholder="" name="email">
        </div>
      </div>

      <div class="form-group row">
        <label for="telepon" class="col-sm-4 col-form-label">Telepon</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="telepon" placeholder="" name="telepon">
        </div>
      </div>

      <div class="form-group row">
        <label for="kota" class="col-sm-4 col-form-label">Kota</label>
        <div class="col-sm-8">
          <input type="kota" class="form-control" id="kota" placeholder="" name="kota">
        </div>
      </div>

    </div>

    <br>

    <div class="blue-border">
      <h5><b>Pendapatan Bulanan</b></h5>
      
      <div class="form-group row">
        <label for="gaji" class="col-sm-4 col-form-label">Gaji</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="gaji" placeholder="Rp." name="gaji">
        </div>
      </div>

      <div class="form-group row">
        <label for="insentif" class="col-sm-4 col-form-label">Insentif, Bonus, Tunjangan</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="bonus" placeholder="Rp." name="bonus">
        </div>
      </div>

      <div class="form-group row">
        <label for="bisnis" class="col-sm-4 col-form-label">Pendapatan Bisnis</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="bisnis" placeholder="Rp." name="bisnis">
        </div>
      </div>

      <div class="form-group row">
        <label for="pasif" class="col-sm-4 col-form-label">Pendapatan Pasif</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="pasif" placeholder="Rp." name="pasif">
        </div>
      </div>
    </div>

    <br>

    <div class="blue-border">
      <h5><b>Pengeluaran Bulanan</b></h5>
      <div class="form-group row">
        <label for="pajak" class="col-sm-4 col-form-label">Pajak</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="pajak" placeholder="Rp." name="pajak">
        </div>
      </div>

      <div class="form-group row">
        <label for="donasi" class="col-sm-4 col-form-label">Donasi, Sedekah, Infak, Zakat dan Persepuluhan</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="donasi" placeholder="Rp." name="donasi">
        </div>
      </div>

      <div class="form-group row">
        <label for="tabungan" class="col-sm-4 col-form-label">Tabungan dan Investasi</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="tabungan" placeholder="Rp." name="tabungan">
        </div>
      </div>

      <div class="form-group row">
        <label for="premi" class="col-sm-4 col-form-label">Bayar Asuransi</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="premi" placeholder="Rp." name="premi">
        </div>
      </div>

      <div class="form-group row">
        <label for="kpr" class="col-sm-4 col-form-label">Cicilan KPR, KPA dan Kredit Bisnis</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="kpr" placeholder="Rp." name="kpr">
        </div>
      </div>

      <div class="form-group row">
        <label for="pinjaman" class="col-sm-4 col-form-label">Cicilan kartu kredit, KTA, pinjaman online</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="pinjaman" placeholder="Rp." name="pinjaman">
        </div>
      </div>

      <div class="form-group row">
        <label for="belanja" class="col-sm-4 col-form-label">Belanja Rumah Tangga</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="belanja" placeholder="Rp." name="belanja">
        </div>
      </div>

      <div class="form-group row">
        <label for="gaya" class="col-sm-4 col-form-label">Gaya Hidup</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="gaya" placeholder="Rp." name="gaya">
        </div>
      </div>
    </div>

    <br>

    <div class="blue-border">
      <h5><b>Aset</b></h5>
      
      <div class="form-group row">
        <label for="rumah" class="col-sm-4 col-form-label">Rumah Tinggal</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="rumah" placeholder="Rp." name="rumah">
        </div>
      </div>

      <div class="form-group row">
        <label for="kendaraan" class="col-sm-4 col-form-label">Kendaraan</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="kendaraan" placeholder="Rp." name="kendaraan">
        </div>
      </div>

      <div class="form-group row">
        <label for="asetlain" class="col-sm-4 col-form-label">Aset Lainnya</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="asetlain" placeholder="Rp." name="asetlain">
        </div>
      </div>
      <br />
    </div>

    <br>

    <div class="blue-border">
      <h5><b> Tabungan dan Investasi </b></h5>
      <div class="form-group row">
        <label for="deposito" class="col-sm-4 col-form-label">Tabungan dan Deposito</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="deposito" placeholder="Rp." name="deposito">
        </div>
      </div>

      <div class="form-group row">
        <label for="logam" class="col-sm-4 col-form-label">Logam Mulia</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="logam" placeholder="Rp." name="logam">
        </div>
      </div>

      <div class="form-group row">
        <label for="saham" class="col-sm-4 col-form-label">Obligasi, Reksadana, Saham dan Unit Link</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="saham" placeholder="Rp." name="saham">
        </div>
      </div>

      <div class="form-group row">
        <label for="investasi" class="col-sm-4 col-form-label">Investasi Sektor Real</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="investasi" placeholder="Rp." name="investasi">
        </div>
      </div>
      <br />
    </div>

    <br>

    <div class="blue-border">
      <h5><b> Kewajiban </b></h5>
      <div class="form-group row">
        <label for="kprkpa" class="col-sm-4 col-form-label">KPR, KPA, dan Kredit Bisnis</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="kprkpa" placeholder="Rp." name="kprkpa">
        </div>
      </div>

      <div class="form-group row">
        <label for="kreditmotor" class="col-sm-4 col-form-label">Kredit Motor, Mobil atau Pinjaman Online</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="kreditmotor" placeholder="Rp." name="kreditmotor">
        </div>
      </div>

      <div class="form-group row">
        <label for="kewajibanlain" class="col-sm-4 col-form-label">Kewajiban Lainnya</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="kewajibanlain" placeholder="Rp." name="kewajibanlain">
        </div>
      </div>

    </div>  
    
    <div class="col-md-12 mt-3 mb-2">
    <div class="text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    
  </form>
</div>
<script src='assets/js/currency.js' type="text/javascript"></script>
     
     <!-- /.container -->
  
     <!-- footer -->
<!-- Footer -->
<footer class="page-footer font-small indigo">

  <!-- Footer Links -->
  <div style="background-color: #002e5a;">
  <div class="container">

    <!-- Grid row-->
    <div class="row text-center d-flex justify-content-center pt-5 mb-3">

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a class="text-white" href="#!">About us</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a class="text-white" href="#!">Products</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a class="text-white" href="#!">Awards</a>
        </h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 mb-3">
        <h6 class="text-uppercase font-weight-bold">
          <a class="text-white" href="#!">Help</a>
        </h6>
      </div>
      <!-- Grid column -->


    </div>
    <!-- Grid row-->
    <hr class="rgba-white-light" style="margin: 0 15%;">

    <!-- Grid row-->
    <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

      <!-- Grid column -->
      <div class="col-md-8 col-12 mt-5 text-white">
        <p style="line-height: 1.7rem">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
          accusantium doloremque laudantium, totam rem
          aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
          explicabo.
          Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->
    <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

    <!-- Grid row-->
    <div class="row pb-3">

      <!-- Grid column -->
      <div class="col-md-12">

        <div class="mb-5 flex-center">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa-lg white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in fa-lg white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic">
            <i class="fab fa-pinterest fa-lg white-text"> </i>
          </a>

        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Links -->
  </div>
  <!-- Copyright -->
  <div class="footer-copyright text-center  text-white-50 py-3" style="background-color: #002044;">
    <a class="text-white" href="https://okefinansial.com/"> PT. Oke Finansial Indonesia</a>
    ©2019

  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
     <!-- Footer -->

    <!-- /. row -->
 

</body>
      <!DOCTYPE html>


</html>
