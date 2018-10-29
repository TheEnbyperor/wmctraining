<style>

body,html{
	background: #FFF;
	margin: 20px 0px 0px;
}

/* Basic Grey */
.basic-grey {
	margin-right: auto;
	margin-left: auto;
	background: #EEE;
	padding: 20px 30px 20px 30px;
	font: 12px Georgia, "Times New Roman", Times, serif;
	color: #888;
	text-shadow: 1px 1px 1px #FFF;
	border:1px solid #DADADA;
}
.basic-grey h1 {
	font: 25px Georgia, "Times New Roman", Times, serif;
	padding: 0px 0px 10px 40px;
	display: block;
	border-bottom: 1px solid #DADADA;
	margin: -10px -30px 30px -30px;
	color: #888;
}
.basic-grey h1>span {
	display: block;
	font-size: 11px;
}
.basic-grey label {
	display: block;
	width: 120px;
	text-align: left;
	padding-right: 10px;
	margin-top: 8px;
	color: #888;
}

.basic-grey input[type="text"], .basic-grey input[type="email"], .basic-grey textarea,.basic-grey select{
	border: 1px solid #DADADA;
	color: #888;
	height: 24px;
	margin-bottom: 16px;
	margin-right: 6px;
	margin-top: 2px;
	outline: 0 none;
	padding: 3px 3px 3px 5px;
	width: 70%;
	font: normal 12px/12px Georgia, "Times New Roman", Times, serif;
}
.basic-grey select {
    background: #FFF url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right;
    background: #FFF url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right);
    appearance:none;
    -webkit-appearance:none; 
    -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
	width: 72%;
	height: 30px;
}
.basic-grey textarea{
	height:100px;
}
.basic-grey .cta-button {
	background: #E48F8F;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #FFF;
}
.basic-grey .cta-button:hover {
	background: #CF7A7A
}

/* Elegant Aero */
.elegant-aero {
	margin-right: auto;
	margin-left: auto;
	background: #DDF0F8;
	padding: 30px 30px 20px 30px;
	box-shadow: #868686 0 0px 10px -1px;
	-webkit-box-shadow: #868686 0 0px 10px -1px;
	font: 12px Arial, Helvetica, sans-serif;
	color: #666;
}
.elegant-aero  h1{
	font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
	padding: 20px 10px 20px 30px;
	display: block;
	background: #D0E6F0;
	margin-top: -30px;
	margin-left: -30px;
	margin-right: -30px;
	border-bottom: 1px solid #B9E1F1;
}
.elegant-aero h1>span {
	display: block;
	font-size: 11px;
}

.elegant-aero label {
	display: block;
	margin: 0px 0px 5px;
	width: 100px;
	text-align: left;
	padding-right: 10px;
	margin-top: 10px;
	font-weight: bold;
}
.elegant-aero label>span {
	
}

.elegant-aero input[type="text"], .elegant-aero input[type="email"], .elegant-aero textarea, .elegant-aero select {
	color: #888;
	width: 95%;
	padding: 5px 4px 0px 5px;
	margin-top: 2px;
	margin-right: 6px;
	margin-bottom: 16px;
	border: 1px solid #CEE2E7;
	background: #FBFBFB;
	outline: 0;
	-webkit-box-shadow: inset 1px 1px 2px rgba(200, 200, 200, 0.2);
	box-shadow: inset 1px 1px 2px rgba(200, 200, 200, 0.2);
	font: 200 24px/24px Arial, Helvetica, sans-serif;
}
.elegant-aero textarea{
	height:100px;
}
.elegant-aero select {
    background: #fbfbfb url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right;
    background: #fbfbfb url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right;
   appearance:none;
    -webkit-appearance:none; 
   -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
	width: 67%;
}
.elegant-aero .cta-button{
	padding: 10px 30px 10px 30px;
	background: #66C1E4;
	border: none;
	color: #FFF;
}
.elegant-aero .cta-button:hover{
	background: #3EB1DD;
}

