<?= $this->include('template/headerforcontent'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

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
                                
                                    $drafttgl = $row['tanggal'];
                                    $draftbln = $row['bulan'];
                                    $thn = $row['tahun'];

                                    if(strlen($draftbln) == 1){
                                        $bln = '0'.$draftbln;
                                    }else{
                                        $bln = $draftbln;
                                    }
                        
                                    if(strlen($drafttgl) == 1){
                                        $tgl = '0'.$drafttgl;
                                    }else{
                                        $tgl = $drafttgl;
                                    }
                                    
                                    $tgll = $thn.'-'.$bln.'-'.$tgl;
                                ?>

                                <form class="form-material" action="<?= base_url('iuran/update/'.$row['idIuran']) ?>" method="POST">
                                    <div class="form-group form-info form-static-label">
                                        <input type="text" name="idWarga" class="typeahead form-control" value="<?= $row['idWarga']; ?>" required="" readonly>
                                        <span class="form-bar"></span>
                                        <label class="float-label">ID Warga | <i class="fa fa-ban"></i> ID Warga tidak dapat diubah</label>
                                    </div>
                                    <div class="form-group form-info form-static-label">
                                        <?php $db      = \Config\Database::connect();
                                            $query = $db->query('select namaWarga from warga where idWarga = '.$row['idWarga']);
                                            foreach ($query->getResultArray() as $row2) { ?>
                                            <input type="text" name="namaWarga" class="typeahead form-control" value="<?= $row2['namaWarga']; ?>" required="" readonly>
                                        <?php } ?>
                                        
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nama Warga | <i class="fa fa-ban"></i> Tidak dapat diubah</label>
                                    </div>
                                    <div class="form-group form-primary form-static-label">
                                        <input type="date" name="tanggal" class="form-control" value="<?= $tgll; ?>" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Tanggal Transaksi</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="jumlah" class="form-control" required="" value="<?= $row['jumlah']; ?>" id="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Jumlah Pembayaran</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <textarea name="keterangan" class="form-control" required=""><?= $row['keterangan']; ?></textarea>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Keterangan</label>
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

<script type="text/javascript">
    var path = "<?= base_url('autocomplete') ?>";
    $('input.typeahead').typeahead({
        source: function(query, process) {
            return $.get(path, {
                query: query
            }, function(data) {
                var data = $.parseJSON(data);
                return process(data);
            });
        }
    });
</script>

<?= $this->include('template/footerforcontent'); ?>