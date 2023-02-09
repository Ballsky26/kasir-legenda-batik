<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Manager</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="robots" content="all,follow">
<!-- Bootstrap CSS-->
<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css">
<!-- Datatable-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.semanticui.min.css">
<!-- Font Awesome CSS-->
<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/font-awesome/css/font-awesome.min.css">
<!-- Fontastic Custom icon font-->
<link rel="stylesheet" href="<?= base_url('assets/') ?>css/fontastic.css">
<!-- Google fonts - Poppins -->
<link rel="stylesheet" href="<?= base_url('assets/') ?>https://fonts.googleapis.com/css?family=Poppins:300,400,700">
<!-- theme stylesheet-->
<link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.default.css" id="theme-stylesheet">
<!-- Custom stylesheet - for your changes-->
<link rel="stylesheet" href="<?= base_url('assets/') ?>css/custom.css">
<!-- Favicon-->
<link rel="shortcut icon" href="<?= base_url('assets/') ?>img/logo.png>

<body>
    <div class="content-inner">
        <section class="tables">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <table align="center">
                            <thead>
                                <tr class="text-center">
                                    <th rowspan="2">
                                        <h1>
                                            Legenda Batik
                                        </h1>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td rowspan="2">
                                        +6285643308575<br>
                                        legendabatik10@gmail.com<br>
                                        Kradenan, Pekalongan Selatan<br>
                                        Kota Pekalongan, Jawa Tengah, 51132
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12">
                                =====================================
                            </div>
                            <div class="col-sm-5">
                                Kasir :<?= $profil['nama_user'] ?>
                            </div>
                            <div class="col-sm-7">
                                <span class="float-right">
                                    Tanggal :<?= date('d-m-Y') ?>
                                </span>
                            </div>
                            <div class="col-sm-7">
                                Transaksi :<?= $kode_terakhir['kode_transaksi'] ?>
                            </div>
                            <div class="col-sm-5 float-right">
                                <span class="float-right">
                                    Pukul :<?= date(' g:i a') ?>
                                </span>
                            </div>
                            <div class="col-sm-12">
                                =====================================
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                                $no = 1;
                                                foreach ($transaksi as $trk):?>
                                <tr>
                                    <td class="text-center"> <?php echo $no++; ?>.</td>
                                    <td><?= $trk['nama_produk']; ?></td>
                                    <td class="text-center"><?= $trk['jumlah']; ?></td>
                                    <td class="text-center">Rp. <?= number_format($trk['harga'],2); ?></td>
                                    <td class="text-center">Rp.
                                        <?= number_format($trk['harga'] * $trk['jumlah'],2); ?></td>
                                </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        -----------------------------------------------------------------------
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-center">
                                        Total Harga
                                    </td>
                                    <td colspan="2" class="text-center">
                                        Rp. <?= number_format($total,2) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        =========================================
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <h6>THANK YOU FOR SHIPPING AT <br> LEGENDA BATIK </h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>
    <script>
    window.print();
    </script>
</body>

</html>