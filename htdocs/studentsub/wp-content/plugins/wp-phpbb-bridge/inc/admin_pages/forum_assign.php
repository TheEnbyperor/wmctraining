<div id="overlay"><div id="loading"></div></div>
<div class="wrap">
    <div id="wpbb_admin_dashboard" class="icon32"></div>
    <h2><?php _e('WP phpBB Bridge', 'wpbb'); ?> - <?php _e('Assign Forum', 'wpbb'); ?></h2>
    
    <p>
        <?php
            _e('Here you can select from witch WordPress categories new assigned posts will auto submited in relevant phpBB forums.', 'wpbb');
        ?>
    </p>
    
    <?php
        if(get_option('wpbb_post_posts', 'no') == 'no')
        {
    ?>
        <div class="error">
            <?php
                _e('You must enable the "New forum posts on post creation" option in order to use that feature. Please click <a href="/wp-admin/admin.php?page=wpbb_settings">here</a> to enable that feature.', 'wpbb');
            ?>
        </div>
    <?php
        }
    ?>
    <br />
    <div class="tablenav bottom">
        <div class="alignleft actions">
            <input type="submit" name="" class="button-secondary action wpbb_forums_submit" value="<?php _e('Save options', 'wpbb'); ?>" />
        </div>
        <div class="alignleft actions">
        </div>
        <div class="tablenav-pages one-page">
        </div>
        <br class="clear" />
	</div>
    <table class="wp-list-table widefat fixed posts" cellspacing="0">
    	<thead>
            <tr>
                <th scope="col" id="cb" class="column-cb" style="">
                    <?php
                        _e('Available forums', 'wpbb');
                    ?>
                </th>
            </tr>
    	</thead>
    	<tbody id="the-list">
            <?php
                foreach($forums as $forum)
                {
                    print_forum($forum);
                }
            ?>
        </tbody>
    </table>
    <div class="tablenav bottom">
        <div class="alignleft actions">
            <input type="submit" name="" class="button-secondary action wpbb_forums_submit" value="<?php _e('Save options', 'wpbb'); ?>" />
        </div>
        <div class="alignleft actions">
        </div>
        <div class="tablenav-pages one-page">
        </div>
        <br class="clear" />
	</div>
</div>