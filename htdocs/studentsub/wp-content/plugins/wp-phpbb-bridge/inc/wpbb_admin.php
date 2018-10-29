<?php

class WPBB_AdminPanel
{
    /**
     * Class Constructor
     */
    function WPBB_AdminPanel()
    {
        add_menu_page(
            'WP phpBB Bridge - Xtnd.it Group',
            'WP phpBB Bridge',
            'activate_plugins',
            'wpbb',
            array(
                $this,
                'WPBB_AdminPage'
            ),
            WPBB_URL . '/img/bridge.png',
            71
        );
        
        add_submenu_page(
            'wpbb',
            'WP phpBB Bridge ' . __('settings', 'wpbb'),
            __('Settings', 'wpbb'),
            'activate_plugins',
            'wpbb_settings',
            array(
                $this,
                'WPBB_SettingsPage'
            )
        );
        
        add_submenu_page(
            'wpbb',
            'WP phpBB Bridge ' . __('forum assign', 'wpbb'),
            __('Assign Forum', 'wpbb'),
            'activate_plugins',
            'wpbb_forum_assign',
            array(
                $this,
                'WPBB_ForumIntegration'
            )
        );
        
        add_submenu_page(
            'wpbb',
            'WP phpBB Bridge ' . __('authors assign', 'wpbb'),
            __('Assign authors', 'wpbb'),
            'activate_plugins',
            'wpbb_author_assign',
            array(
                $this,
                'WPBB_AuthorIntegration'
            )
        );
        
        add_submenu_page(
            'wpbb',
            'WP phpBB Bridge ' . __('donators', 'wpbb'),
            __('Donators', 'wpbb'),
            'activate_plugins',
            'wpbb_donators',
            array(
                $this,
                'WPBB_Donators'
            )
        );
    }
    
    function WPBB_AdminPage()
    {
        do_action('wpbb_before_admin_dashboard');
        require_once(WPBB_FILE_PATH . DS . 'inc' . DS . 'admin_pages' . DS . 'dashboard.php');
        do_action('wpbb_after_admin_dashboard');
    }
    
    function WPBB_SettingsPage()
    {
        do_action('wpbb_before_admin_settings');
        
        if(isset($_POST['action']) && $_POST['action'] == 'update')
        {
            $e = new WP_Error();
            
            if(!wp_verify_nonce($_POST['_wpnonce'], 'wpbb_settings_page'))
            {    
                $e->add('access_denied', __('You submition does not meet the WordPress security level.', 'wpbb'));
            }
            else
            {
                $wpbb_activate = $_POST['wpbb_activate'];
                
                if(!is_file($_POST['wpbb_config_path']))
                {
                    $e->add('file_not_exists', __('The file config.php does not exists in the path you have enter', 'wpbb'));
                    $wpbb_activate == 'no';
                }
                
                if(!page_exists($_POST['wpbb_ucp_path']))
                {
                    $e->add('file_not_exists', __('The file ucp.php does not exists in the url you have enter', 'wpbb'));
                    $wpbb_activate == 'no';
                }
                
                $wpbb_avatars = $_POST['wpbb_avatars'];
                $wpbb_deactivation_password = $_POST['wpbb_deactivation_password'];
                $wpbb_dbms_charset = $_POST['wpbb_dbms_charset'];
                $wpbb_config_path = stripslashes($_POST['wpbb_config_path']);
                $wpbb_ucp_path = $_POST['wpbb_ucp_path'];
                $wpbb_maximu_retries = $_POST['wpbb_maximu_retries'];
                $wpbb_post_posts = isset($_POST['wpbb_post_posts']) ? 'yes' : 'no';
                $wpbb_post_locked = isset($_POST['wpbb_post_locked']) ? 'yes' : 'no';
                $wpbb_width = $_POST['wpbb_width'];
                
                update_option('wpbb_activate', $wpbb_activate);
                update_option('wpbb_config_path', $wpbb_config_path);
                update_option('wpbb_ucp_path', $wpbb_ucp_path);
                update_option('wpbb_avatars', $wpbb_avatars);
                update_option('wpbb_deactivation_password', $wpbb_deactivation_password);
                update_option('wpbb_dbms_charset', $wpbb_dbms_charset);
                update_option('wpbb_maximu_retries', $wpbb_maximu_retries);
                update_option('wpbb_post_posts', $wpbb_post_posts);
                update_option('wpbb_post_locked', $wpbb_post_locked);
                update_option('wpbb_width', $wpbb_width);
            }
        }
        
        $wpbb_activate = trim(get_option('wpbb_activate', 'no'));
        $wpbb_avatars = trim(get_option('wpbb_avatars', 'no'));
    	$wpbb_config_path = trim(get_option('wpbb_config_path', ABSPATH . 'phpbb3/config.php'));
    	$wpbb_ucp_path = trim(get_option('wpbb_ucp_path', get_bloginfo('home') . '/phpbb3/ucp.php'));
        $wpbb_deactivation_password = trim(get_option('wpbb_deactivation_password', hash_generator()));
        $wpbb_dbms_charset = trim(get_option('wpbb_dbms_charset', 'utf8'));
        $wpbb_maximu_retries = trim(get_option('wpbb_maximu_retries', 3));
        $wpbb_post_posts = trim(get_option('wpbb_post_posts', 'yes'));
        $wpbb_post_locked = trim(get_option('wpbb_post_locked', 'yes'));
        $wpbb_width = trim(get_option('wpbb_width', __('Auto', 'wpbb')));
        
        require_once(WPBB_FILE_PATH . DS . 'inc' . DS . 'admin_pages' . DS . 'settings.php');
        
        do_action('wpbb_after_admin_settings');
    }
    
