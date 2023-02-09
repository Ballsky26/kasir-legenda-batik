<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <!-- <div class="container-fluid">
            <h2 class="no-margin-bottom">Struk Pembelian</h2>
        </div> -->
    </header>
    <!-- Page Daftar Produk-->
    <section class="tables">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Page Daftar Produk-->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header align-items-center">
                            <h1>Legenda Batik </h1>
                            <!-- <img width="100" class="rounded float-right" src="<?= base_url('assets/img/logo.png') ?>"> -->
                            <!-- <small>Kota Pekalongan, Pekalongan Selatan, Kradenan Gg.01</small><br> -->
                            <font size="1">
                                <div class="float-right">
                                    Tanggal: <?= date('d-m-Y') ?>
                                </div>
                                Kota Pekalongan, Pekalongan Selatan, Kradenan <br>
                            </font>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <font size="2">
                                    <div class="float-right">
                                        Kasir: <?= $profil['nama_user'] ?>
                                    </div>
                                    <div>
                                        Kode transaksi: <?= $kode_terakhir['kode_transaksi'] ?>
                                    </div>
                                </font>
                                <table id="total" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Nama Produk</th>
                                            <th>Size</th>
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
                                            <!-- <td><?= $trk['kode_transaksi']; ?></td> -->
                                            <td><?= $trk['nama_produk']; ?></td>
                                            <td class="text-center"><?= $trk['size']; ?></td>
                                            <td class="text-center"><?= $trk['jumlah']; ?></td>
                                            <td>Rp. <?= number_format($trk['harga'],2); ?></td>
                                            <td>Rp. <?= number_format($trk['harga'] * $trk['jumlah'],2); ?></td>
                                        </tr>
                                        <?php endforeach;?>
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                Total Harga
                                            </td>
                                            <td colspan="3" class="text-center">
                                                Rp. <?= number_format($total,2) ?>
                                            </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="" colspan="8">
                                                <form action="<?= base_url('kasir/struk/print') ?>" target="_blank"
                                                    method="post">
                                                    <button class="btn btn-outline-success float-right">
                                                        <i class="fa fa-print"></i> Cetak Struk
                                                    </button>
                                                </form>
                                                <form action="<?= base_url('kasir/transaksi') ?>" method="post">
                                                    <button class="btn btn-outline-danger float-right mr-3 >
                                                        <i class=" fa fa-left"></i>Kembali
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- <div class="text-center">
                                    <button onclick="javascript:window.print()"
                                        class="btn btn-outline-success pl-5 pr-5">
                                        <i class="fa fa-print"></i> Cetak Struk
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>