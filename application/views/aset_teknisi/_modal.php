                  <!-- ASET ADD NEW -->
                  <div class="modal fade" id="asetAddNew" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">New Aset</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
									<form class="form-horizontal form-label-left" method="post" action="<?= site_url('requestAset/addRequestAset') ?>" >

										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Kode</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="kode_aset" class="form-control" required >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Jenis</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="jenis_aset" class="form-control" required >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Jumlah</span>
											</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="numeric" name="jml_aset" class="form-control" required >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Satuan</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="sat_aset" class="form-control" >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Keterangan</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="keterangan" class="form-control" >
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<button type="reset" class="btn btn-primary">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>

                  <!-- ASET UPDATE -->
                  <?php foreach($asetTeknisi as $data) : ?>
                  <div class="modal fade" id="asetUpdate<?php echo $data->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Update Aset</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
									<form class="form-horizontal form-label-left" method="post" action="<?= site_url('asetTeknisi/updateAsetTeknisi') ?>" >

										<div class="form-group row ">
											<label class="control-label col-md-3 col-sm-3 ">Ba Id</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="hidden" name="id" value="<?php echo $data->id ?>" >
												<input type="text" name="ba_id" class="form-control" value="<?php echo $data->ba_id ?>" readonly >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Kode</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="kode" class="form-control" value="<?php echo $data->kode ?>" readonly >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Jenis</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="jenis" class="form-control" value="<?php echo $data->jenis ?>" readonly >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Kondisi</label>
											<div class="col-md-9 col-sm-9 ">
												<select class="form-control" name="kondisi">
													<option value="Baik">Baik</option>
													<option value="Rusak">Rusak</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Keterangan</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="keterangan" class="form-control" value="<?php echo $data->keterangan ?>" >
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<button type="reset" class="btn btn-primary">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>


<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Apakah Kamu Yakin?</h5>

        <button class="close" type="button" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">�</span>

        </button>

      </div>

      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>

      <div class="modal-footer">

        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>

      </div>

    </div>

  </div>

</div>