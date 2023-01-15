<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya </title>
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
						<h4><i class="icon-color-sampler mr-2"></i> <span class="font-weight-semibold">Corporate Culture</span> - Penilaian</h4>
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
								<h6 class="card-title"><i class="icon-search4"></i> &nbsp; Pencarian Resume Buku</h6>
							</div>

							<div class="card-body">
								<form action="" method="POST">
									<div class="form-group row">
										<label class="col-form-label col-1">Tahun <span class="float-right">:</span></label>
										<div class="col-lg-2 col-9">
											<select name="sekolah" class="form-control select-search" data-fouc>
												<option value="">Pilih Tahun</option>
												<?php for($i=date('Y');$i>=2022;$i--){
													$select="";
													if($i==$tahun){$select="selected";}
													echo '<option '.$select.' value="'.$i.'">'.$i.'</option>';
												}?>
											</select>
										</div>
										<div class="col-2 text-left">
											<button type="submit" name="submit" class="btn btn-dark legitRipple">Cari <i class="icon-search4 ml-2"></i></button>
										</div>
									</div>
								</form>
								<div class="table-responsive mt-3">
									<table class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<!-- <th width="50px" class="text-center">No</th> -->
												<th width="80px">Bulan</th>
												<th width="150px" class="text-center">Judul</th>
												<th width="100px" class="text-center">Penulis</th>
												<th width="100px" class="text-center">Penerbit</th>
												<th width="100px" class="text-center">Nilai Pengumpulan</th>
												<th width="100px" class="text-center">Nilai Isi</th>
												<th width="100px" class="text-center">Total Nilai</th>
									
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($read_resume as $b){
													$i=1;
																				
														if($b->nilai_plus==0){
															$btn = "primary";
															$btn_text = "Tambah";
														}if($b->nilai_plus>1){
															$btn = "success";
															$btn_text = "Edit";
														}
													
											?>
											<tr>
												<!-- <td class="text-center"><?= $i++ ?></td> -->
												<td><?= $b->bulan ?></td>
												<td><?= $b->judul ?></td>
												<td><?= $b->penulis ?></td>
												<td><?= $b->penerbit ?></td>
												<td class="text-center"><?= $b->nilai_plus ?></td>
												<td class="text-center"><?= $b->nilai_isi ?></td>
												<td class="text-center"><?= ($b->nilai_isi + $b->nilai_plus) ?></td>
								
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
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
	function btn_nilai(id_buku,judul,nilai_plus,nilai_isi){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="icon-pen"></i> Beri Nilai');
				$('#modal-body-update-or-create').show();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Save');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
					
				$('[name="id_buku"]').val(id_buku);
				$('[name="judul"]').val(judul);
				$('[name="nilai_plus"]').val(nilai_plus);
				$('[name="nilai_isi"]').val(nilai_isi);
								
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
						

						
						<span id="modal-body-update-or-create">
							<!-- <div class="form-group">
								<label>Bulan</label>
								<input type="text" name="bulan" class="form-control" placeholder="Bulan">
						
							</div>
							<div class="form-group">
								<label>Judul Buku</label>
								<select class="form-control" name="judul_buku">
											
								</select>
							</div> -->
							
							<input type="hidden" name="id_buku" class="form-control">
							<div class="form-group">
								<label>Judul Buku</label>
								<input type="text" name="judul" class="form-control" readonly>
							</div>
							<div class="form-group">
								<label>Nilai Pengumpulan</label>
								<input type="number" name="nilai_plus" class="form-control" placeholder="Poin Pengumpulan" required>
							</div>
							<div class="form-group">
								<label>Nilai Isi Resume Buku</label>
								<input type="number" name="nilai_isi" class="form-control" placeholder="Poin Isi Buku" required>
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
