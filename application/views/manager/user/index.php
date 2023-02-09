<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Daftar Pegawai</h2>
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
                            <h3 class="h4">Daftar Pegawai</h3>
                        </div> -->
                        <div class="row mt-4">
                            <div class="col-lg-9 ml-4">
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                        <div class="card-body ml-4">
                            <button type="button" class="btn btn-outline-success row" data-toggle="modal"
                                data-target="#adduser">
                                <i class="fa fa-plus-square"></i> Tambah Pegawai
                            </button><br><br>
                            <div class="">
                                <table id="table_user" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th>Waktu Pendaftaran</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($user as $usr):?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td><?php echo $usr['nama_user']; ?></td>
                                            <td><?php echo $usr['jenis_kelamin']; ?></td>
                                            <td><?php echo $usr['jabatan']; ?></td>
                                            <td><?php echo $usr['created_at']; ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-info btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#modal_detailuser<?= $usr['id']; ?>">
                                                    <i class="fa fa-info ml-1 mr-1"></i>
                                                </button>
                                                <form action="<?= base_url('manager/user/deleteuser/') ?>" method="POST"
                                                    class="d-inline">
                                                    <input type="hidden" name="id" value="<?= $usr['id']; ?>">
                                                    <button class="btn btn-outline-danger btn-sm"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
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
        </div>
    </section>
</div>
<!-- Modal add user-->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('manager/user/adduser') ?>" enctype="multipart/form-data" method="post"
                    class="needs-validation" novalidate>
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_profil" name="foto_profil" required>
                            <label class="custom-file-label" for="foto_profil">Foto</label>
                            <div class="invalid-feedback">
                                Foto tidak boleh kosong!
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Username </label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                        <div class="invalid-feedback">
                            Username tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_user" placeholder="Nama" required>
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password </label>
                        <input type="password" class="form-control" name="pass" placeholder="Password" required>
                        <div class="invalid-feedback">
                            Password tidak boleh kosong!
                        </div>
                    </div>
                    <div class=" form-group">
                        <label>Konfirmasi Password </label>
                        <input type="password" class="form-control" name="pass_confirm"
                            placeholder="Konfirmasi Password" required>
                        <div class="invalid-feedback ">
                            Password Konfirmasi tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                        <input id="jenis_kelamin" type="radio" value="Laki-laki" name="jenis_kelamin" required>
                        <label for="Jenis Kelamin">Laki-laki</label>
                        <input id="jenis_kelamin" type="radio" value="Perempuan" name="jenis_kelamin" required>
                        <label for="Jenis Kelamin">Perempuan</label>
                        <div class="invalid-feedback">
                            Jenis kelamin tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="legendabatik10@gmail.com"
                            required>
                        <div class="invalid-feedback">
                            Jenis kelamin tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>No. Hp</label>
                        <input type="number" class="form-control" name="no_hp" placeholder="081234567899" required>
                        <div class="invalid-feedback">
                            No. Hp tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Foto Ktp</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto_ktp" name="foto_ktp" required>
                            <label class="custom-file-label">Foto Ktp</label>
                            <div class="invalid-feedback">
                                Foto Ktp tidak boleh kosong!
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label> <br>
                        <input type="radio" value="Manager" name="jabatan" required>
                        <label>Manager</label>
                        <input type="radio" value="Kasir" name="jabatan" required>
                        <label>Kasir</label>
                        <div class="invalid-feedback">
                            Jabatan tidak boleh kosong!
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-danger">Reset</button>
                <button type="submit" class="btn btn-outline-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End modal add user-->

<!-- Modal detail user -->
<?php $no = 1; 
foreach ($user as $usr) : $no++; ?>
<div class="modal fade" id="modal_detailuser<?= $usr['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <button type="button" class="btn btn-link" data-toggle="modal"
                            data-target="#detailfoto_profil<?= $usr['id']; ?>">
                            <img class="rounded" src="<?= base_url('assets/img/user/') . $usr['foto_profil'];?>"
                                width="150">
                        </button>
                    </div>
                    <div class="form-group col-sm-8">
                        <div class="row ml-1">
                            <label class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext"
                                    value=": <?= $usr['nama_user'];?>">
                            </div>
                            <label class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext"
                                    value=": <?= $usr['username'];?>">
                            </div>
                            <label class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext"
                                    value=": <?= $usr['jenis_kelamin'];?>">
                            </div>
                            <label class="col-sm-4 col-form-label">No. Hp</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext"
                                    value=": <?= $usr['no_hp'];?>">
                            </div>
                            <label class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext"
                                    value=": <?= $usr['email'];?>">
                            </div>
                            <label class="col-sm-4 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext"
                                    value=": <?= $usr['jabatan'];?>">
                            </div>
                            <label class="col-sm-4 col-form-label">Foto Ktp</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <input type="text" readonly class="form-control-plaintext" value=":">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-link" data-toggle="modal"
                                            data-target="#detailfoto_ktp<?= $usr['id']; ?>">
                                            <img class="rounded"
                                                src="<?= base_url('assets/img/user/') . $usr['foto_ktp'];?>"
                                                width="100">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            </div> -->
    </div>
</div>
</div>
<?php endforeach;?>
<!-- End modal detail user -->

<!-- Modal detail foto profil -->
<?php $no = 1; 
foreach ($user as $usr) : $no++; ?>
<div class="modal fade bd-example-modal-lg" id="detailfoto_profil<?= $usr['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="rounded" src="<?= base_url('assets/img/user/') . $usr['foto_profil'];?>" width="100%">
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- End modal detail foto profil -->

<!-- Modal detail foto ktp -->
<?php $no = 1; 
foreach ($user as $usr) : $no++; ?>
<div class="modal fade bd-example-modal-lg" id="detailfoto_ktp<?= $usr['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="rounded" src="<?= base_url('assets/img/user/') . $usr['foto_ktp'];?>" width="100%">
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- End modal detail foto ktp -->