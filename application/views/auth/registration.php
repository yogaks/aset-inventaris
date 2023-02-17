<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('_partials/head'); ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php $this->load->view('_partials/sidebar'); ?>

        <!-- top navigation -->
            <?php $this->load->view('_partials/navbar'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">

                <div class="x_panel">
                    <section class="login_content">
                        <form  method="post" action="<?= site_url('registration') ?>" >
                            <h1>Create Account</h1>
                            <?php echo $this->session->flashdata('message'); ?>
                            <div>
                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter name" required/>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input class="form-control" name="username" id="username" type="text" placeholder="Enter nik" required/>
                                    <?php echo form_error('username', '<h3 class="text-danger pl-3">', '</h3>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" name="position" id="position" type="text" placeholder="Enter position" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input class="form-control" name="password" id="password" type="password" placeholder="Enter password" required/>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" name="confirmPassword" id="confirmPassword" type="password" placeholder="Confirm password" required/>
                                    <?php echo form_error('confirmPassword', '<h3 class="text-danger pl-3">', '</h3>'); ?>
                                </div>
                            </div>
                            <div>
                                <select class="form-control" name="roleId" id="roleId" required>
                                    <option value="">Select Role User</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Teknisi</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-default submit" >Submit</button>
                            </div>

                            <div class="clearfix"></div>
                        </form>
                    </section>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('_partials/footer'); ?>
        <!-- /footer content -->
      </div>
    </div>

    <?php $this->load->view('_partials/js'); ?>

  </body>
</html>