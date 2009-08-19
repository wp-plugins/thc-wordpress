<? 
require_once( dirname( ( dirname(__FILE__) ) ) . '/config.php');
global $wpdb;
if (!empty($_POST['hh_format'])) {
$hh = preg_replace('/ /', '%20', $_POST['hh']);
$hh = rawurlencode($hh);
$hh_format = $_POST['hh_format'];
$hh_displayresults = $_POST['hh_displayresults'];
$hh_chat_display = $_POST['hh_chat_display'];
$hh_make_public = $_POST['hh_make_public'];
$hh_aliases_option = $_POST['hh_aliases_option'];

$hh2 = preg_replace("/%5C%27/", "'", $hh);
$hh2 = preg_replace('/%28/', '(', $hh2);
$hh2 = preg_replace('/%29/', ')', $hh2);
$hh2 = preg_replace('/%0D/', '', $hh2);
$hh2 = preg_replace('/%0A%0A/', '%0A', $hh2);
$hh2 = preg_replace('/%2A/', '*', $hh2);
$hh2 = preg_replace('/ /', '%20', $hh2);

$url = 'http://www.handconverter.com/convert.cgi';
$post = 'HH='.$hh2.'&hh_format=HTML&hh_displayresults=plaintext&hh_chat_display=1&hh_make_public=1&hh_aliases_option=position';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Powered by HandConverter.com</title>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript">
	function saveContent() {
	
	var tagtext;
	var hctext;
		
		var hctext = document.getElementById('hccontent').value;
		if (hctext != 0 )
			tagtext = hctext;
		else
			tinyMCEPopup.close();	
			
	if(window.tinyMCE) {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;

}
	</script>
	<base target="_self" />
</head>
<body onresize="resizeInputs();">
<form name="source" onsubmit="saveContent();" action="#">
<textarea style="display:none;" id="hccontent">
<?
curl_exec($ch);
?>
</textarea>
<h2>Look Good?</h2>
<div class="mceActionPanel">
			<div style="float: left">
				<input type="button" id="insert" name="insert" value="Insert" onclick="saveContent();" />
			</div>
		</div>
		<p style="clear:both; margin-top: 5em;"></p>
<div>
<?
curl_exec($ch);
curl_close($ch);
?>
</div>

		</form>
</body></html>
<?
} else {
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Powered by HandConverter.com</title>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<base target="_self" />
</head>
<body onresize="resizeInputs();">
<form method="post">
<input type="hidden" name="hh_format" value="HTML"></p>
<h2>Paste Your Raw Hand History</h2><textarea id="hh" rows="28" cols="85" name="hh"></textarea></p>
<input type="submit" value="Process">
</form>
</body>
</html>
<? } ?>