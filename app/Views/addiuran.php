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
                                
                                <form class="form-material" action="<?= base_url('iuran/save') ?>" method="POST">
                                    <div class="form-group form-primary">
                                        <input type="text" name="nik" class="typeahead form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Nomor Induk Kependudukan (NIK)</label>
                                    </div>
                                    <div class="form-group form-primary form-static-label">
                                        <input type="date" name="tanggal" class="form-control" value="<?= date("Y-m-d"); ?>" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Tanggal Transaksi</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="jumlah" class="form-control" id="" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Jumlah Pembayaran</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <textarea name="keterangan" class="form-control" required=""></textarea>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Keterangan</label>
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