/*######## Smart Green ########*/
.smart-green {
	margin-right: auto;
	margin-left: auto;
	background: #FFF;
	padding: 30px 30px 20px 30px;
	box-shadow: rgba(194, 194, 194, 0.7) 0 3px 10px -1px;
	-webkit-box-shadow: rgba(194, 194, 194, 0.7) 0 3px 10px -1px;
	font: 12px Arial, Helvetica, sans-serif;
	color: #666;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
.smart-green h1 {
	font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
	padding: 20px 0px 20px 40px;
	display: block;
	margin: -30px -30px 10px -30px;
	color: #FFF;
	background: #9DC45F;
	text-shadow: 1px 1px 1px #949494;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	border-bottom:1px solid #89AF4C;

}
.smart-green h1>span {
	display: block;
	font-size: 11px;
	color: #FFF;
}

.smart-green label {
	display: block;
	margin: 0px 0px 5px;
	margin-top: 10px;
	color: #5E5E5E;
}
.smart-green label>span {
	
}
.smart-green input[type="text"], .smart-green input[type="email"], .smart-green textarea, .smart-green select {
	color: #555;
	height:24px;
	width: 96%;
	padding: 3px 3px 3px 10px;
	margin-top: 2px;
	margin-bottom: 16px;
	border: 1px solid #E5E5E5;
	background: #FBFBFB;
	outline: 0;
	-webkit-box-shadow: inset 1px 1px 2px rgba(238, 238, 238, 0.2);
	box-shadow: inset 1px 1px 2px rgba(238, 238, 238, 0.2);
	font: normal 14px/14px Arial, Helvetica, sans-serif;
}
.smart-green textarea{
	height:100px;
	padding-top: 10px;
}
.smart-green select {
    background: url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right, -moz-linear-gradient(top, #FBFBFB 0%, #E9E9E9 100%);
    background: url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right, -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FBFBFB), color-stop(100%,#E9E9E9));
   appearance:none;
    -webkit-appearance:none; 
   -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
	width:100%;
	height:30px;
}
.smart-green .cta-button {
	background-color: #9DC45F;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-border-radius: 5px;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #FFF;
	text-shadow: 1px 1px 1px #949494;
}
.smart-green .cta-button:hover {
	background-color:#80A24A;
}

/* ###### White / Pink #########*/
.white-pink {
	margin-right: auto;
	margin-left: auto;
	background: #FFF;
	padding:30px 30px 20px 30px;
	box-shadow:rgba(122, 122, 122, 0.7) 0 3px 10px -1px;
	-webkit-box-shadow:rgba(122, 122, 122, 0.7) 0 3px 10px -1px;
	font: 12px Arial, Helvetica, sans-serif;
	color: #666;
}
.white-pink h1 {
	font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
	padding: 0px 0px 10px 40px;
	display: block;
	border-bottom: 1px solid #F5F5F5;
	margin: -10px -30px 10px -30px;
	color: #969696;
}
.white-pink h1>span {
	display: block;
	font-size: 11px;
	color: #C4C2C2;
}
.white-pink label {
	display: block;
	margin: 0px 0px 5px;
	width: 120px;
	text-align: left;
	padding-right: 10px;
	margin-top: 10px;
	color: #969696;
}
.white-pink label>span {
	
}
.white-pink input[type="text"], .white-pink input[type="email"], .white-pink textarea,.white-pink select{
	color: #555;
	width: 95%;
	padding: 3px 3px 3px 8px;
	margin-top: 2px;
	margin-right: 6px;
	margin-bottom: 16px;
	border: 1px solid #e5e5e5;
	background: #fbfbfb;
	outline: 0;
	-webkit-box-shadow: inset 1px 1px 2px rgba(200,200,200,0.2);
	box-shadow: inset 1px 1px 2px rgba(200,200,200,0.2);
	font: normal 12px/24px Arial, Helvetica, sans-serif;
}
.white-pink textarea{
	height:100px;
}
.white-pink .cta-button {
	-moz-box-shadow:inset 0px 1px 0px 0px #fbafe3;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fbafe3;
	box-shadow:inset 0px 1px 0px 0px #fbafe3;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff5bb0), color-stop(1, #ef027d) );
	background:-moz-linear-gradient( center top, #ff5bb0 5%, #ef027d 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bb0', endColorstr='#ef027d');
	background-color:#ff5bb0;
	border-radius:9px;
	-webkit-border-radius:9px;
	-moz-border-border-radius:9px;
	border:1px solid #ee1eb5;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	font-style:normal;
	height:30px;
	line-height:28px;
	width:100px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #c70067;
	padding:0px;
}
.white-pink .cta-button:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ef027d), color-stop(1, #ff5bb0) );
	background:-moz-linear-gradient( center top, #ef027d 5%, #ff5bb0 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ef027d', endColorstr='#ff5bb0');
	background-color:#ef027d;
}
.white-pink .cta-button:active {
	position:relative;
	top:1px;
}
.white-pink select {
    background: url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right, -moz-linear-gradient(top, #FBFBFB 0%, #E9E9E9 100%);
    background: url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right, -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FBFBFB), color-stop(100%,#E9E9E9));
   appearance:none;
    -webkit-appearance:none; 
   -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
	width: 67%;
}


/* #### bootstrap Form #### */
.bootstrap-frm {
	margin-right: auto;
	margin-left: auto;
	background: #FFF;
	padding: 20px 30px 20px 30px;
	font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
	color: #888;
	text-shadow: 1px 1px 1px #FFF;
	border:1px solid #DDD;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
.bootstrap-frm h1 {
	font: 25px "Helvetica Neue", Helvetica, Arial, sans-serif;
	padding: 0px 0px 10px 40px;
	display: block;
	border-bottom: 1px solid #DADADA;
	margin: -10px -30px 30px -30px;
	color: #888;
}
.bootstrap-frm h1>span {
	display: block;
	font-size: 11px;
}
.bootstrap-frm label {
	display: block;
	margin: 0px 0px 5px;
	width: 120px;
	text-align: left;
	padding-right: 10px;
	margin-top: 10px;
	color: #333;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-weight: bold;
}
.bootstrap-frm label>span {
	
}
.bootstrap-frm input[type="text"], .bootstrap-frm input[type="email"], .bootstrap-frm textarea, .bootstrap-frm select{
	border: 1px solid #CCC;
	color: #888;
	height: 20px;
	margin-bottom: 16px;
	margin-right: 6px;
	margin-top: 2px;
	outline: 0 none;
	padding: 6px 12px;
	width: 68%;
	border-radius: 4px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	font: normal 14px/14px "Helvetica Neue", Helvetica, Arial, sans-serif;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
.bootstrap-frm select {
    background: #FFF url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right;
    background: #FFF url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right);
    appearance:none;
    -webkit-appearance:none; 
    -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
	width: 72%;
	height: 30px;
}
.bootstrap-frm textarea{
	height:100px;
}
.bootstrap-frm .cta-button {
	background: #FFF;
	border: 1px solid #CCC;
	padding: 10px 25px 10px 25px;
	color: #333;
	border-radius: 4px;
}
.bootstrap-frm .cta-button:hover {
	color: #333;
	background-color: #EBEBEB;
	border-color: #ADADAD;
}


/* #### Dark Matter #### */
.dark-matter {
	width: 100%;
	margin-right: auto;
	margin-left: auto;
	background: #333;
	padding: 20px 30px 20px 30px;
	font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
	color: #888;
	text-shadow: 1px 1px 1px #000;
	border:none;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
.dark-matter h1 {
	font: 25px "Helvetica Neue", Helvetica, Arial, sans-serif;
	padding: 0px 0px 10px 40px;
	display: block;
	border-bottom: 1px solid #444;
	margin: -10px -30px 30px -30px;
	color: #FFF;
}
.dark-matter h1>span {
	display: block;
	font-size: 11px;
}
.dark-matter label {
	display: block;
	margin: 0px 0px 5px;
	width: 120px;
	text-align: left;
	padding-right: 10px;
	margin-top: 10px;
	color: #FFF;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-weight: bold;
}
.dark-matter label>span {
	
}
.dark-matter input[type="text"], .dark-matter input[type="email"], .dark-matter textarea, .dark-matter select{
	border: none;
	color: #4B4B4B;
	height: 20px;
	margin-bottom: 16px;
	margin-right: 6px;
	margin-top: 2px;
	outline: 0 none;
	padding: 6px 12px;
	width: 68%;
	border-radius: 4px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	font: normal 14px/14px "Helvetica Neue", Helvetica, Arial, sans-serif;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
.dark-matter select {
    background: #FFF url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right;
    background: #FFF url('{{template-urlpath}}/assets/img/down-arrow.png') no-repeat right);
    appearance:none;
    -webkit-appearance:none; 
    -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
	width: 72%;
	height: 30px;
}
.dark-matter textarea{
	height:100px;
}
.dark-matter .cta-button {
	background: #FFF;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #333;
	border-radius: 4px;
}
.dark-matter .cta-button:hover {
	color: #333;
	background-color: #EBEBEB;
}


</style>
<div class="{{form-class}}">
	{{content-text}}
</div>
<script>

jQuery(document).ready(function ($) {
	/* remove all default inbound classes */
	jQuery(".{{form-class}} input, .{{form-class}} button, .{{form-class}} label , .{{form-class}} span , .{{form-class}} div").removeClass (function (index, css) {
		return (css.match (/\inbound-\S+/g) || []).join(' ');
	});
	
	/* remove all default ninja form classes */
	jQuery(".{{form-class}} input, .{{form-class}} button, .{{form-class}} label , .{{form-class}} span , .{{form-class}} div").removeClass (function (index, css) {
		return (css.match (/ninja-forms-\S+/g) || []).join(' ');
	});
	
	/* remove all default ninja form classes */
	jQuery(".{{form-class}} div").removeClass ('label-left');
	jQuery(".{{form-class}} div").removeClass ('field-wrap');
	jQuery(".{{form-class}} div").removeClass ('text-wrap');
	
	/* remove all default ninja ids */
	jQuery(".{{form-class}} input, .{{form-class}} button, .{{form-class}} label , .{{form-class}} span , .{{form-class}} div").attr ('id','');
	
	/* Remove all inline form styling */
	jQuery(".{{form-class}} #inbound-form-wrapper").removeAttr('id');
	jQuery(".{{form-class}} input").removeAttr('style');
	jQuery(".{{form-class}} button").removeAttr('style');
	jQuery(".{{form-class}} label").removeAttr('style');
	
	/* Add button classes */
	/* jQuery('.{{form-class}} button').before('<label><span>&nbsp;</span></label>'); */
	jQuery('.{{form-class}} button').addClass('cta-button');
	jQuery('.{{form-class}} input[type=button]').addClass('cta-button');
	jQuery('.{{form-class}} input[type=submit]').addClass('cta-button');
	
	/* Prepend headline & subheadline */
	var headline = "{{headline-text}}";
	var subheadline = "{{sub-headline-text}}";
	if (headline) {
		jQuery(".{{form-class}} form").prepend("<h1>"+headline+"<span>"+subheadline+"</span></h1>");
	}
});
</script>