<div class="header">
    <a href="<?php echo base_url("admin"); ?>" class="header-menu-left active" >front works</a>
    <a href="<?php echo base_url("admin/selected"); ?>" class="header-menu-left" >selected works</a>
    <a href="<?php echo base_url("admin/archived"); ?>" class="header-menu-left" >archived works</a>
    <a href="<?php echo base_url("admin/change_password"); ?>" class="header-menu">Ganti Password</a>
    <a href="logout" class="header-menu">Logout</a>
</div>
<div class="content">
    <div class="content-title">Front Selected Works</div>
    <form class="edit-item" method="post" action="admin/front_submit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="1" />
        <div class="no">1</div>
        <div class="image">
            <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
            <img src="<?php echo base_url("assets/images/front_works/" . $front_works[0]->front_works_id . "." . $front_works[0]->front_works_extension) . "?" . strtotime($front_works[0]->modified_date); ?>" width="400px" />
        </div>
        <button type="submit" class="btn-save" disabled>Save</button>
    </form>
    <form class="edit-item" method="post" action="admin/front_submit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="2" />
        <div class="no">2</div>
        <div class="image">
            <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
            <img src="<?php echo base_url("assets/images/front_works/" . $front_works[1]->front_works_id . "." . $front_works[1]->front_works_extension) . "?" . strtotime($front_works[1]->modified_date); ?>" width="400px" />
        </div>
        <button type="submit" class="btn-save" disabled>Save</button>
    </form>
    <form class="edit-item" method="post" action="admin/front_submit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="3" />
        <div class="no">3</div>
        <div class="image">
            <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
            <img src="<?php echo base_url("assets/images/front_works/" . $front_works[2]->front_works_id . "." . $front_works[2]->front_works_extension) . "?" . strtotime($front_works[2]->modified_date); ?>" width="400px" />
        </div>
        <button type="submit" class="btn-save" disabled>Save</button>
    </form>
    <form class="edit-item" method="post" action="admin/front_submit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="4" />
        <div class="no">4</div>
        <div class="image">
            <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
            <img src="<?php echo base_url("assets/images/front_works/" . $front_works[3]->front_works_id . "." . $front_works[3]->front_works_extension) . "?" . strtotime($front_works[3]->modified_date); ?>" width="400px" />
        </div>
        <button type="submit" class="btn-save" disabled>Save</button>
    </form>
    <form class="edit-item" method="post" action="admin/front_submit" enctype="multipart/form-data">
        <input type="hidden" name="id" value="5" />
        <div class="no">5</div>
        <div class="image">
            <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
            <img src="<?php echo base_url("assets/images/front_works/" . $front_works[4]->front_works_id . "." . $front_works[4]->front_works_extension) . "?" . strtotime($front_works[4]->modified_date); ?>" width="400px" />
        </div>
        <button type="submit" class="btn-save" disabled>Save</button>
    </form>
</div>