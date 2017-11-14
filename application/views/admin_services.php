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
            echo "<div class='service-group' data-id='" . $services[0]->service_group_id . "'>";
            echo "<form class='service-group-title' data-content-type='text' data-anim='fade-anim' method='post' action='" . base_url("admin/update_service_group_name") . "' ><span class='label'>Nama Group : </span><input type='hidden' name='service_group_id' value='" . $services[0]->service_group_id . "' /><input type='text' name='service_group_name' value='" . $services[0]->service_group_name . "' /></form>";
            echo "<form method='post' action='" . base_url("admin/update_service_group_area") . "' class='service-area' data-content-type='text' data-anim='fade-anim'><span class='label'>Keterangan : </span><input type='hidden' name='service_group_id' value='" . $services[0]->service_group_id . "' /><input type='text' name='service_group_area' value='" . $services[0]->service_group_area . "' /></form>";
            echo "<button class='btn btn-insert-package'>+ Tambah Paket</button>";

            echo "<div class='service-package' data-no='" . $servicePackageCtr . "' data-anim='fade-anim'>";
            echo "<form method='post' action='" . base_url("admin/update_service_package_name") . "' class='service-package-title form-update-package-name' data-content-type='text'><span class='label'>Nama Paket : </span><input type='hidden' name='service_package_id' value='" . $services[0]->service_package_id . "' /><input type='text' name='service_package_name' value='" . $services[0]->service_package_name . "' /></form>";
            echo "<form class='form-delete' method='post' action='" . base_url("admin/delete_package") . "'><input type='hidden' name='service_package_id' value='" . $services[0]->service_package_id . "' /><button class='btn btn-delete btn-delete-package'>Hapus Paket</button></form>";
            echo "<form method='post' action='" . base_url("admin/update_service_package_description") . "' class='service-name' data-content-type='text'><span class='label'>Deskripsi : </span><input type='hidden' name='service_package_id' value='" . $services[0]->service_package_id . "' /><textarea name='service_package_description'>" . $services[0]->service_package_description . "</textarea></form>";
            echo "<form method='post' action='" . base_url("admin/update_service_package_price") . "' class='service-price' data-content-type='text'><span class='label'>Harga : IDR </span><input type='hidden' name='service_package_id' value='" . $services[0]->service_package_id . "' /><input type='number' name='service_package_price' value='" . $services[0]->service_package_price . "' /></form>";
            echo "<form method='post' action='" . base_url("admin/update_service_package_addon") . "' class='service-note' data-content-type='text'><span class='label'>Tambahan : </span><input type='hidden' name='service_package_id' value='" . $services[0]->service_package_id . "' /><textarea name='service_package_addon'>" . $services[0]->service_package_addon . "</textarea></form>";
            echo "</div>";

            for ($i = 1; $i < $iLength; $i++) {
                if ($serviceGroupId != $services[$i]->service_group_id) {                    
                    echo "</div>";
                    $serviceGroupId = $services[$i]->service_group_id;
                    $serviceGroupCtr++;
                    echo "<div class='service-group' data-id='" . $services[$i]->service_group_id . "'>";
                    echo "<form method='post' action='" . base_url("admin/update_service_group_name") . "' class='service-group-title' data-content-type='text' data-anim='fade-anim' ><span class='label'>Nama Group : </span><input type='hidden' name='service_group_id' value='" . $services[$i]->service_group_id . "' /><input type='text' name='service_group_name' value='" . $services[$i]->service_group_name . "' /></form>";
                    echo "<form method='post' action='" . base_url("admin/update_service_group_area") . "' class='service-area' data-content-type='text' data-anim='fade-anim'><span class='label'>Keterangan : </span><input type='hidden' name='service_group_id' value='" . $services[$i]->service_group_id . "' /><input type='text' name='service_group_area' value='" . $services[$i]->service_group_area . "' /></form>";
                    echo "<button class='btn btn-insert-package'>+ Tambah Paket</button>";
                }

                echo "<div class='service-package' data-no='" . $servicePackageCtr . "' data-anim='fade-anim'>";
                echo "<form method='post' action='" . base_url("admin/update_service_package_name") . "' class='service-package-title form-update-package-name' data-content-type='text'><span class='label'>Nama Paket : </span><input type='hidden' name='service_package_id' value='" . $services[$i]->service_package_id . "' /><input type='text' name='service_package_name' value='" . $services[$i]->service_package_name . "' /></form>";
                echo "<form class='form-delete' method='post' action='" . base_url("admin/delete_package") . "'><input type='hidden' name='service_package_id' value='" . $services[$i]->service_package_id . "' /><button class='btn btn-delete btn-delete-package'>Hapus Paket</button></form>";
                echo "<form method='post' action='" . base_url("admin/update_service_package_description") . "' class='service-name' data-content-type='text'><span class='label'>Deskripsi : </span><input type='hidden' name='service_package_id' value='" . $services[$i]->service_package_id . "' /><textarea name='service_package_description'>" . $services[$i]->service_package_description . "</textarea></form>";
                echo "<form method='post' action='" . base_url("admin/update_service_package_price") . "' class='service-price' data-content-type='text'><span class='label'>Harga : IDR </span><input type='hidden' name='service_package_id' value='" . $services[$i]->service_package_id . "' /><input type='number' name='service_package_price' value='" . $services[$i]->service_package_price . "' /></form>";
                echo "<form method='post' action='" . base_url("admin/update_service_package_addon") . "' class='service-note' data-content-type='text'><span class='label'>Tambahan : </span><input type='hidden' name='service_package_id' value='" . $services[$i]->service_package_id . "' /><textarea name='service_package_addon'>" . $services[$i]->service_package_addon . "</textarea></form>";
                echo "</div>";
            }
            
            echo "</div>";
        }
    ?>
