<?php /* Smarty version 2.6.1, created on 2012-01-23 18:56:38
         compiled from mod_HelpCenter.tpl */ ?>
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
/css/admin.css" rel="stylesheet" type="text/css" />
<?php if ($this->_tpl_vars['javascript'] != ""): ?>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/class/js/include.php?<?php echo $this->_tpl_vars['javascript']; ?>
">
</script>
<?php endif; ?>
</head>
<body>
<div align="center">
  <div id="page">
    <div id="content">
      <div id="main">
        <table cellpadding="0" cellspacing="0" width="90%">
          <tr>
            <td>
              <div align="center"><h2><?php echo $this->_tpl_vars['title']; ?>
</h2></div>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['content'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <td>
          </tr>
        </table>
      </div>
      <table cellpadding="0" cellspacing="0" id="footer">
        <tr>
          <td id="footer_left">
            <?php echo $this->_tpl_vars['lang']['powered_by']; ?>
 <a href="http://www.helpcenterlive.com" target="_blank">Help Center Live</a>.<br />Copyright 2005 &copy; <a href="http://www.helpcenterlive.com">Help Center Live</a>. All Rights Reserved.
        	<a href="http://www.simplescripts.com/script_details/install:Help Center Live" title="install Help Center Live">Install Help Center Live</a>  
	 </td>
          <td id="footer_right">
            <a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/update.php" target="_blank"><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/hcl.gif" border="0" alt="Help Center Live" /></a>
            <a href="http://www.php.net/" target="_blank"><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/php.gif" border="0" alt="PHP" /></a>
            <a href="http://www.mysql.com/" target="_blank"><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/mysql.gif" border="0" alt="MySQL" /></a>
            <a href="http://smarty.php.net/" target="_blank"><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/smarty.gif" border="0" alt="Smarty" /></a>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
</body>
</html>