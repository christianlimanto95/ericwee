<?php
    if (isset($_SESSION["message"])) {
        echo '<div class="message">Thank you. We will contact you soon :)</div>';
    }
?>
<div class="content">
    <div class="section section-1">
        <form class="section-1-center" method="post" action="<?php echo base_url("contact/send_message"); ?>">
            <div class="section-1-title">CONTACT US</div>
            <div class="form">
                <input type="text" name="name" class="input-nama" maxlength="50" required autofocus />
                <div class="form-label">NAME</div>
            </div>
            <div class="form">
                <input type="tel" name="phone" class="input-hp" maxlength="14" required />
                <div class="form-label">PHONE NUMBER</div>
            </div>
            <div class="form">
                <textarea class="input-pesan" name="message" rows="3" required></textarea>
                <div class="form-label">MESSAGE</div>
            </div>
            <button type="submit" class="btn-kirim-pesan">
                <span data-content-type="text">SEND MESSAGE</span>
                <svg class="arrow" x="0px" y="0px"
	 width="26px" height="10px" viewBox="0 0 26 10" enable-background="new 0 0 26 10" xml:space="preserve">
                    <rect y="4.062" width="19.583" height="1.875" fill="#444"/>
                    <polygon points="18.91,1.121 26,5 18.91,8.879 " fill="#444"/>
                </svg>
            </button>
        </form>
        <div class="section-footer">
            <div class="social-media">
                <a href="https://www.instagram.com/ericweephoto/" target="_blank" class="social-media-item" data-content-type="text"><div class="social-media-item-icon" style="background-image: url('assets/icons/instagram.png?v=1');"></div>@ericweephoto</a>
                <div class="social-media-item" data-content-type="text"><div class="social-media-item-icon" style="background-image: url('assets/icons/line.png?v=1');"></div>ericwicak</div>
                <a href="tel:+6285230515511" class="social-media-item" data-content-type="text"><div class="social-media-item-icon" style="background-image: url('assets/icons/whatsapp.png?v=1');"></div>0852 3051 5511</a>
            </div>
        </div>
    </div>
</div>