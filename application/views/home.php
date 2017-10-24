<div class="content">
    <div class="section section-1">
        <div class="section-1-center">
            <div class="section-1-logo" data-anim="fade-anim" style="background-image: url('assets/icons/logo.svg');"></div>
            <div class="section-1-ericwee" data-anim="fade-anim" ><span data-content-type="text">ERICWEEPHOTO</span></div>
            <div class="section-1-text" data-anim="fade-anim"><span data-content-type="text">WE ARE SPECIALIZED IN PREWEDDING PHOTOGRAPHY.<br>BASED IN SURABAYA.</span></div>
        </div>
    </div>
    <div class="section section-2">
        <div class="section-2-title" data-anim="fade-anim"><span data-content-type="text">OUR SELECTED WORKS</span></div>
        <a href="works" class="section-2-see-all-our-works href" data-anim="fade-anim"><span data-content-type="text">see all of our works</span><div class="arrow" style="background-image: url('assets/icons/arrow.svg');"></div></a>
        <div class="selected-works-container" data-anim="fade-anim">
            <?php
                for ($i = 0; $i < sizeof($front_works); $i++) {
                    echo "<div class='selected-work selected-work-" . ($i + 1) . "' data-no='" . ($i + 1) . "' style='background-image: url(assets/images/front_works/" . $front_works[$i]->front_works_id . "." . $front_works[$i]->front_works_extension . "?" . strtotime($front_works[$i]->modified_date) . ");'></div>";
                }
            ?>
            <div class="selected-works-left"></div>
            <div class="selected-works-arrow-left" style="background-image: url('assets/icons/ic_keyboard_arrow_left_black_48px.svg');"></div>
            <div class="selected-works-right"></div>
            <div class="selected-works-arrow-right" style="background-image: url('assets/icons/ic_keyboard_arrow_left_black_48px.svg');"></div>
        </div>
    </div>
    <div class="section section-3">
        <div class="section-3-center">
            <div class="section-3-we-want" data-content-type="text">WE WANT TO BE YOUR PARTNER</div>
            <div class="social-media">
                <a href="https://www.instagram.com/ericweephoto/" target="_blank" class="social-media-item" data-content-type="text"><div class="social-media-item-icon" style="background-image: url('assets/icons/instagram.png');"></div>@ericweephoto</a>
                <div class="social-media-item" data-content-type="text"><div class="social-media-item-icon" style="background-image: url('assets/icons/line.png');"></div>@ericwicak</div>
                <a href="tel:+6285230515511" class="social-media-item" data-content-type="text"><div class="social-media-item-icon" style="background-image: url('assets/icons/whatsapp.png');"></div>0852 3051 5511</a>
            </div>
            <div class="section-3-contact-me" data-content-type="text">CONTACT US</div>
        </div>
    </div>
</div>