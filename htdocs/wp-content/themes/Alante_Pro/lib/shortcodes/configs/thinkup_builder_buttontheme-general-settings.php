<?php
/**
*
* fieldconfig for thinkupshortcodes/General Settings
*
* @package Thinkupshortcodes
* @author Think Up Themes Ltd contact@thinkupthemes.com
* @license GPL-2.0+
* @link www.thinkupthemes.com
* @copyright 2017 Think Up Themes Ltd
*/


$group = array(
	'label' => __('General Settings','thinkupshortcodes'),
	'id' => '157113136',
	'master' => 'text',
	'fields' => array(
		'text'	=>	array(
			'label'		=> 	__('Button Text','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'smalltextfield',
			'default'	=> 	'Read More',
		),
		'style'	=>	array(
			'label'		=> 	__('Style','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*style1||Style 1,style2||Style 2,style3||Style 3,style4||Style 4',
		),
		'size'	=>	array(
			'label'		=> 	__('Size','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'small||Small,*medium||Medium,large||Large',
		),
		'width'	=>	array(
			'label'		=> 	__('Width','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*standard||Standard,wide||Wide',
		),
		'link'	=>	array(
			'label'		=> 	__('Button URL','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'icon'	=>	array(
			'label'		=> 	__('Icon','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*none,adjust,adn,align-center,align-justify,align-left,align-right,ambulance,anchor,android,angle-double-down,angle-double-left,angle-double-right,angle-double-up,angle-down,angle-left,angle-right,angle-up,apple,archive,arrow-circle-down,arrow-circle-left,arrow-circle-o-down,arrow-circle-o-left,arrow-circle-o-right,arrow-circle-o-up,arrow-circle-right,arrow-circle-up,arrow-down,arrow-left,arrow-right,arrows,arrows-alt,arrows-h,arrows-v,arrow-up,asterisk,backward,ban,bar-chart-o,barcode,bars,beer,behance,behance-square,bell,bell-o,bitbucket,bitbucket-square,bold,bolt,bomb,book,bookmark,bookmark-o,briefcase,btc,bug,building,building-o,bullhorn,bullseye,calendar,calendar-o,camera,camera-retro,car,caret-down,caret-left,caret-right,caret-square-o-down,caret-square-o-left,caret-square-o-right,caret-square-o-up,caret-up,certificate,chain-broken,check,check-circle,check-circle-o,check-square,check-square-o,chevron-circle-down,chevron-circle-left,chevron-circle-right,chevron-circle-up,chevron-down,chevron-left,chevron-right,chevron-up,child,circle,circle-o,circle-o-notch,circle-thin,clipboard,clock-o,cloud,cloud-download,cloud-upload,code,code-fork,codepen,coffee,cog,cogs,columns,comment,comment-o,comments,comments-o,compass,compress,credit-card,crop,crosshairs,css3,cube,cubes,cutlery,database,delicious,desktop,deviantart,digg,dot-circle-o,download,dribbble,dropbox,drupal,eject,ellipsis-h,ellipsis-v,empire,envelope,envelope-o,envelope-square,eraser,eur,exchange,exclamation,exclamation-circle,exclamation-triangle,expand,external-link,external-link-square,eye,eye-slash,facebook,facebook-square,fast-backward,fast-forward,fax,female,fighter-jet,file,file-archive-o,file-audio-o,file-code-o,file-excel-o,file-image-o,file-o,file-pdf-o,file-powerpoint-o,files-o,file-text,file-text-o,file-video-o,file-word-o,film,filter,fire,fire-extinguisher,flag,flag-checkered,flag-o,flask,flickr,floppy-o,folder,folder-o,folder-open,folder-open-o,font,forward,foursquare,frown-o,gamepad,gavel,gbp,gift,git,github,github-alt,github-square,git-square,gittip,glass,globe,google,google-plus,google-plus-square,graduation-cap,hacker-news,hand-o-down,hand-o-left,hand-o-right,hand-o-up,hdd-o,header,headphones,heart,heart-o,history,home,hospital-o,h-square,html5,inbox,indent,info,info-circle,inr,instagram,italic,joomla,jpy,jsfiddle,key,keyboard-o,krw,language,laptop,leaf,lemon-o,level-down,level-up,life-ring,lightbulb-o,link,linkedin,linkedin-square,linux,list,list-alt,list-ol,list-ul,location-arrow,lock,long-arrow-down,long-arrow-left,long-arrow-right,long-arrow-up,magic,magnet,male,map-marker,maxcdn,medkit,meh-o,microphone,microphone-slash,minus,minus-circle,minus-square,minus-square-o,mobile,money,moon-o,music,openid,outdent,pagelines,paperclip,paper-plane,paper-plane-o,paragraph,pause,paw,pencil,pencil-square,pencil-square-o,phone,phone-square,picture-o,pied-piper,pied-piper-alt,pinterest,pinterest-square,plane,play,play-circle,play-circle-o,plus,plus-circle,plus-square,plus-square-o,power-off,print,puzzle-piece,qq,qrcode,question,question-circle,quote-left,quote-right,random,rebel,recycle,reddit,reddit-square,refresh,renren,repeat,reply,reply-all,retweet,road,rocket,rss,rss-square,rub,scissors,search,search-minus,search-plus,share,share-alt,share-alt-square,share-square,share-square-o,shield,shopping-cart,signal,sign-in,sign-out,sitemap,skype,slack,sliders,smile-o,sort,sort-alpha-asc,sort-alpha-desc,sort-amount-asc,sort-amount-desc,sort-asc,sort-desc,sort-numeric-asc,sort-numeric-desc,soundcloud,space-shuttle,spinner,spoon,spotify,square,square-o,stack-exchange,stack-overflow,star,star-half,star-half-o,star-o,steam,steam-square,step-backward,step-forward,stethoscope,stop,strikethrough,stumbleupon,stumbleupon-circle,subscript,suitcase,sun-o,superscript,table,tablet,tachometer,tag,tags,tasks,taxi,tencent-weibo,terminal,text-height,text-width,th,th-large,th-list,thumbs-down,thumbs-o-down,thumbs-o-up,thumbs-up,thumb-tack,ticket,times,times-circle,times-circle-o,tint,trash-o,tree,trello,trophy,truck,try,tumblr,tumblr-square,twitter,twitter-square,umbrella,underline,undo,university,unlock,unlock-alt,upload,usd,user,user-md,users,video-camera,vimeo-square,vine,vk,volume-down,volume-off,volume-up,weibo,weixin,wheelchair,windows,wordpress,wrench,xing,xing-square,yahoo,youtube,youtube-play,youtube-square',
		),
		'tab'	=>	array(
			'label'		=> 	__('New tab','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'onoff',
			'default'	=> 	'on||On,*off||Off',
			'inline'	=> 	true,
		),
		'animate'	=>	array(
			'label'		=> 	__('Animate','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*none,bounceIn,bounceInDown,bounceInUp,bounceInLeft,bounceInRight,bounceOut,bounceOutDown,bounceOutUp,bounceOutLeft,bounceOutRight,flipInX,flipOutX,flipInY,flipOutY,fadeIn,fadeInUp,fadeInDown,fadeInLeft,fadeInRight,fadeInUpBig,fadeInDownBig,fadeInLeftBig,fadeInRightBig,fadeOut,fadeOutUp,fadeOutDown,fadeOutLeft,fadeOutRight,fadeOutUpBig,fadeOutDownBig,fadeOutLeftBig,fadeOutRightBig,hinge,lightSpeedIn,lightSpeedOut,rollIn,rollOut,rotateIn,rotateInDownLeft,rotateInDownRight,rotateInUpLeft,rotateInUpRight,rotateOut,rotateOutDownLeft,rotateOutDownRight,rotateOutUpLeft,rotateOutUpRight,slideInDown,slideInLeft,slideInRight,slideOutUp,slideOutLeft,slideOutRight',
		),
		'delay'	=>	array(
			'label'		=> 	__('Delay (ms)','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'smalltextfield',
			'default'	=> 	'',
		),
		'color'	=>	array(
			'label'		=> 	__('Color (Preset)','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*default||Default,aqua||Aqua,black||Black,blue_dark||Blue (dark),blue_light||blue (light),brown||Brown,green_dark||Green (dark),green_light||Green (light),grey||Grey,red_dark||Red (dark),red_light||Red (light),pink||Pink,purple||Purple',
		),
		'color_custom'	=>	array(
			'label'		=> 	__('Custom Button (See below)','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'onoff',
			'default'	=> 	'on||On,*off||Off',
			'inline'	=> 	true,
		),
		'size_text'	=>	array(
			'label'		=> 	__('Text Size','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*default,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50',
		),
		'weight_text'	=>	array(
			'label'		=> 	__('Text Weight','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*default,300,400,500,600,700',
		),
		'color_text'	=>	array(
			'label'		=> 	__('Text Color','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'colorpicker',
			'default'	=> 	'',
		),
		'color_text_hover'	=>	array(
			'label'		=> 	__('Text Color (Hover)','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'colorpicker',
			'default'	=> 	'',
		),
		'color_bg'	=>	array(
			'label'		=> 	__('Background Color','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'colorpicker',
			'default'	=> 	'',
		),
		'color_bg_hover'	=>	array(
			'label'		=> 	__('Background Color (Hover)','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'colorpicker',
			'default'	=> 	'',
		),
		'width_border'	=>	array(
			'label'		=> 	__('Border Width (px)','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*default,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20',
		),
		'color_border'	=>	array(
			'label'		=> 	__('Border Color','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'colorpicker',
			'default'	=> 	'',
		),
		'color_border_hover'	=>	array(
			'label'		=> 	__('Border Color (Hover)','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'colorpicker',
			'default'	=> 	'',
		),
		'border_radius'	=>	array(
			'label'		=> 	__('Border Radius','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'slider',
			'default'	=> 	'0,20|0|px',
			'inline'	=> 	true,
		),
		'width_custom'	=>	array(
			'label'		=> 	__('Width (px)','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*default,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,371,372,373,374,375,376,377,378,379,380,381,382,383,384,385,386,387,388,389,390,391,392,393,394,395,396,397,398,399,400,401,402,403,404,405,406,407,408,409,410,411,412,413,414,415,416,417,418,419,420,421,422,423,424,425,426,427,428,429,430,431,432,433,434,435,436,437,438,439,440,441,442,443,444,445,446,447,448,449,450,451,452,453,454,455,456,457,458,459,460,461,462,463,464,465,466,467,468,469,470,471,472,473,474,475,476,477,478,479,480,481,482,483,484,485,486,487,488,489,490,491,492,493,494,495,496,497,498,499,500',
		),
		'height_custom'	=>	array(
			'label'		=> 	__('Height (px)','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*default,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,371,372,373,374,375,376,377,378,379,380,381,382,383,384,385,386,387,388,389,390,391,392,393,394,395,396,397,398,399,400,401,402,403,404,405,406,407,408,409,410,411,412,413,414,415,416,417,418,419,420,421,422,423,424,425,426,427,428,429,430,431,432,433,434,435,436,437,438,439,440,441,442,443,444,445,446,447,448,449,450,451,452,453,454,455,456,457,458,459,460,461,462,463,464,465,466,467,468,469,470,471,472,473,474,475,476,477,478,479,480,481,482,483,484,485,486,487,488,489,490,491,492,493,494,495,496,497,498,499,500',
		),
	),
	'styles'	=> array(
		'toggles.css',
		'minicolors.css',
		'simple-slider.css',
	),
	'scripts'	=> array(
		'toggles.min.js',
		'minicolors.js',
		'simple-slider.min.js',
	),
	'multiple'	=> false,
);

