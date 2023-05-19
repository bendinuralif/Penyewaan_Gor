<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <!-- <img src="<?php echo base_url('assets/assets_stisla/') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
            </div>

           
            <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Register</label>
		<div class="login-form">
              <div class="card-body">
                <form method="POST" action="<?php echo base_url('register') ?>">
                  <div class="row">
                    <div class="group">
                      <label for="nama" class="label">Nama</label>
                      <input id="nama" type="text" class="input" name="nama" autofocus>
                      <?php echo form_error('nama', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="group">
                      <label for="username">Username</label>
                      <input id="username" type="text" class="input" name="username">
                      <?php echo form_error('username', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                  </div>

                  <div class="group">
                    <label for="alamat">Alamat</label>
                    <input id="alamat" type="text" class="input" name="alamat">
                    <?php echo form_error('alamat', '<div class="text-small text-danger">','</div>') ?>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="group">
                      <label for="gender" class="d-block">Gender</label>
                      <select class="input text-white" name="gender">
                        <option value="">-- Pilih gender --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <?php echo form_error('gender', '<div class="text-small text-danger">','</div>') ?>
                      </div>
                    <div class="group">
                      <label for="no_telp" class="d-block">No. Telepon</label>
                      <input id="no_telp" type="text" class="input" name="no_telp">
                      <?php echo form_error('no_telp', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                    </div>
                  <div class="row">
                    <div class="group">
                      <label>No. KTP</label>
                      <input type="text" name="no_ktp" class="input">
                      <?php echo form_error('no_ktp', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="group">
                      <label>Password</label>
                      <input type="password" name="password" class="input">
                      <?php echo form_error('password', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                  </div>

                  <div class="group">
                    <button type="submit" class="button btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
</div>
</div>
</div>
     
          </div>
        </div>
      </div>
    </section>
  </div>