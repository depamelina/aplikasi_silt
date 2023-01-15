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
						<h4><i class="icon-color-sampler mr-2"></i> <span class="font-weight-semibold">Corporate Culture</span> - Detail Nilai</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


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
											<button type="submit" name="submit" class="btn btn-dark legitRipple">Search <i class="icon-search4 ml-2"></i></button>
										</div>
									</div>
								</form>
								<div class="table-responsive mt-3">
								<table class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<th width="50px" class="text-center">No</th>
												<th width="150px" class="text-center">Bulan</th>
												<th width="150px" class="text-center">Judul Buku</th>
                                                <th width="100px" class="text-center">Poin Struktur dan Bahasa</th>
                                                <th width="100px" class="text-center">Poin Isi Buku</th>
                                                <th width="100px" class="text-center">Total Nilai</th>
												<th width="100px" class="text-center">Beri Nilai</th>
												
											</tr>
										</thead>
										<tbody>
											<?php
												// $bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');
												//for($i=1;$i<=12;$i++){	
													foreach($read_nilai as $r)
													$i=1;
													{																				
											?>
											<tr>
												<td class="text-center"><?= $i++ ?></td>
												<td><?= $r->bulan?></td>
												<td class="text-center"> <?= $r->judul_buku?> </td>
                                            	<td class="text-center"> <?= $r->poin_plus?> </td>
                                                <td class="text-center"> <?= $r->poin_isi?></td>	
                                                <td class="text-center"> <?= $r->poin_plus + $r->poin_isi?></td>	
												<?php } ?>	
                                                <td class="text-center"><button class="btn btn-primary legitRipple" onclick="return btn_nilai()">Score <i class="icon-pen ml-2"></i></button></td>	
																				
											</tr>
											<?php
												//}
											?>
										</tbody>
									</table>
								</div>
                                <div class="row">
									<div class="col-12 pt-2 text-right">
										<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/NilaiResume" class="btn btn-dark legitRipple">Back <i class="icon-arrow-left52 ml-2"></i></a>
		
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
					
						<input type="hidden" name="id_nilai"  value="<?php $r->id_nilai?>">
						
						<span id="modal-body-update-or-create">
							<div class="form-group">
								<label>Bulan</label>
								<input type="text" name="bulan" class="form-control" placeholder="Bulan">
						
							</div>
							<div class="form-group">
								<label>Judul Buku</label>
								<select class="form-control" name="judul_buku">
											<option disabled selected>Pilih</option>
											<?php foreach($read_judul as $p){ ?>
											<option value="<?= $p->id_buku ?>"><?= $p->judul ?></option>
											<?php } ?>
								</select>
							</div>
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
