<div class="header">
    <a href="<?php echo base_url("admin"); ?>" class="header-menu-left" >Home</a>
    <a href="<?php echo base_url("admin/selected"); ?>" class="header-menu-left" >selected works</a>
    <a href="<?php echo base_url("admin/archived"); ?>" class="header-menu-left" >archived works</a>
    <a href="<?php echo base_url("admin/change_password"); ?>" class="header-menu active">Ganti Password</a>
    <a href="<?php echo base_url("logout"); ?>" class="header-menu">Logout</a>
</div>
<div class="content">
    <?php 
        if (isset($_SESSION["message"])) {
            echo "<div class='success-message'>" . $_SESSION["message"] . "</div>";
        } else if (isset($_SESSION["error_message"])) {
            echo "<div class='error-message'>" . $_SESSION["error_message"] . "</div>'";
        }
    ?>
    <h1>Change Password</h1>
    <form method="post" action="<?php echo base_url("admin/do_change_password") ?>">
        <div class="form-item">
            <div class="label">Password Lama</div>
            <input type="password" name="old-password" class="old-password" maxlength="40" />
        </div>
        <div class="form-item">
            <div class="label">Password Baru</div>
            <input type="password" name="new-password" class="new-password" maxlength="40" />
        </div>
        <div class="form-item">
            <div class="label">Confirm Password Baru</div>
            <input type="password" name="confirm-new-password" class="confirm-new-password" maxlength="40" />
        </div>
        <button type="submit">Submit</button>
    </form>
</div>