    function WPBB_ForumIntegration()
    {
        do_action('wpbb_before_forum_integration');
        
        global $db;
        
        $forums = "SELECT
          `f`.`forum_id` AS `ID`,
          `f`.`parent_id` AS `PARENT`,
          `f`.`forum_name` AS `NAME`,
          `f`.`forum_type` AS `TYPE`,
          `f`.`forum_status` AS `STATUS`
        FROM
          `" . FORUMS_TABLE . "` AS `f`
        WHERE
          `f`.`left_id`
        BETWEEN
          `f`.`left_id`
        AND
          `f`.`right_id`
        AND
          (
            `f`.`forum_type` = 0
          OR
            `f`.`forum_type` = 1
          )
        AND
          `f`.`forum_status` = 0
        ORDER BY
          `f`.`left_id`";
        
        $r = $db->sql_query($forums);
        
        $results = array();
        
        while($row = $db->sql_fetchrow($r))
        {
            $results[] = $row;
        }
        
        $r = $results;
        unset($results);
        
        $new_arr = array();
        
        foreach($r as $data)
        {
            $new_arr[$data['ID']] = $data;
        }
        
        $r = $new_arr;
        unset($new_arr);
        
        aasort($r, 'PARENT', true);
        
        foreach($r as $id => &$v)
        {
            if(isset($r[$v['PARENT']]))
            {
                $r[$v['PARENT']][$v['ID']] = &$v;
                unset($r[$id]);
            }
        }
        
        $forums = $r;
        $forums = apply_filters('wpbb_forums_list', $forums);
        unset($r);
        arsort($forums);
                
        global $wpbb_categories;
        $wpbb_categories = get_categories(array('hide_empty' => 0, 'orderby' => 'term_group', 'order' => 'asc'));
        $wpbb_categories = apply_filters('wpbb_blog_categories', $wpbb_categories);
        
        global $wpbb_w;
        $wpbb_w = array();
        
        foreach($wpbb_categories as &$v)
        {
            $wpbb_w[$v->term_id] = (array)$v;
        }
        
        arsort($wpbb_w);
        
        foreach($wpbb_w as $k => &$v)
        {
            if(isset($wpbb_w[$v['parent']]))
            {
                $wpbb_w[$v['parent']][$v['term_id']] = $v;
                unset($wpbb_w[$v['term_id']]);
            }
        }
        
        $wpbb_w = $wpbb_w;
        
        require_once(WPBB_FILE_PATH . DS . 'inc' . DS . 'admin_pages' . DS . 'forum_assign.php');
        do_action('wpbb_after_forum_integration');
    }
    
    function WPBB_AuthorIntegration()
    {
        global $wpdb;
        
        do_action('wpbb_before_author_integration');
        
        $roles = array();
        $authors_list = array();
        
        $rl = (array)get_option($wpdb->prefix . 'user_roles');
        
        foreach($rl as $k => $r)
        {
            if(isset($r['capabilities']['publish_posts']) && $r['capabilities']['publish_posts'] == 1)
            {
                $entry = array();
                
                $entry['name'] = $r['name'];
                $entry['role'] = $k;
                
                $roles[] = $entry;
                
                unset($entry);
            }
        }
        
        foreach($roles as $role)
        {
            $wp_user_search = new WP_User_Query(array('role' => $role['role']));
            
            $authors_list[$role['name']] = $wp_user_search->get_results();
        }
        
        foreach($authors_list as $k => $l)
        {
            if(empty($l))
            {
                unset($authors_list[$k]);
            }
        }
        
        unset($roles);
        
        $active_authors = unserialize(get_option('wpbb_users_posting', ''));
        $active_authors = (array)$active_authors;
        
        require_once(WPBB_FILE_PATH . DS . 'inc' . DS . 'admin_pages' . DS . 'authors_assign.php');
        
        do_action('wpbb_after_author_integration');
    }
    
    function WPBB_Donators()
    {
        do_action('wpbb_before_donators');
        
        require_once(WPBB_FILE_PATH . DS . 'inc' . DS . 'admin_pages' . DS . 'donators.php');
        
        do_action('wpbb_after_donators');
    }
}

$wpbb_admin = null;

function create_admin_menu()
{
    global $wpbb_admin;
    $wpbb_admin = new WPBB_AdminPanel();
}

add_action('admin_menu', 'create_admin_menu');

?>