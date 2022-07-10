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
                                <a href="<?= base_url('warga/add'); ?>" class="btn btn-out waves-effect waves-light btn-primary btn-square"><i class="fa fa-plus"></i> Add Data</a>
                                </p>
                            </div>
                            
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table id="datatableFbr" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NIK</th>
                                                <th>Nama Warga</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat Rumah</th>
                                                <th>No Rumah</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            if($warga): foreach($warga as $row): 
                                            
                                                if($row['kelamin'] == 'L'){
                                                    $kelamin = 'Laki-laki';
                                                }else{
                                                    $kelamin = 'Perempuan';
                                                }

                                                if($row['status'] == '1'){
                                                    $status = 'Aktif';
                                                }else{
                                                    $status = 'Tidak Aktif';
                                                }
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $no++; ?></th>
                                                    <td><?= $row['nik']; ?></td>
                                                    <td><?= $row['namaWarga']; ?></td>
                                                    <td><?= $kelamin; ?></td>
                                                    <td><?= $row['alamat'] ?></td>
                                                    <td><?= $row['noRumah'] ?></td>
                                                    <td><?= $status ?></td>
                                                    <td>
                                                        <a href="<?= base_url('warga/edit/'.$row['idWarga']); ?>" class="btn btn-sm waves-effect waves-light btn-primary btn-outline-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                        <a href="<?= base_url('warga/delete/'.$row['idWarga']); ?>" class="btn btn-sm waves-effect waves-light btn-danger btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; else: ?>
                                                <tr>
                                                    <td colspan="8">Tidak ada data</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div> <?php // end of table-responsive ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('template/footerforcontent'); ?>