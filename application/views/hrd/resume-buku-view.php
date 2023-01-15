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
								<h6 class="card-title"><i class="icon-book"></i> &nbsp; View Resume Buku</h6>
							</div>

							<div class="card-body">
								<?php foreach($read_resume_buku as $r){}?>
								<input type="hidden" name="id_buku" class="form-control" value="<?= $r->id_buku ?>">
								<?php $nama_bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember') ?>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Bulan/ Tahun <span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<input type="text" class="form-control" value="<?= $nama_bulan[$r->bulan-1].'/ '.$r->tahun ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Judul <span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<input type="text" name="judul" class="form-control" value="<?= $r->judul ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">ISBN <span class="float-right">:</span></label>
									<div class="col-lg-2 col-6">
										<input type="text" name="isbn" class="form-control" value="<?= $r->no_isbn ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Penulis <span class="float-right">:</span></label>
									<div class="col-lg-3 col-6">
										<input type="text" name="penulis" class="form-control" value="<?= $r->penulis ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Penerbit <span class="float-right">:</span></label>
									<div class="col-lg-3 col-6">
										<input type="text" name="penerbit" class="form-control" value="<?= $r->penerbit ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Tahun Terbit <span class="float-right">:</span></label>
									<div class="col-lg-1 col-6">
										<input type="number" name="tahun_terbit" class="form-control" value="<?= $r->tahun_terbit ?>" readonly>
									</div>
								</div>
								<!-- <div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Kelemahan Buku <span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<input type="text" name="kelemahan" class="form-control" value="<?= $r->judul ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Kelebihan Buku <span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<input type="text" name="kelebihan" class="form-control" value="<?= $r->judul ?>" readonly>
									</div>
								</div> -->
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Resume Buku <span class="float-right">:</span></label>
									<div class="col-12">
											<?= $r->resume ?>
									</div>
								</div>
								<div class="row">
									<div class="col-12 pt-2 text-right">
										
										<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ResumeBuku" class="btn btn-dark legitRipple">Kembali <i class="icon-arrow-left52 ml-2"></i></a>
										<?php if($r->status == 0){ ?>
										<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ResumeBukuVerifikasi/<?= $r->id_buku?>" class="btn btn-success legitRipple">Verifikasi <i class="icon-checkmark4 ml-2"></i></a>
										<?php } ?>
										<?php if($r->status == 1){ ?>
											<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/NilaiResume" class="btn btn-warning legitRipple">Beri Nilai <i class="icon-pen2 ml-2"></i></a>
										<?php } ?>
									</div>
								</div>
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
</body>

<script>
	function btn_nilai(){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="icon-pen"></i> Beri Nilai');
				$('#modal-body-update-or-create').show();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Save');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
					
				$('[name="id_buku"]').val("");
				$('[name="kode_karyawan"]').val("");
				$('[name="poin_plus"]').val("");
				$('[name="poin_isi"]').val("");
								
				document.form.action = '<?php echo base_url();?>hrd/CreatePoin';
			};
</script>
<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
		<div id="Modal" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="text-align:center">
						<h3 id="modal-header"></h3>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						
						<input type="hidden" name="id_buku"  value="<?= $r->id_buku ?>">
						
						<span id="modal-body-update-or-create">
							<div class="form-group">
								<label>Poin Pengumpulan</label>
								<input type="number" name="poin_plus" class="form-control" placeholder="Poin Pengumpulan">
							</div>
							<div class="form-group">
								<label>Poin Isi Resume Buku</label>
								<input type="number" name="poin_isi" class="form-control" placeholder="Poin Isi Buku">
							</div>
						</span>
						
						<span id="modal-body-delete">
							Are you sure want to delete <b id="name-delete"></b> from this table?
						</span>
											
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Back</button>
						<button type="submit" class="btn btn-success" id="modal-button">Save</button>
					</div>
				</div>
			</div>
		</div>
	</form>


</html>
