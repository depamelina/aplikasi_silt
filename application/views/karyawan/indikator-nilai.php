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
						<h4><i class="icon-color-sampler mr-2"></i> <span class="font-weight-semibold">Corporate Culture</span> - Indikator Penilaian</h4>
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
							

							<div class="card-body">
							
								
								<div class="table-responsive mt-3">
									<table class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<th width="50px" class="text-center">No</th>
												<th width="100px" class="text-center">Aspek</th>
												<th width="150px" class="text-center">Kriteria</th>
                                                <th width="100px" class="text-center">Nilai</th>									
											</tr>
										</thead>
										<tbody>
											
											<tr>
                                                    <td  class="text-center" rowspan="3">1</td>
                                                    <td rowspan="3">Isi</td>
                                                    <td>Lengkap (judul, data publikasi, garis besar isi buku) dandideskripsikan secara jelas.</td>
                                                    <td  class="text-center text-success">90-100</td>
                                            </tr>
                                            <tr>
                                                    <td>Kurang lengkap (ada beberap abagian yang tidak ditulis) dan dideskripsikan secara kurang jelas</td>
                                                    <td  class="text-center">80-89</td>
                                            </tr>
                                            <tr>
                                                    <td>Tidak lengkap (banyak bagian yang tidak ditulis) dan dideskripsikan secara tidak jelas</td>
                                                    <td  class="text-center text-danger">50-79</td>
                                            </tr>
                                            <tr>
                                                    <td  class="text-center" rowspan="4">2</td>
                                                    <td rowspan="4">Struktur dan Kebahasaan</td>
                                                    <td>Struktur atau sistematika urutan dan penempatan bagian-bagiannya benar dan menggunakan bahasa baku</td>
                                                    <td  class="text-center text-success">90-100</td>
                                            </tr>
                                            <tr>
                                                    <td>Struktur atau sistematika urutan dan penempatan bagian-bagiannya benar tetapi menggunakan bahasa yang tidak baku</td>
                                                    <td  class="text-center">90-95</td>
                                            </tr>
                                            <tr>
                                                    <td>Struktur atau sistematika urutan dan penempatan bagian-bagiannya ada yang tidak tepat tetapi menggunakan bahasa baku</td>
                                                    <td  class="text-center">80-89</td>
                                            </tr>
                                             <tr>
                                                    <td>Struktur atau sistematika urutan dan penempatan bagian-bagiannya ada yang tidak tepat dan menggunakan bahasa yang tidak baku</td>
                                                    <td  class="text-center text-danger">50-79</td>
                                            </tr>

										
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
</html>
