<div class="content">
    <div class="section section-1">
        <div class="section-1-center">
            <div class="section-1-title" data-anim="fade-anim"><span data-content-type="text">WE CAPTURE YOUR SWEETEST MOMENTS</span></div>
            <div class="section-1-services-container" data-anim="fade-anim">
                <div class="section-1-description" data-content-type="text">services that we offer</div>
                <div class="section-1-down-icon" style="background-image: url('assets/icons/ic_keyboard_arrow_down_black_24px.svg');"></div>
            </div>
        </div>
    </div>
    <div class="section section-2">
    <?php
        if ($services != "") {
            $iLength = sizeof($services);
            $servicePackageId = $services[0]->service_package_id;
            $serviceGroupId = $services[0]->service_group_id;
            $serviceGroupCtr = 1;
            echo "<div class='service-group service-group-" . $serviceGroupCtr . "'>";
            echo "<div class='service-group-title' data-content-type='text' data-anim='fade-anim' >" . $services[0]->service_group_name . "</div>";
            echo "<div class='service-area' data-content-type='text' data-anim='fade-anim'>" . $services[0]->service_group_area . "</div>";

            $servicePackagePerGroup = 1;
            echo "<div class='service-package' data-no='1' data-anim='fade-anim'>";
            echo "<div class='service-package-title' data-content-type='text'>" . $services[0]->service_package_name . "</div>";
            $servicePackageDescription = explode("<br />", nl2br($services[0]->service_package_description));
            for ($j = 0; $j < sizeof($servicePackageDescription); $j++) {
                echo "<div class='service-name' data-content-type='text'>" . $servicePackageDescription[$j] . "</div>";
            }
            echo "<div class='service-price' data-content-type='text'>IDR " . $services[0]->service_package_price . "</div>";
            $servicePackageAddon = explode("<br />", nl2br($services[0]->service_package_addon));
            for ($j = 0; $j < sizeof($servicePackageAddon); $j++) {
                echo "<div class='service-note' data-content-type='text'>" . $servicePackageAddon[$j] . "</div>";
            }
            echo "</div>";

            for ($i = 1; $i < $iLength; $i++) {
                if ($serviceGroupId != $services[$i]->service_group_id) {                    
                    echo "</div>";
                    $serviceGroupId = $services[$i]->service_group_id;
                    $serviceGroupCtr++;
                    echo "<div class='service-group service-group-" . $serviceGroupCtr . "'>";
                    echo "<div class='service-group-title' data-content-type='text' data-anim='fade-anim' >" . $services[$i]->service_group_name . "</div>";
                    echo "<div class='service-area' data-content-type='text' data-anim='fade-anim'>" . $services[$i]->service_group_area . "</div>";
                    $servicePackagePerGroup = 0;
                }
                
                $servicePackagePerGroup++;
                if ($servicePackagePerGroup > 2) {
                    $servicePackagePerGroup = 1;
                    echo "<div class='service-package-horizontal-separator'></div>";
                }
                echo "<div class='service-package' data-no='" . ($i + 1) . "' data-anim='fade-anim'>";
                echo "<div class='service-package-title' data-content-type='text'>" . $services[$i]->service_package_name . "</div>";
                $servicePackageDescription = explode("<br />", nl2br($services[$i]->service_package_description));
                for ($j = 0; $j < sizeof($servicePackageDescription); $j++) {
                    echo "<div class='service-name' data-content-type='text'>" . $servicePackageDescription[$j] . "</div>";
                }
                echo "<div class='service-price' data-content-type='text'>IDR " . $services[$i]->service_package_price . "</div>";
                $servicePackageAddon = explode("<br />", nl2br($services[$i]->service_package_addon));
                for ($j = 0; $j < sizeof($servicePackageAddon); $j++) {
                    echo "<div class='service-note' data-content-type='text'>" . $servicePackageAddon[$j] . "</div>";
                }
                echo "</div>";
            }
            
            echo "</div>";
        }
    ?>

    <!--
        <div class='service-group service-group-1'>
            <div class='service-group-title' data-content-type='text' data-anim='fade-anim'>PREWEDDING</div>
            <div class='service-area' data-content-type='text' data-anim='fade-anim'>(SURABAYA AREA)</div>
            <div class='service-package' data-no='1' data-anim='fade-anim'>
                <div class='service-package-title' data-content-type='text'>BASIC</div>
                <div class='service-name' data-content-type='text'>- 1 DAY PHOTO SESSION</div>
                <div class='service-name' data-content-type='text'>- 40 EDITED PHOTOS</div>
                <div class='service-name' data-content-type='text'>- DVD ALL FILES & 40 EDITED PHOTOS</div>
                <div class='service-name' data-content-type='text'>- 1 DAY PHOTO SESSION</div>
                <div class='service-price' data-content-type='text'>IDR 8</div>
                <div class='service-note' data-content-type='text'>- ADD ONE DAY: IDR 2</div>
                <div class='service-note' data-content-type='text'>- ADD MAKE UP: IDR 1.5</div>
                <div class='service-note' data-content-type='text'>- ADD PHOTOS: IDR 0.1/PHOTO</div>
            </div>
            <div class='service-package' data-no='2' data-anim='fade-anim'>
                <div class='service-package-title' data-content-type='text'>GOLD</div>
                <div class='service-name' data-content-type='text'>- MAKEUP & RETOUCH</div>
                <div class='service-name' data-content-type='text'>- 1 ENLARGED CANVAS + CUSTOM FRAME 50X75 CM</div>
                <div class='service-name' data-content-type='text'>- 50 EDITED PHOTOS</div>
                <div class='service-name' data-content-type='text'>- 1 PHOTO ALBUM (22 PAGES) 20X30 CM</div>
                <div class='service-name' data-content-type='text'>- DELUXE ALBUM BOX</div>
                <div class='service-name' data-content-type='text'>- DVD ALL FILES & 50 EDITED PHOTOS</div>
                <div class='service-name' data-content-type='text'>- PHOTO LOOPING</div>
                <div class='service-price' data-content-type='text'>IDR 12</div>
                <div class='service-note' data-content-type='text'>- ADD ONE DAY: IDR 2</div>
            </div>
        </div>
        <div class='service-group service-group-2'>
            <div class='service-group-title' data-content-type='text' data-anim='fade-anim'>PRESWEET</div>
            <div class='service-area' data-content-type='text' data-anim='fade-anim'>(SURABAYA AREA)</div>
            <div class='service-package' data-no='3' data-anim='fade-anim'>
                <div class='service-package-title' data-content-type='text'>BASIC</div>
                <div class='service-name' data-content-type='text'>- DVD ALL FILES & 20 EDITED PHOTOS</div>
                <div class='service-name' data-content-type='text'>- PHOTO LOOPING</div>
                <div class='service-price' data-content-type='text'>IDR 7</div>
                <div class='service-note' data-content-type='text'>- ADD ONE DAY: IDR 2</div>
                <div class='service-note' data-content-type='text'>- ADD MAKE UP: IDR 1.5</div>
                <div class='service-note' data-content-type='text'>- ADD PHOTOS: IDR 1.5/PHOTO</div>
            </div>
            <div class='service-package' data-no='4' data-anim='fade-anim'>
                <div class='service-package-title' data-content-type='text'>GOLD</div>
                <div class='service-name' data-content-type='text'>- 1 ENLARGED CANVAS + CUSTOM FRAME 50X75 CM</div>
                <div class='service-name' data-content-type='text'>- MAKEUP & RETOUCH</div>
                <div class='service-name' data-content-type='text'>- 30 EDITED PHOTOS</div>
                <div class='service-name' data-content-type='text'>- 1 PHOTOBOOK (22 PAGES) 20X30 CM</div>
                <div class='service-name' data-content-type='text'>- DVD ALL FILES & 30 EDITED PHOTOS</div>
                <div class='service-name' data-content-type='text'>- PHOTO LOOPING</div>
                <div class='service-price' data-content-type='text'>IDR 10</div>
                <div class='service-note' data-content-type='text'>- ADD ONE DAY: IDR 2</div>
            </div>
        </div>
        <div class='service-group service-group-3'>
            <div class='service-group-title' data-content-type='text' data-anim='fade-anim'>WEDDING JOURNALISM</div>
            <div class='service-area' data-content-type='text' data-anim='fade-anim'>(SURABAYA AREA)</div>
            <div class='service-package' data-no='5' data-anim='fade-anim'>
                <div class='service-package-title' data-content-type='text'>PHOTOGRAPHY PACK</div>
                <div class='service-name' data-content-type='text'>- 50 EDITED PHOTOS</div>
                <div class='service-name' data-content-type='text'>- 1 ALBUM 20X30 CM (40 PAGES)</div>
                <div class='service-name' data-content-type='text'>- DVD ALL FILES & 50 EDITED PHOTOS</div>
                <div class='service-name' data-content-type='text'>- DELUXE ALBUM BOX</div>
                <div class='service-price' data-content-type='text'>IDR 13</div>
                <div class='service-note' data-content-type='text'>- ADD ONE DAY: IDR 3/DAY</div>
                <div class='service-note' data-content-type='text'>- ADD PHOTOGRAPHER: IDR 2</div>
            </div>
            <div class='service-package' data-no='6' data-anim='fade-anim'>
                <div class='service-package-title' data-content-type='text'>VIDEOGRAPHY</div>
                <div class='service-name' data-content-type='text'>- 2 VIDEOGRAPHERS</div>
                <div class='service-name' data-content-type='text'>- SAME-DAY EDIT</div>
                <div class='service-name' data-content-type='text'>- 3 MINUTES HIGHLIGHT VIDEO</div>
                <div class='service-name' data-content-type='text'>- 20 MINUTES WEDDING VIDEO</div>
                <div class='service-name' data-content-type='text'>- 30 SEC TEASER VIDEO</div>
                <div class='service-price' data-content-type='text'>IDR 14</div>
            </div>
            <div class='service-package-horizontal-separator'></div>
            <div class='service-package' data-no='7' data-anim='fade-anim'>
                <div class='service-package-title' data-content-type='text'>ENGAGEMENT JOURNALISM</div>
                <div class='service-name' data-content-type='text'>- 1 PHOTOGRAPHER</div>
                <div class='service-name' data-content-type='text'>- 1 ALBUM 20X30 CM (22 PAGES)</div>
                <div class='service-name' data-content-type='text'>- DVD SOFT COPY ALL FILES</div>
                <div class='service-name' data-content-type='text'>- DELUXE ALBUM BOX</div>
                <div class='service-price' data-content-type='text'>IDR 5</div>
            </div>
            <div class='service-package' data-no='8' data-anim='fade-anim'>
                <div class='service-package-title' data-content-type='text'>MATERNITY</div>
                <div class='service-name' data-content-type='text'>- MAKEUP & RETOUCH</div>
                <div class='service-name' data-content-type='text'>- 1 ALBUM 20X30 CM (22 PAGES)</div>
                <div class='service-name' data-content-type='text'>- DVD SOFT COPY ALL FILES</div>
                <div class='service-name' data-content-type='text'>- DELUXE ALBUM BOX</div>
                <div class='service-price' data-content-type='text'>IDR 5</div>
            </div>
        </div>
     -->
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
        </div>
    </div>
</div>
<script>
    var serviceGroupLength = 3;
</script>