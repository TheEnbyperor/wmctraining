<?php
/**********************************

Plugin Name: Announcer
Plugin URI: http://www.aakashweb.com
Description: A plugin for putting announcements in the site.
Author: Aakash Chakravarthy
Version: 2.0
Author URI: http://www.aakashweb.com/

***********************************

Copyright 2010  Aakash Chakravarthy  (email : aakash.19493@gmail.com) (website : www.aakashweb.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

**********************************

	In short, this plugin is free to use by anyone and everyone. As this plugin is free,
	you can also donate and support this plugin if you like.
	
*********************************/

define('ANNOUNCER_VERSION', '2.0');
define('ANNOUNCER_AUTHOR', 'Aakash Chakravarthy');

if (!defined('WP_CONTENT_URL')) {
	$announcer_pluginpath = get_option('siteurl').'/wp-content/plugins/'.plugin_basename(dirname(__FILE__)).'/';
} else {
	$announcer_pluginpath = WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)) . '/';
}

$announcer_donate_link = 'https://www.paypal.com/cgi-bin/webscr?cmd=_donations&amp;business=donations@aakashweb.com&amp;item_name=Donation for Announcer&amp;amount=&amp;currency_code=USD';

## Load languages
load_plugin_textdomain('announcer', false, basename(dirname(__FILE__)) . '/languages/');

## Include files
require_once('adm-sidebar.php');

## Load the Javascripts
function announcer_admin_js() {
	global $announcer_pluginpath;
	$jwysiwyg_js = $announcer_pluginpath . 'js/jwysiwyg/jquery.wysiwyg.js';
	
	if (isset($_GET['page']) && $_GET['page'] == 'announcer/announcer.php'){
		wp_enqueue_script('jquery'); 
		wp_enqueue_script('announcer-admin-js', $announcer_pluginpath . 'announcer-admin-js.js', array('jquery'));
		wp_enqueue_script('jwysiwyg-js', $jwysiwyg_js, array('jquery', 'announcer-admin-js'));
	}
}
add_action('admin_print_scripts', 'announcer_admin_js');

## Load the CSS
function announcer_admin_css() {
	global $announcer_pluginpath;
	$jwysiwyg_css = $announcer_pluginpath . 'js/jwysiwyg/jquery.wysiwyg.css';
	
	if (isset($_GET['page']) && $_GET['page'] == 'announcer/announcer.php') {
		wp_enqueue_style('announcer-admin-css', $announcer_pluginpath . 'announcer-admin-css.css');
		wp_enqueue_style('jwysiwyg-css', $jwysiwyg_css); 
	}
}
add_action('admin_print_styles', 'announcer_admin_css');

#### Basic functions ####
function announcer_check_user_date(){
	$options = get_option('announcer_data');
	$announcer_end_date = $options['announcer_end_date'];
	
	if($announcer_end_date == 0){
		return 1;
	}
	
	$announcer_date_hyphen = strpos($announcer_end_date, '-');
	
	if ($announcer_date_hyphen === false) {
		return 0;
	} else {
		list($year, $month, $day) = explode('-', $announcer_end_date);
		if($year > 2009){ $year_check = 1;}
		if($month < 12 && $month != 0){ $month_check = 1; }
		if($day < 31 && $day != 0){ $day_check = 1; }
		if($year_check == 1 && $month_check == 1 && $day_check == 1){
			return 1;
		}
	}
}

function announcer_compare_dates(){
	$options = get_option('announcer_data');
	
	$announcer_status = $options['announcer_status'];
	$announcer_end_date = strtotime($options['announcer_end_date']);
	$announcer_todays_date = strtotime(date('Y-n-d'));
	
	if (($announcer_end_date > $announcer_todays_date) || $announcer_end_date == 0){
		return 1;
	}else{
		return 0;
	}
}

## Revision checker
function announcer_revision(){
	
	$options = get_option('announcer_data');
	
	$announcer_id_name = $options['announcer_id_name'];
	$announcer_revision = $options['announcer_revision'];
	if($_COOKIE['announcerRevision'] != $announcer_revision){
		setcookie("announcerRevision", $announcer_revision, time() + 60*60*24*365, '/');
		setcookie("toggle-" . $announcer_id_name , "show", time() + 60*60*24*365 , '/');
	}
}

