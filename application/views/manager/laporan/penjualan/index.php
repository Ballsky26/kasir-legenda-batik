<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Laporan Penjualan</h2>
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
                        <div class="row mt-4">
                            <div class="col-lg-4 ml-4">
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                        <form class="form-group row ml-2" action="<?= base_url('manager/laporan/penjualan'); ?>"
                            method="post">
                            <div class="col-sm-3">
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="tgl_awal" class="form-control"
                                    value="<?= set_value('tgl_awal'); ?>">
                            </div>
                            <div class="col-sm-3">
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir" class="form-control"
                                    value="<?= set_value('tgl_akhir'); ?>">
                            </div>
                            <div class="col-sm-4 pt-2">
                                <br>
                                <button class="btn btn-info" name="btncari">
                                    Cari
                                </button>
                                <!-- <a class="btn btn-success" style="text-decoration:none"
                                    href="<?= base_url('manager/laporan/penjualan/laporan'); ?>" target="_BLANK">
                                    <i class="fa fa-print"></i>
                                    Cetak Laporan Harian
                                </a> -->
                            </div>
                        </form>
                        <form class="form-group row ml-2" target="_BLANK"
                            action="<?= base_url('manager/laporan/penjualan/laporan'); ?>" method="post">
                            <div class="col-sm-6">
                                <input type="hidden" name="tgl_awal" class="form-control"
                                    value="<?= set_value('tgl_awal'); ?>">
                                <input type="hidden" name="tgl_akhir" class="form-control"
                                    value="<?= set_value('tgl_akhir'); ?>">
                                <button type="submit" class="btn btn-success" name="cetak">
                                    <i class="fa fa-print"></i>
                                    Cetak Laporan
                                </button>
                            </div>
                        </form>
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
                                        if ($laporan_inputan) {
                                        $no = 1;
                                            foreach ($laporan_inputan as $lpr):?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?>.</td>
                                            <td class="text-center"><?php echo $lpr['kode_transaksi']; ?></td>
                                            <td class="text-center"><?php echo $lpr['username']; ?></td>
                                            <td><?php echo $lpr['nama_produk']; ?></td>
                                            <td class="text-center"><?php echo $lpr['size']; ?></td>
                                            <td class="text-center"><?php echo $lpr['jumlah']; ?></td>
                                            <td class="text-center"><?php echo $lpr['harga']; ?></td>
                                            <td class="text-center"><?php echo $lpr['harga'] * $lpr['jumlah']; ?></td>
                                            <td class="text-center"><?php echo $lpr['tanggal']; ?></td>
                                        </tr>
                                        <?php endforeach;
                                        }else if ($laporan) {
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
                                            <td class="text-center"><?php echo $lpr['harga'] * $lpr['jumlah']; ?></td>
                                            <td class="text-center"><?php echo $lpr['tanggal']; ?></td>
                                        </tr>
                                        <?php endforeach;
                                        }                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>