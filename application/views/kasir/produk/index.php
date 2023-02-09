<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Produk</h2>
        </div>
    </header>
    <!-- Page Produk-->
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <!-- Page Daftar Produk-->
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Daftar Produk</h3>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-9 ml-4">
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-outline-success ml-1" data-toggle="modal"
                                data-target="#addproduk">
                                <i class="fa fa-plus-square"></i> Tambah Produk
                            </button><br><br>
                            <div class="table-responsiv ml-4">
                                <table id="produk" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Kode Produk</th>
                                            <th>Merk</th>
                                            <th>Nama Produk</th>
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
                                            <td class="text-center">
                                                <?= $pdk ['kode_produk']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $pdk ['merk']; ?>
                                            </td>
                                            <td>
                                                <?= $pdk['nama_produk']; ?>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-info btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#modal_detailproduk<?= $pdk['id']; ?>">
                                                    <i class="fa fa-info ml-1 mr-1"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#modal_editproduk<?= $pdk['id']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#modal_deleteproduk<?= $pdk['id']; ?>">
                                                    <i class="fa fa-trash"></i>
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
                <!-- Page Produk Habis-->
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Produk Habis</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsiv">
                                <table id="produkhabis" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Nama Produk</th>
                                            <th>Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($habis) {
                                            $no = 1;
                                            foreach ($habis as $habis):?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?>.</td>
                                            <td><?= $habis['nama_produk']; ?></td>
                                            <td class="text-center"><?= $habis['size']; ?></td>
                                        </tr>
                                        <?php endforeach;                                            
                                        }else{
                                        ?>
                                        <tr>
                                            <td colspan="3" class="text-center">Kosong</td>
                                        </tr>
                                        <?php    
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
<!-- Modal Add Produk-->
<form action="<?= base_url('kasir/produk/add'); ?>" method="post" enctype="multipart/form-data" class="needs-validation"
    novalidate>
    <div class="modal fade" id="addproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode produk</label>
                        <input type="text" class="form-control" name="kode_produk" value="<?= $kode ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Foto Produk</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_profil" name="foto_produk" required>
                            <label class="custom-file-label" for="foto_produk">Foto Produk</label>
                            <div class="invalid-feedback">
                                Foto tidak boleh kosong!
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <select name="merk" class="custom-select" required>
                            <option value="" selected disabled>Pilih brand</option>
                            <option value="Legenda batik">Legenda Batik</option>
                        </select>
                        <div class="invalid-feedback">
                            Kamu belum memilih brand!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama produk</label>
                        <input type="number" class="form-control" name="nama_produk" placeholder="Produk" required>
                        <div class="invalid-feedback">
                            Nama produk tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Size</label>
                        <select name="size" class="custom-select" required>
                            <option value="" selected disabled>Pilih size</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <div class="invalid-feedback">
                            Kamu belum memilih size!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="99" required>
                        <div class="invalid-feedback">
                            Stok tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input type="number" class="form-control" name="harga" placeholder="150000" required>
                        <div class="invalid-feedback">
                            Harga tidak boleh kosong!
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-danger">Reset</button>
                    <button type="submit" class="btn btn-outline-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End modal add produk-->
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
                <center>
                    <?php 
                    $qrcode = new \Endroid\QrCode\QrCode($pdk['kode_produk']);
                    $qrcode->writeFile('assets/img/produk/qrcode/'.$pdk['kode_produk'].'.png')
                    ?>
                    <img src="<?= base_url('assets/img/produk/qrcode/'.$pdk['kode_produk'].'.png')?>" width="70" alt="">
                    <br>
                    <?= $pdk['kode_produk'];?>
                </center><br>
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
<!-- Modal edit produk-->
<?php
    $no = 1;
    foreach ($produk as $pdk) : $no++; ?>
<form action="<?= base_url('kasir/produk/edit'); ?>" method="post" class="needs-validation" novalidate>
    <div class="modal fade" id="modal_editproduk<?= $pdk['id']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Produk</h5>
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
                                <div class="col-sm-9">
                                    <input type="hidden" name="id" value="<?= $pdk['id'];?>">
                                    <input type="text" readonly class="form-control" value="<?= $pdk['merk'];?>">
                                </div>
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $pdk['nama_produk'];?>">
                                </div>
                                <label class="col-sm-3 col-form-label">Size</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control" value="<?= $pdk['size'];?>">
                                </div>
                                <label class="col-sm-3 col-form-label">Stok</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="stok" value="<?= $pdk['stok'];?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Stok tidak boleh kosong!
                                    </div>
                                </div>
                                <label class="col-sm-3 col-form-label">Harga</label>
                                <div class="col-sm-9 mb-5">
                                    <input type="text" class="form-control" name="harga" value="<?= $pdk['harga'];?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Harga tidak boleh kosong!
                                    </div>
                                </div>
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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
</form>
<?php endforeach;?>
<!-- End modal edit produk-->

<!-- Modal delete produk -->
<?php
    $no = 1;
    foreach ($produk as $pdk) : $no++; ?>
<form action="<?= base_url('kasir/produk/delete'); ?>" enctype="multipart/form-data" method="post">
    <div class="modal fade" id="modal_deleteproduk<?= $pdk['id']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $pdk['id']; ?>">
                    <h5>Apakah anda yakin ingin menghapus produk ini?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-success">Iya</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php endforeach;?>
<!-- End modal delete produk -->