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
						<h4><i class="icon-box mr-2"></i> <span class="font-weight-semibold">Data Master</span> - Data Genre Buku</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="row">
					<div class="col-xl-10">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header header-elements-inline">
                            <button class="btn btn-primary" id="btn-create">
                                <i class="icon-plus2"></i>
                                Tambah
					         </button>
                        </div>

							<div class="card-body">
								
								<div class="table-responsive mt-4">
									<table class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<th width="20px" class="text-center">No</th>
												<th width="100px" class="text-center">Genre Buku</th>
	                                            <th width="160px" class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
												$no=1;
												foreach($read_gn as $u){
											?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td><?= $u->genre_buku?></tdclass=>
                                       
                                                <td class="text-center">
                                                    <span class="mr-1"><button class="btn btn-success btn-sm" onclick="return btn_update(`<?= $u->id ?>`,`<?= $u->genre_buku ?>`)">
                                                        <i class="fa fa-pen"></i>
                                                        Ubah
                                                    </button></span>
                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-delete" onclick="return btn_delete(`<?= $u->id ?>`,`<?= $u->genre_buku ?>`)">
                                                        <i class="fa fa-trash"></i>
                                                        Hapus
                                                    </button>
                                                </td>		
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

			$(document).on('click','#btn-create',function(){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="icon-add"></i> Tambah');
				$('#modal-body-update-or-create').show();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Create');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
				
				$('[name="id"]').val("");
				$('[name="genre_buku"]').val("");
				
				document.form.action = '<?php echo base_url();?>hrd/CreateGenre';
			});
			
			function btn_update (id,genre_buku){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="fa fa-pen"></i> Ubah');
				$('#modal-body-update-or-create').show();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Update');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
					
				$('[name="id"]').val(id);
				$('[name="genre_buku"]').val(genre_buku);
		
				document.form.action = '<?php echo base_url();?>hrd/UpdateGenre';
			};
			
			function btn_delete (id,genre_buku){
				$('#Modal').modal('show');
				$('#modal-button').html('Hapus');
				$('#modal-button').removeClass('btn-success');
				$('#modal-button').addClass('btn-danger');
				$('#modal-body-update-or-create').hide();
				$('#modal-body-delete').show();
				$('#modal-header').html('<i class="fa fa-trash"></i> Hapus');
				
				// var id = $(this).data('id');
				// var nama_barang = $(this).data('nama_barang');
				
				$('[name="id"]').val(id);
				$('#name-delete').html(genre_buku);
				
				document.form.action = '<?php echo base_url();?>hrd/DeleteGenre';
			};
			
	
	</script>

<!--Modal-->

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
								<label>Genre Buku</label>
								<input type="text" name="genre_buku" class="form-control" placeholder="Nama Genre">
							</div>
							
						</span>
						
						<span id="modal-body-delete">
							Apakah Anda yakin menghapus <b id="name-delete"></b> dari data Genre Buku?
						</span>
											
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Batal</button>
						<button type="submit" class="btn btn-success" id="modal-button">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>


</html>
