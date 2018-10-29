<?php
/*
Plugin Name: Loyalty Points System
Author: Q Misell
Author URL: https://misell.cymru
Licence: Copyright Q Misell 2018
 */

if (!defined('ABSPATH')) {
    die;
}

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    if (!class_exists('WC_LoyaltyPoints')) {
        class WC_LoyaltyPoints
        {
            function __construct()
            {
                add_action('admin_init', [$this, 'settings_init']);
                add_action('admin_menu', [$this, 'options_page']);
                add_action('woocommerce_cart_totals_after_order_total', [$this, 'add_points_to_totals']);
                add_action('woocommerce_payment_complete', [$this, 'add_points_to_customer']);
            }

            /**
             * Register the plugin with the settings API
             */
            function settings_init()
            {
                // register a new setting for "wporg" page
                register_setting('wc_loyaltypoints', 'points_per_item', array(
                        'default' => 100,
                    'sanitize_callback' => [$this, 'sanitize_points_per_item']
                ));

                // register a new section in the "wporg" page
                add_settings_section(
                    'wc_loyaltypoints_main',
                    'Main settings',
                    null,
                    'wc_loyaltypoints'
                );

                // register a new field in the "wporg_section_developers" section, inside the "wporg" page
                add_settings_field(
                    'wc_loyaltypoints_main_points_per_item', // as of WP 4.6 this value is used only internally
                    // use $args' label_for to populate the id inside the callback
                    'Points per item',
                    [$this, 'points_per_item_cb'],
                    'wc_loyaltypoints',
                    'wc_loyaltypoints_main'
                );
            }

            /**
             * Sanitize the points per item input to an integer
             *
             * @param string $val
             * @return int
             */
            function sanitize_points_per_item($val) {
                return intval($val);
            }

            /**
             * Display the input field for points per item
             */
            function points_per_item_cb() {
                // get the value of the setting we've registered with register_setting()
                $options = get_option( 'points_per_item' );
                // output the field
                ?>
                <input type="number" value="<?=$options?>" name="points_per_item">
                <?php
            }

            /**
             * Register the options page in the admin
             */
            function options_page()
            {
                // add top level menu page
                add_menu_page(
                    'Loyalty Points',
                    'Loyalty Points Options',
                    'manage_options',
                    'wc_loyaltypoints',
                    [$this, 'options_page_html']
                );
            }

            /**
             * Display the main options page in the admin
             */
            function options_page_html()
            {
                // check user capabilities
                if (!current_user_can('manage_options')) {
                    return;
                }

                // add error/update messages

                // check if the user have submitted the settings
                // wordpress will add the "settings-updated" $_GET parameter to the url
                if (isset($_GET['settings-updated'])) {
                    // add settings saved message with the class of "updated"
                    add_settings_error('wc_loyaltypoints_messages', 'wc_loyaltypoints_message', 'Settings Saved', 'updated');
                }

                // show error/update messages
                settings_errors('wc_loyaltypoints_messages');
                ?>
                <div class="wrap">
                    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
                    <form action="options.php" method="post">
                        <?php
                        // output security fields for the registered setting "wporg"
                        settings_fields('wc_loyaltypoints');
                        // output setting sections and their fields
                        // (sections are registered for "wporg", each field is registered to a specific section)
                        do_settings_sections('wc_loyaltypoints');
                        // output save settings button
                        submit_button('Save Settings');
                        ?>
                    </form>
                </div>
                <?php
            }

            /**
             * Get the points per item setting as an integer
             *
             * @return int
             */
            private function get_points_per_item() {
                return intval(get_option( 'points_per_item' ));
            }

            /**
             * Get the number of loyalty points a customer has
             *
             * @param int $cust
             * @return int
             */
            private function get_customer_points($cust) {
                return intval(get_user_meta($cust, 'wc_loyaltypoints_points'));
            }

            /**
             * Add the desired change in points to the customer
             *
             * @param int $cust
             * @param int $change
             */
            private function change_customer_points($cust, $change) {
                $cur_points = $this->get_customer_points($cust);
                $cur_points += $change;
                update_user_meta($cust, 'wc_loyaltypoints_points', $cur_points);
            }

            /**
             * Display the number of loyalty points to be gained with the current cart contents
             */
            function add_points_to_totals()
            {
                global $woocommerce;


                $total_points = $woocommerce->cart->get_cart_contents_count() * $this->get_points_per_item();

                ?>
                <tr>
                    <th>Loyalty points gained:</th>
                    <td><?= $total_points ?></td>
                </tr>
                <?php
            }

            /**
             * Calculates the gained loyalty points and adds them to the customer
             *
             * @param int $order Order Id
             */
            function add_points_to_customer($order) {
                $order = wc_get_order($order);
                $cust = $order->get_customer_id();
                $total_points = $order->get_item_count() * $this->get_points_per_item();
                $this->change_customer_points($cust, $total_points);
            }
        }
    }
}

$GLOBALS['wc_loyaltypoints'] = new WC_LoyaltyPoints();