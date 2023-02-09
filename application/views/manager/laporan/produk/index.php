<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Laporan Produk</h2>
        </div>
    </header>
    <!-- Page Daftar Produk-->
    <section class="tables">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Page Daftar Produk-->
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class="card-header d-flex align-items-center">
                            <h3 class="h4"></h3>
                        </div> -->
                        <!-- <div class="row mt-4">
                            <div class="col-lg-9 ml-4">
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                        <form class="form-group row ml-2" action="<?= base_url('manager/laporan/penjualan'); ?>"
                            method="post">
                            <div class="col-sm-3">
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="tgl_awal" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir" class="form-control">
                            </div>
                            <div class="col-sm-3 pt-2">
                                <br>
                                <button class="btn btn-info">
                                    Cari
                                </button>
                            </div>
                        </form> -->
                        <div class="card-body ml-4">
                            <div class="row justify-content-end mr-3">
                                <!-- <button class="btn btn-success mb-2"><i class="fa fa-print"></i> Cetak Laporan</button> -->
                                <a class="btn btn-success mb-2" style="text-decoration:none"
                                    href="<?= base_url('manager/laporan/produk/laporan'); ?>" target="_BLANK">
                                    <i class="fa fa-print"></i>
                                    Cetak Laporan
                                </a>
                            </div>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>