<div class="header">
    <a href="<?php echo base_url("admin"); ?>" class="header-menu-left" >Home</a>
    <a href="<?php echo base_url("admin/selected"); ?>" class="header-menu-left" >selected works</a>
    <a href="<?php echo base_url("admin/archived"); ?>" class="header-menu-left" >archived works</a>
    <a href="<?php echo base_url("admin/services"); ?>" class="header-menu-left active" >Services</a>
    <a href="<?php echo base_url("admin/change_password"); ?>" class="header-menu">Ganti Password</a>
    <a href="<?php echo base_url("logout"); ?>" class="header-menu">Logout</a>
</div>
<div class="content">
    <div class="content-title">Services</div>
    <?php
        if ($services != "") {
            $iLength = sizeof($services);
            $servicePackageId = $services[0]->service_package_id;
            $servicePackageCtr = 1;
            $serviceGroupId = $services[0]->service_group_id;
            $serviceGroupCtr = 1;
            echo "<div class='service-group'>";
            echo "<form class='service-group-title' data-content-type='text' data-anim='fade-anim' method='post' action='" . base_url("admin/update_service_group_name") . "' ><span class='label'>Nama Group : </span><input type='hidden' name='service_group_id' value='" . $services[0]->service_group_id . "' /><input type='text' name='service_group_name' value='" . $services[0]->service_group_name . "' /></form>";
            echo "<form method='post' action='" . base_url("admin/update_service_group_area") . "' class='service-area' data-content-type='text' data-anim='fade-anim'><span class='label'>Keterangan : </span><input type='hidden' name='service_group_id' value='" . $services[0]->service_group_id . "' /><input type='text' name='service_group_area' value='" . $services[0]->service_group_area . "' /></form>";
            echo "<div class='service-package' data-no='" . $servicePackageCtr . "' data-anim='fade-anim'>";
            echo "<form method='post' action='" . base_url("admin/update_service_package_name") . "' class='service-package-title' data-content-type='text'><span class='label'>Nama Paket : </span><input type='hidden' name='service_package_id' value='" . $services[0]->service_package_id . "' /><input type='text' name='service_package_name' value='" . $services[0]->service_package_name . "' /></form>";

            $servicePrice = -1;
            $servicePackageCloseTag = false;
            $groupPackageCtr = 1;
            for ($i = 0; $i < $iLength; $i++) {
                if ($serviceGroupId != $services[$i]->service_group_id) {
                    $groupPackageCtr = 0;
                    if ($servicePrice == -1) {
                        $servicePrice = $services[$i]->service_package_price;
                        echo "<div class='service-price' data-content-type='text'><span class='label'>Harga : IDR </span><input type='text' name='service_package_price' value='" . $services[$i]->service_package_price . "' /></div>";
                    }
                    echo "</div>";
                    echo "</div>";
                    $serviceGroupId = $services[$i]->service_group_id;
                    $serviceGroupCtr++;
                    echo "<div class='service-group'>";
                    echo "<form method='post' action='" . base_url("admin/update_service_group_name") . "' class='service-group-title' data-content-type='text' data-anim='fade-anim' ><span class='label'>Nama Group : </span><input type='hidden' name='service_group_id' value='" . $services[$i]->service_group_id . "' /><input type='text' name='service_group_name' value='" . $services[$i]->service_group_name . "' /></form>";
                    echo "<form method='post' action='" . base_url("admin/update_service_group_area") . "' class='service-area' data-content-type='text' data-anim='fade-anim'><span class='label'>Keterangan : </span><input type='hidden' name='service_group_id' value='" . $services[$i]->service_group_id . "' /><input type='text' name='service_group_area' value='" . $services[$i]->service_group_area . "' /></form>";
                    $servicePrice = -1;
                    $servicePackageCloseTag = true;
                } else {
                    if ($servicePackageId != $services[$i]->service_package_id) {
                        $groupPackageCtr++;
                        
                        if (!$servicePackageCloseTag) {
                            if ($servicePrice == -1) {
                                $servicePrice = $services[$i]->service_package_price;
                                echo "<div class='service-price' data-content-type='text'><span class='label'>Harga : IDR </span><input type='text' name='service_package_price' value='" . $services[$i]->service_package_price . "' /></div>";
                            }
                            echo "</div>";
                        } else {
                            $servicePackageCloseTag = false;
                        }
                        
                        if ($groupPackageCtr > 2) {
                            $groupPackageCtr = 0;
                            echo "<div class='service-package-horizontal-separator'></div>";
                        }
                        $servicePackageId = $services[$i]->service_package_id;
                        $servicePackageCtr++;
                        echo "<div class='service-package' data-no='" . $servicePackageCtr . "' data-anim='fade-anim'>";
                        echo "<form method='post' action='" . base_url("admin/update_service_package_name") . "' class='service-package-title' data-content-type='text'><span class='label'>Nama Paket : </span><input type='hidden' name='service_package_id' value='" . $services[$i]->service_package_id . "' /><input type='text' name='service_package_name' value='" . $services[$i]->service_package_name . "' /></form>";
                        $servicePrice = -1;
                    } else {
                        if ($services[$i]->service_item_type == 1) {
                            echo "<div class='service-name' data-content-type='text'><span class='label'>Deskripsi : </span><input type='hidden' name='service_item_id' value='" . $services[$i]->service_item_id . "' /><input type='text' name='service_item_name' value='" . $services[$i]->service_item_name . "' /></div>";
                        } else {
                            if ($servicePrice == -1) {
                                $servicePrice = $services[$i]->service_package_price;
                                echo "<div class='service-price' data-content-type='text'><span class='label'>Harga : IDR </span><input type='text' name='service_package_price' value='" . $services[$i]->service_package_price . "' /></div>";
                            }
                            echo "<div class='service-note' data-content-type='text'><span class='label'>Tambahan : </span><input type='hidden' name='service_item_id' value='" . $services[$i]->service_item_id . "' /><input type='text' name='service_note' value='" . $services[$i]->service_item_name . "' /></div>";
                        }
                    }
                }
            }
            if ($servicePrice == -1) {
                echo "<div class='service-price' data-content-type='text'><span class='label'>Harga : IDR </span><input type='text' name='service_package_price' value='" . $services[$i - 1]->service_package_price . "' /></div>";
            }
            echo "</div></div>";
        }
    ?>
</div>