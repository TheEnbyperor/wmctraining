<?php
/**
 * Theme setup functions.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	ADD CUSTOM VARIABLES
---------------------------------------------------------------------------------- */

/* Add global variables used in Redux framework */
function thinkup_reduxvariables() { 

	// Fetch options stored in $data.
	global $thinkup_redux_variables;

	//  1.1.     General settings.
	$GLOBALS['thinkup_general_logosetting']                 = thinkup_var ( 'thinkup_general_logosetting' );
	$GLOBALS['thinkup_general_logoswitch']                  = thinkup_var ( 'thinkup_general_logoswitch' );
	$GLOBALS['thinkup_general_logolink']                    = thinkup_var ( 'thinkup_general_logolink', 'url' );
	$GLOBALS['thinkup_general_logolinkretina']              = thinkup_var ( 'thinkup_general_logolinkretina', 'url' );
	$GLOBALS['thinkup_general_sitetitle']                   = thinkup_var ( 'thinkup_general_sitetitle' );
	$GLOBALS['thinkup_general_sitedescription']             = thinkup_var ( 'thinkup_general_sitedescription' );
	$GLOBALS['thinkup_general_faviconlink']                 = thinkup_var ( 'thinkup_general_faviconlink', 'url' );
	$GLOBALS['thinkup_general_layout']                      = thinkup_var ( 'thinkup_general_layout' );
	$GLOBALS['thinkup_general_sidebars']                    = thinkup_var ( 'thinkup_general_sidebars' );
	$GLOBALS['thinkup_general_fixedlayoutswitch']           = thinkup_var ( 'thinkup_general_fixedlayoutswitch' );
	$GLOBALS['thinkup_general_boxlayout']                   = thinkup_var ( 'thinkup_general_boxlayout' );
	$GLOBALS['thinkup_general_boxbackgroundcolor']          = thinkup_var ( 'thinkup_general_boxbackgroundcolor' );
	$GLOBALS['thinkup_general_boxbackgroundimage']          = thinkup_var ( 'thinkup_general_boxbackgroundimage', 'url' );
	$GLOBALS['thinkup_general_boxedposition']               = thinkup_var ( 'thinkup_general_boxedposition' );
	$GLOBALS['thinkup_general_boxedrepeat']                 = thinkup_var ( 'thinkup_general_boxedrepeat' );
	$GLOBALS['thinkup_general_boxedsize']                   = thinkup_var ( 'thinkup_general_boxedsize' );
	$GLOBALS['thinkup_general_boxedattachment']             = thinkup_var ( 'thinkup_general_boxedattachment' );
	$GLOBALS['thinkup_general_introswitch']                 = thinkup_var ( 'thinkup_general_introswitch' );
	$GLOBALS['thinkup_general_breadcrumbswitch']            = thinkup_var ( 'thinkup_general_breadcrumbswitch' );
	$GLOBALS['thinkup_general_breadcrumbdelimeter']         = thinkup_var ( 'thinkup_general_breadcrumbdelimeter' );
	$GLOBALS['thinkup_general_analyticscode']               = thinkup_var ( 'thinkup_general_analyticscode' );
	$GLOBALS['thinkup_general_customcss']                   = thinkup_var ( 'thinkup_general_customcss' );
	$GLOBALS['thinkup_general_customjavafront']             = thinkup_var ( 'thinkup_general_customjavafront' );

	//  1.2.1     Homepage.
	$GLOBALS['thinkup_homepage_layout']                     = thinkup_var ( 'thinkup_homepage_layout' );
	$GLOBALS['thinkup_homepage_sidebars']                   = thinkup_var ( 'thinkup_homepage_sidebars' );
	$GLOBALS['thinkup_homepage_sliderswitch']               = thinkup_var ( 'thinkup_homepage_sliderswitch' );
	$GLOBALS['thinkup_homepage_slidername']                 = thinkup_var ( 'thinkup_homepage_slidername' );
	$GLOBALS['thinkup_homepage_sliderpreset']               = thinkup_var ( 'thinkup_homepage_sliderpreset' );
	$GLOBALS['thinkup_homepage_sliderimage1_info']          = thinkup_var ( 'thinkup_homepage_sliderimage1_info' );
	$GLOBALS['thinkup_homepage_sliderimage1_image']         = thinkup_var ( 'thinkup_homepage_sliderimage1_image', 'url' );
	$GLOBALS['thinkup_homepage_sliderimage1_title']         = thinkup_var ( 'thinkup_homepage_sliderimage1_title' );
	$GLOBALS['thinkup_homepage_sliderimage1_desc']          = thinkup_var ( 'thinkup_homepage_sliderimage1_desc' );
	$GLOBALS['thinkup_homepage_sliderimage1_link']          = thinkup_var ( 'thinkup_homepage_sliderimage1_link' );
	$GLOBALS['thinkup_homepage_sliderimage2_info']          = thinkup_var ( 'thinkup_homepage_sliderimage2_info' );
	$GLOBALS['thinkup_homepage_sliderimage2_image']         = thinkup_var ( 'thinkup_homepage_sliderimage2_image', 'url' );
	$GLOBALS['thinkup_homepage_sliderimage2_title']         = thinkup_var ( 'thinkup_homepage_sliderimage2_title' );
	$GLOBALS['thinkup_homepage_sliderimage2_desc']          = thinkup_var ( 'thinkup_homepage_sliderimage2_desc' );
	$GLOBALS['thinkup_homepage_sliderimage2_link']          = thinkup_var ( 'thinkup_homepage_sliderimage2_link' );
	$GLOBALS['thinkup_homepage_sliderimage3_info']          = thinkup_var ( 'thinkup_homepage_sliderimage3_info' );
	$GLOBALS['thinkup_homepage_sliderimage3_image']         = thinkup_var ( 'thinkup_homepage_sliderimage3_image', 'url' );
	$GLOBALS['thinkup_homepage_sliderimage3_title']         = thinkup_var ( 'thinkup_homepage_sliderimage3_title' );
	$GLOBALS['thinkup_homepage_sliderimage3_desc']          = thinkup_var ( 'thinkup_homepage_sliderimage3_desc' );
	$GLOBALS['thinkup_homepage_sliderimage3_link']          = thinkup_var ( 'thinkup_homepage_sliderimage3_link' );
	$GLOBALS['thinkup_homepage_sliderstyle']                = thinkup_var ( 'thinkup_homepage_sliderstyle' );
	$GLOBALS['thinkup_homepage_sliderspeed']                = thinkup_var ( 'thinkup_homepage_sliderspeed' );
	$GLOBALS['thinkup_homepage_sliderpresetwidth']          = thinkup_var ( 'thinkup_homepage_sliderpresetwidth' );
	$GLOBALS['thinkup_homepage_sliderpresetheight']         = thinkup_var ( 'thinkup_homepage_sliderpresetheight' );
	$GLOBALS['thinkup_homepage_introswitch']                = thinkup_var ( 'thinkup_homepage_introswitch' );
	$GLOBALS['thinkup_homepage_introaction']                = thinkup_var ( 'thinkup_homepage_introaction' );
	$GLOBALS['thinkup_homepage_introactionteaser']          = thinkup_var ( 'thinkup_homepage_introactionteaser' );
	$GLOBALS['thinkup_homepage_introactionbutton']          = thinkup_var ( 'thinkup_homepage_introactionbutton' );
	$GLOBALS['thinkup_homepage_introactionlink']            = thinkup_var ( 'thinkup_homepage_introactionlink' );
	$GLOBALS['thinkup_homepage_introactionpage']            = thinkup_var ( 'thinkup_homepage_introactionpage' );
	$GLOBALS['thinkup_homepage_introactioncustom']          = thinkup_var ( 'thinkup_homepage_introactioncustom' );
	$GLOBALS['thinkup_homepage_outroswitch']                = thinkup_var ( 'thinkup_homepage_outroswitch' );
	$GLOBALS['thinkup_homepage_outroaction']                = thinkup_var ( 'thinkup_homepage_outroaction' );
	$GLOBALS['thinkup_homepage_outroactionteaser']          = thinkup_var ( 'thinkup_homepage_outroactionteaser' );
	$GLOBALS['thinkup_homepage_outroactionbutton']          = thinkup_var ( 'thinkup_homepage_outroactionbutton' );
	$GLOBALS['thinkup_homepage_outroactionlink']            = thinkup_var ( 'thinkup_homepage_outroactionlink' );
	$GLOBALS['thinkup_homepage_outroactionpage']            = thinkup_var ( 'thinkup_homepage_outroactionpage' );
	$GLOBALS['thinkup_homepage_outroactioncustom']          = thinkup_var ( 'thinkup_homepage_outroactioncustom' );
	$GLOBALS['thinkup_homepage_sectionswitch']              = thinkup_var ( 'thinkup_homepage_sectionswitch' );

	//  1.2.2    Homepage (Featured).
	$GLOBALS['thinkup_homepage_sectionswitch']              = thinkup_var ( 'thinkup_homepage_sectionswitch' );
	$GLOBALS['thinkup_homepage_section1_image']             = thinkup_var ( 'thinkup_homepage_section1_image', 'id' );
	$GLOBALS['thinkup_homepage_section1_imagesize']         = thinkup_var ( 'thinkup_homepage_section1_imagesize' );
	$GLOBALS['thinkup_homepage_section1_title']             = thinkup_var ( 'thinkup_homepage_section1_title' );
	$GLOBALS['thinkup_homepage_section1_desc']              = thinkup_var ( 'thinkup_homepage_section1_desc' );
	$GLOBALS['thinkup_homepage_section1_link']              = thinkup_var ( 'thinkup_homepage_section1_link' );
	$GLOBALS['thinkup_homepage_section1_url']               = thinkup_var ( 'thinkup_homepage_section1_url' );
	$GLOBALS['thinkup_homepage_section1_target']            = thinkup_var ( 'thinkup_homepage_section1_target' );	
	$GLOBALS['thinkup_homepage_section1_button']            = thinkup_var ( 'thinkup_homepage_section1_button' );
	$GLOBALS['thinkup_homepage_section2_image']             = thinkup_var ( 'thinkup_homepage_section2_image', 'id' );
	$GLOBALS['thinkup_homepage_section2_imagesize']         = thinkup_var ( 'thinkup_homepage_section2_imagesize' );
	$GLOBALS['thinkup_homepage_section2_title']             = thinkup_var ( 'thinkup_homepage_section2_title' );
	$GLOBALS['thinkup_homepage_section2_desc']              = thinkup_var ( 'thinkup_homepage_section2_desc' );	
	$GLOBALS['thinkup_homepage_section2_link']              = thinkup_var ( 'thinkup_homepage_section2_link' );
	$GLOBALS['thinkup_homepage_section2_url']               = thinkup_var ( 'thinkup_homepage_section2_url' );
	$GLOBALS['thinkup_homepage_section2_button']            = thinkup_var ( 'thinkup_homepage_section2_button' );
	$GLOBALS['thinkup_homepage_section2_target']            = thinkup_var ( 'thinkup_homepage_section2_target' );
	$GLOBALS['thinkup_homepage_section3_image']             = thinkup_var ( 'thinkup_homepage_section3_image', 'id' );
	$GLOBALS['thinkup_homepage_section3_imagesize']         = thinkup_var ( 'thinkup_homepage_section3_imagesize' );
	$GLOBALS['thinkup_homepage_section3_title']             = thinkup_var ( 'thinkup_homepage_section3_title' );
	$GLOBALS['thinkup_homepage_section3_desc']              = thinkup_var ( 'thinkup_homepage_section3_desc' );	
	$GLOBALS['thinkup_homepage_section3_link']              = thinkup_var ( 'thinkup_homepage_section3_link' );
	$GLOBALS['thinkup_homepage_section3_url']               = thinkup_var ( 'thinkup_homepage_section3_url' );
	$GLOBALS['thinkup_homepage_section3_button']            = thinkup_var ( 'thinkup_homepage_section3_button' );
	$GLOBALS['thinkup_homepage_section3_target']            = thinkup_var ( 'thinkup_homepage_section3_target' );

	//  1.3.     Header
	$GLOBALS['thinkup_header_imageswitch']                  = thinkup_var ( 'thinkup_header_imageswitch' );
	$GLOBALS['thinkup_header_imageid']                      = thinkup_var ( 'thinkup_header_imagelink', 'id' );
	$GLOBALS['thinkup_header_imagelink']                    = thinkup_var ( 'thinkup_header_imagelink', 'url' );
	$GLOBALS['thinkup_header_imageurl']                     = thinkup_var ( 'thinkup_header_imageurl' );
	$GLOBALS['thinkup_header_imagewidth']                   = thinkup_var ( 'thinkup_header_imagewidth' );
	$GLOBALS['thinkup_header_searchswitch']                 = thinkup_var ( 'thinkup_header_searchswitch' );

	//  1.4.     Footer.
	$GLOBALS['thinkup_footer_layout']                       = thinkup_var ( 'thinkup_footer_layout' );
	$GLOBALS['thinkup_footer_widgetswitch']                 = thinkup_var ( 'thinkup_footer_widgetswitch' );
	$GLOBALS['thinkup_footer_copyright']                    = thinkup_var ( 'thinkup_footer_copyright' );
	$GLOBALS['thinkup_footer_outroswitch']                  = thinkup_var ( 'thinkup_footer_outroswitch' );
	$GLOBALS['thinkup_footer_outroaction']                  = thinkup_var ( 'thinkup_footer_outroaction' );
	$GLOBALS['thinkup_footer_outroactionteaser']            = thinkup_var ( 'thinkup_footer_outroactionteaser' );
	$GLOBALS['thinkup_footer_outroactionbutton']            = thinkup_var ( 'thinkup_footer_outroactionbutton' );
	$GLOBALS['thinkup_footer_outroactionlink']              = thinkup_var ( 'thinkup_footer_outroactionlink' );
	$GLOBALS['thinkup_footer_outroactionpage']              = thinkup_var ( 'thinkup_footer_outroactionpage' );
	$GLOBALS['thinkup_footer_outroactioncustom']            = thinkup_var ( 'thinkup_footer_outroactioncustom' );

	//  1.3. - 1.4. Social Media.
	$GLOBALS['thinkup_header_socialswitch']                 = thinkup_var ( 'thinkup_header_socialswitch' );
	$GLOBALS['thinkup_header_socialmessage']                = thinkup_var ( 'thinkup_header_socialmessage' );
	$GLOBALS['thinkup_header_facebookswitch']               = thinkup_var ( 'thinkup_header_facebookswitch' );
	$GLOBALS['thinkup_header_facebooklink']                 = thinkup_var ( 'thinkup_header_facebooklink' );
	$GLOBALS['thinkup_header_facebookiconswitch']           = thinkup_var ( 'thinkup_header_facebookiconswitch' );
	$GLOBALS['thinkup_header_facebookcustomicon']           = thinkup_var ( 'thinkup_header_facebookcustomicon', 'url' );
	$GLOBALS['thinkup_header_twitterswitch']                = thinkup_var ( 'thinkup_header_twitterswitch' );
	$GLOBALS['thinkup_header_twitterlink']                  = thinkup_var ( 'thinkup_header_twitterlink' );
	$GLOBALS['thinkup_header_twittericonswitch']            = thinkup_var ( 'thinkup_header_twittericonswitch' );
	$GLOBALS['thinkup_header_twittercustomicon']            = thinkup_var ( 'thinkup_header_twittercustomicon', 'url' );
	$GLOBALS['thinkup_header_googleswitch']                 = thinkup_var ( 'thinkup_header_googleswitch' );
	$GLOBALS['thinkup_header_googlelink']                   = thinkup_var ( 'thinkup_header_googlelink' );
	$GLOBALS['thinkup_header_googleiconswitch']             = thinkup_var ( 'thinkup_header_googleiconswitch' );
	$GLOBALS['thinkup_header_googlecustomicon']             = thinkup_var ( 'thinkup_header_googlecustomicon', 'url' );
	$GLOBALS['thinkup_header_instagramswitch']              = thinkup_var ( 'thinkup_header_instagramswitch' );
	$GLOBALS['thinkup_header_instagramlink']                = thinkup_var ( 'thinkup_header_instagramlink' );
	$GLOBALS['thinkup_header_instagramiconswitch']          = thinkup_var ( 'thinkup_header_instagramiconswitch' );
	$GLOBALS['thinkup_header_instagramcustomicon']          = thinkup_var ( 'thinkup_header_instagramcustomicon', 'url' );
	$GLOBALS['thinkup_header_tumblrswitch']                 = thinkup_var ( 'thinkup_header_tumblrswitch' );
	$GLOBALS['thinkup_header_tumblrlink']                   = thinkup_var ( 'thinkup_header_tumblrlink' );
	$GLOBALS['thinkup_header_tumblriconswitch']             = thinkup_var ( 'thinkup_header_tumblriconswitch' );
	$GLOBALS['thinkup_header_tumblrcustomicon']             = thinkup_var ( 'thinkup_header_tumblrcustomicon', 'url' );
	$GLOBALS['thinkup_header_linkedinswitch']               = thinkup_var ( 'thinkup_header_linkedinswitch' );
	$GLOBALS['thinkup_header_linkedinlink']                 = thinkup_var ( 'thinkup_header_linkedinlink' );
	$GLOBALS['thinkup_header_linkediniconswitch']           = thinkup_var ( 'thinkup_header_linkediniconswitch' );
	$GLOBALS['thinkup_header_linkedincustomicon']           = thinkup_var ( 'thinkup_header_linkedincustomicon', 'url' );
	$GLOBALS['thinkup_header_flickrswitch']                 = thinkup_var ( 'thinkup_header_flickrswitch' );
	$GLOBALS['thinkup_header_flickrlink']                   = thinkup_var ( 'thinkup_header_flickrlink' );
	$GLOBALS['thinkup_header_flickriconswitch']             = thinkup_var ( 'thinkup_header_flickriconswitch' );
	$GLOBALS['thinkup_header_flickrcustomicon']             = thinkup_var ( 'thinkup_header_flickrcustomicon', 'url' );
	$GLOBALS['thinkup_header_pinterestswitch']              = thinkup_var ( 'thinkup_header_pinterestswitch' );
	$GLOBALS['thinkup_header_pinterestlink']                = thinkup_var ( 'thinkup_header_pinterestlink' );
	$GLOBALS['thinkup_header_pinteresticonswitch']          = thinkup_var ( 'thinkup_header_pinteresticonswitch' );
	$GLOBALS['thinkup_header_pinterestcustomicon']          = thinkup_var ( 'thinkup_header_pinterestcustomicon', 'url' );
	$GLOBALS['thinkup_header_xingswitch']                   = thinkup_var ( 'thinkup_header_xingswitch' );
	$GLOBALS['thinkup_header_xinglink']                     = thinkup_var ( 'thinkup_header_xinglink' );
	$GLOBALS['thinkup_header_xingiconswitch']               = thinkup_var ( 'thinkup_header_xingiconswitch' );
	$GLOBALS['thinkup_header_xingcustomicon']               = thinkup_var ( 'thinkup_header_xingcustomicon', 'url' );
	$GLOBALS['thinkup_header_paypalswitch']                 = thinkup_var ( 'thinkup_header_paypalswitch' );
	$GLOBALS['thinkup_header_paypallink']                   = thinkup_var ( 'thinkup_header_paypallink' );
	$GLOBALS['thinkup_header_paypaliconswitch']             = thinkup_var ( 'thinkup_header_paypaliconswitch' );
	$GLOBALS['thinkup_header_paypalcustomicon']             = thinkup_var ( 'thinkup_header_paypalcustomicon', 'url' );
	$GLOBALS['thinkup_header_vimeoswitch']                  = thinkup_var ( 'thinkup_header_vimeoswitch' );
	$GLOBALS['thinkup_header_vimeolink']                    = thinkup_var ( 'thinkup_header_vimeolink' );
	$GLOBALS['thinkup_header_vimeoiconswitch']              = thinkup_var ( 'thinkup_header_vimeoiconswitch' );
	$GLOBALS['thinkup_header_vimeocustomicon']              = thinkup_var ( 'thinkup_header_vimeocustomicon', 'url'  );
	$GLOBALS['thinkup_header_youtubeswitch']                = thinkup_var ( 'thinkup_header_youtubeswitch' );
	$GLOBALS['thinkup_header_youtubelink']                  = thinkup_var ( 'thinkup_header_youtubelink' );
	$GLOBALS['thinkup_header_youtubeiconswitch']            = thinkup_var ( 'thinkup_header_youtubeiconswitch' );
	$GLOBALS['thinkup_header_youtubecustomicon']            = thinkup_var ( 'thinkup_header_youtubecustomicon', 'url' );
	$GLOBALS['thinkup_header_rssswitch']                    = thinkup_var ( 'thinkup_header_rssswitch' );
	$GLOBALS['thinkup_header_rsslink']                      = thinkup_var ( 'thinkup_header_rsslink' );
	$GLOBALS['thinkup_header_rssiconswitch']                = thinkup_var ( 'thinkup_header_rssiconswitch' );
	$GLOBALS['thinkup_header_rsscustomicon']                = thinkup_var ( 'thinkup_header_rsscustomicon', 'url' );
	$GLOBALS['thinkup_header_emailswitch']                  = thinkup_var ( 'thinkup_header_emailswitch' );
	$GLOBALS['thinkup_header_emaillink']                    = thinkup_var ( 'thinkup_header_emaillink' );
	$GLOBALS['thinkup_header_emailiconswitch']              = thinkup_var ( 'thinkup_header_emailiconswitch' );
	$GLOBALS['thinkup_header_emailcustomicon']              = thinkup_var ( 'thinkup_header_emailcustomicon', 'url' );

	//  1.5.1.   Blog - Main page.
	$GLOBALS['thinkup_blog_layout']                         = thinkup_var ( 'thinkup_blog_layout' );
	$GLOBALS['thinkup_blog_sidebars']                       = thinkup_var ( 'thinkup_blog_sidebars' );
	$GLOBALS['thinkup_blog_style']                          = thinkup_var ( 'thinkup_blog_style' );
	$GLOBALS['thinkup_blog_style1layout']                   = thinkup_var ( 'thinkup_blog_style1layout' );
	$GLOBALS['thinkup_blog_style2layout']                   = thinkup_var ( 'thinkup_blog_style2layout' );
	$GLOBALS['thinkup_blog_lightbox']                       = thinkup_var ( 'thinkup_blog_hovercheck', 'option1' );
	$GLOBALS['thinkup_blog_link']                           = thinkup_var ( 'thinkup_blog_hovercheck', 'option2' );
	$GLOBALS['thinkup_blog_title']                          = thinkup_var ( 'thinkup_blog_title' );
	$GLOBALS['thinkup_blog_date']                           = thinkup_var ( 'thinkup_blog_contentcheck', 'option1' );
	$GLOBALS['thinkup_blog_author']                         = thinkup_var ( 'thinkup_blog_contentcheck', 'option2' );
	$GLOBALS['thinkup_blog_comment']                        = thinkup_var ( 'thinkup_blog_contentcheck', 'option3' );
	$GLOBALS['thinkup_blog_category']                       = thinkup_var ( 'thinkup_blog_contentcheck', 'option4' );
	$GLOBALS['thinkup_blog_tag']                            = thinkup_var ( 'thinkup_blog_contentcheck', 'option5' );
	$GLOBALS['thinkup_blog_postswitch']                     = thinkup_var ( 'thinkup_blog_postswitch' );

	//  1.5.2.   Blog - Single post.
	$GLOBALS['thinkup_post_layout']                         = thinkup_var ( 'thinkup_post_layout' );
	$GLOBALS['thinkup_post_sidebars']                       = thinkup_var ( 'thinkup_post_sidebars' );
	$GLOBALS['thinkup_post_date']                           = thinkup_var ( 'thinkup_post_contentcheck', 'option1' );
	$GLOBALS['thinkup_post_author']                         = thinkup_var ( 'thinkup_post_contentcheck', 'option2' );
	$GLOBALS['thinkup_post_comment']                        = thinkup_var ( 'thinkup_post_contentcheck', 'option3' );
	$GLOBALS['thinkup_post_category']                       = thinkup_var ( 'thinkup_post_contentcheck', 'option4' );
	$GLOBALS['thinkup_post_tag']                            = thinkup_var ( 'thinkup_post_contentcheck', 'option5' );
	$GLOBALS['thinkup_post_authorbio']                      = thinkup_var ( 'thinkup_post_authorbio' );
	$GLOBALS['thinkup_post_share']                          = thinkup_var ( 'thinkup_post_share' );
	$GLOBALS['thinkup_post_sharemessage']                   = thinkup_var ( 'thinkup_post_sharemessage' );
	$GLOBALS['thinkup_post_sharefacebook']                  = thinkup_var ( 'thinkup_post_sharecheck', 'option1' );
	$GLOBALS['thinkup_post_sharetwitter']                   = thinkup_var ( 'thinkup_post_sharecheck', 'option2' );
	$GLOBALS['thinkup_post_sharegoogle']                    = thinkup_var ( 'thinkup_post_sharecheck', 'option3' );
	$GLOBALS['thinkup_post_sharelinkedin']                  = thinkup_var ( 'thinkup_post_sharecheck', 'option4' );
	$GLOBALS['thinkup_post_sharetumblr']                    = thinkup_var ( 'thinkup_post_sharecheck', 'option5' );
	$GLOBALS['thinkup_post_sharepinterest']                 = thinkup_var ( 'thinkup_post_sharecheck', 'option6' );
	$GLOBALS['thinkup_post_shareemail']                     = thinkup_var ( 'thinkup_post_sharecheck', 'option7' );

	//  1.6.     Portfolio.
	$GLOBALS['thinkup_portfolio_layout']                    = thinkup_var ( 'thinkup_portfolio_layout' );
	$GLOBALS['thinkup_portfolio_sidebars']                  = thinkup_var ( 'thinkup_portfolio_sidebars' );
	$GLOBALS['thinkup_portfolio_style']                     = thinkup_var ( 'thinkup_portfolio_style' );
	$GLOBALS['thinkup_portfolio_hovertitle']                = thinkup_var ( 'thinkup_portfolio_hovercheck', 'option1' );
	$GLOBALS['thinkup_portfolio_hoverexcerpt']              = thinkup_var ( 'thinkup_portfolio_hovercheck', 'option2' );
	$GLOBALS['thinkup_portfolio_hoverproject']              = thinkup_var ( 'thinkup_portfolio_hovercheck', 'option3' );
	$GLOBALS['thinkup_portfolio_hoverimage']                = thinkup_var ( 'thinkup_portfolio_hovercheck', 'option4' );
	$GLOBALS['thinkup_project_layout']                      = thinkup_var ( 'thinkup_project_layout' );
	$GLOBALS['thinkup_project_sidebars']                    = thinkup_var ( 'thinkup_project_sidebars' );
	$GLOBALS['thinkup_project_client']                      = thinkup_var ( 'thinkup_project_infocheck', 'option1'  );
	$GLOBALS['thinkup_project_date']                        = thinkup_var ( 'thinkup_project_infocheck', 'option2'  );
	$GLOBALS['thinkup_project_skill']                       = thinkup_var ( 'thinkup_project_infocheck', 'option3'  );
	$GLOBALS['thinkup_project_url']                         = thinkup_var ( 'thinkup_project_infocheck', 'option4'  );
	$GLOBALS['thinkup_project_navigationswitch']            = thinkup_var ( 'thinkup_project_navigationswitch' );

	//  1.7.     Contact Page.
	$GLOBALS['thinkup_contact_map']                         = thinkup_var ( 'thinkup_contact_map' );
	$GLOBALS['thinkup_contact_form']                        = thinkup_var ( 'thinkup_contact_form' );
	$GLOBALS['thinkup_contact_info']                        = thinkup_var ( 'thinkup_contact_info' );
	$GLOBALS['thinkup_contact_line1']                       = thinkup_var ( 'thinkup_contact_line1' );
	$GLOBALS['thinkup_contact_line2']                       = thinkup_var ( 'thinkup_contact_line2' );
	$GLOBALS['thinkup_contact_city']                        = thinkup_var ( 'thinkup_contact_city' );
	$GLOBALS['thinkup_contact_country']                     = thinkup_var ( 'thinkup_contact_country' );
	$GLOBALS['thinkup_contact_zip']                         = thinkup_var ( 'thinkup_contact_zip' );
	$GLOBALS['thinkup_contact_telephone']                   = thinkup_var ( 'thinkup_contact_telephone' );
	$GLOBALS['thinkup_contact_fax']                         = thinkup_var ( 'thinkup_contact_fax' );
	$GLOBALS['thinkup_contact_email']                       = thinkup_var ( 'thinkup_contact_email' );
	$GLOBALS['thinkup_contact_website']                     = thinkup_var ( 'thinkup_contact_website' );

	//  1.8.     Special pages.
	$GLOBALS['thinkup_404_content']                         = thinkup_var ( 'thinkup_404_content' );
	$GLOBALS['thinkup_404_contentparagraph']                = thinkup_var ( 'thinkup_404_contentparagraph' );

	//  1.9.     Notification bar.
	$GLOBALS['thinkup_notification_switch']                 = thinkup_var ( 'thinkup_notification_switch' );
	$GLOBALS['thinkup_notification_text']                   = thinkup_var ( 'thinkup_notification_text' );
	$GLOBALS['thinkup_notification_button']                 = thinkup_var ( 'thinkup_notification_button' );
	$GLOBALS['thinkup_notification_link']                   = thinkup_var ( 'thinkup_notification_link' );
	$GLOBALS['thinkup_notification_linkpage']               = thinkup_var ( 'thinkup_notification_linkpage' );
	$GLOBALS['thinkup_notification_linkcustom']             = thinkup_var ( 'thinkup_notification_linkcustom' );
	$GLOBALS['thinkup_notification_homeswitch']             = thinkup_var ( 'thinkup_notification_homeswitch' );
	$GLOBALS['thinkup_notification_fixtop']                 = thinkup_var ( 'thinkup_notification_fixtop' );
	$GLOBALS['thinkup_notification_backgroundcolourswitch'] = thinkup_var ( 'thinkup_notification_backgroundcolourswitch' );
	$GLOBALS['thinkup_notification_backgroundcolour']       = thinkup_var ( 'thinkup_notification_backgroundcolour' );
	$GLOBALS['thinkup_notification_maintextcolourswitch']   = thinkup_var ( 'thinkup_notification_maintextcolourswitch' );
	$GLOBALS['thinkup_notification_maintextcolour']         = thinkup_var ( 'thinkup_notification_maintextcolour' );
	$GLOBALS['thinkup_notification_buttoncolourswitch']     = thinkup_var ( 'thinkup_notification_buttoncolourswitch' );
	$GLOBALS['thinkup_notification_buttoncolour']           = thinkup_var ( 'thinkup_notification_buttoncolour' );
	$GLOBALS['thinkup_notification_buttontextcolourswitch'] = thinkup_var ( 'thinkup_notification_buttontextcolourswitch' );
	$GLOBALS['thinkup_notification_buttontextcolour']       = thinkup_var ( 'thinkup_notification_buttontextcolour' );

	//  1.10.     Search engine optimisation.
	$GLOBALS['thinkup_seo_switch']                          = thinkup_var ( 'thinkup_seo_switch' );
	$GLOBALS['thinkup_seo_sitetitle']                       = thinkup_var ( 'thinkup_seo_sitetitle' );
	$GLOBALS['thinkup_seo_homedescription']                 = thinkup_var ( 'thinkup_seo_homedescription' );
	$GLOBALS['thinkup_seo_sitekeywords']                    = thinkup_var ( 'thinkup_seo_sitekeywords' );
	$GLOBALS['thinkup_seo_noodp']                           = thinkup_var ( 'thinkup_seo_metarobots', 'option1' );
	$GLOBALS['thinkup_seo_noydir']                          = thinkup_var ( 'thinkup_seo_metarobots', 'option2' );

	//  1.11.     Typography.
	$GLOBALS['thinkup_font_bodyswitch']                     = thinkup_var ( 'thinkup_font_bodyswitch' );
	$GLOBALS['thinkup_font_bodystandard']                   = thinkup_var ( 'thinkup_font_bodystandard' );
	$GLOBALS['thinkup_font_bodygoogle']                     = thinkup_var ( 'thinkup_font_bodygoogle' );
	$GLOBALS['thinkup_font_bodyheadingswitch']              = thinkup_var ( 'thinkup_font_bodyheadingswitch' );
	$GLOBALS['thinkup_font_bodyheadingstandard']            = thinkup_var ( 'thinkup_font_bodyheadingstandard' );
	$GLOBALS['thinkup_font_bodyheadinggoogle']              = thinkup_var ( 'thinkup_font_bodyheadinggoogle' );
	$GLOBALS['thinkup_font_preheaderswitch']                = thinkup_var ( 'thinkup_font_preheaderswitch' );
	$GLOBALS['thinkup_font_preheaderstandard']              = thinkup_var ( 'thinkup_font_preheaderstandard' );
	$GLOBALS['thinkup_font_preheadergoogle']                = thinkup_var ( 'thinkup_font_preheadergoogle' );
	$GLOBALS['thinkup_font_mainheaderswitch']               = thinkup_var ( 'thinkup_font_mainheaderswitch' );
	$GLOBALS['thinkup_font_mainheaderstandard']             = thinkup_var ( 'thinkup_font_mainheaderstandard' );
	$GLOBALS['thinkup_font_mainheadergoogle']               = thinkup_var ( 'thinkup_font_mainheadergoogle' );
	$GLOBALS['thinkup_font_footerheadingswitch']            = thinkup_var ( 'thinkup_font_footerheadingswitch' );
	$GLOBALS['thinkup_font_footerheadingstandard']          = thinkup_var ( 'thinkup_font_footerheadingstandard' );
	$GLOBALS['thinkup_font_footerheadinggoogle']            = thinkup_var ( 'thinkup_font_footerheadinggoogle' );
	$GLOBALS['thinkup_font_mainfooterswitch']               = thinkup_var ( 'thinkup_font_mainfooterswitch' );
	$GLOBALS['thinkup_font_mainfooterstandard']             = thinkup_var ( 'thinkup_font_mainfooterstandard' );
	$GLOBALS['thinkup_font_mainfootergoogle']               = thinkup_var ( 'thinkup_font_mainfootergoogle' );
	$GLOBALS['thinkup_font_postfooterswitch']               = thinkup_var ( 'thinkup_font_postfooterswitch' );
	$GLOBALS['thinkup_font_postfooterstandard']             = thinkup_var ( 'thinkup_font_postfooterstandard' );
	$GLOBALS['thinkup_font_postfootergoogle']               = thinkup_var ( 'thinkup_font_postfootergoogle' );
	$GLOBALS['thinkup_font_bodysize']                       = thinkup_var ( 'thinkup_font_bodysize' );
	$GLOBALS['thinkup_font_h1size']                         = thinkup_var ( 'thinkup_font_h1size' );
	$GLOBALS['thinkup_font_h2size']                         = thinkup_var ( 'thinkup_font_h2size' );
	$GLOBALS['thinkup_font_h3size']                         = thinkup_var ( 'thinkup_font_h3size' );
	$GLOBALS['thinkup_font_h4size']                         = thinkup_var ( 'thinkup_font_h4size' );
	$GLOBALS['thinkup_font_h5size']                         = thinkup_var ( 'thinkup_font_h5size' );
	$GLOBALS['thinkup_font_h6size']                         = thinkup_var ( 'thinkup_font_h6size' );
	$GLOBALS['thinkup_font_sidebarsize']                    = thinkup_var ( 'thinkup_font_sidebarsize' );
	$GLOBALS['thinkup_font_preheadersize']                  = thinkup_var ( 'thinkup_font_preheadersize' );
	$GLOBALS['thinkup_font_preheadersubsize']               = thinkup_var ( 'thinkup_font_preheadersubsize' );
	$GLOBALS['thinkup_font_mainheadersize']                 = thinkup_var ( 'thinkup_font_mainheadersize' );
	$GLOBALS['thinkup_font_mainheadersubsize']              = thinkup_var ( 'thinkup_font_mainheadersubsize' );
	$GLOBALS['thinkup_font_footerheadingsize']              = thinkup_var ( 'thinkup_font_footerheadingsize' );
	$GLOBALS['thinkup_font_mainfootersize']                 = thinkup_var ( 'thinkup_font_mainfootersize' );
	$GLOBALS['thinkup_font_postfootersize']                 = thinkup_var ( 'thinkup_font_postfootersize' );

	//  1.12.     Custom styling.
	$GLOBALS['thinkup_styles_colorswitch']                  = thinkup_var ( 'thinkup_styles_colorswitch' );
	$GLOBALS['thinkup_styles_colorcustom']                  = thinkup_var ( 'thinkup_styles_colorcustom' );
	$GLOBALS['thinkup_styles_mainimage']                    = thinkup_var ( 'thinkup_styles_mainimage', 'url' );
	$GLOBALS['thinkup_styles_mainposition']                 = thinkup_var ( 'thinkup_styles_mainposition' );
	$GLOBALS['thinkup_styles_mainrepeat']                   = thinkup_var ( 'thinkup_styles_mainrepeat' );
	$GLOBALS['thinkup_styles_mainsize']                     = thinkup_var ( 'thinkup_styles_mainsize' );
	$GLOBALS['thinkup_styles_mainattachment']               = thinkup_var ( 'thinkup_styles_mainattachment' );
	$GLOBALS['thinkup_styles_mainswitch']                   = thinkup_var ( 'thinkup_styles_mainswitch' );
	$GLOBALS['thinkup_styles_mainbg']                       = thinkup_var ( 'thinkup_styles_mainbg' );
	$GLOBALS['thinkup_styles_mainheading']                  = thinkup_var ( 'thinkup_styles_mainheading' );
	$GLOBALS['thinkup_styles_maintext']                     = thinkup_var ( 'thinkup_styles_maintext' );
	$GLOBALS['thinkup_styles_mainlink']                     = thinkup_var ( 'thinkup_styles_mainlink' );
	$GLOBALS['thinkup_styles_mainlinkhover']                = thinkup_var ( 'thinkup_styles_mainlinkhover' );
	$GLOBALS['thinkup_styles_preheaderswitch']              = thinkup_var ( 'thinkup_styles_preheaderswitch' );
	$GLOBALS['thinkup_styles_preheaderimage']               = thinkup_var ( 'thinkup_styles_preheaderimage', 'url' );
	$GLOBALS['thinkup_styles_preheaderposition']            = thinkup_var ( 'thinkup_styles_preheaderposition' );
	$GLOBALS['thinkup_styles_preheaderrepeat']              = thinkup_var ( 'thinkup_styles_preheaderrepeat' );
	$GLOBALS['thinkup_styles_preheadersize']                = thinkup_var ( 'thinkup_styles_preheadersize' );
	$GLOBALS['thinkup_styles_preheaderattachment']          = thinkup_var ( 'thinkup_styles_preheaderattachment' );
	$GLOBALS['thinkup_styles_preheaderbg']                  = thinkup_var ( 'thinkup_styles_preheaderbg' );
	$GLOBALS['thinkup_styles_preheaderposition']            = thinkup_var ( 'thinkup_styles_preheaderposition' );
	$GLOBALS['thinkup_styles_preheaderrepeat']              = thinkup_var ( 'thinkup_styles_preheaderrepeat' );
	$GLOBALS['thinkup_styles_preheadersize']                = thinkup_var ( 'thinkup_styles_preheadersize' );
	$GLOBALS['thinkup_styles_preheaderattachment']          = thinkup_var ( 'thinkup_styles_preheaderattachment' );
	$GLOBALS['thinkup_styles_preheaderbghover']             = thinkup_var ( 'thinkup_styles_preheaderbghover' );
	$GLOBALS['thinkup_styles_preheadertext']                = thinkup_var ( 'thinkup_styles_preheadertext' );
	$GLOBALS['thinkup_styles_preheadertexthover']           = thinkup_var ( 'thinkup_styles_preheadertexthover' );
	$GLOBALS['thinkup_styles_preheaderdropbg']              = thinkup_var ( 'thinkup_styles_preheaderdropbg' );
	$GLOBALS['thinkup_styles_preheaderdropbghover']         = thinkup_var ( 'thinkup_styles_preheaderdropbghover' );
	$GLOBALS['thinkup_styles_preheaderdroptext']            = thinkup_var ( 'thinkup_styles_preheaderdroptext' );
	$GLOBALS['thinkup_styles_preheaderdroptexthover']       = thinkup_var ( 'thinkup_styles_preheaderdroptexthover' );
	$GLOBALS['thinkup_styles_preheaderdropborder']          = thinkup_var ( 'thinkup_styles_preheaderdropborder' );
	$GLOBALS['thinkup_styles_headerswitch']                 = thinkup_var ( 'thinkup_styles_headerswitch' );
	$GLOBALS['thinkup_styles_headerimage']                  = thinkup_var ( 'thinkup_styles_headerimage', 'url' );
	$GLOBALS['thinkup_styles_headerposition']               = thinkup_var ( 'thinkup_styles_headerposition' );
	$GLOBALS['thinkup_styles_headerrepeat']                 = thinkup_var ( 'thinkup_styles_headerrepeat' );
	$GLOBALS['thinkup_styles_headersize']                   = thinkup_var ( 'thinkup_styles_headersize' );
	$GLOBALS['thinkup_styles_headerattachment']             = thinkup_var ( 'thinkup_styles_headerattachment' );
	$GLOBALS['thinkup_styles_headerbg']                     = thinkup_var ( 'thinkup_styles_headerbg' );
	$GLOBALS['thinkup_styles_headerbghover']                = thinkup_var ( 'thinkup_styles_headerbghover' );
	$GLOBALS['thinkup_styles_headersitetitle']              = thinkup_var ( 'thinkup_styles_headersitetitle' );
	$GLOBALS['thinkup_styles_headersitedescription']        = thinkup_var ( 'thinkup_styles_headersitedescription' );
	$GLOBALS['thinkup_styles_headertext']                   = thinkup_var ( 'thinkup_styles_headertext' );
	$GLOBALS['thinkup_styles_headertexthover']              = thinkup_var ( 'thinkup_styles_headertexthover' );
	$GLOBALS['thinkup_styles_headerdropbg']                 = thinkup_var ( 'thinkup_styles_headerdropbg' );
	$GLOBALS['thinkup_styles_headerdropbghover']            = thinkup_var ( 'thinkup_styles_headerdropbghover' );
	$GLOBALS['thinkup_styles_headerdroptext']               = thinkup_var ( 'thinkup_styles_headerdroptext' );
	$GLOBALS['thinkup_styles_headerdroptexthover']          = thinkup_var ( 'thinkup_styles_headerdroptexthover' );
	$GLOBALS['thinkup_styles_headerdropborder']             = thinkup_var ( 'thinkup_styles_headerdropborder' );
	$GLOBALS['thinkup_styles_headerresswitch']              = thinkup_var ( 'thinkup_styles_headerresswitch' );
	$GLOBALS['thinkup_styles_headerresbg']                  = thinkup_var ( 'thinkup_styles_headerresbg' );
	$GLOBALS['thinkup_styles_headerresbghover']             = thinkup_var ( 'thinkup_styles_headerresbghover' );
	$GLOBALS['thinkup_styles_headerresbgicon']             	= thinkup_var ( 'thinkup_styles_headerresbgicon' );
	$GLOBALS['thinkup_styles_headerresbgiconhover']         = thinkup_var ( 'thinkup_styles_headerresbgiconhover' );
	$GLOBALS['thinkup_styles_headerresdropbg']              = thinkup_var ( 'thinkup_styles_headerresdropbg' );
	$GLOBALS['thinkup_styles_headerresdropbghover']         = thinkup_var ( 'thinkup_styles_headerresdropbghover' );
	$GLOBALS['thinkup_styles_headerresdroptext']            = thinkup_var ( 'thinkup_styles_headerresdroptext' );
	$GLOBALS['thinkup_styles_headerresdroptexthover']       = thinkup_var ( 'thinkup_styles_headerresdroptexthover' );
	$GLOBALS['thinkup_styles_headerresdropborder']          = thinkup_var ( 'thinkup_styles_headerresdropborder' );
	$GLOBALS['thinkup_styles_pageintroswitch']              = thinkup_var ( 'thinkup_styles_pageintroswitch' );
	$GLOBALS['thinkup_styles_pageintroimage']               = thinkup_var ( 'thinkup_styles_pageintroimage', 'url' );
	$GLOBALS['thinkup_styles_pageintroposition']            = thinkup_var ( 'thinkup_styles_pageintroposition' );
	$GLOBALS['thinkup_styles_pageintrorepeat']              = thinkup_var ( 'thinkup_styles_pageintrorepeat' );
	$GLOBALS['thinkup_styles_pageintrosize']                = thinkup_var ( 'thinkup_styles_pageintrosize' );
	$GLOBALS['thinkup_styles_pageintroattachment']          = thinkup_var ( 'thinkup_styles_pageintroattachment' );
	$GLOBALS['thinkup_styles_pageintrobg']                  = thinkup_var ( 'thinkup_styles_pageintrobg' );
	$GLOBALS['thinkup_styles_pageintrotext']                = thinkup_var ( 'thinkup_styles_pageintrotext' );
	$GLOBALS['thinkup_styles_pageintrobreadcrumbtext']      = thinkup_var ( 'thinkup_styles_pageintrobreadcrumbtext' );
	$GLOBALS['thinkup_styles_pageintrobreadcrumblink']      = thinkup_var ( 'thinkup_styles_pageintrobreadcrumblink' );
	$GLOBALS['thinkup_styles_footerswitch']                 = thinkup_var ( 'thinkup_styles_footerswitch' );
	$GLOBALS['thinkup_styles_footerimage']                  = thinkup_var ( 'thinkup_styles_footerimage', 'url' );
	$GLOBALS['thinkup_styles_footerposition']               = thinkup_var ( 'thinkup_styles_footerposition' );
	$GLOBALS['thinkup_styles_footerrepeat']                 = thinkup_var ( 'thinkup_styles_footerrepeat' );
	$GLOBALS['thinkup_styles_footersize']                   = thinkup_var ( 'thinkup_styles_footersize' );
	$GLOBALS['thinkup_styles_footerattachment']             = thinkup_var ( 'thinkup_styles_footerattachment' );
	$GLOBALS['thinkup_styles_footerbg']                     = thinkup_var ( 'thinkup_styles_footerbg' );
	$GLOBALS['thinkup_styles_footertitle']                  = thinkup_var ( 'thinkup_styles_footertitle' );
	$GLOBALS['thinkup_styles_footertext']                   = thinkup_var ( 'thinkup_styles_footertext' );
	$GLOBALS['thinkup_styles_footerlink']                   = thinkup_var ( 'thinkup_styles_footerlink' );
	$GLOBALS['thinkup_styles_footerlinkhover']              = thinkup_var ( 'thinkup_styles_footerlinkhover' );
	$GLOBALS['thinkup_styles_postfooterswitch']             = thinkup_var ( 'thinkup_styles_postfooterswitch' );
	$GLOBALS['thinkup_styles_postfooterimage']              = thinkup_var ( 'thinkup_styles_postfooterimage', 'url' );
	$GLOBALS['thinkup_styles_postfooterposition']           = thinkup_var ( 'thinkup_styles_postfooterposition' );
	$GLOBALS['thinkup_styles_postfooterrepeat']             = thinkup_var ( 'thinkup_styles_postfooterrepeat' );
	$GLOBALS['thinkup_styles_postfootersize']               = thinkup_var ( 'thinkup_styles_postfootersize' );
	$GLOBALS['thinkup_styles_postfooterattachment']         = thinkup_var ( 'thinkup_styles_postfooterattachment' );
	$GLOBALS['thinkup_styles_postfooterbg']                 = thinkup_var ( 'thinkup_styles_postfooterbg' );
	$GLOBALS['thinkup_styles_postfootertext']               = thinkup_var ( 'thinkup_styles_postfootertext' );
	$GLOBALS['thinkup_styles_postfooterlink']               = thinkup_var ( 'thinkup_styles_postfooterlink' );
	$GLOBALS['thinkup_styles_postfooterlinkhover']          = thinkup_var ( 'thinkup_styles_postfooterlinkhover' );
	$GLOBALS['thinkup_styles_skinswitch']                   = thinkup_var ( 'thinkup_styles_skinswitch' );
	$GLOBALS['thinkup_styles_skin']                         = thinkup_var ( 'thinkup_styles_skin' );


	//  1.13.     Support.
}
add_action( 'thinkup_hook_header', 'thinkup_reduxvariables' );