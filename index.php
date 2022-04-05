<?php
$bandaraAsal = [
  "Soekarno-Hatta" => 65000,
  "Husein Sastranegara" => 50000,
  "Abdul Rahman Saleh" => 40000,
  "Juanda" => 30000
];
ksort($bandaraAsal);


$bandaraTujuan = [
  "Ngurah Rai" => 85000,
  "Hasanuddin" => 70000,
  "Inanwantan" => 90000,
  "Sultan Iskandar Muda" => 60000
];
ksort($bandaraTujuan);

function pajakAsal($bandaraAsal, $asal)
{
  $hargaPajak = $bandaraAsal[$asal];
  return $hargaPajak;
}

function pajakTujuan($bandaraTujuan, $tujuan)
{
  $hargaPajak = $bandaraTujuan[$tujuan];
  return $hargaPajak;
}

function hitungTotalPajak($bandaraAsal, $asal, $bandaraTujuan, $tujuan)
{
  $hargaPajakAsal = pajakAsal($bandaraAsal, $asal);
  $hargaPajakTujuan = pajakTujuan($bandaraTujuan, $tujuan);
  $totalPajak = $hargaPajakAsal + $hargaPajakTujuan;
  return $totalPajak;
}

function hitungTotalHargaTiket($hargaTiket, $totalPajak)
{
  $totalHargaTiket = $hargaTiket + $totalPajak;
  return $totalHargaTiket;
}

function rupiah($angka)
{
  $hasil = "Rp " . number_format($angka, 0, ',', '.');
  return $hasil;
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
      color: white;
    }

    .bg {
      /* The image used */
      background-image: url("img/pesawat.jpg");

      /* Full height */
      height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;

      padding-top: 3%;
    }

    .box {
      background: rgba(0, 0, 0, .5);
      border: 1px dotted grey;
      padding: 2% 3%;
      border-radius: 20px;
    }

    .border-right-style {
      border-right: 1px dotted grey;
    }

    .white-colored {
      color: white;
    }

    .myButton {
      box-shadow: inset 0px 1px 0px 0px #fff6af;
      background: linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
      background-color: #ffec64;
      border-radius: 8px;
      display: inline-block;
      cursor: pointer;
      color: #ffffff;
      font-family: Verdana;
      font-size: 12px;
      padding: 9px 30px;
      text-decoration: none;
    }

    .myButton:hover {
      background: linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
      background-color: #ffab23;
    }

    .myButton:active {
      position: relative;
      top: 1px;
    }
  </style>
  <title>Pendaftaran Rute Penerbangan</title>
</head>

