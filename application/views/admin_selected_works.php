<div class="header">
    <a href="<?php echo base_url("admin"); ?>" class="header-menu-left" >front works</a>
    <a href="<?php echo base_url("admin/selected"); ?>" class="header-menu-left active" >selected works</a>
    <a href="<?php echo base_url("admin/archived"); ?>" class="header-menu-left" >archived works</a>
    <a href="<?php echo base_url("admin/change_password"); ?>" class="header-menu">Ganti Password</a>
    <a href="logout" class="header-menu">Logout</a>
</div>
<div class="content">
    <div class="content-title">Selected Works</div>
    <?php for ($i = 0; $i < sizeof($works); $i++) { ?>
        <form class="edit-item" method="post" action="<?php echo base_url("admin/selected_works_update"); ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $works[$i]->works_id; ?>" />
            <div class="no"><?php echo ($i + 1); ?></div>
            <div class="image">
                <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
                <img src="<?php echo base_url("assets/images/works/" . $works[$i]->works_id . "." . $works[$i]->works_extension) . "?" . strtotime($works[$i]->modified_date); ?>" width="400px" />
            </div>
            <button type="submit" class="btn btn-save" disabled>Update</button>
        </form>
        <form class="form-delete" method="post" action="<?php echo base_url("admin/selected_works_delete"); ?>">
            <input type="hidden" name="id" value="<?php echo $works[$i]->works_id; ?>" />
            <button type="submit" class="btn btn-delete">Delete</button>
        </form>
    <?php } ?>
</div>
<button class="btn-add">+</button>
<form class="dialog hidden" method="post" action="<?php echo base_url("admin/selected_works_insert"); ?>" enctype="multipart/form-data">
    <div class="dialog-btn-close">X</div>
    <div class="dialog-title">Add Photo</div>
    <div class="form-item">
        <div class="form-label">At</div>
        <select class="form-input form-input-at" name="input-at">
            <option value="1">First</option>
            <option value="2">Last</option>
            <option value="3">Index</option>
        </select>
        <input type="number" class="form-input form-input-index hidden" name="input-index" value="1" min="1" max="<?php echo sizeof($works); ?>" />
    </div>
    <div class="form-item">
        <div class="form-label">Photo</div>
        <input type="file" class="form-input form-input-image" name="input-image" accept="image/jpeg, image/png" />
    </div>
    <img class="form-input-image-preview" />
    <button type="submit" class="btn-submit">Submit</button>
    <button type="button" class="btn-cancel">Cancel</button>
</form>