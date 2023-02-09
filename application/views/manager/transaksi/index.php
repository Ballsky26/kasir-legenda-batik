<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Transaksi</h2>
        </div>
    </header>
    <!-- Page Transaksi-->
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <!-- Page Produk-->
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Daftar Produk</h3>
                        </div>
                        <div class="row ml-3 mt-4">
                            <div class="col-lg-9">
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                            <div class="card-body">
                                <table id="transaksi" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <!-- <th>Kode Produk</th> -->
                                            <th>Nama Produk</th>
                                            <th width="10px">Size</th>
                                            <th width="90px">Harga</th>
                                            <th width="10px">Jumlah</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $no = 1;
                                                foreach ($produk as $pdk):?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $no++; ?>.
                                            </td>
                                            <td>
                                                <?= $pdk['nama_produk']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $pdk['size']; ?>
                                            </td>
                                            <td>
                                                Rp. <?= number_format($pdk['harga'],2); ?>
                                            </td>
                                            <td>
                                                <div class="form-row">
                                                    <form action="<?= base_url('manager/transaksi/add'); ?>"
                                                        method="post" class="needs-validation" novalidate>
                                                        <input type="hidden" name="id_produk"
                                                            value="<?= $pdk['id']; ?>">
                                                        <input type="hidden" name="kode_transaksi"
                                                            value="<?= create_kodetransaksi() ?>">
                                                        <input type="hidden" name="nama_produk"
                                                            value="<?= $pdk['nama_produk']; ?>">
                                                        <input type="hidden" name="size" value="<?= $pdk['size']; ?>">
                                                        <input type="hidden" name="harga" id="harga"
                                                            value="<?= $pdk['harga']; ?>" readonly>
                                                        <!-- <input type="text" name="harga_total" id="harga_total" readonly> -->
                                                        <input type="number"
                                                            class="form-control-plaintext border-bottom" id="jumlah"
                                                            name="jumlah" required>
                                                        <div class="invalid-feedback">
                                                            Jumlah tidak boleh kosong!
                                                        </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button type="submit" class="btn btn-outline-success btn-sm mb-2">
                                                    <i class="fa fa-plus-square"></i>
                                                </button>
                                                </form>
                                                <button type="button" class="btn btn-outline-info btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#modal_detailproduk<?= $pdk['id']; ?>">
                                                    <i class="fa fa-info ml-1 mr-1"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Total-->
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Transaksi</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="total" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Kode Transaksi</th>
                                            <th>Nama Produk</th>
                                            <th>Size</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Sub Total</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (  $transaksi){ ?>
                                        <?php
                                            $no = 1;
                                            foreach ($transaksi as $trk):?>
                                        <tr>
                                            <td class="text-center"> <?php echo $no++; ?>.</td>
                                            <td><?= $trk['kode_transaksi']; ?></td>
                                            <td><?= $trk['nama_produk']; ?></td>
                                            <td class="text-center"><?= $trk['size']; ?></td>
                                            <td class="text-center"><?= $trk['jumlah']; ?></td>
                                            <td>Rp. <?= number_format($trk['harga'],2); ?></td>
                                            <td>Rp. <?= number_format($trk['harga'] * $trk['jumlah'],2); ?></td>
                                            <td class="text-center">
                                                <form action="<?= base_url('manager/transaksi/delete'); ?>"
                                                    method="post">
                                                    <input type="hidden" name="id" value="<?= $trk['id']; ?>">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
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
                                            <td class="text-center" colspan="8">
                                                <form action="<?= base_url('manager/transaksi/total'); ?>"
                                                    method="post">
                                                    <input type="hidden" name="kode_transaksi"
                                                        value="<?= $trk['kode_transaksi']; ?>">
                                                    <input type="hidden" name="username"
                                                        value="<?= $profil['username']; ?>">
                                                    <input type="hidden" name="jumlahT" value="<?= $total_jumlah; ?>">
                                                    <input type="hidden" name="sub_total" value="<?= $total;?>">
                                                    <button class="btn btn-outline-success pl-5 pr-5">Bayar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } else { ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Belom ada produk yang dipilih!</td>
                                        </tr>
                                        <?php } ?>

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
<!-- Modal detail produk-->
<?php
    $no = 1;
    foreach ($produk as $pdk) : $no++; ?>
<div class="modal fade" id="modal_detailproduk<?= $pdk['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?= $pdk['nama_produk']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <img class="rounded" src="<?= base_url('assets/img/produk/') . $pdk['foto_produk'];?>"
                            width="150">
                    </div>
                    <div class="form-group col-sm-8">
                        <div class="row ml-1">
                            <label class="col-sm-3 col-form-label">Merk</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext"
                                    value=": <?= $pdk['merk'];?>">
                            </div>
                            <label class="col-sm-3 col-form-label">Size</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext"
                                    value=": <?= $pdk['size'];?>">
                            </div>
                            <label class="col-sm-3 col-form-label">Stok</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext"
                                    value=": <?= $pdk['stok'];?>">
                            </div>
                            <label class="col-sm-3 col-form-label">Harga</label>
                            <div class="col-sm-8 mb-5">
                                <input type="text" readonly class="form-control-plaintext"
                                    value=": Rp. <?= number_format($pdk['harga'],2); ?>">
                            </div>
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="button" class="btn btn-light btn-block"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- End modal detail produk-->