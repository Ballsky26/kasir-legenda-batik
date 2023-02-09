<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan produk</title>
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
                    <h1 class="mb-4">Laporan Produk Legenda Batik</h1>
                    <div class="col-lg-12">
                        <div class="card">
                            <table id="table_user" class="table table-striped table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th>No.</th>
                                        <th>Kode</th>
                                        <th>Produk</th>
                                        <th>Size</th>
                                        <th>Stok</th>
                                        <th>Terjual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($laporan_produk as $produk):?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?>.</td>
                                        <td class="text-center"><?php echo $produk['kode_produk']; ?></td>
                                        <td><?php echo $produk['nama_produk']; ?></td>
                                        <td class="text-center"><?php echo $produk['size']; ?></td>
                                        <td class="text-center"><?php echo $produk['stok']; ?></td>
                                        <td class="text-center">
                                            <?php echo $produk['terjual']; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            Tanggal: <?= date('d-m-Y') ?>
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