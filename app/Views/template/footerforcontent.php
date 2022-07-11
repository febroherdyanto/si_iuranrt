<div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
    <!-- Required Jquery --> 
    <script type="text/javascript" src="<?= base_url('/assets/js/jquery/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/js/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/js/popper.js/popper.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/js/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/pages/widget/excanvas.js'); ?>"></script>
    <!-- waves js -->
    <script src="<?= base_url('/assets/pages/waves/js/waves.min.js'); ?>"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= base_url('/assets/js/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?= base_url('/assets/js/modernizr/modernizr.js'); ?>"></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="<?= base_url('/assets/js/SmoothScroll.js'); ?>"></script>
    <script src="<?= base_url('/assets/js/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?= base_url('/assets/js/chart.js/Chart.js'); ?>"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="<?= base_url('/assets/pages/widget/amchart/gauge.js'); ?>"></script>
    <script src="<?= base_url('/assets/pages/widget/amchart/serial.js'); ?>"></script>
    <script src="<?= base_url('/assets/pages/widget/amchart/light.js'); ?>"></script>
    <script src="<?= base_url('/assets/pages/widget/amchart/pie.min.js'); ?>"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="<?= base_url('/assets/js/pcoded.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/js/vertical-layout.min.js'); ?>"></script>
    <!-- custom js -->
    <script type="text/javascript" src="<?= base_url('/assets/pages/dashboard/custom-dashboard.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/js/script.js'); ?>"></script>
</body>

</html>
