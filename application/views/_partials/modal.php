<!-- ============ MODAL ADD ASET =============== -->
<!-- <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Add Aset</h5>                
        <button type="button" class="close" data-dismiss="modal">×</button>
    </div>
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="">
        <div class="modal-body">

            <div class="form-group">
                <div class="col-xs-8">
                    <input name="sc_id" class="form-control" type="text" readonly>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-8">
                    <input name="track_id" class="form-control" type="text" readonly>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-8">
                    <input name="cust_name" class="form-control" type="text" readonly>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-8">
                     <select name="status_lapangan" id="status_lapangan" class="form-control" required>
                        <option value="">-PILIH-</option>
                        <option value="KENDALA PELANGGAN">KENDALA PELANGGAN</option>
                        <option value="KENDALA TEKNIK">KENDALA TEKNIK</option>
                        <option value="CANCEL">CANCEL</option>
                        <option value="PS">PS</option>
                     </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-8">
                     <select name="kendala" id="kendala" class="form-control" hidden required>
                        <option value="">-PILIH-</option>
                        <option id="kendala1" value="MANJA H+" hidden>MANJA H+</option>
                        <option id="kendala2" value="RNA" hidden>RNA</option>
                        <option id="kendala3" value="LOKASI BELUM SIAP" hidden>LOKASI BELUM SIAP</option>
                        <option id="kendala4" value="TUNGGU KONFIRMASI CALANG" hidden>TUNGGU KONFIRMASI CALANG</option>
                        <option id="kendala5" value="BUTUH IZIN TATI/PENARIKAN" hidden>BUTUH IZIN TATI/PENARIKAN</option>
                        <option id="kendala6" value="RUKOS" hidden>RUKOS</option>
                        <option id="kendala7" value="ANTRI TATI" hidden>ANTRI TATI</option>
                        <option id="kendala8" value="ODP FULL SUDAH VALIN" hidden>ODP FULL SUDAH VALIN</option>
                        <option id="kendala9" value="ODP FULL TIDAK BISA VALIN" hidden>ODP FULL TIDAK BISA VALIN</option>
                        <option id="kendala10" value="ODP LOSS UNSPEC" hidden>ODP LOSS UNSPEC</option>
                        <option id="kendala11" value="ODP BELUM GO LIVE" hidden>ODP BELUM GO LIVE</option>
                        <option id="kendala12" value="HR" hidden>HR</option>
                        <option id="kendala13" value="BATAL APS" hidden>BATAL APS</option>
                        <option id="kendala14" value="DOUBLE ORDER" hidden>DOUBLE ORDER</option>
                        <option id="kendala15" value="ONU >= 32 AKTIF SEMUA" hidden>ONU >= 32 AKTIF SEMUA</option>
                        <option id="kendala16" value="CROSSING" hidden>CROSSING</option>
                        <option id="kendala17" value="IZIN TATI/PENARIKAN NOK" hidden>IZIN TATI/PENARIKAN NOK</option>
                        <option id="kendala18" value="TIDAK ADA JARINGAN" hidden>TIDAK ADA JARINGAN</option>
                     </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-8">
                    <input name="kordinat" value="" class="form-control" type="text" placeholder="koordinat pelanggan" required>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn btn-danger" type='reset'>Reset</button>
            <button class="btn btn-success">Save</button>
        </div>
    </form>
    </div>
    </div>
</div> -->
<!--END MODAL EDIT WORK ORDER-->

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
									<form class="form-horizontal form-label-left" method="post" action="<?= site_url('aset/addAset') ?>" >

										<div class="form-group row ">
											<label class="control-label col-md-3 col-sm-3 ">Nama</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="as_nama" class="form-control" required >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Jenis</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="as_jenis" class="form-control" required >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Kode</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="as_kode" class="form-control" required >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Jumlah</span>
											</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="numeric" name="as_jml" class="form-control" required >
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Satuan</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" name="as_sat" class="form-control" >
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