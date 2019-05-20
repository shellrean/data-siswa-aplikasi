<div class="container-fluid">
    <!-- DataTales Example -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="<?= base_url('siswa/create') ?>" class="btn btn-sm btn-info btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-user-plus"></i>
            </span>
            <span class="text">Tambah siswa</span>
          </a>
          
          <a href="<?= base_url('siswa/upload') ?>" class="btn btn-sm btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-cloud-upload-alt"></i>
            </span>
            <span class="text">Upload siswa</span>
          </a>
          <a href="<?= base_url('siswa/upload_foto') ?>" class="btn btn-sm btn-danger btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-cloud-upload-alt"></i>
            </span>
            <span class="text">Upload foto siswa</span>
          </a>

          <a href="<?= base_url('siswa/excel') ?>" class="btn btn-sm btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-cloud-download-alt"></i>
            </span>
            <span class="text">Download seluruh data siswa</span>
          </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>NISN</td>
                        <td>NIS</td>
                        <td>NAMA LENGKAP</td>
                        <td>L/P</td>
                        <td>AKSI</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($siswas as $siswa): ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $siswa->nisn ?></td>
                        <td><?= $siswa->nis ?></td>
                        <td><?= $siswa->nama_siswa ?></td>
                        <td><?= $siswa->jk ?></td>
                        <td>
                          <a href="<?= base_url('siswa/detail/'.$siswa->id_siswa) ?>" class="btn btn-sm btn-success btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-id-card-alt"></i>
                            </span>
                            <span class="text">Lihat</span>
                          </a>
                          <a href="<?= base_url('siswa/edit/'.$siswa->id_siswa) ?>" class="btn btn-sm btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="far fa-edit"></i>
                            </span>
                            <span class="text">Edit</span>
                          </a>
                          <a href="<?= base_url('siswa/delete/'.$siswa->id_siswa) ?>" class="btn btn-sm btn-danger btn-icon-split" onclick=" return confirm(`Data Ini akan dihapus?`) ">
                            <span class="icon text-white-50">
                              <i class="fas fa-user-slash"></i> 
                            </span>
                            <span class="text">Hapus</span>
                          </a>
                          
                        </td>
                      </tr>
                      <?php $no++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 