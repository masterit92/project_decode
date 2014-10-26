<header class="md-col-12 sm-col-12">
    <div class="header-top">
        <div class="container">
            <?php echo $this->render('html/menu_top.php') ?>
        </div>
    </div><!-- .header-top -->
    <?php if ($this->class_body === 'home'): ?>
        <?php echo $this->render('html/banner.php') ?>
    <?php endif; ?>
</header>