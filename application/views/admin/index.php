<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah siswa aktif</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_siswa ?></div>
          </div>
          <div class="col-auto">
            <i class="far fa-smile-beam fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah siswa tidak aktif</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_siswa_deactiv ?></div>
          </div>
          <div class="col-auto">
            <i class="far fa-grin-beam fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>