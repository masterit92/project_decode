<div class="bot-content">
    <?php if ($this->class_body === 'home'): ?>
        <ul class="inline">
            <li class="col-md-3">
                <img src="<?php echo BaseUrl_Template_Default(); ?>/_/component/images/Decode/icon/tem-building.png"
                     alt="team building"/>

                <p><?php echo __('Team Building') ?></p>
            </li>
            <li class="col-md-3">
                <img src="<?php echo BaseUrl_Template_Default(); ?>/_/component/images/Decode/icon/family.png"
                     alt="family"/>

                <p><?php echo __('Friends/Family') ?></p>
            </li>
            <li class="col-md-3">
                <img src="<?php echo BaseUrl_Template_Default(); ?>/_/component/images/Decode/icon/student.png"
                     alt="student"/>

                <p><?php echo __('Students/Classes')?></p>
            </li>
            <li class="col-md-3">
                <img src="<?php echo BaseUrl_Template_Default(); ?>/_/component/images/Decode/icon/games.png"
                     alt="Games"/>

                <p><?php echo __('Gamers') ?></p>
            </li>
        </ul>
    <?php elseif ($this->class_body === 'the-game'): ?>
        <ul class="inline">
            <?php
            $games = new Admin_Model_Games();
            $gamesCollection = $games->getAllGames();
            foreach ($gamesCollection as $game):
                $game_image = $game['game_image'];
                $arr_image = explode('|', $game_image);
                ?>
                <li class="col-md-3">
                    <?php foreach ($arr_image as $img): ?>
                    <a href="<?php echo $this->baseUrl('bookings') ?>" class="item-game">
                        <?php if (Check_File_Exists_Upload($img)): ?>
                                <img src="<?php echo $this->baseUrl(UPLOAD_URL . $img) ?>" width="250px" height="350px"
                                     alt="<?php echo $game['game_name']; ?>"/>
                        <?php else: ?>
                            <img src="<?php echo $this->baseUrl(UPLOAD_URL . 'no_img.jpg') ?>" width="250px" height="350px"/>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <p class="active"><?php echo $game['game_name']; ?></p>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php
    elseif ($this->class_body === 'booking'): ?>
        <?php
        $bizPrices = new Bookings_Model_Biz_PricesBusiness();
        $prices = $bizPrices->getPrices();
        ?>
        <div class="bot-booking">
            <div class="center">
                <span class="price">PRICE</span>
                <ul class="col-md-12">
                    <?php foreach ($prices as $_price): ?>

                        <li class="col-md-4 col-md-12">
                            <p><?php echo __($_price['price_name']) ?></p>

                            <p><?php echo $_price['price_value'] ?> VND</p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p>* Off-peak (Before 17:00)</p>
            </div>
        </div>
    <?php
    elseif ($this->class_body === 'contact'): ?>
        <div class="container">
            <div class="contact-map">
                <iframe width="1008" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?q=21.03557,105.776243&amp;hl=vi&amp;sll=10.777831,106.654501&amp;sspn=0.023777,0.025663&amp;t=m&amp;ie=UTF8&amp;z=14&amp;ll=21.03557,105.776243&amp;output=embed"></iframe>
            </div>

        </div>
    <?php endif; ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.the-game .inline').bxSlider({
            minSlides: 4,
            maxSlides: 4,
            slideWidth: 280
        });
        jQuery('.item-game').each(function(){
            jQuery(this).hover(
                function() {
                    jQuery(this).addClass('active-game');
                }, function() {
                    jQuery(this).removeClass('active-game');
                }
            );
        });
    });
</script>