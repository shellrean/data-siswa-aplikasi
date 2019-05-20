<div class="container-fluid">
  <div class="card">
    <div class="card-header">
        <a href="<?= base_url('siswa') ?>" class="btn btn-sm btn-warning btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-backward"></i>
          </span>
          <span class="text">Kembali</span>
        </a>
    </div>
    <form method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group">
        <input type="file" name="file" id="fotoupload">
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
  <div class="card mt-5">
    <div class="card-header">
      Cara upload foto
    </div>
    <div class="card-body">
    <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Step #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        File yang diupload harus berekstensi .jpg atau .png
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Step #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Beri nama file foto yang akan diupload dengan format "Nis_NoPhoto" <br>
        untuk NoPhoto adalah : <br>
        1. Foto siswa ketika awal masuk <br>
        2. Foto siswa ketika lulus dari sekolah<br>
        3. Foto siswa ketika sudah bekerja <br>
        <br>
        contoh "7989_1.jpg"
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Step #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Tekan "choose file" lalu klik foto yang hendak di upload <br>
        tunggu proses upload selesai
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>