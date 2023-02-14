            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                                <?php 
                                    // QUERY MENU
                                    $role_id = $this->session->userdata('role_id');
                                    $queryMenu = "SELECT users_menu.id, menu FROM users_menu JOIN users_access_menu ON users_menu.id = users_access_menu.menu_id WHERE users_access_menu.role_id = $role_id ORDER BY users_access_menu.menu_id ASC";
                                    $menu = $this->db->query($queryMenu)->result_array();

                                    // LOOPING MENU
                                    foreach($menu as $m) : 
                                ?>

                                        <div class="sb-sidenav-menu-heading">
                                            <?php echo $m['menu']; ?>
                                        </div>

                                        <!-- SIAPKAN SUB MENU SESUAI MENU -->
                                        <?php 
                                            $menuId = $m['id'];
                                            $querySubMenu = "SELECT * FROM users_sub_menu JOIN users_menu ON users_sub_menu.menu_id = users_menu.id WHERE users_sub_menu.menu_id = $menuId AND users_sub_menu.is_active = 1";
                                            $subMenu = $this->db->query($querySubMenu)->result_array();

                                            // LOOPING SUB MENU
                                            foreach($subMenu as $sm) :
                                        ?>
                                                <a class="nav-link" href="<?php echo site_url($sm['url']); ?>">
                                                    <div class="sb-nav-link-icon"><i class="<?php echo $sm['icon']; ?>"></i></div>
                                                    <?php echo $sm['title'] ;?>
                                                </a>

                                <?php   
                                            endforeach;
                                    endforeach; 
                                ?>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>