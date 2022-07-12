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
                                <hr>    
                                <p class="text-center">
                                </p>
                            </div>
                            
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table id="datatableFbr" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Warga</th>
                                                <th>Bulan - Tahun Bayar</th>
                                                <th>No Rumah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; 
                                            
                                                foreach ($data as $row):
                                                    
                                                    if($row['bulan'] == '1'){ $bulan = 'Januari';
                                                    }elseif($row['bulan'] == '2'){ $bulan = 'Februari';
                                                    }elseif($row['bulan'] == '3'){ $bulan = 'Maret'; 
                                                    }elseif($row['bulan'] == '4'){ $bulan = 'April';
                                                    }elseif($row['bulan'] == '5'){ $bulan = 'Mei';
                                                    }elseif($row['bulan'] == '6'){ $bulan = 'Juni';
                                                    }elseif($row['bulan'] == '7'){ $bulan = 'Juli';
                                                    }elseif($row['bulan'] == '8'){ $bulan = 'Agustus';
                                                    }elseif($row['bulan'] == '9'){ $bulan = 'September';
                                                    }elseif($row['bulan'] == '10'){ $bulan = 'Oktober';
                                                    }elseif($row['bulan'] == '11'){ $bulan = 'November';
                                                    }elseif($row['bulan'] == '12'){ $bulan = 'Desember';
                                                    }else{ $row['bulan'] = 'Tidak Diketahui';
                                                    }
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $no++; ?></th>
                                                    <?php
                                                    $db      = \Config\Database::connect();
                                                    $db = db_connect();
                                                    $query = $db->query('select namaWarga from warga where idWarga = '.$row['idWarga']);
                                                    foreach ($query->getResultArray() as $row2) { echo "<td>".$row2['namaWarga']."</td>"; } ?>
                                                    <td><?= $bulan.' - '.$row['tahun']; ?></td>
                                                    <td><?= $row['keterangan']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
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