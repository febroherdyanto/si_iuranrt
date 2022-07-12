<?php 


?>

<div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-purple">
                                                                    
                                                                    <?php $db      = \Config\Database::connect();
                                                                    $db = db_connect();
                                                                    
                                                                    $queryuang = $db->query("select sum(jumlah) as jumlahuang from iuran");
                                                                    $datauang = $queryuang->getResultArray();
                                                                    
                                                                    foreach ($datauang as $row) { 
                                                                        function buatRupiah($angka){
                                                                            $hasil = "Rp " . number_format($angka,0,',','.');
                                                                            return $hasil;
                                                                        }
                                                                        echo buatRupiah($row['jumlahuang']); } ?>
                                                                    
                                                                </h4>
                                                                <h6 class="text-muted m-b-0">Total Uang Kas</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa-solid fa-3x fa-file-invoice-dollar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0"><i>Updated data.</i></p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-green">
                                                                    <?php $db      = \Config\Database::connect();
                                                                    $db = db_connect();
                                                                    
                                                                    $querywarga = $db->query("select count(*) as jumlahwarga from warga");
                                                                    $datawarga = $querywarga->getResultArray();
                                                                    echo $datawarga[0]['jumlahwarga']; ?> Orang
                                                                    
                                                                </h4>
                                                                <h6 class="text-muted m-b-0">Jumlah Warga</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa-solid fa-3x fa-people-roof"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0"><i>Updated data.</i></p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red">Febro Herdyanto</h4>
                                                                <h6 class="text-muted m-b-0">312010043</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-user f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-red">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Link : <a href="https://febroherdyanto.id/" style="color: white">https://febroherdyanto.id</a></p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red">User Guide</h4>
                                                                <h6 class="text-muted m-b-0">Manual / Documentation</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-book f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Link : <a href="https://siforate.portofolio.febroherdyanto.id/public/User-Guide.pdf" style="color: white">User-Guide.pdf</a></p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- task, page, download counter  end -->
    
                                            
                                        </div>
                                    </div>
</div>