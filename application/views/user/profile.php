<div class="container-fluid">
  <?= $this->session->flashdata('message'); ?>
  
  <div class="card mt-3" style="width: 30rem;">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <form action="<?= base_url('user/ubahpass') ?>" method="post">
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password1" class="form-control" placeholder="Password">
            <?= form_error('password1','<small class="form-text text-danger">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Confirm password</label>
            <input type="password" name="password2" class="form-control" placeholder="Confirm password">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-warning">Ubah password</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>