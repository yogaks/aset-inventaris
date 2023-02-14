<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('_partials/head.php') ?>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                        <?php echo $this->session->flashdata('message'); ?>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="<?php echo site_url('registration') ?>" >
                                            <div class="form-group">
                                                <label class="small mb-1" for="name">Name</label>
                                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter name" required/>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="nik">NIK</label>
                                                        <input class="form-control" name="username" id="username" type="text" placeholder="Enter nik" required/>
                                                        <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="position">Position</label>
                                                        <input class="form-control" name="position" id="position" type="text" placeholder="Enter position" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <label class="small mb-1" for="roleUser">Role User</label>
                                                </div>
                                                <select class="form-control" name="roleId" id="roleId" required>
                                                    <option value="1">ADMIN</option>
                                                    <option value="2">TEKNISI</option>
                                                </select>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="password">Password</label>
                                                        <input class="form-control" name="password" id="password" type="password" placeholder="Enter password" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                                        <input class="form-control" name="confirmPassword" id="confirmPassword" type="password" placeholder="Confirm password" required/>
                                                        <?php echo form_error('confirmPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" >Create Account</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <!-- <div class="small"><a href="login.html">Have an account? Go to login</a></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <?php $this->load->view('_partials/js.php') ?>
    </body>
</html>
