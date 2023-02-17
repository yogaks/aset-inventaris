        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= site_url('dashboard-utama'); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Aset Inventaris</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url(); ?>production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('name') ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <?php 
                  // QUERY MENU
                  $role_id = $this->session->userdata('role_id');
                  $queryMenu = "SELECT users_menu.id, menu, icon FROM users_menu JOIN users_access_menu ON users_menu.id = users_access_menu.menu_id WHERE users_access_menu.role_id = $role_id ORDER BY users_access_menu.menu_id ASC";
                  $menu = $this->db->query($queryMenu)->result_array();

                  // LOOPING MENU
                  foreach($menu as $m) : 
                ?>
                <ul class="nav side-menu">
                  <li><a><i class="<?php echo $m['icon']; ?>" ></i><?php echo $m['menu']; ?><span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child_menu">
                    <!-- SIAPKAN SUB MENU SESUAI MENU -->
                    <?php 
                      $menuId = $m['id'];
                      $querySubMenu = "SELECT * FROM users_sub_menu JOIN users_menu ON users_sub_menu.menu_id = users_menu.id WHERE users_sub_menu.menu_id = $menuId AND users_sub_menu.is_active = 1";
                      $subMenu = $this->db->query($querySubMenu)->result_array();

                      // LOOPING SUB MENU
                      foreach($subMenu as $sm) :
                     ?>
                      <li ><a href="<?php echo site_url($sm['url']); ?>"><?php echo $sm['title'] ;?></a></li>
                    <?php   
                        endforeach;
                    ?>
                   </ul>
                  </li>
                </ul>
                <?php
                     endforeach; 
                ?>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        