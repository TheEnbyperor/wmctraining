$j = jQuery.noConflict();

$j(document).ready(function(){
	// Basic Admin Functions

	$j('h4').append('<span class="max_min" title="Collapse">-</span>');

	$j('h4 .max_min').toggle(
		function(){ 
			$j(this).parent().next().slideUp();
			$j(this).text('+'); 
		},
		function(){ 
			$j(this).parent().next().slideDown(); 
			$j(this).text('-'); 
		}
	);
	
	$j('.message').append('<span class="close">x</span>');
	
	$j('.message .close').click(function(){
		$j(this).parent().slideUp();
	});
	
	$j('#announcer_content').wysiwyg();
	
});

function openSubForm(){
	subWindow = window.open('','preview','height=500,width=600');
	var tmp = subWindow.document;
	tmp.write('<html><head><title>Subscribe to Aakash Web</title>');
	tmp.write('</head><body><p><b>Select an option</b></p><ul><li><a href="http://feedburner.google.com/fb/a/mailverify?uri=aakashweb">Subscribe Now</a></li><li><a href="http://feeds2.feedburner.com/aakashweb" target="_blank">Read the feeds</a></li></ul>');
	tmp.write('</body></html>');
	subWindow.moveTo(200,200);
	tmp.close();
}

function openAddthis(){
		window.open ("http://www.addthis.com/bookmark.php?v=250&username=vaakash&title=WP Selected Text Sharer - Wordpress plugin&url=http://www.aakashweb.com/wordpress-plugins/wp-selected-text-sharer/", "open_window","location=0,status=0,scrollbars=1,width=500,height=600");
}