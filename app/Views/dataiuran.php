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
                                <a href="<?= base_url('iuran/add'); ?>" class="btn btn-out waves-effect waves-light btn-primary btn-square"><i class="fa fa-plus"></i> Add Data</a>
                                </p>
                            </div>
                            
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table id="datatableFbr" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Nama Warga</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            if($iuran): foreach($iuran as $row): 

                                                $bulan = $row['bulan'];
                                                if($bulan == '01'){ $bulan = 'Januari';
                                                }elseif($bulan == '02'){ $bulan = 'Februari';
                                                }elseif($bulan == '03'){ $bulan = 'Maret'; $bulan = 'April';
                                                }elseif($bulan == '05'){ $bulan = 'Mei';
                                                }elseif($bulan == '06'){ $bulan = 'Juni';
                                                }elseif($bulan == '07'){ $bulan = 'Juli';
                                                }elseif($bulan == '08'){ $bulan = 'Agustus';
                                                }elseif($bulan == '09'){ $bulan = 'September';
                                                }elseif($bulan == '10'){ $bulan = 'Oktober';
                                                }elseif($bulan == '11'){ $bulan = 'November';
                                                }elseif($bulan == '12'){ $bulan = 'Desember';
                                                }else{ $bulan = 'Tidak Diketahui';
                                                }
                                                
                                                $tgltransaksi = $row['tanggal'].' '.$bulan.' '.$row['tahun'];
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $no++; ?></th>
                                                    <td><?= $tgltransaksi; ?></td>
                                                    
                                                    <?php 
                                                    $query = $db->query('select namaWarga from warga where idWarga = '.$row['idWarga']);

                                                    foreach ($query->getResultArray() as $row2) {
                                                        echo "<td>".$row2['namaWarga']."</td>";
                                                    } ?>

                                                    <td><?php
                                                     $number = $row['jumlah'];

                                                     function convRupiah($value) {
                                                       return 'Rp ' . number_format($value, 0, ',', '.');
                                                     } 
                                                     
                                                     echo convRupiah($number);  ?></td>
                                                    <td><?= $row['keterangan'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('iuran/edit/'.$row['idIuran']); ?>" class="btn btn-sm waves-effect waves-light btn-primary btn-outline-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                        <a href="<?= base_url('iuran/delete/'.$row['idIuran']); ?>" class="btn btn-sm waves-effect waves-light btn-danger btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Delete</a>
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

<?= $this->include('template/footerforcontent');