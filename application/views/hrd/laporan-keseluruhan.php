<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya</title>
	<?php $this->load->view('template/link.php')?>
</head>

<body>

	<!-- Main navbar -->
	<?php $this->load->view('template/navbar.php')?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<?php $this->load->view('template/sidebar.php')?>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-book3 icon-sidebar"></i><span class="font-weight-semibold pl-2">Laporan</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="row">
				<div class="col-6">
				 <div class="card">
                    <div class="card-header">
                    
                    </div>
				  <!-- /.card-header -->
					<div class="card-body">
						<form action="<?= base_url()?>hrd/CetakLaporan2" target="_blank">
						<div class="col-12">
							<div class="form-group">
							<label>Pilih Tahun</label>
							<select name="tahun" class="form-control select-search" data-fouc>
												
												<?php for($i=date('Y');$i>=2022;$i--){
													$select="";
													if($i==$tahun){$select="selected";}
													echo '<option '.$select.' value="'.$i.'">'.$i.'</option>';
												}?>
									</select>	
							</div>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-success">Cetak</button>
						</div>
					</form>
					</div>
				</div>
			</div>
            </div>
                
                <!-- /dashboard content -->

			</div>
			<!-- /content area -->

			<!-- Footer -->
			<?php $this->load->view('template/footer.php')?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<script>
	
	</script>
</body>
</html>
