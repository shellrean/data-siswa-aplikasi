<div class="container-fluid">
    <!-- DataTales Example -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4 ">
    <div class="card-header">
      <a href="<?= base_url('siswa') ?>" class="btn btn-sm btn-warning btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-backward"></i>
        </span>
        <span class="text">Kembali</span>
      </a>
      <a href="<?= base_url('siswa/cetak/'.$siswa->id_siswa) ?>" target="blank" class="btn btn-sm btn-info btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-print"></i>
        </span>
        <span class="text">Cetak</span>
      </a>
      <a href="<?= base_url('siswa/detail/'.$siswa->id_siswa) ?>" class="btn btn-sm btn-success btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-cloud-download-alt"></i>
        </span>
        <span class="text">Download</span>
      </a>
    </div>
    <div class="card-body maxeder">
    <table class="table ">
			<tbody>
				<tr>
				  <td rowspan="100" width="100px">
              <img src="<?= base_url(); ?>uploads/photo_siswa/<?= $siswa->foto1 ?>" class="img-rounded img-thumbnail" width="90px">
              <?php if($siswa->foto2 != null): ?>
              <img src="<?= base_url(); ?>uploads/photo_siswa/<?= $siswa->foto2 ?>" class="img-rounded img-thumbnail" width="90px" style="margin-top:20px">
              <?php endif; if($siswa->foto3 != null): ?>
              <img src="<?= base_url(); ?>uploads/photo_siswa/<?= $siswa->foto3 ?>" class="img-rounded img-thumbnail" width="90px" style="margin-top:20px">
              <?php endif; ?>
				    </td>
			  	</tr>
				<tr>
					<td width="15%">NIS/NISN</td>
					<td width="10px">:</td>
					<td ><?= $siswa->nis; ?> / <?= $siswa->nisn; ?></td> 
        </tr>
				<tr>
					<td >Nama</td>
					<td>:</td>
					<td><strong><?= $siswa->nama_siswa; ?></strong></td>
				</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td>:</td>
					<td><?= $siswa->temp_lahir; ?></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><?= $siswa->tgl_lahir; ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td>
						<?php
						if ($siswa->jk=='L') {
							echo "Laki-laki";
						}
						else {
							echo "Perempuan";
						}
						?>						
					</td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>:</td>
					<td>
						<?= $siswa->agama; ?>
					</td>
					
				</tr>
				<tr>
					<td>Status Keluarga</td>
					<td>:</td>
					<td><?= $siswa->status_keluarga; ?></td>
				</tr>
				<tr>
					<td>Anak Ke</td>
					<td>:</td>
					<td><?= $siswa->anak_ke; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?= $siswa->alamat; ?></td>
					
				</tr>
				<tr>
					<td>Telp</td>
					<td>:</td>
					<td><?= $siswa->telp; ?></td>
					
				</tr>
				<tr>
					<td>Sekolah Asal</td>
					<td>:</td>
					<td><?= $siswa->asal_sekolah; ?></td>
					
				</tr>
        <tr>
          <td>Diterima dikelas</td>
					<td>:</td>
					<td><?= $siswa->kelas_diterima; ?></td>
        </tr>
        <tr>
          <td>Tanggal diterima</td>
					<td>:</td>
					<td><?= $siswa->tgl_diterima; ?></td>
        </tr>
        <tr>
          <td>Nama ayah</td>
					<td>:</td>
					<td><?= $siswa->nama_ayah; ?></td>
        </tr>
        <tr>
          <td>Nama ibu</td>
					<td>:</td>
					<td><?= $siswa->nama_ibu; ?></td>
        </tr>
        <tr>
          <td>Pekerjaan Ayah</td>
					<td>:</td>
					<td><?= $siswa->pekerjaan_ayah; ?></td>
        </tr>
        <tr>
        <td>Pekerjaan Ibu</td>
					<td>:</td>
					<td><?= $siswa->pekerjaan_ibu; ?></td>
        </tr>
        <tr>
          <td>Alamat orangtua</td>
					<td>:</td>
					<td><?= $siswa->alamat_orangtua; ?></td>
        </tr>
        <tr>
          <td>No Telp Rumah</td>
					<td>:</td>
					<td><?= $siswa->telp; ?></td>
        </tr>
        <tr>
          <td>Nama Wali</td>
					<td>:</td>
					<td><?= $siswa->nama_wali; ?></td>
        </tr>
        <tr>
          <td>Alamat Wali</td>
					<td>:</td>
					<td><?= $siswa->alamat_wali; ?></td>
        </tr>
        <tr>
          <td>Telp wali</td>
					<td>:</td>
					<td><?= $siswa->telp_wali; ?></td>
        </tr>
        <tr>
          <td>Pekerjaan Wali</td>
					<td>:</td>
					<td><?= $siswa->pekerjaan_wali; ?></td>
        </tr>
        <tr>

        </tr>
			</tbody>
		</table>
    </div>
    
    </div>
</div> 