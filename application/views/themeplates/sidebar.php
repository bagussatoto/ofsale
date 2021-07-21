<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <?php 
                            // UQERY MENU
                            // JOIN TABEL USER MENU & USER ACCESS MENU
                            $role_id = $this->session->userdata('role_id');
                            $queryMenu = "
                                        SELECT `user_menu`.`id`, `menu` 
                                        FROM `user_menu` JOIN `user_access_menu` 
                                        ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
                                        WHERE `user_access_menu`.`role_id` = $role_id 
                                        ORDER BY `user_access_menu`.`menu_id` ASC
                            ";
                            $menu = $this->db->query($queryMenu)->result_array();
                            // var_dump($menu); die;

                            ?>

                            <!-- LOOPING HEADER MENU -->
                            <?php foreach($menu as $m) : ?>
                            <div class="sb-sidenav-menu-heading">
                                <?= $m['menu']; ?>
                            </div>

                            <!-- QUERY SUB MENU -->
                            <!-- JOIN TABEL USER SUB MENU & USER MENU -->
                            <?php 
                            $menuId = $m['id'];
                            $querySubMenu = "
                                            SELECT * FROM `user_sub_menu` JOIN `user_menu` 
                                            ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                                            WHERE `user_sub_menu`.`menu_id` = $menuId 
                                            AND `user_sub_menu`.`is_active` = 1
                            ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                            ?>
                            
                            <?php foreach($subMenu as $sm) : ?>
                                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                                    <div class="sb-nav-link-icon"><i class="<?= $sm['icon']; ?>"></i></div>
                                    <?= $sm['title'] ?>
                                </a>
                            <?php endforeach; ?>
                            
                            <?php endforeach; ?>

                            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?= $user['nama']; ?>
                    </div>
                </nav>
            </div>