## Main function
function announcer(){
	static $announcer_is_added;
	
	if($announcer_is_added != 'yes' && $announcer_is_added == NULL){
		$options = get_option('announcer_data');
		
		$announcer_status = $options['announcer_status'];
		$announcer_previous_content = stripslashes($options['announcer_previous_content']);
		$announcer_content = stripslashes($options['announcer_content']);
		$announcer_end_date = $options['announcer_end_date'];
		$announcer_id_name = $options['announcer_id_name'];
		$announcer_show_close_button = $options['announcer_show_close_button'];
		
		$announcer_class_type = $options['announcer_class_type'];
		$announcer_custom_class_name = $options['announcer_custom_class_name'];
		$announcer_inbuilt_class_select = $options['announcer_inbuilt_class_select'];
		
		$announcer_revision = $options['announcer_revision'];
		
		## For close button
		if ($announcer_show_close_button == 'Yes'){
			$announcer_close_button = "\n" . '<span class="closeButton" onclick="toggleToggle(\''.$announcer_id_name.'\');">x</span>' . "\n";
		}else{
			$announcer_close_button = '';
		}
		
		## For class type
		if ($announcer_class_type == '1'){
			$announcer_class_name = $announcer_custom_class_name;
		}else{
			$announcer_class_name = $announcer_inbuilt_class_select;
		}
		
		## Main output
		if ($announcer_status == "1" && announcer_compare_dates()){
			echo "\n<!-- Start of Announcement | Powered by Announcer Wordpress plugin | www.aakashweb.com -->\n";
			echo '<div id="'.$announcer_id_name.'" class="'.$announcer_class_name.'">'.$announcer_close_button.$announcer_content.'</div>';
			
			echo "\n<!-- End of Announcement -->\n";
			$announcer_is_added = 'yes';
		}
	}
}

function announcer_add(){
	$options = get_option('announcer_data');
	$announcer_placement = $options['announcer_placement'];
	
	if($announcer_placement == 'bp'){
		add_action('loop_start', 'announcer');
		
	}elseif($announcer_placement == 'ap'){
		add_action('loop_end', 'announcer');
	}
}

function announcer_js(){
	$options = get_option('announcer_data');
	$announcer_id_name = $options['announcer_id_name'];
	$announcer_class_type = $options['announcer_class_type'];

	$announcer_js_content = '<script type="text/javascript">toggleInitiliaze("' . $announcer_id_name . '");</script>'; 

	echo $announcer_js_content;
}

function announcer_scripts(){
	global $announcer_pluginpath;
	$options = get_option('announcer_data');
	$announcer_class_type = $options['announcer_class_type'];
	
	wp_enqueue_script('announcer-js', $announcer_pluginpath . 'announcement_close.js', '', '', true);
	
	if ($announcer_class_type != '1'){
		wp_enqueue_style('announcer-css', $announcer_pluginpath . 'announcer-custom-class.css');
	}
}
add_action('wp_enqueue_scripts', 'announcer_scripts');

function announcer_button($what){

	$options = get_option('announcer_data');
	
	$announcer_status = $options['announcer_status'];
	$announcer_end_date = $options['announcer_end_date'];
	
	if ( $announcer_status == '1' &&  announcer_compare_dates() ){
	
		if($what == 'class'){
			echo 'announceStatusButtonGreen';
		}else{
			echo __('Announcement is On', 'announcer');
		}
		
	}else{
	
		if($what == 'text'){
			echo __('Announcement is Off', 'announcer');
		}else{
			echo 'announceStatusButtonOrange';
		}
		
	}
}

function announcer_addpage() {
    add_submenu_page('options-general.php', 'Announcer', 'Announcer', 10, __FILE__, 'announcer_admin_page');
}
#### End basic functions ####

## Actions
add_action('admin_menu', 'announcer_addpage');
add_action('init', 'announcer_add');
add_action('wp_footer', 'announcer_js');
add_action('init', 'announcer_revision');

