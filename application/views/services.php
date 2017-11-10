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
            $servicePackageCtr = 1;
            $serviceGroupId = $services[0]->service_group_id;
            $serviceGroupCtr = 1;
            echo "<div class='service-group service-group-" . $serviceGroupCtr . "'>";
            echo "<div class='service-group-title' data-content-type='text' data-anim='fade-anim' >" . $services[0]->service_group_name . "</div>";
            echo "<div class='service-area' data-content-type='text' data-anim='fade-anim'>" . $services[0]->service_group_area . "</div>";
            echo "<div class='service-package' data-no='" . $servicePackageCtr . "' data-anim='fade-anim'>";
            echo "<div class='service-package-title' data-content-type='text'>" . $services[0]->service_package_name . "</div>";

            $servicePrice = -1;
            $servicePackageCloseTag = false;
            $groupPackageCtr = 1;
            for ($i = 0; $i < $iLength; $i++) {
                if ($serviceGroupId != $services[$i]->service_group_id) {
                    $groupPackageCtr = 0;
                    if ($servicePrice == -1) {
                        $servicePrice = $services[$i]->service_package_price;
                        echo "<div class='service-price' data-content-type='text'>IDR " . $services[$i]->service_package_price . "</div>";
                    }
                    echo "</div>";
                    echo "</div>";
                    $serviceGroupId = $services[$i]->service_group_id;
                    $serviceGroupCtr++;
                    echo "<div class='service-group service-group-" . $serviceGroupCtr . "'>";
                    echo "<div class='service-group-title' data-content-type='text' data-anim='fade-anim' >" . $services[$i]->service_group_name . "</div>";
                    echo "<div class='service-area' data-content-type='text' data-anim='fade-anim'>" . $services[$i]->service_group_area . "</div>";
                    $servicePrice = -1;
                    $servicePackageCloseTag = true;
                } else {
                    if ($servicePackageId != $services[$i]->service_package_id) {
                        $groupPackageCtr++;
                        
                        if (!$servicePackageCloseTag) {
                            if ($servicePrice == -1) {
                                $servicePrice = $services[$i]->service_package_price;
                                echo "<div class='service-price' data-content-type='text'>IDR " . $services[$i]->service_package_price . "</div>";
                            }
                            echo "</div>";
                        } else {
                            $servicePackageCloseTag = false;
                        }
                        
                        if ($groupPackageCtr > 2) {
                            $groupPackageCtr = 0;
                            echo "<div class='service-package-horizontal-separator'></div>";
                        }
                        $servicePackageId = $services[$i]->service_package_id;
                        $servicePackageCtr++;
                        echo "<div class='service-package' data-no='" . $servicePackageCtr . "' data-anim='fade-anim'>";
                        echo "<div class='service-package-title' data-content-type='text'>" . $services[$i]->service_package_name . "</div>";
                        $servicePrice = -1;
                    } else {
                        if ($services[$i]->service_item_type == 1) {
                            echo "<div class='service-name' data-content-type='text'>- " . $services[$i]->service_item_name . "</div>";
                        } else {
                            if ($servicePrice == -1) {
                                $servicePrice = $services[$i]->service_package_price;
                                echo "<div class='service-price' data-content-type='text'>IDR " . $services[$i]->service_package_price . "</div>";
                            }
                            echo "<div class='service-note' data-content-type='text'>- " . $services[$i]->service_item_name . "</div>";
                        }
                    }
                }
            }
            if ($servicePrice == -1) {
                echo "<div class='service-price' data-content-type='text'>IDR " . $services[$i - 1]->service_package_price . "</div>";
            }
            echo "</div></div>";
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
<script>
    var serviceGroupLength = 3;
</script>