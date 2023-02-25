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
                <h1>Request Aset </h1>
                <h5>Data Request Aset</h5>
              </div>
            </div>

            <div class="clearfix"></div>
            <?php echo $this->session->flashdata('message'); ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#asetAddNew">Add New</button>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ba Id</th>
                                            <th>Kode</th>
                                            <th>Jenis</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Approval</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n=1; foreach($requestAset as $data) : ?>
                                        <tr>
                                            <td><?php echo $n++ ?></td>
                                            <td><?php echo $data->ba_id ?></td>
                                            <td><?php echo $data->kode_aset ?></td>
                                            <td><?php echo $data->jenis_aset ?></td>
                                            <td><?php echo $data->jml_aset ?></td>
                                            <td><?php echo $data->sat_aset ?></td>
                                            <td><?php if($data->app == 1 ) {echo "No";} elseif($data->app == 2 ) {echo "Yes";} ?></td>
                                            <td><?php if($data->status == 0 ) {echo "Input";} elseif($data->status == 1 ) {echo "Pending";} elseif($data->status == 2 ) {echo "Closed";} ?></td>
                                            <td><?php echo $data->keterangan ?></td>
                                            <td><?php echo $data->created_at ?></td>
                                            <td><?php echo $data->created_by ?></td>
                                            <td><?php echo $data->updated_at ?></td>
                                            <td><?php echo $data->updated_by ?></td>
                                            <td>
                                              <?php if($data->app != 2) { ?>
                                                <button type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#asetUpdate<?php echo $data->id_req ?>">Edit</button>
                                                <a onclick="deleteConfirm('<?php echo site_url('requestAset/deleteRequestAset/'.$data->id_req) ?>')"
                                                href="#!" class="btn btn-danger">Delete</a>
                                              <?php } ?>
                                            </td>
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

    <?php $this->load->view('request_aset/_modal'); ?>
    <?php $this->load->view('_partials/js'); ?>

    <script>
      function deleteConfirm(url){

        $('#btn-delete').attr('href', url);

        $('#deleteModal').modal();

      }
    </script>

  </body>
</html>
