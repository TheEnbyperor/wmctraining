<?php
/*
Plugin Name: Live Chat by cSupport
Plugin URI: http://www.csupporthq.com/
Description: Live Chat Software by cSupport
Author: cSupport
Version: 1.3.1
Author URI: http://csupporthq.com/
*/
function getcSupportLivechat()
{
	echo "";
	$formid=get_option('cSupportLivechat_data');
	$website=get_option('cSupportLivechat_data_website');
	$type=get_option('cSupportLivechat_data_type');
	$autofill=get_option('cSupportLivechat_data_autofill');
	$autostart=get_option('cSupportLivechat_data_autostart');
	$margin=intVal(get_option('cSupportLivechat_data_margin'));
	$position=get_option('cSupportLivechat_data_position');
	$bgcolor=get_option('cSupportLivechat_data_bgcolor');
	echo "<!--	cSupport Live chat Plugin --><script type='text/javascript'>(function() { var src = ('https:' == document.location.protocol ? 'https://' : 'http://') + '".$website."/external/".$type.".js';document.write(\"<script src='\"+src+\"' type='text/javascript'><\/script>\");})();";
	if($autofill=='true'){
		global $current_user;
		get_currentuserinfo();
		echo "var cs_name=\"".($current_user->user_login)."\";var cs_email=\"".($current_user->user_email)."\";";
		if($autostart=='true')
			echo "var cs_autostart=true;";
	}
	if($margin>0 && $margin<101) echo "var cs_margin=\"".$margin."px\";";
	if($position=="t-l" || $position=="t-r" || $position=="b-l" || $position=="b-r") echo "var cs_position=\"".$position."\";";
	if(preg_match('/^#[a-fA-F0-9]{6}$/i', $bgcolor))
		echo "var cs_bgcolor=\"".$bgcolor."\";";

	echo "</script><!--	//cSupport Live chat Plugin -->";
}

function addcSupportLivechat()
{
	getcSupportLivechat();
}
add_action('wp_footer', 'addcSupportLivechat');

register_activation_hook(__FILE__,'cSupportLivechat_install'); 
register_deactivation_hook( __FILE__, 'cSupportLivechat_remove' );

function cSupportLivechat_install() {
	add_option("cSupportLivechat_data_website", '', '', 'yes');
	add_option("cSupportLivechat_data_type", '', '', 'yes');
	add_option("cSupportLivechat_data_autofill", 'true', '', 'yes');
	add_option("cSupportLivechat_data_autostart", 'false', '', 'yes');
	add_option("cSupportLivechat_data_margin", '', 'b-r', 'yes');
	add_option("cSupportLivechat_data_position", '', '', 'yes');
	add_option("cSupportLivechat_data_bgcolor", '', '', 'yes');
}

function cSupportLivechat_remove() {
	delete_option('cSupportLivechat_data_website');
	delete_option('cSupportLivechat_data_type');
	delete_option('cSupportLivechat_data_autofill');
	delete_option('cSupportLivechat_data_autotart');
	delete_option('cSupportLivechat_data_margin');
	delete_option('cSupportLivechat_data_position');
	delete_option('cSupportLivechat_data_bgcolor');
}