<body class="bg">
  <h1 class="text-center mb-5 mt-3 white-colored" data-aos="fade-down" data-aos-duration="1500">Pendaftaran Rute Penerbangan</h1>
  <div class="container mt-5 box" data-aos="fade-down" data-aos-duration="1500">
    <div class="row">
      <div class="col-md-6 border-right-style ps-2 pe-4">
        <form class="" action="" method="POST">
          <input type="hidden" name="tanggal" value="<?php echo date("d-m-Y"); ?>">

          <div class="mb-3">
            <label><strong>Nama Maskapai</strong></label>
            <input class="form-control" type="text" name="namaMaskapai" required>
          </div>

          <div class="mb-3">
            <label><strong>Bandara Asal</strong></label>
            <select class="form-control" name="bandaraAsal">
              <?php
              foreach ($bandaraAsal as $asal => $pajakAsal) {
              ?>
                <option value="<?= $asal; ?>"><?= $asal; ?></option>
              <?php
              }
              ?>
            </select>

          </div>

          <div class="mb-3">
            <label><strong>Bandara Asal</strong></label>
            <select class="form-control" name="bandaraTujuan" id="">
              <?php
              foreach ($bandaraTujuan as $tujuan => $pajakTujuan) {
              ?>
                <option value="<?= $tujuan; ?>"><?= $tujuan; ?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="mb-4">
            <label><strong>Harga Tiket</strong></label>
            <input class="form-control" type="number" name="hargaTiket" required>
          </div>

          <div class="mb-3">
            <input class="myButton w-100" type="submit" value="Daftar" name="daftar">
          </div>


        </form>
      </div>
      <div class="col-md-6">
        <!-- Kotak Disebelahnya  -->
        <table class="mt-3" cellpadding="10" data-aos="flip-up" data-aos-duration="1500" data-aos-delay="500">
          <?php
          if (isset($_POST['daftar'])) {
            $tanggal = $_POST['tanggal'];
            $maskapai = $_POST['namaMaskapai'];
            $asal = $_POST['bandaraAsal'];
            $tujuan = $_POST['bandaraTujuan'];
            $hargaTiket = $_POST['hargaTiket'];
            $pajak = hitungTotalPajak($bandaraAsal, $asal, $bandaraTujuan, $tujuan);
            $totalHargaTiket = hitungTotalHargaTiket($_POST['hargaTiket'], $pajak);

          ?>
            <tr>
              <td><strong><?php echo "Nomor" ?></strong></td>
              <td>:</td>
              <td><?php echo (rand(1000000, 9999999)); ?></td>
            </tr>


            <tr>
              <td><strong><?php echo "Tanggal" ?></strong></td>
              <td>:</td>
              <td><?php echo "$tanggal" ?></td>
            </tr>

            <tr>
              <td><strong><?php echo "Nama Maskapai" ?></strong></td>
              <td>:</td>
              <td><?php echo "$maskapai" ?></td>
            </tr>

            <tr>
              <td><strong><?php echo "Asal Penerbangan" ?></strong></td>
              <td>:</td>
              <td><?php echo "$asal" ?></td>
            </tr>

            <tr>
              <td><strong><?php echo "Tujuan Penerbangan" ?></strong></td>
              <td>:</td>
              <td><?php echo "$tujuan" ?></td>
            </tr>

            <tr>
              <td><strong><?php echo "Harga Tiket" ?></strong></td>
              <td>:</td>
              <td><?php echo "" . rupiah($hargaTiket) ?></td>
            </tr>

            <tr>
              <td><strong><?php echo "Pajak" ?></strong></td>
              <td>:</td>
              <td><?php echo "" . rupiah($pajak) ?></td>
            </tr>

            <tr>
              <td><strong><?php echo "Total Harga Tiket" ?></strong></td>
              <td>:</td>
              <td><?php echo "" . rupiah($totalHargaTiket) ?></td>
            </tr>
          <?php

          } else {
          ?>

            <tr>
              <td><strong><?php echo "Nomor" ?></strong></td>
              <td>:</td>
              <td><?php echo "-"; ?></td>
            </tr>

            <tr>
              <td><strong><?php echo "Tanggal" ?></strong></td>
              <td>:</td>
              <td>-</td>
            </tr>

            <tr>
              <td><strong><?php echo "Nama Maskapai" ?></strong></td>
              <td>:</td>
              <td>-</td>
            </tr>

            <tr>
              <td><strong><?php echo "Asal Penerbangan" ?></strong></td>
              <td>:</td>
              <td>-</td>
            </tr>

            <tr>
              <td><strong><?php echo "Tujuan Penerbangan" ?></strong></td>
              <td>:</td>
              <td>-</td>
            </tr>

            <tr>
              <td><strong><?php echo "Harga Tiket" ?></strong></td>
              <td>:</td>
              <td>-</td>
            </tr>

            <tr>
              <td><strong><?php echo "Pajak" ?></strong></td>
              <td>:</td>
              <td>-</td>
            </tr>

            <tr>
              <td><strong><?php echo "Total Harga Tiket" ?></strong></td>
              <td>:</td>
              <td>-</td>
            </tr>
          <?php

          }
          ?>
        </table>
      </div>

    </div>





  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>