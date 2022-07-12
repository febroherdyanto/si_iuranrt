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
                                    <form action="<?= base_url('/unpaid/checks'); ?>" method="POST">
                                        <div class="row d-flex justify-content-center ">
                                            <div class="col col-sm-2">
                                                <select name="cekbulan" class="form-control" required>
                                                    <option value="">Pilih Bulan</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                            <div class="col col-sm-2">
                                                <select name="cektahun" class="form-control" required>
                                                    <option value="">Pilih Tahun</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                </select>
                                            </div>
                                            <div class="col col-sm-1">
                                                <button type="submit" name="cekunpaid" class="btn btn-md btn-out waves-effect waves-light btn-primary btn-square">Cek</button>
                                            </div>
                                        </div>
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('template/footerforcontent'); ?>