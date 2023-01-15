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
						<h4><i class="icon-box mr-2"></i> <span class="font-weight-semibold">Data Master</span> - Data User</h4>
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
                            <button class="btn btn-primary" id="btn-create">
                                <i class="icon-user-plus"></i>
                                Create
					         </button>
                        </div>

							<div class="card-body">
									<table  id="example1" class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<th width="20px" class="text-center">No</th>
												<th width="100px" class="text-center">Nama Lengkap</th>
												<th width="50px" class="text-center">Username</th>
												<th width="50px" class="text-center">Level</th>
                                                <th width="160px" class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
												$no=1;
												foreach($read_karyawan as $u){
											?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td><?= $u->fullname?></tdclass=>
                                                <td class="text-center"><?= $u->username?></td>	
                                                <td class="text-center"><?= $u->level?></td>	
                                                                                          	
                                                <td class="text-center">
                                                    <span class="mr-1"><button class="btn btn-success btn-sm" onclick="return btn_update(`<?= $u->kode_karyawan ?>`,`<?= $u->fullname ?>`,`<?= $u->username ?>`,`<?= $u->password ?>`,`<?= $u->level ?>`,`<?= $u->active ?>`,`<?= $u->color1 ?>`,`<?= $u->color2 ?>`,`<?= $u->gradient ?>`)">
                                                        <i class="fa fa-pen"></i>
                                                        Update
                                                    </button></span>
                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-delete" onclick="return btn_delete(`<?= $u->kode_karyawan ?>`,`<?= $u->fullname ?>`)">
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

		function getKaryawan() {
			var id = $('[name="kode_karyawan"]').val();
			$('#data-nama').load("getKaryawan?id=" + id);
		};
</script>

<script src="<?= base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap-select-1.13.14/dist/js/bootstrap-select.js"></script>

<script>
			
			$(function () {
			$("#example1").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});
			
			$(document).on('click','#btn-create',function(){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="icon-add"></i> Create');
				$('#modal-body-update-or-create').show();
				$('#modal-body-update').show();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Create');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
				
				$('[name="kode_karyawan"]').val("");
				$('[name="fullname"]').val("");
				$('[name="username"]').val("");
				$('[name="password"]').val("");
				$('[name="level"]').val("");
				$('[name="active"]').val("");
				$('[name="color1"]').val("");
				$('[name="color2"]').val("");
				$('[name="gradient"]').val("");
				
				document.form.action = '<?php echo base_url();?>hrd/CreateUser';
			});
			
			function btn_update (kode_karyawan,fullname,username,password,level,active,color1,color2,gradient){
				$('#Modal').modal('show');
				$('#modal-header').html('<i class="fa fa-pen"></i> Update');
				$('#modal-body-update-or-create').show();
				$('#modal-body-update').hide();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Update');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
					
				$('[name="kode_karyawan"]').val(kode_karyawan);
				$('[name="fullname"]').val(fullname);
				$('[name="username"]').val(username);
				$('[name="password"]').val(password);
				$('[name="level"]').val(level);
        
				$('[name="active"]').val(active);
				$('[name="color1"]').val(color1);
				$('[name="color2"]').val(color2);
				$('[name="gradient"]').val(gradient);
    
								
				document.form.action = '<?php echo base_url();?>hrd/UpdateUser';
			};
			
			function btn_delete (kode_karyawan,nama_lengkap){
				$('#Modal').modal('show');
				$('#modal-button').html('Delete');
				$('#modal-button').removeClass('btn-success');
				$('#modal-button').addClass('btn-danger');
				$('#modal-body-update-or-create').hide();
				$('#modal-body-update').hide();
				$('#modal-body-delete').show();
				$('#modal-header').html('<i class="fa fa-trash"></i> Delete');
				
				// var id = $(this).data('id');
				// var nama_barang = $(this).data('nama_barang');
				
				$('[name="kode_karyawan"]').val(kode_karyawan);
				$('#name-delete').html(nama_lengkap);
				
				document.form.action = '<?php echo base_url();?>hrd/DeleteUser';
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
						
						<input type="hidden" name="kode_karyawan">
						<span id="modal-body-update">
							<div class="form-group">
								<label>Kode Karyawan</label>
								<select name="kode_karyawan" class="form-control" >
									<?php foreach($read_kar as $p){ ?>
									<option value="<?= $p->kode_karyawan ?>"><?= $p->kode_karyawan ?></option>
									<?php } ?>
								</select>
                            </div>
                            <div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" placeholder="Username">
							</div>
                            <div class="form-group">
								<label>Password</label>
								<select name="password" class="form-control" >
									<option value="$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm">Default</option>
								</select>
							</div>
						</span>
						<span id="modal-body-update-or-create">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="fullname" class="form-control" placeholder="Nama Lengkap">
							</div>
							<div class="form-group">
								<label>Level</label>
								<select name="level" class="form-select form-control">
									<option value="hrd"> HRD</option>
									<option value="karyawan"> Karyawan</option>
								</select>
							</div>
							<div class="form-group">
								<label>Aktif</label>
								<select name="active" class="form-select form-control">
									<option value=1> Ya</option>
									<option value=2> Tidak</option>
								</select>
							</div>
							<div class="form-group">
								<label>Color 1</label>
								<input type="text" name="color1" class="form-control" placeholder="#083470">
							</div>
                            <div class="form-group">
								<label>Color 2</label>
								<input type="text" name="color2" class="form-control" placeholder="#083470">
							</div>
                            <div class="form-group">
								<label>Gradient</label>
								<select name="gradient" class="form-select form-control">
									<option value="on"> on</option>
									<option value="off"> off</option>
								</select>
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