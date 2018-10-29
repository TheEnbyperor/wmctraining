<?php
/**
 * Custom styling functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	1 CLICK COLOR CHANGE
---------------------------------------------------------------------------------- */

/* Input custom color scheme */
function thinkup_input_stylecustom(){
global $thinkup_styles_colorswitch;
global $thinkup_styles_colorcustom;

	if ( $thinkup_styles_colorswitch == '1' and ! empty($thinkup_styles_colorcustom) ) {

		// Assign main hex color.
		$thinkup_color_hex  = $thinkup_styles_colorcustom;

		// Assign main rgba color with opacity 0.9.
		$thinkup_color_rgba = thinkup_convert_hex2rgb( $thinkup_styles_colorcustom );
		$thinkup_color_rgba = 'rgba( ' . $thinkup_color_rgba[0] . ', ' . $thinkup_color_rgba[1] . ', ' . $thinkup_color_rgba[2] . ', 0.9 )';

		$output .= "\n" . '<style type="text/css">' . "\n";

			// ======================================================================
			// Color #D33D33
			// ======================================================================

			// style.css - color
			$output .= 'a,' . "\n";
			$output .= '#pre-header .header-links .sub-menu a:hover,' . "\n";
			$output .= '#header .header-links .sub-menu a:hover,' . "\n";
			$output .= '#header .header-links .sub-menu .current-menu-item a,' . "\n";
			$output .= '#header .menu > li.current_page_item > a span:first-child,' . "\n";
			$output .= '#header .menu > li.current-menu-ancestor > a span:first-child,' . "\n";
			$output .= '#header .menu > li.menu-hover > a span:first-child,' . "\n";
			$output .= '#header .menu > li > a:hover span:first-child,' . "\n";
			$output .= '#footer-core a:hover,' . "\n";
			$output .= '#sub-footer-core a:hover,' . "\n";
			$output .= '.widget_rss li a,' . "\n";
			$output .= '.thinkup_widget_recentcomments .quote:before,' . "\n";
			$output .= '#sidebar .thinkup_widget_twitterfeed a,' . "\n";
			$output .= '.entry-meta a:hover,' . "\n";
			$output .= '.comment-author a:hover,' . "\n";
			$output .= '.comment .reply a:hover,' . "\n";
			$output .= '.comment-meta a:hover,' . "\n";
			$output .= '.page-template-template-archive-php #main-core a:hover,' . "\n";
			$output .= '.page-template-template-sitemap-php #main-core a:hover,' . "\n";
			$output .= 'ul.iconfont i,' . "\n";
			$output .= '.pricing-table i,' . "\n";
			$output .= '.pricing-table .pricing-title,' . "\n";
			$output .= '.pricing-table .pricing-price,' . "\n";
			$output .= '.sc-carousel.carousel-portfolio .entry-content h4 a:hover,' . "\n";
			$output .= '.services-builder.style1 .iconimage i,' . "\n";
			$output .= '.services-builder.style1 .iconimage a:hover i.fa-inverse,' . "\n";
			$output .= '.services-builder.style1 .iconmain .iconurl a,' . "\n";
			$output .= '.services-builder.style2 .iconimage i,' . "\n";
			$output .= '.services-builder.style2 .iconimage a:hover i.fa-inverse,' . "\n";
			$output .= '.services-builder.style2 .iconmain .iconurl a {' . "\n";
			$output .= '	color: ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}' . "\n";
			$output .= '.sc-carousel .entry-content h4 a:hover {' . "\n";
			$output .= '	color: ' . $thinkup_color_hex . ' !important;' . "\n";
			$output .= '}';

			// style.css - background
			$output .= '.pag li a:hover,' . "\n";
			$output .= '.pag li.current span,' . "\n";
			$output .= '.navigation.pagination .nav-links a:hover,' . "\n";
			$output .= '.navigation.pagination .nav-links a.current,' . "\n";
			$output .= '.navigation.pagination .nav-links span:hover,' . "\n";
			$output .= '.navigation.pagination .nav-links span.current,' . "\n";
			$output .= '#slider .rslides-content.style2 .featured-link a,' . "\n";
			$output .= '.thinkupslider-sc .rslides-content.style2 .featured-link a' . "\n";
			$output .= '.image-overlay.overlay2 .image-overlay-inner,' . "\n";
			$output .= '#footer .thinkup_widget_tagscloud a:hover,' . "\n";
			$output .= '.blog-style1 .more-link a:hover span,' . "\n";
			$output .= '.blog-style1 .blog-thumb .hover-link:hover,' . "\n";
			$output .= '.blog-style1 .blog-thumb .hover-zoom:hover,' . "\n";
			$output .= '.button.style1:hover,' . "\n";
			$output .= '.button.style2:hover,' . "\n";
			$output .= '.button.style3:hover,' . "\n";
			$output .= '.button.style4:hover,' . "\n";
			$output .= '.sc-carousel a.prev:hover,' . "\n";
			$output .= '.sc-carousel a.next:hover,' . "\n";
			$output .= '.pricing-table.style2,' . "\n";
			$output .= '.accordion.style2 .accordion-heading .accordion-toggle:before,' . "\n";
			$output .= '.iconfull.style2 .iconimage a:hover i,' . "\n";
			$output .= '.iconfull.style2 .iconimage i.fa-inverse,' . "\n";
			$output .= '.carousel-portfolio-builder.style2 .sc-carousel.carousel-portfolio a.prev:hover,' . "\n";
			$output .= '.carousel-portfolio-builder.style2 .sc-carousel.carousel-portfolio a.next:hover,' . "\n";
			$output .= '.carousel-portfolio-builder.style2 .sc-carousel-button:hover,' . "\n";
			$output .= '.services-builder.style1 .iconimage a:hover i,' . "\n";
			$output .= '.services-builder.style1 .iconimage i.fa-inverse,' . "\n";
			$output .= '.services-builder.style2 .iconimage a:hover i,' . "\n";
			$output .= '.services-builder.style2 .iconimage i.fa-inverse {' . "\n";
			$output .= '	background: ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}' . "\n";
			$output .= '.image-overlay .hover-zoom:hover,' . "\n";
			$output .= '.image-overlay .hover-link:hover {' . "\n";
			$output .= '	background: ' . $thinkup_color_hex . ' !important;' . "\n";
			$output .= '}';

			// style.css - background-color
			$output .= '.themebutton,' . "\n";
			$output .= '.themebutton2,' . "\n";
			$output .= 'button,' . "\n";
			$output .= 'html input[type="button"],' . "\n";
			$output .= 'input[type="reset"],' . "\n";
			$output .= 'input[type="submit"],' . "\n";
			$output .= '#sidebar .thinkup_widget_flickr a .image-overlay,' . "\n";
			$output .= '#sidebar .popular-posts a .image-overlay,' . "\n";
			$output .= '#sidebar .recent-comments a .image-overlay,' . "\n";
			$output .= '#sidebar .recent-posts a .image-overlay {' . "\n";
			$output .= '	background-color: ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}';

			// style.css - border-color
			$output .= '.pag li a:hover,' . "\n";
			$output .= '.pag li.current span,' . "\n";
			$output .= '.navigation.pagination .nav-links a:hover,' . "\n";
			$output .= '.navigation.pagination .nav-links a.current,' . "\n";
			$output .= '.navigation.pagination .nav-links span:hover,' . "\n";
			$output .= '.navigation.pagination .nav-links span.current,' . "\n";
			$output .= '#slider .rslides-content.style2 .featured-link a,' . "\n";
			$output .= '.thinkupslider-sc .rslides-content.style2 .featured-link a,' . "\n";
			$output .= '#sidebar .widget_tag_cloud a:hover,' . "\n";
			$output .= '#footer .widget_tag_cloud a:hover,' . "\n";
			$output .= '#footer .thinkup_widget_flickr img:hover,' . "\n";
			$output .= '#footer .popular-posts:hover img,' . "\n";
			$output .= '#footer .recent-comments:hover img,' . "\n";
			$output .= '#footer .recent-posts:hover img,' . "\n";
			$output .= '#sidebar .thinkup_widget_tagscloud a:hover,' . "\n";
			$output .= '#footer .thinkup_widget_tagscloud a:hover,' . "\n";
			$output .= '.pricing-table.style2 .pricing-link a,' . "\n";
			$output .= '.iconfull.style2 .iconimage a:hover i,' . "\n";
			$output .= '.iconfull.style1 .iconimage i.fa-inverse,' . "\n";
			$output .= '.iconfull.style2 .iconimage i.fa-inverse,' . "\n";
			$output .= '.iconfull.style1 .iconimage a:hover i.fa-inverse,' . "\n";
			$output .= '.carousel-portfolio-builder.style2 .sc-carousel.carousel-portfolio a.prev:hover,' . "\n";
			$output .= '.carousel-portfolio-builder.style2 .sc-carousel.carousel-portfolio a.next:hover,' . "\n";
			$output .= '.carousel-portfolio-builder.style2 .sc-carousel-button:hover,' . "\n";
			$output .= '.services-builder.style1 .iconimage i,' . "\n";
			$output .= '.services-builder.style2 .iconimage i {' . "\n";
			$output .= '	border-color: ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}';

			// style.css - border-left
			$output .= 'blockquote.style2, q.style2,' . "\n";
			$output .= '.notification .icon:before {' . "\n";
			$output .= '	border-left-color: ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}';

			// style.css - border-top
			$output .= '#footer,' . "\n";
			$output .= '#sidebar .thinkup_widget_tabs li.active h3.widget-title {' . "\n";
			$output .= '	border-top-color: ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}';

			// style.css - border-bottom
			$output .= '#sidebar h3.widget-title:after {' . "\n";
			$output .= '	border-bottom-color: ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}';

			// style.css - box-shadow
			$output .= '#header .menu > li.current_page_item > a,' . "\n";
			$output .= '#header .menu > li.current-menu-ancestor > a,' . "\n";
			$output .= '#header .menu > li.menu-hover > a,' . "\n";
			$output .= '#header .menu > li > a:hover {' . "\n";
			$output .= '	-webkit-box-shadow: inset 0 3px 0 0 ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	-moz-box-shadow: inset 0 3px 0 0 ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	-ms-box-shadow: inset 0 3px 0 0 ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	-o-box-shadow: inset 0 3px 0 0 ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	box-shadow: inset 0 3px 0 0 ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}' . "\n";
			$output .= '.image-overlay {' . "\n";
			$output .= '	-webkit-box-shadow: inset 0px -4px 0px 0px ' . $thinkup_color_hex . ' !important;' . "\n";
			$output .= '	-moz-box-shadow: inset 0px -4px 0px 0px ' . $thinkup_color_hex . ' !important;' . "\n";
			$output .= '	-ms-box-shadow: inset 0px -4px 0px 0px ' . $thinkup_color_hex . ' !important;' . "\n";
			$output .= '	-o-box-shadow: inset 0px -4px 0px 0px ' . $thinkup_color_hex . ' !important;' . "\n";
			$output .= '	box-shadow: inset 0px -4px 0px 0px ' . $thinkup_color_hex . ' !important;' . "\n";
			$output .= '}' . "\n";
			$output .= '.blog-style1 .blog-thumb:hover .image-overlay {' . "\n";
			$output .= '	-webkit-box-shadow: inset 0px -4px 0px 0px ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	-moz-box-shadow: inset 0px -4px 0px 0px ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	-ms-box-shadow: inset 0px -4px 0px 0px ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	-o-box-shadow: inset 0px -4px 0px 0px ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	box-shadow: inset 0px -4px 0px 0px ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}' . "\n";
			$output .= '.iconfull.style1 .iconimage a:hover i.fa-inverse {' . "\n";
			$output .= '	-webkit-box-shadow: inset 0px -70px 0px 0px ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	-moz-box-shadow: inset 0px -70px 0px 0px ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	-ms-box-shadow: inset 0px -70px 0px 0px ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	-o-box-shadow: inset 0px -70px 0px 0px ' . $thinkup_color_hex . ';' . "\n";
			$output .= '	box-shadow: inset 0px -70px 0px 0px ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}';

			// style-portfolio.css - color
			$output .= '#filter.portfolio-filter li a:hover,' . "\n";
			$output .= '#filter.portfolio-filter li a.selected {' . "\n";
			$output .= '	color: ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}';

			// style-portfolio.css - border-bottom
			$output .= '#filter.portfolio-filter li a:hover,' . "\n";
			$output .= '#filter.portfolio-filter li a.selected {' . "\n";
			$output .= '	border-bottom-color: ' . $thinkup_color_hex . ';' . "\n";
			$output .= '}';

			// ======================================================================
			// Color rgba( ?, ?, ?, ? )
			// ======================================================================


		$output .= '</style>' . "\n";
		
		echo $output;
	}
}
add_action( 'wp_head','thinkup_input_stylecustom', '11' );


