<div id="overlay"><div id="loading"></div></div>
<div class="wrap">
    <div id="wpbb_admin_dashboard" class="icon32"></div>
    <h2><?php _e('WP phpBB Bridge', 'wpbb'); ?> - <?php _e('Assign authors', 'wpbb'); ?></h2>
    
    <p>
        <?php
            _e('Please specify witch authors posts will be published in phpBB forums', 'wpbb');
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
            <input type="submit" name="" class="button-secondary action wpbb_authors_submit" value="<?php _e('Save options', 'wpbb'); ?>" />
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
                <th scope="col" id="cb" class="manage-column column-cb check-column" style="">
                    <input type="checkbox" />
                </th>
                <th scope="col" id="cb" class="column-cb" style="">
                    <?php
                        _e('Username', 'wpbb');
                    ?>
                </th>
            </tr>
    	</thead>
    	<tbody id="the-list">
            <?php
                foreach($authors_list as $k => $authors)
                {
            ?>
                <tr>
                    <td colspan="2" class="wpbb_category">
                        <?php echo __($k); ?>
                    </td>
                </tr>
            <?php
                    foreach($authors as $author)
                    {
            ?>
                <tr>
                    <th scope="col" id="cb" class="manage-column column-cb check-column" style="">
                        <?php
                            $ch = "";
                            
                            if(in_array($author->ID, $active_authors))
                            {
                                $ch = 'checked="checked"';
                            }
                        ?>
                        <input type="checkbox" class="user_id" id="<?php echo $author->ID; ?>" <?php echo $ch; ?> />
                    </th>
                    <td>
                        <?php echo $author->display_name; ?>
                    </td>
                </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
    <div class="tablenav bottom">
        <div class="alignleft actions">
            <input type="submit" name="" class="button-secondary action wpbb_authors_submit" value="<?php _e('Save options', 'wpbb'); ?>" />
        </div>
        <div class="alignleft actions">
        </div>
        <div class="tablenav-pages one-page">
        </div>
        <br class="clear" />
	</div>
</div>