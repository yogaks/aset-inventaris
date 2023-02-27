<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('_partials/head') ?>

  <body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">           
                            <div class="col-lg">
                                <div class="p-5">

                                    <div class="text-center">
                                                    <!-- <div><img src="<?= base_url('assets/img/matador.png');?>" width="35%"></div> -->
                                                <h1 class="h1 text-gray-1000 mb-4">Aset Inventaris</h1>
                                    </div>
                                    <br>

                                    <?= $this->session->flashdata('message');?>

                                    <form class="user" method="post" action="<?= base_url('auth'); ?>">

                                        <div class="form-group">

                                            <input type="text" class="form-control"

                                                id="username" name="username"

                                                placeholder="Username" value="<?= set_value('username'); ?>">

                                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>

                                        <div class="form-group">

                                            <input type="password" class="form-control"

                                                id="password" name="password" placeholder="Password">

                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                        
                                        <br>

                                        <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-sign-in-alt fa-fw"></i>

                                        Login

                                        </button>
                                        

                                        

                                    </form>
                                    <div class="text-center">

                                        <!-- <p>By Signin, I agree to the <a href="" data-toggle="modal" data-target="#termofuse" >Term of Use</a></p> -->

                                        <!-- <a class="small" style="color:black;" href="<?php echo site_url("ResetPassword")?>">Forgot Password ?</a> -->
                                        <!-- <strong>
                                            
                                            <p class="signup-link" style="font-size:13px; margin-top: 10px;margin-bottom: 10px;color:black;">RAJA  © 2021, All Rights Reserved.<br>Created By Telkom Akses Jogja | <a href="https://t.me/dhitdot" target="_blank" style="color:black">Adhitya</a> &middot; <a href="https://t.me/Rizky_B" target="_blank" style="color:black">Rizky</a> &middot; <a href="https://t.me/mauulagi" target="_blank" style="color:black">Sasongko</a> &middot; <a href="https://t.me/maaplama" target="_blank" style="color:black">Acil</a></p>
                                        </strong> -->
                                        

                                        <!-- <div>
                                            <strong style="color:black">Beta Version</strong>

                                        </div> -->
                                    </div>

                                    <!-- <hr> -->

                                    <!-- <div class="text-center">

                                        <a class="small" href="register.html">Create an Account!</a>

                                    </div> -->

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

  </body>
</html>