if(is_admin()){
	add_action('admin_menu', 'cSupportLivechat_admin_menu');

	function cSupportLivechat_admin_menu() {
		add_options_page('cSupport Live Chat Options', 'cSupport Options', 'administrator',
'cSupportLivechat', 'cSupportLivechat_html_page');
		}
	}
	function cSupportLivechat_html_page() {

		?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
	<h2>cSupport Live Chat Options</h2>
	
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="cSupportLivechat_data_website, cSupportLivechat_data_type, cSupportLivechat_data_autofill, cSupportLivechat_data_autostart, cSupportLivechat_data_margin, cSupportLivechat_data_position, cSupportLivechat_data_bgcolor " />
	
	<h3>General</h3>
	<table class="form-table">
		<tr valign="top">
			<th scope="row">
				<label for="cSupportLivechat_data_type">Type:</label>
			</th>
			<td>
				<select name="cSupportLivechat_data_type" id="cSupportLivechat_data_type">
					<option value="chat-float-inline" <?php if (get_option('cSupportLivechat_data_type') == 'chat-float-inline') {printf('selected');}?>>Floating Inline Chat Button</option>
					<option value="chat-float" <?php if (get_option('cSupportLivechat_data_type') == 'chat-float') {printf('selected');}?>>Floating Popup Chat Button</option>
				</select>
			</td>
		</tr>
	
		<tr valign="top">
			<th scope="row">
				<label for="cSupportLivechat_data_website">Your domain:</label>
			</th>
			<td>
				http://www.
				<input name="cSupportLivechat_data_website" type="text" id="cSupportLivechat_data_website" value="<?php echo get_option('cSupportLivechat_data_website'); ?>" /><br />
				<span style="font-size: 8pt;"><strong>Note:</strong> Your domain is your unique chat address, ie. <i>yourdomain.csupporthq.com</i></span>
			</td>
		</tr>
	
		<tr valign="top">
			<th scope="row">
				<label for="cSupportLivechat_data_autofill">Auto-fill:</label>
			</th>
			<td>
				<input name="cSupportLivechat_data_autofill" type="checkbox" value="true" <?php if (get_option('cSupportLivechat_data_autofill') == 'true') {printf('checked="checked"');}?> id="cSupportLivechat_data_autofill" /> When users are logged in, auto-fill with their information
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="cSupportLivechat_data_autostart">Auto start session:</label>
			</th>
			<td>
				<input name="cSupportLivechat_data_autostart" type="checkbox" value="true" <?php if (get_option('cSupportLivechat_data_autostart') == 'true') {printf('checked="checked"');}?> id="cSupportLivechat_data_autostart" /> <strong>Note:</strong> Will only be used if auto-fill as been checked.
			</td>
		</tr>
		<tr>
			<th scope="row"></th>
			<td colspan="2">
				No account? Try a free 14-day trial now, <a href="http://csupporthq.com/pricing">http://csupporthq.com/pricing</a>
			</td>
		</tr>
	</table>
	
	<h3>Layout</h3>
	<table class="form-table">
		<tr valign="top">
			<th scope="row">
				<label for="cSupportLivechat_data_position">Position:</label>
			</th>
			<td>
				<select name="cSupportLivechat_data_position" id="cSupportLivechat_data_position">
					<option value="b-r" <?php if (get_option('cSupportLivechat_data_position') == 'b-r') {printf('selected');}?>>Bottom Right</option>
					<option value="b-l" <?php if (get_option('cSupportLivechat_data_position') == 'b-l') {printf('selected');}?>>Bottom Left</option>
					<option value="t-r" <?php if (get_option('cSupportLivechat_data_position') == 't-r') {printf('selected');}?>>Top Right</option>
					<option value="t-l" <?php if (get_option('cSupportLivechat_data_position') == 't-l') {printf('selected');}?>>Top Left</option>
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="cSupportLivechat_data_margin">Margin from edge:</label>
			</th>
			<td>
				<input name="cSupportLivechat_data_margin" type="text" id="cSupportLivechat_data_margin" value="<?php echo get_option('cSupportLivechat_data_margin'); ?>" /><br />
				<span style="font-size: 8pt;">Margin in pixels from edge. <strong>Note:</strong> Only enter numbers</span>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row">
				<label for="cSupportLivechat_data_bgcolor">Color:</label>
			</th>
			<td>
				<input name="cSupportLivechat_data_bgcolor" type="text" id="cSupportLivechat_data_bgcolor" value="<?php echo get_option('cSupportLivechat_data_bgcolor'); ?>" /><br />
				<div id="ilctabscolorpicker"></div>
<script type="text/javascript">
	jQuery(document).ready(function() {
		var colorPicker = jQuery.farbtastic("#ilctabscolorpicker",function(color){
													jQuery("#cSupportLivechat_data_bgcolor").css({'background-color':color,'color':(this.hsl[2]>0.5?'#000':'#fff')});
													jQuery("#cSupportLivechat_data_bgcolor").val(color);
												});
		if(/^(#[0-9a-fA-F]{6})$/.test(jQuery("#cSupportLivechat_data_bgcolor").val())) colorPicker.setColor(jQuery("#cSupportLivechat_data_bgcolor").val());
	});
</script>
			</td>
		</tr>
	</table>
	
	<p class="submit">
		<input type="submit" id="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>
	</form>
</div>
<?php }

	add_action('init', 'ilc_farbtastic_script');
	function ilc_farbtastic_script(){
		wp_enqueue_style('farbtastic');
		wp_enqueue_script('farbtastic');
	}
?>
