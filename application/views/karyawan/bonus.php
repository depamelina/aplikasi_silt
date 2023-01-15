<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya</title>
	<?php $this->load->view('template/link.php')?>
	<style>
	.card.congratulation-bg {
  box-shadow: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  -ms-box-shadow: none;
  border-radius: 6px 6px 18px 16px;
  background: url(../template/global_assets/images/bg.png);
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
						<h4><i class="icon-cash icon-sidebar"></i><span class="font-weight-semibold pl-2">Bonus</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">
					<div class="row">
						
						<div class="col-lg-6 mb-3 mb-lg-0">
							<div class="card congratulation-bg text-center">
								<div class="card-body pb-0">
									<img src="<?= base_url() ?>template/global_assets/images/pp.png ?>" alt="">  
									<h2 class="mt-3 text-white mb-3 font-weight-bold">Selamat
										<?= $this->session->userdata('fullname') ?>
									</h2>
									<?php 
									 //$r->nilai_akhir = 0;
									foreach($read_karyawan as $r){}?>
									<p>Kamu mendapat nilai akhir <b><?= $r->nilai_akhir?> </b><br>
									Voucher Makan yang kamu miliki : <b>Rp. <?= $r->nilai_akhir * 50?></b>
									</p>
								</div>
							</div>
						</div>
					
					</div>
					<div>
					
			</div>
				<!-- Main charts -->
				
					
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
