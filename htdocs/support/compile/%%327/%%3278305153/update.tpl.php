<?php /* Smarty version 2.6.1, created on 2012-01-24 13:54:20
         compiled from update.tpl */ ?>
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
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td id="bottom">
        </td>
      </tr>
    </table>
    <div id="content">
      <div>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <td rowspan="3" id="main_right">
              <h2><?php echo $this->_tpl_vars['title']; ?>
</h2>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['content'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td>
          </tr>
        </table>
      </div>
      <table cellpadding="0" cellspacing="0" id="footer">
        <tr>
          <td>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
</body>
</html>