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