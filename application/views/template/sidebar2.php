<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md bg-lp3i">

<!-- Sidebar mobile toggler -->
<div class="sidebar-mobile-toggler text-center bg-lp3i">
    <a href="#" class="sidebar-mobile-main-toggle">
        <i class="icon-arrow-left8"></i>
    </a>
    Navigation
    <a href="#" class="sidebar-mobile-expand">
        <i class="icon-screen-full"></i>
        <i class="icon-screen-normal"></i>
    </a>
</div>
<!-- /sidebar mobile toggler -->


<!-- Sidebar content -->
<div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-user-material">
        <div class="sidebar-user-material-body">
            <div class="card-body text-center">
                <a href="#">
                    <img src="<?= base_url() ?>template/global_assets/images/foto/user-img.jpg ?>" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
                </a>
                <h4 class="mb-0 text-white text-shadow-dark text-outline text-lp3i"><b><?= $this->session->userdata('username') ?></b></h4>
                <span class="font-size-sm text-white text-shadow-dark text-outline text-lp3i"><b><?= $this->session->userdata('level') ?></b></span>
            </div>

            <div class="sidebar-user-material-footer">
                <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>Akun Saya</span></a>
            </div>
        </div>

        <div class="collapse" id="user-nav">
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/Profile?kode_karyawan=<?= $this->session->userdata('kode_karyawan') ?>" class="nav-link">
                        <i class="icon-user icon-sidebar"></i>
                        <span>Data Pribadi</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /user menu -->


    <!-- Main navigation -->
    <div class="card card-sidebar-mobile">
        <ul class="nav nav-sidebar" data-nav-type="accordion">

            <!-- Main -->
            <li class="nav-item-header">
                <div class="text-uppercase font-size-xs line-height-xs">Menu Utama</div>
                <i class="icon-menu" title="Main"></i>
            </li>

            <li class="nav-item">
                <a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>" class="nav-link">
                    <i class="icon-home4 icon-sidebar"></i>
                    <span class="text-sidebar">
                        Dashboard
                    </span>
                </a>
            </li>

            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-color-sampler icon-sidebar"></i> <span class="text-sidebar">Corporate Culture</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Data Master" style="display: none;">

                    <li class="nav-item">
                        <a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ResumeBuku" class="nav-link text-sidebar">
                            Resume Buku
                        </a>
                    </li>
                    <li class="nav-item">
						<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/IndikatorNilai" class="nav-link text-sidebar">
							Indikator Penilaian
                        </a>
					</li>
                    <li class="nav-item">
                        <a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/NilaiResume?username=<?= $this->session->userdata('username') ?>" class="nav-link text-sidebar">
                            Penilaian
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/Bonus?username=<?= $this->session->userdata('username') ?>" class="nav-link">
                    <i class="icon-cash icon-sidebar"></i>
                    <span class="text-sidebar">
                        Bonus
                    </span>
                </a>
            </li>

        </ul>
    </div>
    <!-- /main navigation -->

</div>
<!-- /sidebar content -->

</div>