#### Announcer Admin page ####
function announcer_admin_page(){
	
	global $announcer_pluginpath, $announcer_donate_link;
	
	## Announcer admin page
	$announcer_updated = false;
	$options = get_option('announcer_data');

	## Announcer date entry check
	if(!$_POST["announcer_submit"] && announcer_compare_dates() == 0){
		echo '<div class="message error fade"><p>' . sprintf(__('The end date <code>%s</code> has expired. Announcement is turned off', 'announcer'), $options['announcer_end_date']) . '</p></div>';
	}
	
	## Announce main admin form
	if ( $_POST["announcer_submit"] && $_POST["announcer_form_main"] == '1') {
		
		## Default msg
		$announcer_msg = __('Updated successfully !', 'announcer');
		
		## If no data is entered
		if($_POST['announcer_end_date'] == NULL){
			$_POST['announcer_end_date'] = 0; 
		}
		if($_POST['announcer_id_name'] == NULL){
			echo '<div class="message error fade"><p>' . __('Please enter a ID for the announcement box', 'announcer') . '</p></div>';
		}
		
		## Getting the posted datas
		$options['announcer_previous_content'] = $options['announcer_content'];
		$options['announcer_status'] = $_POST['announcer_status'];
		$options['announcer_end_date'] = $_POST['announcer_end_date'];
		$options['announcer_id_name'] = $_POST['announcer_id_name'];
		$options['announcer_show_close_button'] = $_POST['announcer_show_close_button'];
		
		$options['announcer_class_type'] = $_POST['announcer_class_type'];
		$options['announcer_custom_class_name'] = $_POST['announcer_custom_class_name'];
		$options['announcer_inbuilt_class_select'] = $_POST['announcer_inbuilt_class_select'];
		
		$options['announcer_placement'] = $_POST['announcer_placement'];
		
		if($options['announcer_previous_content'] != $_POST['announcer_content']){
			$options['announcer_content'] = $_POST['announcer_content'];
			$options['announcer_revision'] = $options['announcer_revision'] + 1 ;
		}else{
			$announcer_msg = __('Announcement content is not changed. Other options are updated !', 'announcer');
		}
		
		## Updating the DB
		update_option("announcer_data", $options);
		$announcer_updated = "true"; 
		
		## Updated message
		if($announcer_updated == 'true'){
			echo '<div class="message updated fade"><p>' . $announcer_msg . '</p></div>';
		}else{
			echo '<div class="message error fade"><p>' . __('Unable to update !', 'announcer') . '</p></div>';
		}
		
		## Check whether date is valid
		if(announcer_compare_dates() == 0 || announcer_check_user_date() == 0){
			echo '<div class="message error fade"><p>' . sprintf(__('The end date <code>%s</code> has expired or invalid. Please check the date. Format is <code>YYYY-MM-DD</code>', 'announcer'), $options['announcer_end_date']) . '</p></div>';
			$announcer_end_date_class = 'style="border: 1px solid #FF0000;"';
		}
	}
	
	## Retrieve and assign the new data to variables
	$announcer_status = $options['announcer_status'];
	$announcer_content = stripslashes($options['announcer_content']);
	$announcer_end_date = $options['announcer_end_date'];
	$announcer_id_name = $options['announcer_id_name'];
	$announcer_show_close_button = $options['announcer_show_close_button'];
	
	$announcer_class_type = $options['announcer_class_type'];
	$announcer_custom_class_name = $options['announcer_custom_class_name'];
	$announcer_inbuilt_class_select = $options['announcer_inbuilt_class_select'];
	
	$announcer_placement = $options['announcer_placement'];
	
?>

<!-- Announcer admin page Start-->

<div class="wrap">

<h2><img width="32" height="32" src="<?php echo $announcer_pluginpath; ?>images/announcer.png" align="absmiddle"/>&nbsp;Announcer<span class="smallText"> v<?php echo ANNOUNCER_VERSION; ?></span></h2>

<div id="leftContent">

<div id="announcer_status_button" title="<?php _e('Click to toggle showing announcements on and off', 'announcer'); ?>" class="announceStatus <?php announcer_button('class'); ?>" onclick="chngAnnouncerStatus();">
	<?php announcer_button('text'); ?>
</div><br />

<form method="post">
<div class="content">

<h4><?php _e('Announcement', 'announcer'); ?></h4>
<div class="section">
	<textarea  name="announcer_content" rows="10" id="announcer_content"><?php echo $announcer_content; ?></textarea>
	<input name="announcer_status" id="announcer_status" type="hidden" value="<?php echo $announcer_status;?>" />
</div>

<h4><?php _e('Options', 'announcer'); ?></h4>
<div class="section">
	<table width="100%" border="0">
	<tr>
	  <td width="21%" height="33"><label for="announcer_end_date"><?php _e('End Date', 'announcer'); ?>e</label></td>
	  <td width="79%">
	  <input type="text" id="announcer_end_date"  name="announcer_end_date" value="<?php echo $announcer_end_date; ?>" <?php echo $announcer_end_date_class; ?> /><br />
		 <span class="smallText"><?php _e('Format is YYYY-MM-DD | 0 for no limit', 'announcer'); ?></span></td>
	</tr>
	<tr>
	  <td height="32"><label for="announcer_id_name"><?php _e('Div tag\'s ID*', 'announcer'); ?></label></td>
	  <td><input type="text" id="announcer_id_name"  name="announcer_id_name" value="<?php echo $announcer_id_name; ?>" /></td>
	</tr>
	<tr>
	  <td height="32"><label for="announcer_show_close_button"><?php _e('Show close button', 'announcer'); ?></label></td>
	  <td>
		<select name="announcer_show_close_button" id="announcer_show_close_button">
		  <option <?php echo $announcer_show_close_button == 'Yes' ? ' selected="selected"' : ''; ?>><?php _e('Yes', 'announcer'); ?></option>
		  <option <?php echo $announcer_show_close_button == 'No' ? ' selected="selected"' : ''; ?>><?php _e('No', 'announcer'); ?></option>
		</select>
		</td>
	</tr>
	</table>
</div>

<h4><?php _e('Announcement box Class', 'announcer'); ?></h4>
<div class="section">
  <p><label for="announcer_class_type"><?php _e('Use custom class', 'announcer'); ?></label>
  <input type="checkbox" id="announcer_class_type" name="announcer_class_type" value="1"  <?php echo $announcer_class_type == 1 ? ' checked="checked"' : ''; ?>/></p>
  <table width="100%" border="0">
    <tr>
      <td width="21%" height="33"><label for="announcer_inbuilt_class_select"><?php _e('Inbuilt Classes', 'announcer'); ?></label></td>
      <td width="79%"><select id="announcer_inbuilt_class_select" name="announcer_inbuilt_class_select" value="">
        <option <?php echo $announcer_inbuilt_class_select == 'simple' ? ' selected="selected"' : ''; ?>>simple</option>
        <option <?php echo $announcer_inbuilt_class_select == 'float' ? ' selected="selected"' : ''; ?>>float</option>
      </select></td>
    </tr>
    <tr>
      <td height="35"><label for="announcer_custom_class_name"><?php _e('Custom Class', 'announcer'); ?></label></td>
      <td><input type="text" id="announcer_custom_class_name"  name="announcer_custom_class_name" value="<?php echo $announcer_custom_class_name; ?>" /></td>
    </tr>
  </table>
</div>

<h4><?php _e('Announcement box placement', 'announcer'); ?></h4>
<div class="section">
  <table width="100%" border="0">
    <tr>
      <td><label>
        <input name="announcer_placement" id="announcer_placement" type="radio" value="bp" <?php echo $announcer_placement == 'bp' ? ' checked="checked"' : ''; ?>/>
		<?php _e('Before post (above the heading & recommended)', 'announcer'); ?>
        </label><br/><br />
        <label>
        <input name="announcer_placement" id="announcer_placement" type="radio" value="ap" <?php echo $announcer_placement == 'ap' ? ' checked="checked"' : ''; ?>/>
		<?php _e('After post', 'announcer'); ?>
        </label><br /><br />
        <label><input name="announcer_placement" id="announcer_placement" type="radio" value="custom" <?php echo $announcer_placement == 'custom' ? ' checked="checked"' : ''; ?>/>
		<?php echo sprintf(__('"I will place it myself in the the theme file"<br />Use the code <code>%s</code> in your theme file', 'announcer'), '&lt;?php if(function_exists(\'announcer\')) { announcer();} ?&gt;'); ?>
</label></td>
      </tr>
  </table>
</div>

<input name="announcer_form_main" type="hidden" value="1" />
<input class="button-primary" type="submit" name="announcer_submit" id="announcer_submit" value="     Update     " />
</div>
</form>
</div>

<!-- Announcer sidebar start -->
<?php announcer_admin_sidebar(); ?>
<!-- Announcer sidebar End -->

</div>
<script type="text/javascript">
function chngAnnouncerStatus(){
	as=document.getElementById('announcer_status');
	asb=document.getElementById('announcer_status_button');
	
	if (as.value==1){
		as.value=0;
		asb.innerHTML ="<?php _e('Announcement is Off', 'announcer'); ?>";
		asb.className="announceStatus announceStatusButtonOrange";
	}else{
		as.value=1;
		asb.innerHTML ="<?php _e('Announcement is On', 'announcer'); ?>";
		asb.className="announceStatus announceStatusButtonGreen";
	}
}

toggleInitiliaze('donatorsList'); toggleInitiliaze('preview_box'); toggleInitiliaze('inbuilt');
awQuickTagInitiliaze('awQTToolbar1');
</script>

<!-- Essential javascript files linking and intilizaing functions end-->
<?php 
}
?>