<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <!-- <img src="<?php echo base_url('assets/assets_stisla') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
            </div>

  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		
		<div class="login-form">
   
              

              <span class="m-2"><?php echo $this->session->flashdata('pesan') ?></span>

              <div class="card-body">
                <form method="POST" action="<?php echo base_url('auth/login') ?>">
                  <div class="group">
                    <label for="user"  class="label">Username</label>
                    <input id="user" type="text" class="input" name="username" tabindex="1" autofocus>
                    <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
                  </div>

                  <div class="group">
                    <div class="d-block">
                    	<label for="pass" class="label">Password</label>
                    </div>
                    <input id="pass" type="password" class="input" name="password" tabindex="2">    <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
                  </div>


                  <div class="group">
                    <button type="submit" class="button btn-primary btn-lg btn-block" tabindex="4">
                      Login
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