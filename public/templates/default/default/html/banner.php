<?php
$options_home_banner = $this->options_home_banner;
$ip = $_SERVER['REMOTE_ADDR'];
?>
<script>
    var ip = '<?php echo $ip ?>';
</script>
<?php if (count($options_home_banner) > 0): ?>
    <div class="header-content">
        <h2><?php echo $options_home_banner['option_value']?></h2>
        <div class="booking-now">
        </div>
        <a href="<?php echo $this->baseUrl('bookings/index/bookings') ?>" class="book-now booking-home-button" onclick="_gaq.push(['_trackEvent', 'Booking HomePage', 'Clicks', ip]);"><?php echo __('book now')?></a>

        <div class="flag-language">
            <ul>
                <li class="en">
                    <a href="<?php echo $this->baseUrl($this->currentController . "/index/lang/en") ?>">
                        <img src="<?php echo BaseUrl_Template_Default(); ?>/_/component/images/Decode/top/flagen.png"/>
                    </a>
                </li>
                <li class="vn">
                    <a href="<?php echo $this->baseUrl($this->currentController . "/index/lang/vi") ?>">
                        <img src="<?php echo BaseUrl_Template_Default(); ?>/_/component/images/Decode/top/flagvn.png"/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php endif; ?>