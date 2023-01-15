<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya</title>
	<?php $this->load->view('template/link.php')?>
</head>
<style>
	.card.congratulation-bg {
   box-shadow: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  -ms-box-shadow: none;
  border-radius: 6px 6px 18px 16px;
  background: url(template/global_assets/images/bg.png);
  background-size: cover;
  border: 0;
  box-shadow: none;
  padding: 2.112rem 3.25rem;
}

	.card.cardku {
   box-shadow: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  -ms-box-shadow: none;
  border-radius: 6px 6px 18px 16px;
  background: url(template/global_assets/images/backgrounds/seamless.png);
  background-size: cover;
  border: 0;
  box-shadow: none;
  padding: 2.112rem 3.25rem;
	}
	</style>

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
						<h4><i class="icon-home4 icon-sidebar"></i><span class="font-weight-semibold pl-2">Dashboard</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="content-wrapper">
					<section class="content">
						<div class="container-fluid">	
						<div class="row">
						<div class="col-lg-3 col-md-6 grid-margin stretch-card">
							<div class="card cardku">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
									<?php foreach($read_karyawan as $r){}?>
										<h1 class="text-success font-weight-bold"><?= $r->total_resume ?></h1>
										<i class="icon-book2 icon-sidebar"></i>
									</div>
								</div>
								<canvas id="newClient"></canvas>
								<div class="line-chart-row-title">RESUME BULAN INI</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 grid-margin stretch-card">
							<div class="card cardku">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<?php foreach($read_karyawan as $r){}?>
										<h1 class="text-secondary font-weight-bold"><?= $r->total_resume ?></h1>
										<i class="icon-book icon-sidebar"></i>
									</div>
								</div>
								<canvas id="allProducts"></canvas>
								<div class="line-chart-row-title">TOTAL RESUME</div>
							</div>
						</div>
					``	<!-- <div class="col-lg-3 col-md-6 grid-margin stretch-card">
							<div class="card cardku">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<?php foreach($read_karyawan as $r){}?>
										<h1 class="text-info font-weight-bold"><?= $r->nilai_max ?> </h1>
										<i class="icon-medal icon-sidebar ml-1"></i>
									</div>
								</div>
								<canvas id="invoices"></canvas>
								<div class="line-chart-row-title">NILAI TERTINGGI</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 grid-margin stretch-card">
							<div class="card cardku">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<?php foreach($read_karyawan as $r){}?>
										<h1 class="text-warning font-weight-bold"><?= $r->nilai_min ?></h1>
										<i class="icon-medal icon-sidebar ml-1"></i>
									</div>
								</div>
								<canvas id="projects"></canvas>
								<div class="line-chart-row-title">NILAI TERENDAH</div>
							</div>
						</div>`` -->
					
					</div>
					<div>
					
			</div>
						</div>
					</section>
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
