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
                <h1>Aset Teknisi</h1>
                <h5>Data Aset Teknisi</h5>
              </div>
            </div>

            <div class="clearfix"></div>
            <?php echo $this->session->flashdata('message'); ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <!-- <div class="x_title">
                    <button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#asetAddNew">Add New</button>
                    <div class="clearfix"></div>
                  </div> -->
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
                                            <th>Kondisi</th>
                                            <th>Keterangan</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n=1; foreach($asetTeknisi as $data) : ?>
                                        <tr>
                                            <td><?php echo $n++ ?></td>
                                            <td><?php echo $data->ba_id ?></td>
                                            <td><?php echo $data->kode ?></td>
                                            <td><?php echo $data->jenis ?></td>
                                            <td><?php echo $data->jumlah ?></td>
                                            <td><?php echo $data->satuan ?></td>
                                            <td><?php echo $data->kondisi ?></td>
                                            <td><?php echo $data->keterangan ?></td>
                                            <td><?php echo $data->created_at ?></td>
                                            <td><?php echo $data->created_by ?></td>
                                            <td><?php echo $data->updated_at ?></td>
                                            <td><?php echo $data->updated_by ?></td>
                                            <td>
                                                <button type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#asetUpdate<?php echo $data->id ?>">Edit</button>
                                                <!-- <a onclick="deleteConfirm('<?php echo site_url('asetTeknisi/deleteAsetTeknisi/'.$data->id) ?>')"
                                                href="#!" class="btn btn-danger">Delete</a> -->
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

    <?php $this->load->view('aset_teknisi/_modal'); ?>
    <?php $this->load->view('_partials/js'); ?>

    <script>
      function deleteConfirm(url){

        $('#btn-delete').attr('href', url);

        $('#deleteModal').modal();

      }
    </script>

  </body>
</html>
