<?php
namespace LWS\WOOREWARDS;

// don't call the file directly
if( !defined( 'ABSPATH' ) ) exit();

require_once LWS_WOOREWARDS_ASSETS . '/Parsedown.php';

/*
Class that will be used for all types of mail used by woorewards
*/
class Mailer
{

	public function __construct()
	{
		$this->Parsedown = new \LWS\WOOREWARDS\Parsedown();
		$this->Parsedown->setBreaksEnabled(true);
		/** @param user mail
		 * @param data (whatever is needed by your template) pass to hook 'lws_woorewards_mail_body_' . $template,
		 * @param mail_template */
		add_action('lws_woorewards_send_mail', array($this, 'sendMail'), 10, 3);
	}

	/** $coupon_id (array|id) an array of coupon post id */
	public function sendMail($email, $data, $template)
	{
		$args = apply_filters('lws_woorewards_mail_arguments_' . $template, $this->getArguments($template, $email), $data);

		$headers = array('Content-Type: text/html; charset=UTF-8');
		if( !empty($fromEMail = \sanitize_email(\get_option('woocommerce_email_from_address'))) )
		{
			if( !empty($fromName = \wp_specialchars_decode( \esc_html( \get_option('woocommerce_email_from_name') ), ENT_QUOTES )) )
				$headers[] = sprintf('From: %s <%s>', $fromName, $fromEMail);
			else
				$headers[] = 'From: ' . $fromEMail;
		}

		wp_mail(
			$email,
			$args['subject'],
			$this->content($data, $template, $email, $args),
			\apply_filters('lws_mail_headers_' . $template, $headers, $data)
		);
	}

	protected function content(&$data, $template, $email, &$args)
	{
		$style = apply_filters('lws_woorewards_mail_style_' . $template, '', $args);
		$body = apply_filters('lws_woorewards_mail_body_' . $template, '', $data, $args);

		$html = "<!DOCTYPE html><html xmlns='http://www.w3.org/1999/xhtml'>";
		$html .= "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		if( !empty($style) )
			$html .= "<style>$style</style>";
		$html .= "</head><body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'><center>";
		$html .= $this->banner($template, $args) . $body . $this->footer($args);
		$html .= "</center></body></html>";
		return $html;
	}

	protected function getArguments($template, $email)
	{
		static $args = array();
		if( empty($args) )
		{
			$args = array(
				'template' => '',
				'logo' => wp_get_attachment_image( get_option( 'lws_woorewards_mail_attribute_headerpic'), 'small' ),
				'footer' => $this->getCustomText('lws_woorewards_mail_attribute_footertext')
			);
		}

		if( $args['template'] != $template )
		{
			$args['template'] = $template;
			$args['subject'] = sanitize_text_field(\get_option('lws_woorewards_mail_subject_' . $template, ''));
			$args['title'] = $this->getCustomText('lws_woorewards_mail_title_' . $template);
			$args['header'] = $this->getCustomText('lws_woorewards_mail_header_' . $template);
		}

		$args['user_email'] = $email;
		return $args;
	}

	protected function getCustomText($id, $dft='')
	{
		$txt = trim(\get_option($id, $dft));
		if( !empty($txt) )
			$txt = $this->Parsedown->text($txt);
		return $txt;
	}

	public function banner($template, $args)
	{
		return <<<EOT
		<center>{$args['logo']}</center>
		<table class='lwss_selectable lws-main-conteneur' data-type='Main Border'>
			<thead>
				<tr>
					<td class='lwss_selectable lws-top-cell' data-type='Title'>{$args['title']}</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class='lwss_selectable lws-middle-cell' data-type='Explanation'>{$args['header']}</td>
				</tr>
EOT;
	}

	public function footer($args)
	{
		return <<<EOT
			</tbody>
			<tfoot>
				<tr>
					<td class='lwss_selectable lws-bottom-cell' data-type='Footer'>{$args['footer']}</td>
				</tr>
				</tfoot>
		</table>
EOT;
		return $html;
	}

}
?>
