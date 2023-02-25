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
            <div class="page-title">
              <div class="title_left">
                <h1>Berita Acara Aset </h1>
                <h5>Data Berita Acara Aset</h5>
              </div>
            </div>

            <div class="clearfix"></div>
            <?php echo $this->session->flashdata('message'); ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ba Id</th>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Date Request</th>
                                            <th>Date Approval</th>
                                            <th>Status Request</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n=1; foreach($beritaAcara as $data) : ?>
                                        <tr>
                                            <td><?php echo $n++ ?></td>
                                            <td><?php echo $data->ba_id ?></td>
                                            <td><?php echo $data->user_nik ?></td>
                                            <td><?php echo $data->user_nama ?></td>
                                            <td><?php echo $data->date_request ?></td>
                                            <td><?php echo $data->date_approval ?></td>
                                            <td><?php if($data->status_request == 0 ) {echo "Input";} elseif($data->status_request == 1 ) {echo "Pending";} elseif($data->status_request == 2 ) {echo "Closed";} ?></td>
                                            <td><?php echo $data->created_at ?></td>
                                            <td><?php echo $data->updated_at ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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

    <script>
      function deleteConfirm(url){

        $('#btn-delete').attr('href', url);

        $('#deleteModal').modal();

      }
    </script>

  </body>
</html>
