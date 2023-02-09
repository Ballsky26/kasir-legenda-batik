<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Profil</h2>
        </div>
    </header>
    <!-- Page Profil-->
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <!-- Page Daftar Produk-->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Pengaturan Profil</h3>
                        </div>
                        <div class="card-body">
                            <?php echo $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('manager/profile/editprofil') ?>" enctype="multipart/form-data"
                                method="post">
                                <div class="form-group row justify-content-center">
                                    <img class="rounded"
                                        src="<?= base_url('assets/img/user/') . $profil['foto_profil'];?>" width="235">
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-sm-3 custom-file">
                                        <input type="file" class="custom-file-input" id="foto_profil_baru"
                                            name="foto_profil">
                                        <label class="custom-file-label" for="foto_profil">Ganti foto</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="id" value="<?= $profil['id']; ?>">
                                        <input type="hidden" name="old_foto_profil"
                                            value="<?= $profil['foto_profil']; ?>">
                                        <input type="hidden" name="id" value="<?= $profil['id']; ?>">
                                        <input type="text" name="username" value="<?= $profil['username']; ?>"
                                            class="form-control" readonly>
                                        <!-- <div class="invalid-feedback"></div> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_user"
                                            value="<?= $profil['nama_user']; ?>">
                                        <?= form_error('nama_user', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password Lama</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="pass_old_db" value="<?= $profil['pass']; ?>">
                                        <input type="password" class="form-control" name="pass_old">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password Baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="pass_new">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="pass_confirm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jenis_kelamin"
                                            value="<?= $profil['jenis_kelamin']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email"
                                            value="<?= $profil['email']; ?>">
                                        <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No. Hp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_hp"
                                            value="<?= $profil['no_hp']; ?>">
                                        <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">Foto KTP</div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img class="rounded img-thumbnail"
                                                    src="<?= base_url('assets/img/user/') . $profil['foto_ktp'];?>">
                                            </div>
                                            <!-- <div class="col-sm-9">
                                            <div class="custom-file">                                                
                                                <input type="file" class="custom-file-input" id="foto_ktp"
                                                    name="foto_ktp_baru">
                                                <label class="custom-file-label" for="Foto KTP">Ganti Foto KTP</label>
                                            </div>
                                        </div> -->
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row justify-content-center">
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-outline-success btn-block">Update
                                            Profil
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>