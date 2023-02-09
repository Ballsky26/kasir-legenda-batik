<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
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
<link rel="shortcut icon" href="<?= base_url('assets/') ?>img/logo.png">

<body>
    <div class="content-inner">
        <section class="tables">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <h1 class="mb-4">Laporan Penjualan Legenda Batik</h1>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ml-4">
                                <div class="">
                                    <table id="table_user" class="table table-striped table-bordered">
                                        <thead>
                                            <tr align="center">
                                                <th>No.</th>
                                                <th>Kode Transaksi</th>
                                                <th>Kasir</th>
                                                <th>Produk</th>
                                                <th>Size</th>
                                                <th>Jumlah</th>
                                                <th>Harga Satuan</th>
                                                <th>Sub Total</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $no = 1;
                                        foreach ($laporan as $lpr):?>
                                            <tr>
                                                <td class="text-center"><?php echo $no++; ?>.</td>
                                                <td class="text-center"><?php echo $lpr['kode_transaksi']; ?></td>
                                                <td class="text-center"><?php echo $lpr['username']; ?></td>
                                                <td><?php echo $lpr['nama_produk']; ?></td>
                                                <td class="text-center"><?php echo $lpr['size']; ?></td>
                                                <td class="text-center"><?php echo $lpr['jumlah']; ?></td>
                                                <td class="text-center"><?php echo $lpr['harga']; ?></td>
                                                <td class="text-center"><?php echo $lpr['harga'] * $lpr['jumlah']; ?>
                                                </td>
                                                <td class="text-center"><?php echo $lpr['tanggal']; ?></td>
                                                <!-- <td class="text-center">
                                                <button type="button" class="btn btn-outline-info btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#modal_detail<?= $lpr['kode_transaksi']; ?>">
                                                    <i class="fa fa-info ml-1 mr-1"></i>
                                                </button>
                                            </td> -->
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    Tanggal: <?= date('d-m-Y') ?>
                                </div>
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