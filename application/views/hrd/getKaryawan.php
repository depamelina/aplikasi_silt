<?php
foreach ($getKaryawan as $g) {
?>
    <input type="text" class="form-control d-none" name="nik" value="<?= $g->nik ?>" readonly>
    <div class="form-group">
        <label>Nama Karyawan</label>
        <input type="text" class="form-control" name="nama_lengkap" value="<?= $g->nama_lengkap ?>" readonly>
    </div>
<?php } ?>