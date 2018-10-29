<?php /* Smarty version 2.6.1, created on 2012-01-23 18:56:06
         compiled from admin.tpl */ ?>
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
<body<?php echo $this->_tpl_vars['onload']; ?>
>
<div align="center">
  <div id="page">
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td id="top">
        </td>
      </tr>
    </table>
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td id="logo">
        </td>
        <td id="links_top_left">
        </td>
        <td id="links_top_table">
          <ul>
          <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['links_top']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
            <a href="<?php echo $this->_tpl_vars['links_top'][$this->_sections['i']['index']]['url']; ?>
"><li><?php echo $this->_tpl_vars['links_top'][$this->_sections['i']['index']]['title']; ?>
</li></a>
          <?php endfor; endif; ?>
          </ul>
        </td>
        <td id="links_top_right">
        </td>
      </tr>
    </table>
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td id="links_bottom_left">
        </td>
        <td id="links_bottom_table">
          <ul>
          <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['links_bottom']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
            <a href="<?php echo $this->_tpl_vars['links_bottom'][$this->_sections['i']['index']]['url']; ?>
"><li><?php echo $this->_tpl_vars['links_bottom'][$this->_sections['i']['index']]['title']; ?>
</li></a>
          <?php endfor; endif; ?>
          </ul>
        </td>
        <td id="links_bottom_right">
        </td>
      </tr>
    </table>
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td id="bottom">
        </td>
      </tr>
    </table>
    <div id="content">
      <div id="main">
        <table cellpadding="0" cellspacing="0">
          <tr>
            <td id="main_table">
              <table cellpadding="0" cellspacing="0">
                <tr>
                  <td id="main_left">
                    <ul>
                    <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['links_main']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                      <a href="<?php echo $this->_tpl_vars['links_main'][$this->_sections['i']['index']]['url']; ?>
"><li><?php echo $this->_tpl_vars['links_main'][$this->_sections['i']['index']]['title']; ?>
</li></a>
                    <?php endfor; endif; ?>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td id="links_main_bottom">
                  </td>
                </tr>
              </table>
            </td>
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
          <td id="footer_left">
            <?php echo $this->_tpl_vars['lang']['powered_by']; ?>
 <a href="http://www.helpcenterlive.com" target="_blank">Help Center Live</a> <?php echo $this->_tpl_vars['conf']['version']; ?>
<br />Copyright &copy; <a href="http://www.helpcenterlive.com">Help Center Live</a>. All Rights Reserved.
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