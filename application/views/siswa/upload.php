<div class="container-fluid">
  <div class="card">
    <div class="card-header">
        <a href="<?= base_url('siswa') ?>" class="btn btn-sm btn-warning btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-backward"></i>
          </span>
          <span class="text">Kembali</span>
        </a>
        <a href="<?= base_url('download/format_import_siswa.xlsx') ?>" class="btn btn-sm btn-success btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-cloud-download-alt"></i>
          </span>
          <span class="text">Download format upload</span>
        </a>
    </div>
    <form method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group">
        <input type="file" name="file" id="fileupload">
      </div>
      <div class="progress ">
        <div class="progress-bar progress-bar-striped bg-info" id="progress-bar" role="progressbar" style="width: 0%;" aria-valuemin="0" aria-valuemax="100">
        <span id="status"></span>
      </div>
      </div>
      
    </div>

    <div class="card-footer text-muted ">
      <small class="form-text text-success"></small>
    </div>
    </form>
  </div>
</div>