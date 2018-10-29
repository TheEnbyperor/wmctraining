<?php /* Smarty version 2.6.1, created on 2012-01-23 18:56:19
         compiled from monitor.tpl */ ?>
<?php echo '<?'?>
xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['conf']['company']; ?>
 - Live Support Solution (Powered By Help Center Live)</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['lang']['charset']; ?>
" />
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/admin.css" rel="stylesheet" type="text/css" />
<?php if ($this->_tpl_vars['javascript'] != ""): ?>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/class/js/include.php?<?php echo $this->_tpl_vars['javascript']; ?>
">
</script>
<?php endif; ?>
</head>
<frameset rows="60,*,0" cols="*" framespacing="0" border="0">
  <frame src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/monitor/status.php?time=<?php echo $this->_tpl_vars['epoch']; ?>
" name="winstatus" frameborder="no" scrolling="no" noresize>
  <frame src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/monitor/response.php" name="monitor" frameborder="no" scrolling="yes">
</frameset>
</html>