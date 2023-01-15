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
		<?php $this->load->view('template/sidebar2.php')?>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-person icon-sidebar"></i><span class="font-weight-semibold pl-2">Profile Karyawan</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="row">
                    <div class="col-xl-9 ml-5 text-center">
                        <div class="card">
                            <div class="card-body">
                                <img src="<?= base_url() ?>template/global_assets/images/foto/user-img.jpg ?>" class="img-fluid rounded-circle shadow-1 mb-3" width="90" height="90" alt="">
								<!-- <span class="ml-3"><button class="btn btn-primary"  onclick="return btn_prof()"><i class="icon-pencil"></i></button></span> -->
								<?php foreach($read_karyawan as $r){}?>
                                <input type="hidden" name="kode_karyawan" class="form-control" value="<?= $r->kode_karyawan?>">
                				<div class="row">
									<label class="col-form-label col-lg-3 col-sm-12 col-12">Nama Lengkap <span class="float-right">:</span></label>
									<div class="col-lg-8 col-8">
										<input type="text" name="nama_lengkap" class="form-control" value="<?= $r->nama_lengkap ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-3 col-sm-12 col-12">Jenis Kelamin<span class="float-right">:</span></label>
									<div class="col-lg-8 col-8">
										<input type="text" name="jk" class="form-control" value="<?= $r->jk ?>" readonly>
									</div>
								</div>
                                <div class="row">
									<label class="col-form-label col-lg-3 col-sm-12 col-12">Jabatan <span class="float-right">:</span></label>
									<div class="col-lg-8 col-8">
										<input type="text" name="jabatan" class="form-control" value="<?= $r->jabatan ?>" readonly>
									</div>
								</div>
                                <div class="row">
									<label class="col-form-label col-lg-3 col-sm-12 col-12">No Telepon <span class="float-right">:</span></label>
									<div class="col-lg-8 col-8">
										<input type="text" name="no_hp" class="form-control" value="<?= $r->no_hp ?>" readonly>
									</div>
								</div>
                                <div class="row">
									<label class="col-form-label col-lg-3 col-sm-12 col-12">Alamat <span class="float-right">:</span></label>
									<div class="col-lg-8 col-8">
										<input type="text" name="alamat" class="form-control" value="<?= $r->alamat ?>" readonly>
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
	
</body>


<script>
	function btn_prof(kode_karyawan,nama_lengkap,jk,no_hp,alamat){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="icon-pencil"></i> Edit Profile');
				$('#modal-body-update-or-create').show();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Save');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
					
				$('[name="kode_karyawan"]').val(kode_karyawan);
				$('[name="nama_lengkap"]').val(nama_lengkap);
				$('[name="jk"]').val(jk);
				$('[name="no_hp"]').val(no_hp);
				$('[name="alamat"]').val(alamat);
								
				document.form.action = '<?php echo base_url();?>karyawan/UpdateProfile';
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
						
						<input type="hidden" name="id">
						
						<span id="modal-body-update-or-create">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select name="jk" class="form-select form-control">
									<option disabled selected>--</option>
									<?php								
									$select="";
									$select2="";
									// if($isi['jenis_kelamin']=="1") {$select="selected";}
									// if($isi['jenis_kelamin']=="2") {$select2="selected";}
									?>
									<option value="Laki-laki" <?= $select ?> > Laki-laki</option>
									<option value="Perempuan" <?= $select2 ?>> Perempuan</option>
									</select>
							</div>
							<!-- <div class="form-group">
								<label>Jabatan</label>
								<input type="text" name="jabatan" class="form-control" placeholder="Jabatan" readonly>
							</div> -->
							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text" name="alamat" class="form-control" placeholder="Alamat"></textarea>
							</div>
							<div class="form-group">
								<label>No Telepon</label>
								<input type="text" name="no_hp" class="form-control" placeholder="No Telepon">
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
