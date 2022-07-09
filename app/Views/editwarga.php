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
                                <?php 
                                foreach($data as $row): 
                                
                                    $kelamin = [
                                        'L' => 'Laki-laki',
                                        'P' => 'Perempuan'
                                    ];
                                    $status = [
                                        '1' => 'Aktif',
                                        '0' => 'Tidak Aktif'
                                    ];
                                ?>
                                
                                <form class="form-material" action="<?= base_url('warga/update/'.$row['idWarga']) ?>" method="POST">
                                    <div class="form-group form-info form-static-label"">
                                        <input type="text" name="nik" class="form-control" value="<?= $row['nik']; ?>" readonly="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nomor Induk Kependudukan (NIK) | <i class="fa fa-ban"></i> NIK tidak dapat diubah</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="namaWarga" class="form-control" value="<?= $row['namaWarga']; ?>" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nama Lengkap</label>
                                    </div>
                                    <div class="form-group form-primary form-static-label">
                                        <?php echo form_dropdown('kelamin', $kelamin, $row['kelamin'], ['class' => 'form-control', 'required' => '']); ?>
                                        <label class="float-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <textarea name="alamat" class="form-control" required=""><?= $row['alamat']; ?></textarea>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Alamat Rumah</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="number" name="noRumah" class="form-control" value="<?= $row['noRumah']; ?>" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nomor Rumah</label>
                                    </div>
                                    <div class="form-group form-primary form-static-label">
                                        <?php echo form_dropdown('status', $status, $row['status'], ['class' => 'form-control', 'required' => '']); ?>
                                        <label class="float-label">Status Warga</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <button class="btn btn-out waves-effect waves-light btn-primary btn-square" name="save"><i class="fa fa-save"></i> Update</button>
                                </form>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('template/footerforcontent'); ?>