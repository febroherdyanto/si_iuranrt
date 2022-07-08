<?= $this->include('template/headerforcontent'); ?>

<!-- Page-header end -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                           <div class="card-header">
                                <h5><?= strtoupper($title); ?></h5>
                                
                                <p class="text-right">
                                
                                </p>
                            </div>
                            
                            <div class="card-block">
                                <!-- 
                                    // ===========================================================
                                    // =============== You Can Place the Data Here ===============
                                    // ===========================================================
                                -->
                                
                                <form class="form-material" action="<?= base_url('warga/save') ?>" method="POST">
                                    <div class="form-group form-primary">
                                        <input type="text" name="nik" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nomor Induk Kependudukan (NIK)</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="namaWarga" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nama Lengkap</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <select name="kelamin" class="form-control">
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-primary">
                                        <textarea name="alamat" class="form-control" required=""></textarea>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Alamat Rumah</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="number" name="noRumah" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nomor Rumah</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <select name="status" class="form-control">
                                            <option value="1" selected>Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-primary">
                                        <button class="btn btn-out waves-effect waves-light btn-primary btn-square" name="save"><i class="fa fa-save"></i> Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('template/footerforcontent'); ?>