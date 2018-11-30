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
                add_action('woocommerce_review_order_after_order_total', [$this, 'add_points_to_totals']);
                add_action('woocommerce_order_details_after_order_table_items', [$this, 'add_points_to_totals_order']);
                add_action('woocommerce_payment_complete', [$this, 'add_points_to_customer']);
                add_action('woocommerce_product_options_general_product_data', [$this, 'product_add_points_field']);
                add_action('woocommerce_process_product_meta', [$this, 'product_save_points_field']);
                add_filter('woocommerce_get_price_html', [$this, 'get_product_price_html'], 10, 2);
                add_filter('woocommerce_cart_product_price', [$this, 'get_product_price_html'], 10, 2);
                add_filter('woocommerce_cart_product_subtotal', [$this, 'get_product_subtotal_html'], 10, 3);
                add_filter('woocommerce_loop_add_to_cart_link', [$this, 'loop_add_to_cart_filter'], 10, 2);
                add_action('woocommerce_check_cart_items', [$this, 'check_cart_points']);
                add_action('woocommerce_thankyou', [$this, 'subtract_points_on_order']);
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
            function sanitize_points_per_item($val)
            {
                return intval($val);
            }

            /**
             * Display the input field for points per item
             */
            function points_per_item_cb()
            {
                // get the value of the setting we've registered with register_setting()
                $options = get_option('points_per_item');
                // output the field
                ?>
                <input type="number" value="<?= $options ?>" name="points_per_item">
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
             * Register the field to set a custom amount of loyalty points gained
             */
            function product_add_points_field()
            {
                woocommerce_wp_text_input(array(
                    'id' => 'product_loyalty_points',
                    'label' => 'Loyalty points gained',
                    'class' => 'loyalty-points',
                    'desc_tip' => true,
                    'description' => 'Number of loyalty points gained instead of the default',
                    'data_type' => 'stock',
                ));
                woocommerce_wp_text_input(array(
                    'id' => 'product_claim_loyalty_points',
                    'label' => 'Loyalty points to claim',
                    'class' => 'loyalty-points-claim',
                    'desc_tip' => true,
                    'description' => 'Number of loyalty points required to claim this product (0 to disable)',
                    'data_type' => 'stock',
                ));
            }

            /**
             * Save the product loyalty points to the product meta
             * @param $post_id int ID of the product
             */
            function product_save_points_field($post_id)
            {
                $product = wc_get_product($post_id);
                $points = isset($_POST['product_loyalty_points']) ? $_POST['product_loyalty_points'] : '';
                $points = wc_stock_amount($points);
                $claim_points = isset($_POST['product_claim_loyalty_points']) ? $_POST['product_claim_loyalty_points'] : '';
                $claim_points = wc_stock_amount($claim_points);
                $product->update_meta_data('product_loyalty_points', $points);
                $product->update_meta_data('product_claim_loyalty_points', $claim_points);
                $product->save();
            }

            function get_claim_points_for_product($product)
            {
                return intval(wc_stock_amount(get_post_meta($product->id, 'product_claim_loyalty_points', true)));
            }

            function get_product_price_html($price, $product)
            {
                $claim_points = $this->get_claim_points_for_product($product);
                if ($claim_points <= 0) {
                    return $price;
                }
                return "$claim_points points";
            }

            function get_product_subtotal_html($price, $product, $quantity)
            {
                $claim_points = $this->get_claim_points_for_product($product)*$quantity;
                if ($claim_points <= 0) {
                    return $price;
                }
                return "$claim_points points";
            }

            function loop_add_to_cart_filter($html, $product)
            {
                global $woocommerce;
                $claim_points = $this->get_claim_points_for_product($product);
                if ($claim_points > 0) {
                    $cust_points = $this->get_customer_points($woocommerce->customer->id);
                    if ($claim_points > $cust_points) {
                        return "<a class='button disabled'>Not enough points</a>";
                    }
                }
                return $html;
            }

            /**
             * Get the points per item setting as an integer
             *
             * @return int
             */
            private function get_points_per_item()
            {
                return intval(get_option('points_per_item'));
            }

            /**
             * Get the number of loyalty points a customer has
             *
             * @param int $cust
             * @return int
             */
            private function get_customer_points($cust)
            {
                return intval(get_user_meta($cust, 'wc_loyaltypoints_points', true));
            }

            /**
             * Add the desired change in points to the customer
             *
             * @param int $cust
             * @param int $change
             */
            private function change_customer_points($cust, $change)
            {
                $cur_points = $this->get_customer_points($cust);
                $cur_points += $change;
                update_user_meta($cust, 'wc_loyaltypoints_points', $cur_points);
            }

            private function calculate_points_from_cart($items)
            {
                $points = 0;
                $points_per_item = $this->get_points_per_item();

                foreach ($items as $item) {
                    $item_id = $item["product_id"];
                    $item_points = intval(wc_stock_amount(get_post_meta($item_id, 'product_loyalty_points', true)));
                    if ($item_points > 0) {
                        $points += $item_points * $item["quantity"];
                    } else {
                        $points += $points_per_item * $item["quantity"];
                    }
                }

                return $points;
            }

            private function calculate_points_needed_for_cart($items)
            {
                $points = 0;

                foreach ($items as $item) {
                    $item_id = $item["product_id"];
                    $item_points = intval(wc_stock_amount(get_post_meta($item_id, 'product_claim_loyalty_points', true)));
                    if ($item_points > 0) {
                        $points += $item_points * $item["quantity"];
                    }
                }

                return $points;
            }

            /**
             * Display the number of loyalty points to be gained with the current cart contents
             */
            function add_points_to_totals()
            {
                global $woocommerce;

                $current_points = $this->get_customer_points($woocommerce->customer->id);
                $taken_points = $this->calculate_points_needed_for_cart($woocommerce->cart->get_cart_contents());
                $gained_points = $this->calculate_points_from_cart($woocommerce->cart->get_cart_contents());

                ?>
                <tr>
                    <td>Current loyalty points:</td>
                    <td><?= $current_points ?></td>
                </tr>
                <tr>
                    <th>Loyalty points used:</th>
                    <td><?= $taken_points ?></td>
                </tr>
                <tr>
                    <td>Loyalty points gained:</td>
                    <td><?= $gained_points ?></td>
                </tr>
                <?php
            }

            function check_cart_points()
            {
                global $woocommerce;
                $current_points = $this->get_customer_points($woocommerce->customer->id);
                $taken_points = $this->calculate_points_needed_for_cart($woocommerce->cart->get_cart_contents());

                if ($taken_points > $current_points) {
                    wc_add_notice("You do not have enough loyalty points for the cart contents", 'error' );
                    return false;
                }
                return true;
            }

            /**
             * Display the number of loyalty points gained from the order
             *
             * @param $order WC_Abstract_Order
             */
            function add_points_to_totals_order($order)
            {
                $total_points = $this->calculate_points_from_cart($order->get_items());

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
            function add_points_to_customer($order)
            {
                $order = wc_get_order($order);
                $cust = $order->get_customer_id();
                $total_points = $this->calculate_points_from_cart($order->get_items());
                $this->change_customer_points($cust, $total_points);
            }
            
            function subtract_points_on_order($order_id)
            {
                $order = wc_get_order($order_id);
                $total_points = $this->calculate_points_needed_for_cart($order->get_items());
                $cust = $order->get_customer_id();
                $this->change_customer_points($cust, -$total_points); 
            }
        }
    }
}

$GLOBALS['wc_loyaltypoints'] = new WC_LoyaltyPoints();