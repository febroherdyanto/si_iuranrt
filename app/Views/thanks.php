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
                                <h1 class="text-center"><i>Hi! Unfortunately this page currently not available. <i class="fa-solid fa-face-frown"></i> <br>
                                The page "<?= $title; ?>" under development. Please see next week for updated page. <br>
                                Thank you.</i></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('template/footerforcontent');