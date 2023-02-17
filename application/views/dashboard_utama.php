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
                  <div class="x_title">
                    <!-- <button class="btn btn-round btn-primary" >Add New</button> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <h1>Hello, <?= $this->session->userdata('name') ?></h1>
                      <h3>Selamat datang diaplikasi <b>aset inventaris</b> </h3>
                    </div>
                  </div>
                  </div>
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
