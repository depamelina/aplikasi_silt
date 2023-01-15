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
						<h4><i class="icon-box mr-2"></i> <span class="font-weight-semibold">Data Master</span> - Data Karyawan</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="row">
					<div class="col-12">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header header-elements-inline">
                            <button class="btn btn-primary" id="btn-create">
										<i class="icon-user-plus"></i>
										Create
							</button>
                        	</div>
								
							<div class="card-body">
								
									<table id="example1" class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<th width="20px" class="text-center">No</th>
												<th width="100px" class="text-center">Nama Lengkap</th>
												<th width="100px" class="text-center">NIK</th>
												<th width="50px" class="text-center">Jenis Kelamin</th>
                                                <th width="50px" class="text-center">Jabatan</th>
												<th width="50px" class="text-center">No Telepon</th>
                                                <!-- <th width="160px" class="text-center">Alamat</th> -->
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
												<td><?= $u->nama_lengkap?></td>
												<td class="text-center"><?= $u->nik?></td>	
                                                <td class="text-center"><?= $u->jk?></td>	
                                                <td class="text-center"><?= $u->jabatan?></td>	
                                                <td class="text-center"><?= $u->no_hp?></td>	
                                                <!-- <td class="text-center"><?= $u->alamat?></td>	 -->
                                                <td>
                                                    <span class="mr-1"><button class="btn btn-success btn-sm" onclick="return btn_update(`<?= $u->kode_karyawan ?>`,`<?= $u->nama_lengkap ?>`,`<?= $u->nik ?>`,`<?= $u->jk ?>`,`<?= $u->id_jabatan ?>`,`<?= $u->alamat ?>`,`<?= $u->no_hp?>`)">
                                                        <i class="fa fa-pen"></i>
                                                        Update
                                                    </button></span>
                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-delete" onclick="return btn_delete(`<?= $u->kode_karyawan ?>`,`<?= $u->nama_lengkap ?>`)">
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

		$(document).ready(function() {
			var myTable = $('#table').DataTable({});
		});

			$(document).on('click','#btn-create',function(){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="icon-add"></i> Create');
				$('#modal-body-update-or-create').show();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Create');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
				
				$('[name="kode_karyawan"]').val("");
				$('[name="nama_lengkap"]').val("");
				$('[name="nik"]').val("");
				$('[name="jk"]').val("");
                $('[name="jabatan"]').val("");
                $('[name="alamat"]').val("");
				$('[name="no_hp"]').val("");
				
				document.form.action = '<?php echo base_url();?>hrd/CreateKaryawan';
			});
			
			function btn_update (kode_karyawan,nama_lengkap,nik,jk,id_jabatan,alamat,no_hp){
				$('#Modal').modal('show');
				
				$('#modal-header').html('<i class="fa fa-pen"></i> Update');
				$('#modal-body-update-or-create').show();
				$('#modal-body-delete').hide();
				$('#modal-button').html('Update');
				$('#modal-button').removeClass('btn-danger');
				$('#modal-button').addClass('btn-success');
					
				$('[name="kode_karyawan"]').val(kode_karyawan);
				$('[name="nama_lengkap"]').val(nama_lengkap);
				$('[name="nik"]').val(nik);
				$('[name="jk"]').val(jk);
                $('[name="id_jabatan"]').val(id_jabatan);
                $('[name="alamat"]').val(alamat);
				$('[name="no_hp"]').val(no_hp);
								
				document.form.action = '<?php echo base_url();?>hrd/UpdateKaryawan';
			};
			
			function btn_delete (kode_karyawan,nama_lengkap){
				$('#Modal').modal('show');
				$('#modal-button').html('Delete');
				$('#modal-button').removeClass('btn-success');
				$('#modal-button').addClass('btn-danger');
				$('#modal-body-update-or-create').hide();
				$('#modal-body-delete').show();
				$('#modal-header').html('<i class="fa fa-trash"></i> Delete');
				
				// var id = $(this).data('id');
				// var nama_barang = $(this).data('nama_barang');
				
				$('[name="kode_karyawan"]').val(kode_karyawan);
				$('#name-delete').html(nama_lengkap);
				
				document.form.action = '<?php echo base_url();?>hrd/DeleteKaryawan';
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
						
						<span id="modal-body-update-or-create">
                       		<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
							</div>
							<div class="form-group">
								<label>NIK</label>
								<input type="text" name="nik" class="form-control" placeholder="NIK">
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select name="jk" class="form-select form-control">
									<option value="Laki-laki"> Laki-laki</option>
									<option value="Perempuan"> Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label>Jabatan</label>
								<select name="id_jabatan" class="form-control">
									<?php foreach($read_jb as $p){ ?>
									<option value="<?= $p->id ?>"><?= $p->jabatan ?></option>
									<?php } ?>
								</select>
                            </div>
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
