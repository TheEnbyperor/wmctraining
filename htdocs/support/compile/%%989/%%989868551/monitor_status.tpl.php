<?php /* Smarty version 2.6.1, created on 2012-01-23 18:56:20
         compiled from monitor_status.tpl */ ?>
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
/css/monitor.css" rel="stylesheet" type="text/css" />
<?php if ($this->_tpl_vars['javascript'] != ""): ?>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/class/js/include.php?<?php echo $this->_tpl_vars['javascript']; ?>
">
</script>
<?php endif; ?>
</head>
<body<?php echo $this->_tpl_vars['onload']; ?>
>
<table align="left" border="0" cellspacing="0" cellpadding="0" class="bg" width="100%">
  <tr>
    <td rowspan="3"><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/monitor.gif" alt="" /></td>
    <td><table border="0" cellspacing="0" cellpadding="2"><tr><td><b><?php echo $this->_tpl_vars['lang']['status']; ?>
</b></td></tr></table></td>
    <td><table border="0" cellspacing="0" cellpadding="2"><tr><td><a href="javascript:parent.window.Monitor.change_status('on');"><span class="not_selected" id="status_on"><?php echo $this->_tpl_vars['lang']['status_online']; ?>
</span></a> <a href="javascript:parent.window.Monitor.change_status('off');"><span class="selected" id="status_off"><?php echo $this->_tpl_vars['lang']['status_offline']; ?>
</span></a></td></tr></table></td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="0" cellpadding="2"><tr><td><b><?php echo $this->_tpl_vars['lang']['sounds']; ?>
</b></td></tr></table></td>
    <td><table border="0" cellspacing="0" cellpadding="2"><tr><td><a href="javascript:parent.window.Monitor.change_sounds('on');"><span class="selected" id="sounds_on"><?php echo $this->_tpl_vars['lang']['status_on']; ?>
</span></a> <a href="javascript:parent.window.Monitor.change_sounds('off');"><span class="not_selected" id="sounds_off"><?php echo $this->_tpl_vars['lang']['status_off']; ?>
</span></a></td></tr></table></td>
  </tr>
  <tr>
    <td colspan="2"><table border="0" cellspacing="0" cellpadding="2"><tr><td><div id="images"></div><b><a href="javascript:parent.window.Monitor.operator_chat();">[<?php echo $this->_tpl_vars['lang']['start_opchat']; ?>
]</a></b></td></tr></table></td>
  </tr>
</table>
</body>
</html>