</div>
<button class="btn btn-insert-group">+ Tambah Group</button>
<form class="dialog dialog-insert-group" method="post" action="<?php echo base_url("admin/insert_group"); ?>">
    <div class="btn-close-dialog">X</div>
    <div class="dialog-title">Tambah Group</div>
    <div class="dialog-item">
        <span class="label">Nama Group</span>
        <input type="text" class="dialog-input" name="service_group_name" />
    </div>
    <div class="dialog-item">
        <span class="label">Keterangan</span>
        <input type="text" class="dialog-input" name="service_group_area" />
    </div>
    <div class="dialog-item">
        <span class="label">Nama Paket</span>
        <input type="text" class="dialog-input" name="service_package_name" />
    </div>
    <div class="dialog-item">
        <span class="label">Deskripsi</span>
        <textarea class="dialog-input" name="service_package_description"></textarea>
    </div>
    <div class="dialog-item">
        <span class="label">Harga Paket : IDR </span>
        <input type="number" class="dialog-input" name="service_package_price" />
    </div>
    <div class="dialog-item">
        <span class="label">Tambahan</span>
        <textarea class="dialog-input" name="service_package_addon"></textarea>
    </div>
    <button class="btn btn-submit-insert-group">Tambah Group</button>
</form>
<form class="dialog dialog-insert-package" method="post" action="<?php echo base_url("admin/insert_package"); ?>">
    <input type="hidden" name="service_group_id" value="" />
    <div class="btn-close-dialog">X</div>
    <div class="dialog-title">Tambah Paket</div>
    <div class="dialog-item">
        <span class="label">Nama Paket</span>
        <input type="text" class="dialog-input" name="service_package_name" />
    </div>
    <div class="dialog-item">
        <span class="label">Deskripsi</span>
        <textarea class="dialog-input" name="service_package_description"></textarea>
    </div>
    <div class="dialog-item">
        <span class="label">Harga Paket : IDR </span>
        <input type="number" class="dialog-input" name="service_package_price" />
    </div>
    <div class="dialog-item">
        <span class="label">Tambahan</span>
        <textarea class="dialog-input" name="service_package_addon"></textarea>
    </div>
    <button class="btn btn-submit-insert-package">Tambah Paket</button>
</form>