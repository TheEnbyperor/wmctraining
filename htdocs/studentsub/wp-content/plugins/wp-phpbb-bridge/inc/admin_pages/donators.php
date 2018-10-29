<div class="wrap">
    <div id="wpbb_admin_dashboard" class="icon32"></div>
    <h2><?php _e('WP phpBB Bridge', 'wpbb'); ?> - <?php _e('Donators', 'wpbb'); ?></h2>
    <p>
        <?php
            echo sprintf(__('Here is the list of WP phpBB Bridge donators. If you like to see your web site link here you can donate us with an amount from <a href="%s">here</a>', 'wpbb'), 'admin.php?page=wpbb_settings#donate');
        ?>
    </p>
    <ul class="settings">
        <?php
            $content = file_get_contents('http://www.e-xtnd.it/donators/all/');
            
            if($content !== false)
            {
               $content = json_decode($content);
               
               foreach($content as $c)
               {
            ?>
                <li>
                    <a target="_blank" href="http://<?php echo $c->DOMAIN; ?>" title="<?php echo $c->NAME; ?>"><?php echo $c->NAME; ?></a>
                    <br />
                    <small><?php _e('Donation date : ', 'wpbb'); ?><?php echo date(get_option('date_format', 'd/m/Y'), strtotime($c->CREATED)); ?></small>
                </li>
            <?php
               }
            }
            else
            {
            ?>
                <li>
                    <?php _e('There are no donations yet', 'wpbb'); ?>
                    <br />
                    <?php _e('Be the first to make a donation', 'wpbb'); ?>
                </li>
            <?php   
            }
        ?>
    </ul>
</div>