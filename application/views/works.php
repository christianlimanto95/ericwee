<script>
var selectedWorksLength = <?php echo sizeof($works); ?>;
var archivedWorksLength = <?php echo sizeof($archived_works); ?>;
var imageSize = (isMobile) ? (isTablet) ? (28 * vw / 100 - 10) + "px" : (80 * vw / 100 - 10) + "px" : "290px";
function imgOnload(element) {
    if (isTablet || !isMobile) {
        if (element.naturalWidth > element.naturalHeight) {
            element.setAttribute("width", imageSize);
            element.removeAttribute("height");
        } else {
            element.setAttribute("height", imageSize);
            element.removeAttribute("width");
        }
    }
}
</script>
<div class="preview-container">
    <img class="preview-image" />
    <div class="preview-image-wrapper"></div>
</div>
<div class="content">
    <div class="section section-1">
        <div class="section-1-center">
            <div class="section-1-title" data-anim="fade-anim"><span data-content-type="text">OUR WORKS.</span></div>
            <div class="section-1-works-container" data-anim="fade-anim">
                <div class="section-1-description" data-content-type="text">see all of those</div>
                <div class="section-1-down-icon" style="background-image: url('assets/icons/ic_keyboard_arrow_down_black_24px.svg');"></div>
            </div>
        </div>
    </div>
    <div class="section section-2">
        <div class="selected-works-title" data-anim="fade-anim"><div data-content-type="text">SELECTED WORKS</div></div>
        <div class="selected-works-container">
            <?php
                for ($i = 0; $i < sizeof($works); $i++) {
                    echo "<div class='selected-works-item-container image-container' data-no='" . $i . "' data-anim='fade-anim'><img class='selected-works-item' data-no='" . $i . "' src='" . base_url("assets/images/works/" . $works[$i]->works_id . "." . $works[$i]->works_extension) . "?d=" . strtotime($works[$i]->modified_date) . "' data-src='" . base_url("assets/images/works/" . $works[$i]->works_id . "." . $works[$i]->works_extension) . "?d=" . strtotime($works[$i]->modified_date) . "' onload='imgOnload(this);' /><div class='image-wrapper'></div></div>";
                }
            ?>
        </div>
        <div class="archived-works-title" data-anim="fade-anim"><div data-content-type="text">ARCHIVED WORKS</div></div>
        <div class="archived-works-container">
            <?php
                for ($j = 0; $j < sizeof($archived_works); $j++) {
                    echo "<div class='archived-works-item-container image-container' data-no='" . $j . "' data-anim='fade-anim'><img class='archived-works-item' data-no='" . $j . "' src='" . base_url("assets/images/archived_works/" . $archived_works[$j]->archived_works_id . "." . $archived_works[$j]->archived_works_extension) . "?d=" . strtotime($archived_works[$j]->modified_date) . "' data-src='" . base_url("assets/images/archived_works/" . $archived_works[$j]->archived_works_id . "." . $archived_works[$j]->archived_works_extension) . "?d=" . strtotime($archived_works[$j]->modified_date) . "' onload='imgOnload(this);' /><div class='image-wrapper'></div></div>";
                }
            ?>
        </div>
    </div>
    <div class="section section-3">
        <div class="section-3-center">
            <div class="section-3-we-want" data-content-type="text">WE WANT TO BE YOUR PARTNER</div>
            <div class="social-media">
                <a href="https://www.instagram.com/ericweephoto/" target="_blank" class="social-media-item" data-content-type="text"><div class="social-media-item-icon" style="background-image: url('assets/icons/instagram.png?v=1');"></div>@ericweephoto</a>
                <div class="social-media-item" data-content-type="text"><div class="social-media-item-icon" style="background-image: url('assets/icons/line.png?v=1');"></div>ericwicak</div>
                <a href="tel:+6285230515511" class="social-media-item" data-content-type="text"><div class="social-media-item-icon" style="background-image: url('assets/icons/whatsapp.png?v=1');"></div>0852 3051 5511</a>
            </div>
            <div class="section-3-contact-me" data-content-type="text">CONTACT US</div>
            <div class="powered-by">Powered by <a class="dnp-project" href="https://dnp-project.com">dnp PROJECT</a></div>
        </div>
    </div>
</div>