<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="<?php echo site_url('css/styles.css') ?>" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <?php $this->session->flashdata('message'); ?>
                                    <div class="card-body">
                                        <form method="post" action="<?php echo site_url('registration') ?>" >
                                            <div class="form-group">
                                                <label class="small mb-1" for="name">Name</label>
                                                <input class="form-control py-4" name="name" id="name" type="text" placeholder="Enter name" required/>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="nik">NIK</label>
                                                        <input class="form-control py-4" name="username" id="username" type="text" placeholder="Enter nik" required/>
                                                        <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="position">Position</label>
                                                        <input class="form-control py-4" name="position" id="position" type="text" placeholder="Enter position" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group-prepend">
                                                    <label class="small mb-1" for="roleUser">Role User</label>
                                                </div>
                                                <select class="custom-select" name="roleId" id="roleId" required>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                </select>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="password">Password</label>
                                                        <input class="form-control py-4" name="password" id="password" type="password" placeholder="Enter password" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" name="confirmPassword" id="confirmPassword" type="password" placeholder="Confirm password" required/>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo site_url('js/scripts.js') ?>"></script>
    </body>
</html>
