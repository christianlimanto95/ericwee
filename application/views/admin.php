<div class="header">
    <a href="<?php echo base_url(); ?>" class="header-menu-left active" >front works</a>
    <a href="selected" class="header-menu-left" >selected works</a>
    <a href="archived" class="header-menu-left" >archived works</a>
    <a href="change_password" class="header-menu">Ganti Password</a>
    <a href="logout" class="header-menu">Logout</a>
</div>
<div class="content">
    <div class="content-title">Front Selected Works</div>
    <form class="edit-item" method="post" action="front_submit" enctype="multipart/form-data">
        <div class="no">1</div>
        <div class="image">
            <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
            <img src="<?php echo "http://localhost/ericwee/assets/images/front_works/" . $front_works[0]->front_works_id . "." . $front_works[0]->front_works_extension; ?>" width="400px" />
        </div>
        <input type="text" value="<?php echo $front_works[0]->front_works_name; ?>" class="input-name input-name-1" name="input-name-1" />
        <button type="submit" class="btn-save">Save</button>
    </form>
    <form class="edit-item" method="post" action="front_submit" enctype="multipart/form-data">
        <div class="no">2</div>
        <div class="image">
            <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
            <img src="<?php echo "http://localhost/ericwee/assets/images/front_works/" . $front_works[1]->front_works_id . "." . $front_works[1]->front_works_extension; ?>" width="400px" />
        </div>
        <input type="text" value="<?php echo $front_works[1]->front_works_name; ?>" class="input-name input-name-2" name="input-name-2" />
        <button type="submit" class="btn-save">Save</button>
    </form>
    <form class="edit-item" method="post" action="front_submit" enctype="multipart/form-data">
        <div class="no">3</div>
        <div class="image">
            <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
            <img src="<?php echo "http://localhost/ericwee/assets/images/front_works/" . $front_works[2]->front_works_id . "." . $front_works[2]->front_works_extension; ?>" width="400px" />
        </div>
        <input type="text" value="<?php echo $front_works[2]->front_works_name; ?>" class="input-name input-name-3" name="input-name-3" />
        <button type="submit" class="btn-save">Save</button>
    </form>
    <form class="edit-item" method="post" action="front_submit" enctype="multipart/form-data">
        <div class="no">4</div>
        <div class="image">
            <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
            <img src="<?php echo "http://localhost/ericwee/assets/images/front_works/" . $front_works[3]->front_works_id . "." . $front_works[3]->front_works_extension; ?>" width="400px" />
        </div>
        <input type="text" value="<?php echo $front_works[3]->front_works_name; ?>" class="input-name input-name-4" name="input-name-4" />
        <button type="submit" class="btn-save">Save</button>
    </form>
    <form class="edit-item" method="post" action="front_submit" enctype="multipart/form-data">
        <div class="no">5</div>
        <div class="image">
            <input type="file" class="input-image" name="input-image" accept="image/jpeg, image/png" />
            <img src="<?php echo "http://localhost/ericwee/assets/images/front_works/" . $front_works[4]->front_works_id . "." . $front_works[4]->front_works_extension; ?>" width="400px" />
        </div>
        <input type="text" value="<?php echo $front_works[4]->front_works_name; ?>" class="input-name input-name-5" name="input-name-5" />
        <button type="submit" class="btn-save">Save</button>
    </form>
</div>