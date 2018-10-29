<div id="overlay"><div id="loading"></div></div>
<?php
    global $wpdb;
?>
<div class="wrap">
    <div id="wpbb_admin_dashboard" class="icon32"></div>
    <h2><?php _e('WP phpBB Bridge', 'wpbb'); ?> - <?php _e('Settings', 'wpbb'); ?></h2>
    <?php
        if(isset($e) && sizeof($e->get_error_messages()) > 0)
        {
    ?>
    <div class="error">
        <br />
        <?php
            foreach($e->get_error_messages() as $er)
            {
                echo $er;
                echo "<br />";
            }
        ?>
        <br />
    </div>
    <?php
        }
    ?>
    <form method="post" action="">
        <input type="hidden" name="action" value="update" />
        <input type="hidden" id="_wpnonce" name="_wpnonce" value="<?php echo wp_create_nonce('wpbb_settings_page') ?>" />
        
        <h3>
            <?php
                
                _e('Files options', 'wpbb');
            
            ?>
        </h3>
        
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="wpbb_config_path">
                            <?php
                                _e('config.php path', 'wpbb');
                            ?>
                        </label>
                    </th>
                    <td>
                        <input name="wpbb_config_path" type="text" id="wpbb_config_path" value="<?php echo $wpbb_config_path; ?>" class="regular-text" />
                        <br />
                        <span class="description">
                            <?php _e('Enter the full path to phpBB config.php file', 'wpbb'); ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="wpbb_ucp_path">
                            <?php
                                _e('ucp.php url', 'wpbb');
                            ?>
                        </label>
                    </th>
                    <td>
                        <input name="wpbb_ucp_path" type="text" id="wpbb_ucp_path" value="<?php echo $wpbb_ucp_path; ?>" class="regular-text" />
                        <br />
                        <span class="description">
                            <?php _e('Enter the url to phpBB ucp.php file', 'wpbb'); ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <h3>
            <?php _e('Security options', 'wpbb'); ?>
        </h3>
        
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="wpbb_deactivation_password">
                            <?php
                                _e('Deactivation password', 'wpbb');
                            ?>
                        </label>
                    </th>
                    <td>
                        <input name="wpbb_deactivation_password" type="text" id="wpbb_deactivation_password" value="<?php echo $wpbb_deactivation_password; ?>" class="regular-text" />
                        <br />
                        <span class="description">
                            <?php _e('Enter a password you will use to diactivate the plugin in case you are locked out', 'wpbb'); ?>
                            <br />
                            <?php 
                                echo sprintf(
                                    __('Your reset url is the following : <strong id="resetCode">%1$s<span class="red">%2$s</span></strong>', 'wpbb'),
                                    get_bloginfo('home') . '/wpbbreset/',
                                    $wpbb_deactivation_password
                                ); 
                            ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="wpbb_maximu_retries">
                            <?php
                                _e('Maximum reset retries', 'wpbb');
                            ?>
                        </label>
                    </th>
                    <td>
                        <input name="wpbb_maximu_retries" type="text" id="wpbb_maximu_retries" value="<?php echo $wpbb_maximu_retries; ?>" class="regular-text" />
                        <br />
                        <span class="description">
                            <?php 
                                _e('Enter the maximum retries for plugin diactivation.<br /><strong>WARNING</strong> : A very large amount of retries can make the plugin diactivation vulnerable on brute force attacks', 'wpbb');
                            ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>
            <?php
                
                _e('Forum posts options', 'wpbb');
            
            ?>
        </h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label>
                            <?php
                                _e('New forum posts on post creation', 'wpbb');
                            ?>
                        </label>
                    </th>
                    <td>
                        <label for="wpbb_post_posts">
                            <input name="wpbb_post_posts" type="checkbox" id="wpbb_post_posts" <?php echo $wpbb_post_posts == "yes" ? 'checked="checked"' : ''; ?> />
                            <?php _e('Enable', 'wpbb'); ?>
                        </label>
                        <br />
                        <span class="description">
                            <?php _e('Check that option if you like to enable the posting of new WordPress posts on specific forums.', 'wpbb'); ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label>
                            <?php
                                _e('Post on locked forums', 'wpbb');
                            ?>
                        </label>
                    </th>
                    <td>
                        <label for="wpbb_post_locked">
                            <input name="wpbb_post_locked" type="checkbox" id="wpbb_post_locked" <?php echo $wpbb_post_locked == "yes" ? 'checked="checked"' : ''; ?> />
                            <?php _e('Enable', 'wpbb'); ?>
                        </label>
                        <br />
                        <span class="description">
                            <?php _e('By checking that option you will be able to choose locked posts on witch the plugin will posting.', 'wpbb'); ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="wpbb_dbms_charset">
                            <?php
                                _e('phpBB database encoding', 'wpbb');
                            ?>
                        </label>
                    </th>
                    <td>
                        <select name="wpbb_dbms_charset" id="wpbb_dbms_charset">
                            <?php
                                $r = $wpdb->get_results('SELECT CHARACTER_SET_NAME FROM information_schema.CHARACTER_SETS ORDER BY CHARACTER_SET_NAME;');
                            
                                foreach($r as $rs)
                                {
                            ?>
                                <option value="<?php echo $rs->CHARACTER_SET_NAME; ?>" <?php echo $wpbb_dbms_charset == $rs->CHARACTER_SET_NAME ? 'selected="selected"' : ''; ?>><?php echo $rs->CHARACTER_SET_NAME; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <br />
                        <span class="description">
                            <?php _e('Select the database connection character set for phpBB', 'wpbb'); ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>
            <?php
                
                _e('Plugin options', 'wpbb');
            
            ?>
        </h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label>
                            <?php
                                _e('Integrate phpBB avatars', 'wpbb');
                            ?>
                        </label>
                    </th>
                    <td>
                        <label for="wpbb_avatars_yes">
                            <input type="radio" name="wpbb_avatars" value="yes" id="wpbb_avatars_yes" <?php echo $wpbb_avatars == 'yes' ? 'checked="checked"' : ''; ?> /> <?php _e('Yes', 'wpbb'); ?>
                        </label>&nbsp;
                        <label for="wpbb_avatars_no">
                            <input type="radio" name="wpbb_avatars" value="no" id="wpbb_avatars_no" <?php echo $wpbb_avatars == 'no' ? 'checked="checked"' : ''; ?> /> <?php _e('No', 'wpbb'); ?>
                        </label>
                        <br />
                        <span class="description">
                            <?php _e('Choose if you like to integrate phpBB user avatars on WordPress.', 'wpbb'); ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label>
                            <?php
                                _e('Activate phpBB bridge', 'wpbb');
                            ?>
                        </label>
                    </th>
                    <td>
                        <label for="wpbb_activate_yes">
                            <input type="radio" name="wpbb_activate" value="yes" id="wpbb_activate_yes" <?php echo $wpbb_activate == 'yes' ? 'checked="checked"' : ''; ?> /> <?php _e('Yes', 'wpbb'); ?>
                        </label>&nbsp;
                        <label for="wpbb_activate_no">
                            <input type="radio" name="wpbb_activate" value="no" id="wpbb_activate_no" <?php echo $wpbb_activate == 'no' ? 'checked="checked"' : ''; ?> /> <?php _e('No', 'wpbb'); ?>
                        </label>
                        <br />
                        <span class="description">
                            <?php _e('Choose if you like to activate the plugin. <br /><div class="red"><strong>WARNING</strong> : Be sure you have already isntalled the WP phpBB Bridge Users widget.</div>', 'wpbb'); ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>
            <?php
                
                _e('WP phpBB Bridge Users Widget settings', 'wpbb');
            
            ?>
        </h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="wpbb_width">
                            <?php
                                _e('Form elements width', 'wpbb');
                            ?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="wpbb_width" value="<?php echo $wpbb_width; ?>" id="wpbb_width" />
                        <br />
                        <span class="description">
                            <?php _e('Enter the WP phpBB Bridge Users widget form elements width', 'wpbb'); ?>
                            <br />
                            <?php _e('<strong>NOTE</strong> : Enter the size in pixels as an Integer number', 'wpbb'); ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save options', 'wpbb'); ?>" />
        </p>
    </form>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypal_donate">
        <?php
            global $wpbb;
            $r = array(
                'd' => preg_replace('/.*\:\/\//', '', get_bloginfo('home')),
                'p' => $wpbb->name,
                'v' => $wpbb->version
            );
            
            $r = serialize($r);
            $r = urlencode($r);
        ?>
        <input type="hidden" name="custom" value="<?php echo $r; ?>" />
        <input type="hidden" name="cmd" value="_donations" />
        <input type="hidden" name="business" value="info@xtnd.it" />
        <input type="hidden" name="lc" value="GR" />
        <input type="hidden" name="item_name" value="WP phpBB Bridge" />
        <input type="hidden" name="item_number" value="698efea6a31e09e58e50ed6d4e351e22" />
        <input type="hidden" id="amount" name="amount" value="5.00" />
        <input type="hidden" name="currency_code" value="EUR" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="no_shipping" value="1" />
        <input type="hidden" name="rm" value="1" />
        <input type="hidden" name="return" value="<?php bloginfo('home'); ?>" />
        <input type="hidden" name="cancel_return" value="<?php bloginfo('home'); ?>" />
        <input type="hidden" name="currency_code" value="EUR" />
        <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHosted" />
        <input type="hidden" name="notify_url" value="http://www.e-xtnd.it/ppl/" />
        <h3>
            <?php
                
                _e('Support options', 'wpbb');
            
            ?>
        </h3>
        <p>
            <?php
                _e('While this plugin is free, we need your support in order to extend it and make it more famous.', 'wpbb');
            ?>
        </p>
        <p>
            <?php
                _e('The available options are the following : ', 'wpbb');
            ?>
            <ul>
                <li>
                    <?php
                        _e('You can leave the link of our web site at the bottom of the WP phpBB Bridge Users', 'wpbb');
                    ?>
                </li>
                <li>
                    <?php
                        _e('You can donate us with one of the following amounts and then paste the serial number we will send you with <strong>email</strong> in serial number field bellow', 'wpbb');
                    ?>
                </li>
            </ul>
        </p>
        <p class="submit">
            <input type="button" name="5.00" id="btn-5" class="button-primary donate_us" value="<?php _e('Donate 5,00 &euro;', 'wpbb'); ?>" />
            &nbsp;
            <input type="button" name="10.00" id="btn-10" class="button-primary donate_us" value="<?php _e('Donate 10,00 &euro;', 'wpbb'); ?>" />
            &nbsp;
            <input type="button" name="25.00" id="btn-25" class="button-primary donate_us" value="<?php _e('Donate 25,00 &euro;', 'wpbb'); ?>" />
            &nbsp;
            <input type="button" name="50.00" id="btn-50" class="button-primary donate_us" value="<?php _e('Donate 50,00 &euro;', 'wpbb'); ?>" />
            &nbsp;
            <input type="button" name="100.00" id="btn-50" class="button-primary donate_us" value="<?php _e('Donate 100,00 &euro;', 'wpbb'); ?>" />
        </p>
    </form>
    <h3>
        <?php
            
            _e('Back link removal', 'wpbb');
        
        ?>
    </h3>
    <table class="form-table">
        <tbody>
            <tr valign="top">
                <th scope="row">
                    <label>
                        <?php
                            _e('Serial number', 'wpbb');
                        ?>
                    </label>
                </th>
                <td>
                    <input type="text" name="serial_number" id="serial_number" value="<?php echo get_option('wpbb_key', '0-000000-000000-000000-000000-000000-0-0'); ?>" class="regular-text" />
                    <br />
                    <span class="description">
                        <?php _e('Enter here the serial number we produce for you in order to remove our web site link from WP phpBB Bridge Users widget.', 'wpbb'); ?>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
    <p class="submit">
        <input type="button" name="key_validate" id="key_validate" class="button-primary" value="<?php _e('Remove backlink', 'wpbb'); ?>" />
    </p>
    <a name="donate"></a>
</div>