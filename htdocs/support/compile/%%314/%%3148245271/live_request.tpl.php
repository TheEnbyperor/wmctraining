<?php /* Smarty version 2.6.1, created on 2012-01-23 19:01:58
         compiled from live_request.tpl */ ?>
<?php echo '<?'?>
xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['conf']['company']; ?>
 - Live Support Solution (Powered By Help Center Live)</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['lang']['charset']; ?>
" />
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/live.css" rel="stylesheet" type="text/css" />
<?php if ($this->_tpl_vars['javascript'] != ""): ?>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/class/js/include.php?<?php echo $this->_tpl_vars['javascript']; ?>
">
</script>
<?php endif; ?>
</head>
<body<?php echo $this->_tpl_vars['onload']; ?>
>
<div align="center">
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/live_top.gif" alt="" /></td>
  </tr>
</table>
<br /><br />
<?php echo $this->_tpl_vars['lang']['wait_connect']; ?>

<div id="images"></div>
</div>
</body>
</html>