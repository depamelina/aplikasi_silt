<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya</title>
	<?php $this->load->view('template/link.php')?>
</head>

<body><br>
    <table width="100%" style="margin-top: 10px;">
        <tr>
            <td align="right">
                <img src="<?= base_url() ?>template/global_assets/images/logo-politeknik.png" width="90">
            </td>
            <td align="center">    <h2 class="text-center">Politeknik LP3I Kampus Tasikmalaya</h2>
                    <h4 class="text-center">Jalan Ir. H Djuanda KM. 2 No 106. Panglayungan, Kec. Cipedes, Tasikmalaya, Jawa Barat 46151
                    <br> Telepon : (0265) 311766</h4>
            </td>
        </tr>
     
    </table>
    <hr noshade size=4 width="98%">
    <div class="text-center">
            <h4><b>Laporan Pengumpulan Resume </b></h4>
			<!-- <?php foreach ($read_users as $b){} ?> -->
				Nama Karyawan : <?= $this->input->get('fullname') ?> <br><br><br>
      
     </div>
    

    <table id="tabelku" class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<!-- <th width="50px" class="text-center">No</th> -->
												<th width="80px">Bulan</th>
												<th width="150px" class="text-center">Judul</th>
												<th width="100px" class="text-center">Penulis</th>
												<th width="100px" class="text-center">Penerbit</th>
												<th width="100px" class="text-center">Nilai Struktur dan Bahasa</th>
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
												<td class="text-center"><?= ($b->nilai_isi + $b->nilai_plus)/2 ?></td>
								
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>

    <br><br>
    <div class="container">
         <div class="row">
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
                <div class="col text-center">
                            <br>Tasikmalaya, 14 06 2022<br>
                            Mengetahui<br>
                            <b>Kepala Kampus</b><br><br><br><br>
                            <b>H. Rudi Kurniawan, S.T., M.M</b><br>
                            NIP. xxxxxxxxx xxxxx xxxxx
                </div>
         </div>
     </div>


    </div>
</body>
</html>
