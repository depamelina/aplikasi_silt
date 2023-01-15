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
					<h4><i class="icon-user icon-sidebar"></i><span class="font-weight-semibold pl-2">Profile HRD</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="row">
                    <div class="col-xl-8 text-center">
                        <div class="card">
                            <div class="card-body">
                                <img src="<?= base_url() ?>template/global_assets/images/foto/<?= $this->session->userdata('foto') ?>" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
								<?php foreach($read_karyawan as $r){}?>
                                <input type="hidden" name="kode_karyawan" class="form-control" value="<?= $r->kode_karyawan?>">
                				<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Nama Lengkap <span class="float-right">:</span></label>
									<div class="col-lg-8 col-8">
										<input type="text" name="nama_lengkap" class="form-control" value="<?= $r->nama_lengkap ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Jenis Kelamin<span class="float-right">:</span></label>
									<div class="col-lg-8 col-8">
										<input type="text" name="jk" class="form-control" value="<?= $r->jk ?>" readonly>
									</div>
								</div>
                                <div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Jabatan <span class="float-right">:</span></label>
									<div class="col-lg-8 col-8">
										<input type="text" name="jabatan" class="form-control" value="<?= $r->jabatan ?>" readonly>
									</div>
								</div>
                                <div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">No Telepon <span class="float-right">:</span></label>
									<div class="col-lg-8 col-8">
										<input type="text" name="no_hp" class="form-control" value="<?= $r->no_hp ?>" readonly>
									</div>
								</div>
                                <div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Alamat <span class="float-right">:</span></label>
									<div class="col-lg-8 col-8">
										<input type="text" name="judul" class="form-control" value="<?= $r->alamat ?>" readonly>
									</div>
								</div>									
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