/* ----------------------------------------------------------------------------------
	ADVANCED CUSTOM STYLING
---------------------------------------------------------------------------------- */

/* Input gradient custom color scheme */
function thinkup_input_stylecustomtargeted(){
global $thinkup_styles_mainswitch;
global $thinkup_styles_mainimage;
global $thinkup_styles_mainposition;
global $thinkup_styles_mainrepeat;
global $thinkup_styles_mainsize;
global $thinkup_styles_mainattachment;
global $thinkup_styles_mainbg;
global $thinkup_styles_mainheading;
global $thinkup_styles_maintext;
global $thinkup_styles_mainlink;
global $thinkup_styles_mainlinkhover;
global $thinkup_styles_preheaderswitch;
global $thinkup_styles_preheaderimage;
global $thinkup_styles_preheaderposition;
global $thinkup_styles_preheaderrepeat;
global $thinkup_styles_preheadersize;
global $thinkup_styles_preheaderattachment;
global $thinkup_styles_preheaderbg;
global $thinkup_styles_preheaderbghover;
global $thinkup_styles_preheadertext;
global $thinkup_styles_preheadertexthover;
global $thinkup_styles_preheaderdropbg;
global $thinkup_styles_preheaderdropbghover;
global $thinkup_styles_preheaderdroptext;
global $thinkup_styles_preheaderdroptexthover;
global $thinkup_styles_preheaderdropborder;
global $thinkup_styles_headerswitch;
global $thinkup_styles_headerbg;
global $thinkup_styles_headerimage;
global $thinkup_styles_headerposition;
global $thinkup_styles_headerrepeat;
global $thinkup_styles_headersize;
global $thinkup_styles_headerattachment;	
global $thinkup_styles_headerbghover;
global $thinkup_styles_headersitetitle;
global $thinkup_styles_headersitedescription;
global $thinkup_styles_headertext;
global $thinkup_styles_headertexthover;
global $thinkup_styles_headerdropbg;
global $thinkup_styles_headerdropbghover;
global $thinkup_styles_headerdroptext;
global $thinkup_styles_headerdroptexthover;
global $thinkup_styles_headerdropborder;
global $thinkup_styles_headerresswitch;
global $thinkup_styles_headerresbg;
global $thinkup_styles_headerresbghover;
global $thinkup_styles_headerresbgicon;
global $thinkup_styles_headerresbgiconhover;
global $thinkup_styles_headerresdropbg;
global $thinkup_styles_headerresdropbghover;
global $thinkup_styles_headerresdroptext;
global $thinkup_styles_headerresdroptexthover;
global $thinkup_styles_headerresdropborder;
global $thinkup_styles_pageintroswitch;
global $thinkup_styles_pageintroimage;
global $thinkup_styles_pageintroposition;
global $thinkup_styles_pageintrorepeat;
global $thinkup_styles_pageintrosize;
global $thinkup_styles_pageintroattachment;
global $thinkup_styles_pageintrobg;
global $thinkup_styles_pageintrotext;
global $thinkup_styles_pageintrobreadcrumbtext;
global $thinkup_styles_pageintrobreadcrumblink;
global $thinkup_styles_footerswitch;
global $thinkup_styles_footerimage;
global $thinkup_styles_footerposition;
global $thinkup_styles_footerrepeat;
global $thinkup_styles_footersize;
global $thinkup_styles_footerattachment;
global $thinkup_styles_postfooterimage;
global $thinkup_styles_postfooterposition;
global $thinkup_styles_postfooterrepeat;
global $thinkup_styles_postfootersize;
global $thinkup_styles_postfooterattachment;
global $thinkup_styles_footerbg;
global $thinkup_styles_footertitle;
global $thinkup_styles_footertext;
global $thinkup_styles_footerlink;
global $thinkup_styles_footerlinkhover;
global $thinkup_styles_postfooterswitch;
global $thinkup_styles_postfooterbg;
global $thinkup_styles_postfootertext;
global $thinkup_styles_postfooterlink;
global $thinkup_styles_postfooterlinkhover;

$output = NULL;

	// Main Content
	if ( $thinkup_styles_mainswitch == '1' ) {
		if ( ! empty( $thinkup_styles_mainimage ) ) {
			if ( ! empty( $thinkup_styles_mainimage ) ) {
				$thinkup_styles_mainimage = 'background-image: url(' . $thinkup_styles_mainimage . ');';
			}
			if ( ! empty( $thinkup_styles_mainposition ) ) {
				$thinkup_styles_mainposition = 'background-position: ' . $thinkup_styles_mainposition . ';';
			}
			if ( ! empty( $thinkup_styles_mainrepeat ) ) {
				$thinkup_styles_mainrepeat = 'background-repeat: ' . $thinkup_styles_mainrepeat . ';';
			}
			if ( ! empty( $thinkup_styles_mainsize ) ) {
				$thinkup_styles_mainsize = 'background-size: ' . $thinkup_styles_mainsize . ';';
			}
			if ( ! empty( $thinkup_styles_mainattachment ) ) {
				$thinkup_styles_mainattachment = 'background-attachment: ' . $thinkup_styles_mainattachment . ';';
			}
			$output .= '#body-core {';
			$output .= $thinkup_styles_mainimage;
			$output .= $thinkup_styles_mainposition;
			$output .= $thinkup_styles_mainrepeat;
			$output .= $thinkup_styles_mainsize;
			$output .= $thinkup_styles_mainattachment;
			$output .= '}';
		} else {
			if ( ! empty( $thinkup_styles_mainbg ) and $thinkup_styles_mainbg !== 'transparent' ) {
				$output .= '#body-core {';
				$output .= 'background: ' . $thinkup_styles_mainbg . ';';
				$output .= '}';
			}
		}
		if ( ! empty( $thinkup_styles_mainheading ) and $thinkup_styles_mainheading !== 'transparent' ) {
			$output .= '#introaction-core h1, #introaction-core h2, #introaction-core h3, #introaction-core h4, #introaction-core h5, #introaction-core h6,';
			$output .= '#outroaction-core h1, #outroaction-core h2, #outroaction-core h3, #outroaction-core h4, #outroaction-core h5, #outroaction-core h6,';
			$output .= '#content h1, #content h2, #content h3, #content h4, #content h5, #content h6 {';
			$output .= 'color: ' . $thinkup_styles_mainheading . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_maintext ) and $thinkup_styles_maintext !== 'transparent' ) {
			$output .= 'body,';
			$output .= 'button,';
			$output .= 'input,';
			$output .= 'select,';
			$output .= 'textarea,';
			$output .= '.action-teaser {';
			$output .= 'color: ' . $thinkup_styles_maintext . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_mainlink ) and $thinkup_styles_mainlink !== 'transparent' ) {
			$output .= '#content a {';
			$output .= 'color: ' . $thinkup_styles_mainlink . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_mainlinkhover ) and $thinkup_styles_mainlinkhover !== 'transparent' ) {
			$output .= '#content a:hover {';
			$output .= 'color: ' . $thinkup_styles_mainlinkhover . ';';
			$output .= '}';
		}
	}

	// Pre Header Styling
	if ( $thinkup_styles_preheaderswitch == '1' ) {
		if ( ! empty( $thinkup_styles_preheaderimage ) ) {
			if ( ! empty( $thinkup_styles_preheaderimage ) ) {
				$thinkup_styles_preheaderimage = 'background-image: url(' . $thinkup_styles_preheaderimage . ') !important;';
			}
			if ( ! empty( $thinkup_styles_preheaderposition ) ) {
				$thinkup_styles_preheaderposition = 'background-position: ' . $thinkup_styles_preheaderposition . ' !important;';
			}
			if ( ! empty( $thinkup_styles_preheaderrepeat ) ) {
				$thinkup_styles_preheaderrepeat = 'background-repeat: ' . $thinkup_styles_preheaderrepeat . ' !important;';
			}
			if ( ! empty( $thinkup_styles_preheadersize ) ) {
				$thinkup_styles_preheadersize = 'background-size: ' . $thinkup_styles_preheadersize . ' !important;';
			}
			if ( ! empty( $thinkup_styles_preheaderattachment ) ) {
				$thinkup_styles_preheaderattachment = 'background-attachment: ' . $thinkup_styles_preheaderattachment . ' !important;';
			}
			$output .= '#pre-header {';
			$output .= $thinkup_styles_preheaderimage;
			$output .= $thinkup_styles_preheaderposition;
			$output .= $thinkup_styles_preheaderrepeat;
			$output .= $thinkup_styles_preheadersize;
			$output .= $thinkup_styles_preheaderattachment;
			$output .= '}';
			$output .= '#pre-header .header-links li a {';
			$output .= 'background: none !important;';
			$output .= '}';
			$output .= '#pre-header-social li,';
			$output .= '#pre-header-social li:last-child {';
			$output .= 'border-color: transparent !important;';
			$output .= '}';
		} else {
			if ( ! empty( $thinkup_styles_preheaderbg ) and $thinkup_styles_preheaderbg !== 'transparent' ) {
				$output .= '#pre-header {';
				$output .= 'background: ' . $thinkup_styles_preheaderbg . ' !important;';
				$output .= 'border: none !important;';
				$output .= '}';
				$output .= '#pre-header .header-links li a {';
				$output .= 'background: none !important;';
				$output .= '}';
				$output .= '#pre-header-social li,';
				$output .= '#pre-header-social li:last-child {';
				$output .= 'border-color: ' . $thinkup_styles_preheaderbg . ' !important;';
				$output .= '}';
			}
		}
		if ( ! empty( $thinkup_styles_preheaderbghover ) and $thinkup_styles_preheaderbghover !== 'transparent' ) {
			$output .= '#pre-header .header-links .menu-hover > a,';
			$output .= '#pre-header .header-links > ul > li > a:hover {';
			$output .= 'background: ' . $thinkup_styles_preheaderbghover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheadertext ) and $thinkup_styles_preheadertext !== 'transparent' ) {
			$output .= '#pre-header .header-links > ul > li a,';
			$output .= '#pre-header-social li {';
			$output .= 'color: ' . $thinkup_styles_preheadertext . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheadertexthover ) and $thinkup_styles_preheadertexthover !== 'transparent' ) {
			$output .= '#pre-header .header-links .menu-hover > a,';
			$output .= '#pre-header .menu > li.current-menu-item > a,';
			$output .= '#pre-header .menu > li.current-menu-ancestor > a,';
			$output .= '#pre-header .header-links > ul > li > a:hover {';
			$output .= 'color: ' . $thinkup_styles_preheadertexthover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderdropbg ) and $thinkup_styles_preheaderdropbg !== 'transparent' ) {
			$output .= '#pre-header .header-links .sub-menu {';
			$output .= 'background: ' . $thinkup_styles_preheaderdropbg . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderdropbghover ) and $thinkup_styles_preheaderdropbghover !== 'transparent' ) {
			$output .= '#pre-header .header-links .sub-menu a:hover {';
			$output .= 'background: ' . $thinkup_styles_preheaderdropbghover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderdroptext ) and $thinkup_styles_preheaderdroptext !== 'transparent' ) {
			$output .= '#pre-header .header-links .sub-menu a {';
			$output .= 'color: ' . $thinkup_styles_preheaderdroptext . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderdroptexthover ) and $thinkup_styles_preheaderdroptexthover !== 'transparent' ) {
			$output .= '#pre-header .header-links .sub-menu a:hover,';
			$output .= '#pre-header .header-links .sub-menu .current-menu-item a {';
			$output .= 'color: ' . $thinkup_styles_preheaderdroptexthover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderdropborder ) and $thinkup_styles_preheaderdropborder !== 'transparent' ) {
			$output .= '#pre-header .header-links .sub-menu,';
			$output .= '#pre-header .header-links .sub-menu li {';
			$output .= 'border-color: ' . $thinkup_styles_preheaderdropborder . ' !important;';
			$output .= '}';
		}
	}

	// Main Header Styling
	if ( $thinkup_styles_headerswitch == '1' ) {
		if ( ! empty( $thinkup_styles_headerimage ) ) {
			if ( ! empty( $thinkup_styles_headerimage ) ) {
				$thinkup_styles_headerimage = 'background-image: url(' . $thinkup_styles_headerimage . ') !important;';
			}
			if ( ! empty( $thinkup_styles_headerposition ) ) {
				$thinkup_styles_headerposition = 'background-position: ' . $thinkup_styles_headerposition . ' !important;';
			}
			if ( ! empty( $thinkup_styles_headerrepeat ) ) {
				$thinkup_styles_headerrepeat = 'background-repeat: ' . $thinkup_styles_headerrepeat . ' !important;';
			}
			if ( ! empty( $thinkup_styles_headersize ) ) {
				$thinkup_styles_headersize = 'background-size: ' . $thinkup_styles_headersize . ' !important;';
			}
			if ( ! empty( $thinkup_styles_headerattachment ) ) {
				$thinkup_styles_headerattachment = 'background-attachment: ' . $thinkup_styles_headerattachment . ' !important;';
			}
			$output .= '#header,';
			$output .= '#header-sticky {';
			$output .= $thinkup_styles_headerimage;
			$output .= $thinkup_styles_headerposition;
			$output .= $thinkup_styles_headerrepeat;
			$output .= $thinkup_styles_headersize;
			$output .= $thinkup_styles_headerattachment;
			$output .= 'border: none !important;';
			$output .= '}';
			$output .= '#header-links {';
			$output .= 'border: none !important;';
			$output .= '}';
		} else {
			if ( ! empty( $thinkup_styles_headerbg ) and $thinkup_styles_headerbg !== 'transparent' ) {
				$output .= '#header,';
				$output .= '#header-sticky {';
				$output .= 'background: ' . $thinkup_styles_headerbg . ' !important;';
				$output .= 'border-bottom-color: ' . $thinkup_styles_headerbg . ' !important;';
				$output .= '}';
				$output .= '#header-links {';
				$output .= 'border: none;';
				$output .= '}';
				$output .= '#header .menu > li > a span,';
				$output .= '#header-sticky .menu > li > a span {';
				$output .= 'border-color: ' . $thinkup_styles_headerbg . ' !important;';
				$output .= '}';
				$output .= '.header-style2 #header-links {';
				$output .= 'background: ' . $thinkup_styles_headerbg . ' !important;';
				$output .= 'border-bottom-color: ' . $thinkup_styles_headerbg . ' !important;';
				$output .= '}';				
				$output .= '.header-style2 #header .header-links > ul > li > a {';
				$output .= 'border-color: ' . $thinkup_styles_headerbg . ' !important;';
				$output .= '}';
			}
		}
		if ( ! empty( $thinkup_styles_headerbghover ) and $thinkup_styles_headerbghover !== 'transparent' ) {
			$output .= '#header .menu > li.menu-hover > a,';
			$output .= '#header .menu > li.current-menu-item > a,';
			$output .= '#header .menu > li.current-menu-ancestor > a,';
			$output .= '#header .menu > li > a:hover,';
			$output .= '#header-sticky .menu > li.menu-hover > a,';
			$output .= '#header-sticky .menu > li.current-menu-item > a,';
			$output .= '#header-sticky .menu > li.current-menu-ancestor > a,';
			$output .= '#header-sticky .menu > li > a:hover {';
			$output .= 'background: ' . $thinkup_styles_headerbghover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headersitetitle ) and $thinkup_styles_headersitetitle !== 'transparent' ) {
			$output .= '#logo h1, #logo-sticky h1 {';
			$output .= 'color: ' . $thinkup_styles_headersitetitle . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headersitedescription ) and $thinkup_styles_headersitedescription !== 'transparent' ) {
			$output .= '#logo .site-description {';
			$output .= 'color: ' . $thinkup_styles_headersitedescription . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headertext ) and $thinkup_styles_headertext !== 'transparent' ) {
			$output .= '#header .header-links > ul > li a,';
			$output .= '#header .header-links > ul > li a span,';
			$output .= '#header-sticky .header-links > ul > li a,';
			$output .= '#header-sticky .header-links > ul > li a span {';
			$output .= 'color: ' . $thinkup_styles_headertext . ' !important;';
			$output .= '}';
			$output .= '.header-style2 #header .menu > li.menu-hover > a,';
			$output .= '.header-style2 #header .menu > li.current-menu-item > a,';
			$output .= '.header-style2 #header .menu > li.current-menu-ancestor > a,';
			$output .= '.header-style2 #header .menu > li > a:hover {';
			$output .= '	border-color: ' . $thinkup_styles_headertexthover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headertexthover ) and $thinkup_styles_headertexthover !== 'transparent' ) {
			$output .= '#header .menu > li.menu-hover > a,';
			$output .= '#header .menu > li.current-menu-item > a,';
			$output .= '#header .menu > li.current-menu-ancestor > a,';
			$output .= '#header .menu > li > a:hover,';
			$output .= '#header .menu > li.menu-hover > a span,';
			$output .= '#header .menu > li.current-menu-item > a span,';
			$output .= '#header .menu > li.current-menu-ancestor > a span,';
			$output .= '#header .menu > li > a:hover span,';
			$output .= '#header-sticky .menu > li.menu-hover > a,';
			$output .= '#header-sticky .menu > li.current-menu-item > a,';
			$output .= '#header-sticky .menu > li.current-menu-ancestor > a,';
			$output .= '#header-sticky .menu > li > a:hover,';
			$output .= '#header-sticky .menu > li.menu-hover > a span,';
			$output .= '#header-sticky .menu > li.current-menu-item > a span,';
			$output .= '#header-sticky .menu > li.current-menu-ancestor > a span,';
			$output .= '#header-sticky .menu > li > a:hover span {';
			$output .= 'color: ' . $thinkup_styles_headertexthover . ' !important;';
			$output .= '}';
			$output .= '#header .menu > li.menu-hover > a span,';
			$output .= '#header .menu > li.current-menu-item > a span,';
			$output .= '#header .menu > li.current-menu-ancestor > a span,';
			$output .= '#header .menu > li > a:hover span,';
			$output .= '#header-sticky .menu > li.menu-hover > a span,';
			$output .= '#header-sticky .menu > li.current-menu-item > a span,';
			$output .= '#header-sticky .menu > li.current-menu-ancestor > a span,';
			$output .= '#header-sticky .menu > li > a:hover span {';
			$output .= '	border-color: ' . $thinkup_styles_headertexthover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerdropbg ) and $thinkup_styles_headerdropbg !== 'transparent' ) {
			$output .= '#header .header-links .sub-menu,';
			$output .= '#header-sticky .header-links .sub-menu {';
			$output .= 'background: ' . $thinkup_styles_headerdropbg . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerdropbghover ) and $thinkup_styles_headerdropbghover !== 'transparent' ) {
			$output .= '#header .header-links .sub-menu li:hover,';
			$output .= '#header .header-links .sub-menu .current-menu-item,';
			$output .= '#header-sticky .header-links .sub-menu li:hover,';
			$output .= '#header-sticky .header-links .sub-menu .current-menu-item {';
			$output .= 'background: ' . $thinkup_styles_headerdropbghover . ' !important;';
			$output .= '}';
			$output .= '#header .header-links .header-thinkupmega > .sub-menu > li:hover,';
			$output .= '#header-sticky .header-links .header-thinkupmega > .sub-menu > li:hover {';
			$output .= 'background: inherit !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerdroptext ) and $thinkup_styles_headerdroptext !== 'transparent' ) {
			$output .= '#header .header-links .sub-menu a,';
			$output .= '#header-sticky .header-links .sub-menu a {';
			$output .= 'color: ' . $thinkup_styles_headerdroptext . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerdroptexthover ) and $thinkup_styles_headerdroptexthover !== 'transparent' ) {
			$output .= '#header .header-links .sub-menu a:hover,';
			$output .= '#header .header-links .sub-menu .current-menu-item a,';
			$output .= '#header-sticky .header-links .sub-menu a:hover,';
			$output .= '#header-sticky .header-links .sub-menu .current-menu-item a {';
			$output .= 'color: ' . $thinkup_styles_headerdroptexthover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerdropborder ) and $thinkup_styles_headerdropborder !== 'transparent' ) {
			$output .= '#header .header-links .sub-menu,';
			$output .= '#header .header-links .sub-menu li,';
			$output .= '#header-sticky .header-links .sub-menu,';
			$output .= '#header-sticky .header-links .sub-menu li {';
			$output .= 'border-color: ' . $thinkup_styles_headerdropborder . ' !important;';
			$output .= '}';
			$output .= '.header-style2 #header .header-links .sub-menu,';
			$output .= '.header-style2 #header-sticky .header-links .sub-menu {';
			$output .= 'border-color: ' . $thinkup_styles_headerdropborder . ' !important;';
			$output .= '}';
		}
	}

	// Responsive Header Styling
	if ( $thinkup_styles_headerresswitch == '1' ) {
		if ( ! empty( $thinkup_styles_headerresbg ) and $thinkup_styles_headerresbg !== 'transparent' ) {
			$output .= '#header-nav .btn-navbar {';
			$output .= 'background-color: ' . $thinkup_styles_headerresbg . ' !important;';
			$output .= 'border-color: ' . $thinkup_styles_headerresbg . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresbghover ) and $thinkup_styles_headerresbghover !== 'transparent' ) {
			$output .= '#header-nav .btn-navbar:hover {';
			$output .= 'background-color: ' . $thinkup_styles_headerresbghover . ' !important;';
			$output .= 'border-color: ' . $thinkup_styles_headerresbghover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresbgicon ) and $thinkup_styles_headerresbgicon !== 'transparent' ) {
			$output .= '#header-nav .btn-navbar .icon-bar {';
			$output .= 'background-color: ' . $thinkup_styles_headerresbgicon . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresbgiconhover ) and $thinkup_styles_headerresbgiconhover !== 'transparent' ) {
			$output .= '#header-nav .btn-navbar:hover .icon-bar {';
			$output .= 'background-color: ' . $thinkup_styles_headerresbgiconhover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresdropbg ) and $thinkup_styles_headerresdropbg !== 'transparent' ) {
			$output .= '#header-responsive-inner {';
			$output .= 'background: ' . $thinkup_styles_headerresdropbg . ' !important;';
			$output .= '-webkit-box-shadow: -25px 0 0 0 ' . $thinkup_styles_headerresdropbg . ', 25px 0 0 0 ' . $thinkup_styles_headerresdropbg . ';';
			$output .= '-moz-box-shadow: -25px 0 0 0 ' . $thinkup_styles_headerresdropbg . ', 25px 0 0 0 ' . $thinkup_styles_headerresdropbg . ';';
			$output .= '-ms-box-shadow: -25px 0 0 0 ' . $thinkup_styles_headerresdropbg . ', 25px 0 0 0 ' . $thinkup_styles_headerresdropbg . ';';
			$output .= '-o-box-shadow: -25px 0 0 0 ' . $thinkup_styles_headerresdropbg . ', 25px 0 0 0 ' . $thinkup_styles_headerresdropbg . ';';
			$output .= 'box-shadow: -25px 0 0 0 ' . $thinkup_styles_headerresdropbg . ', 25px 0 0 0 ' . $thinkup_styles_headerresdropbg . ';';
			$output .= '}';
			$output .= '#header-responsive-inner.in.collapse {';
			$output .= 'overflow: visible;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresdropbghover ) and $thinkup_styles_headerresdropbghover !== 'transparent' ) {
			$output .= '#header-responsive li a:hover,';
			$output .= '#header-responsive li.current_page_item > a {';
			$output .= 'background: ' . $thinkup_styles_headerresdropbghover . ' !important;';
			$output .= '-webkit-box-shadow: -25px 0 0 0 ' . $thinkup_styles_headerresdropbghover . ', 25px 0 0 0 ' . $thinkup_styles_headerresdropbghover . ';';
			$output .= '-moz-box-shadow: -25px 0 0 0 ' . $thinkup_styles_headerresdropbghover . ', 25px 0 0 0 ' . $thinkup_styles_headerresdropbghover . ';';
			$output .= '-ms-box-shadow: -25px 0 0 0 ' . $thinkup_styles_headerresdropbghover . ', 25px 0 0 0 ' . $thinkup_styles_headerresdropbghover . ';';
			$output .= '-o-box-shadow: -25px 0 0 0 ' . $thinkup_styles_headerresdropbghover . ', 25px 0 0 0 ' . $thinkup_styles_headerresdropbghover . ';';
			$output .= 'box-shadow: -25px 0 0 0 ' . $thinkup_styles_headerresdropbghover . ', 25px 0 0 0 ' . $thinkup_styles_headerresdropbghover . ';';
			$output .= '}';
			$output .= '#header-responsive-inner.in.collapse {';
			$output .= 'overflow: visible;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresdroptext ) and $thinkup_styles_headerresdroptext !== 'transparent' ) {
			$output .= '#header-responsive li a {';
			$output .= 'color: ' . $thinkup_styles_headerresdroptext . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresdroptexthover ) and $thinkup_styles_headerresdroptexthover !== 'transparent' ) {
			$output .= '#header-responsive li a:hover,';
			$output .= '#header-responsive li.current_page_item > a,';
			$output .= '#header-responsive .sub-menu-show > a {';
			$output .= 'color: ' . $thinkup_styles_headerresdroptexthover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresdropborder ) and $thinkup_styles_headerresdropborder !== 'transparent' ) {
			$output .= '#header-responsive-inner,';
			$output .= '#header-responsive li a {';
			$output .= 'border-color: ' . $thinkup_styles_headerresdropborder . ' !important;';
			$output .= '}';
		}
	}

	// Page Intro Styling
	if ( $thinkup_styles_pageintroswitch == '1' ) {
		if ( ! empty( $thinkup_styles_pageintroimage ) ) {
			if ( ! empty( $thinkup_styles_pageintroimage ) ) {
				$thinkup_styles_pageintroimage = 'background-image: url(' . $thinkup_styles_pageintroimage . ') !important;';
			}
			if ( ! empty( $thinkup_styles_pageintroposition ) ) {
				$thinkup_styles_pageintroposition = 'background-position: ' . $thinkup_styles_pageintroposition . ' !important;';
			}
			if ( ! empty( $thinkup_styles_pageintrorepeat ) ) {
				$thinkup_styles_pageintrorepeat = 'background-repeat: ' . $thinkup_styles_pageintrorepeat . ' !important;';
			}
			if ( ! empty( $thinkup_styles_pageintrosize ) ) {
				$thinkup_styles_pageintrosize = 'background-size: ' . $thinkup_styles_pageintrosize . ' !important;';
			}
			if ( ! empty( $thinkup_styles_pageintroattachment ) ) {
				$thinkup_styles_pageintroattachment = 'background-attachment: ' . $thinkup_styles_pageintroattachment . ' !important;';
			}
			$output .= '#intro {';
			$output .= $thinkup_styles_pageintroimage;
			$output .= $thinkup_styles_pageintroposition;
			$output .= $thinkup_styles_pageintrorepeat;
			$output .= $thinkup_styles_pageintrosize;
			$output .= $thinkup_styles_pageintroattachment;
			$output .= '}';
		} else {
			if ( ! empty( $thinkup_styles_pageintrobg ) and $thinkup_styles_pageintrobg !== 'transparent' ) {
				$output .= '#intro {';
				$output .= 'background: ' . $thinkup_styles_pageintrobg . ' !important;';
				$output .= '}';
			}
		}
		if ( ! empty( $thinkup_styles_pageintrotext ) and $thinkup_styles_pageintrotext !== 'transparent' ) {
			$output .= '#intro .page-title {';
			$output .= 'color: ' . $thinkup_styles_pageintrotext . ' !important;';
			$output .= '}';
			$output .= '#intro .page-title:after {';
			$output .= 'border-color: ' . $thinkup_styles_pageintrotext . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_pageintrobreadcrumbtext ) and $thinkup_styles_pageintrobreadcrumbtext !== 'transparent' ) {
			$output .= '#intro #breadcrumbs,';
			$output .= '#intro #breadcrumbs a:hover {';
			$output .= 'color: ' . $thinkup_styles_pageintrobreadcrumbtext . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_pageintrobreadcrumblink ) and $thinkup_styles_pageintrobreadcrumblink !== 'transparent' ) {
			$output .= '#intro #breadcrumbs a {';
			$output .= 'color: ' . $thinkup_styles_pageintrobreadcrumblink . ' !important;';
			$output .= '}';
		}
	}

	// Main Footer Styling
	if ( $thinkup_styles_footerswitch == '1' ) {
		if ( ! empty( $thinkup_styles_footerimage ) ) {
			if ( ! empty( $thinkup_styles_footerimage ) ) {
				$thinkup_styles_footerimage = 'background-image: url(' . $thinkup_styles_footerimage . ');';
			}
			if ( ! empty( $thinkup_styles_footerposition ) ) {
				$thinkup_styles_footerposition = 'background-position: ' . $thinkup_styles_footerposition . ';';
			}
			if ( ! empty( $thinkup_styles_footerrepeat ) ) {
				$thinkup_styles_footerrepeat = 'background-repeat: ' . $thinkup_styles_footerrepeat . ';';
			}
			if ( ! empty( $thinkup_styles_footersize ) ) {
				$thinkup_styles_footersize = 'background-size: ' . $thinkup_styles_footersize . ';';
			}
			if ( ! empty( $thinkup_styles_footerattachment ) ) {
				$thinkup_styles_footerattachment = 'background-attachment: ' . $thinkup_styles_footerattachment . ';';
			}
			$output .= '#footer {';
			$output .= $thinkup_styles_footerimage;
			$output .= $thinkup_styles_footerposition;
			$output .= $thinkup_styles_footerrepeat;
			$output .= $thinkup_styles_footersize;
			$output .= $thinkup_styles_footerattachment;
			$output .= '}';
		} else {
			if ( ! empty( $thinkup_styles_footerbg ) and $thinkup_styles_footerbg !== 'transparent' ) {
				$output .= '#footer {';
				$output .= 'background: ' . $thinkup_styles_footerbg . ';';
				$output .= 'border: none;';
				$output .= '}';
			}
		}
		if ( ! empty( $thinkup_styles_footertitle ) and $thinkup_styles_footertitle !== 'transparent' ) {
			$output .= '#footer-core h3 {';
			$output .= 'color: ' . $thinkup_styles_footertitle . ';';
			$output .= '}';
			$output .= '#footer-core h3 span {';
			$output .= 'border-color: ' . $thinkup_styles_footertitle . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_footertext ) and $thinkup_styles_footertext !== 'transparent' ) {
			$output .= '#footer-core,';
			$output .= '#footer-core p {';
			$output .= 'color: ' . $thinkup_styles_footertext . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_footerlink ) and $thinkup_styles_footerlink !== 'transparent' ) {
			$output .= '#footer-core a {';
			$output .= 'color: ' . $thinkup_styles_footerlink . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_footerlinkhover ) and $thinkup_styles_footerlinkhover !== 'transparent' ) {
			$output .= '#footer-core a:hover {';
			$output .= 'color: ' . $thinkup_styles_footerlinkhover . ' !important;';
			$output .= '}';
		}
	}

	// Post Footer Styling
	if ( $thinkup_styles_postfooterswitch == '1' ) {
		if ( ! empty( $thinkup_styles_postfooterimage ) ) {
			if ( ! empty( $thinkup_styles_postfooterimage ) ) {
				$thinkup_styles_postfooterimage = 'background-image: url(' . $thinkup_styles_postfooterimage . ');';
			}
			if ( ! empty( $thinkup_styles_postfooterposition ) ) {
				$thinkup_styles_postfooterposition = 'background-position: ' . $thinkup_styles_postfooterposition . ';';
			}
			if ( ! empty( $thinkup_styles_postfooterrepeat ) ) {
				$thinkup_styles_postfooterrepeat = 'background-repeat: ' . $thinkup_styles_postfooterrepeat . ';';
			}
			if ( ! empty( $thinkup_styles_postfootersize ) ) {
				$thinkup_styles_postfootersize = 'background-size: ' . $thinkup_styles_postfootersize . ';';
			}
			if ( ! empty( $thinkup_styles_postfooterattachment ) ) {
				$thinkup_styles_postfooterattachment = 'background-attachment: ' . $thinkup_styles_postfooterattachment . ';';
			}
			$output .= '#sub-footer {';
			$output .= $thinkup_styles_postfooterimage;
			$output .= $thinkup_styles_postfooterposition;
			$output .= $thinkup_styles_postfooterrepeat;
			$output .= $thinkup_styles_postfootersize;
			$output .= $thinkup_styles_postfooterattachment;
			$output .= '}';
		} else {
			if ( ! empty( $thinkup_styles_postfooterbg ) and $thinkup_styles_postfooterbg !== 'transparent' ) {
				$output .= '#sub-footer {';
				$output .= 'background: ' . $thinkup_styles_postfooterbg . ';';
				$output .= 'border-color: ' . $thinkup_styles_postfooterbg . ';';
				$output .= '}';
			}
		}
		if ( ! empty( $thinkup_styles_postfootertext ) and $thinkup_styles_postfootertext !== 'transparent' ) {
			$output .= '#sub-footer-core {';
			$output .= 'color: ' . $thinkup_styles_postfootertext . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_postfooterlink ) and $thinkup_styles_postfooterlink !== 'transparent' ) {
			$output .= '#sub-footer-core a {';
			$output .= 'color: ' . $thinkup_styles_postfooterlink . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_postfooterlinkhover ) and $thinkup_styles_postfooterlinkhover !== 'transparent' ) {
			$output .= '#sub-footer-core a:hover {';
			$output .= 'color: ' . $thinkup_styles_postfooterlinkhover . ';';
			$output .= '}';
		}
	}
	
	if ( ! empty( $output ) ) {
		echo '<style>' . $output . '</style>';
	}
}
add_action( 'wp_head','thinkup_input_stylecustomtargeted', '11' );


/* ----------------------------------------------------------------------------------
	THEME SKIN
---------------------------------------------------------------------------------- */

function thinkup_input_styleskin() {
global $thinkup_styles_skinswitch;
global $thinkup_styles_skin;

global $thinkup_theme_version;

	if ( $thinkup_styles_skinswitch == '1' and ! empty($thinkup_styles_skin) ) {	
		wp_enqueue_style( 'thinkup-style-' . $thinkup_styles_skin .'', get_template_directory_uri() . '/styles/skin/' . $thinkup_styles_skin . '/style.css', '', $thinkup_theme_version );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_input_styleskin', 99 );


?>