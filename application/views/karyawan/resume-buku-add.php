<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya</title>
	<?php $this->load->view('template/link.php')?>
	<style>
	.ck-editor__editable {
	  min-height: 200px;
	}
	</style>
</head>

<body>

	<!-- Main navbar -->
	<?php $this->load->view('template/navbar.php')?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<?php $this->load->view('template/sidebar2.php')?>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-color-sampler mr-2"></i> <span class="font-weight-semibold">Corporate Culture</span> - Resume Buku</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="row">
					<div class="col-xl-12">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title"><i class="icon-add"></i> &nbsp; Add Resume Buku</h6>
							</div>

							<div class="card-body">
								<form action="<?= base_url()?>Karyawan/AddResumeBukuAction" method="POST">
								<input type="hidden" name="bulan" class="form-control" value="<?= $bulan ?>">
								<input type="hidden" name="tahun" class="form-control" value="<?= $tahun ?>">
								<?php $nama_bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember') ?>
								<div class="row">
									<label class="col-form-label col-1">Bulan/ Tahun <span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<input type="text" class="form-control" value="<?= $nama_bulan[$bulan-1].'/ '.$tahun ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-1">Judul <span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<input type="text" name="judul" class="form-control" required>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-1">Genre <span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<select class="form-control" name="id_genre">
											<option disabled selected>Pilih</option>
											<?php foreach($read_gr as $p){ ?>
											<option value="<?= $p->id ?>"><?= $p->genre_buku ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-1">ISBN <span class="float-right">:</span></label>
									<div class="col-lg-2 col-6">
										<input type="text" name="isbn" class="form-control" required>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-1">Penulis <span class="float-right">:</span></label>
									<div class="col-lg-3 col-6">
										<input type="text" name="penulis" class="form-control" required>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-1">Penerbit <span class="float-right">:</span></label>
									<div class="col-lg-3 col-6">
										<input type="text" name="penerbit" class="form-control" required>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-1">Tahun Terbit <span class="float-right">:</span></label>
									<div class="col-lg-1 col-6">
										<input type="number" name="tahun_terbit" class="form-control" required>
									</div>
								</div>
								<!-- <div class="row">
									<label class="col-form-label col-1">Kelemahan Buku<span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<input type="text" name="kelemahan" class="form-control" required>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-1">Kelebihan Buku<span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<input type="text" name="kelebihan" class="form-control" required>
									</div>
								</div> -->
								<div class="row">
									<label class="col-form-label col-1">Resume Buku <span class="float-right">:</span></label>
									<div class="col-12">
										<textarea class="form-control" name="resume_buku" id="editor-full" height="200px" required></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-12 pt-2 text-right">
										<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ResumeBuku" class="btn btn-dark legitRipple">Kembali <i class="icon-arrow-left52 ml-2"></i></a>
										<button type="submit" name="submit" class="btn btn-success legitRipple">Simpan <i class="icon-paperplane ml-2"></i></button>
									</div>
								</div>
								</form>
							</div>
						</div>
						<!-- /traffic sources -->

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
		// ClassicEditor
		// 		 .create( document.querySelector( '#resume_buku' ))
		// 		 .catch( error => {
		// 				 console.error( error );
		// 		 } );
	</script>
</body>
</html>
