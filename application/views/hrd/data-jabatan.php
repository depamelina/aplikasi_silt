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
					<h4><i class="icon-box mr-2"></i> <span class="font-weight-semibold">Data Master</span> - Data Jabatan</h4>
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
                                <i class="icon-user-plus"></i>
                                Create
					         </button>
                        </div>

							<div class="card-body">
								
								<div class="table-responsive mt-4">
									<table class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<th width="20px" class="text-center">No</th>
												<th width="100px" class="text-center">Nama Jabatan</th>
	                                            <th width="160px" class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
												$no=1;
												foreach($read_jb as $u){
											?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td><?= $u->jabatan?></tdclass=>
                                       
                                                <td class="text-center">
                                                    <span class="mr-1"><button class="btn btn-success btn-sm" onclick="return btn_update(`<?= $u->id ?>`,`<?= $u->jabatan ?>`)">
                                                        <i class="fa fa-pen"></i>
                                                        Update
                                                    </button></span>
                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-delete" onclick="return btn_delete(`<?= $u->id ?>`,`<?= $u->jabatan ?>`)">
                                                        <i class="fa fa-trash"></i>
                                                        Delete
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
				
				$('#modal-header').html('<i class="icon-add"></i> Create');
				$('#modal-body-update-or-create').show();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Create');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
				
				$('[name="id"]').val("");
				$('[name="jabatan"]').val("");
				
				document.form.action = '<?php echo base_url();?>hrd/CreateJabatan';
			});
			
			function btn_update (id,jabatan){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="fa fa-pen"></i> Update');
				$('#modal-body-update-or-create').show();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Update');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
					
				$('[name="id"]').val(id);
				$('[name="jabatan"]').val(jabatan);
		
				document.form.action = '<?php echo base_url();?>hrd/UpdateJabatan';
			};
			
			function btn_delete (id,jabatan){
				$('#Modal').modal('show');
				$('#modal-button').html('Delete');
				$('#modal-button').removeClass('btn-success');
				$('#modal-button').addClass('btn-danger');
				$('#modal-body-update-or-create').hide();
				$('#modal-body-delete').show();
				$('#modal-header').html('<i class="fa fa-trash"></i> Delete');
				
				// var id = $(this).data('id');
				// var nama_barang = $(this).data('nama_barang');
				
				$('[name="id"]').val(id);
				$('#name-delete').html(jabatan);
				
				document.form.action = '<?php echo base_url();?>hrd/DeleteJabatan';
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
								<label>Jabatan</label>
								<input type="text" name="jabatan" class="form-control" placeholder="Nama Jabatan">
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
