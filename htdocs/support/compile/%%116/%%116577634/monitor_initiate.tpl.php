<?php /* Smarty version 2.6.1, created on 2012-01-23 19:00:21
         compiled from monitor_initiate.tpl */ ?>
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
<br />
<form action="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/monitor/initiate.php?chatid=<?php echo $this->_tpl_vars['chatid']; ?>
" method="post">
<table width="90%" align="center" border="0" cellspacing="1" cellpadding="2" class="border">
  <tr>
    <td class="dark" colspan="2"><div align="center"><b><?php echo $this->_tpl_vars['lang']['hostname']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="medium" colspan="2"><div align="center"><?php echo $this->_tpl_vars['info']['hostname']; ?>
</div></td>
  </tr>
  <tr>
    <td class="dark" colspan="2"><div align="center"><b><?php echo $this->_tpl_vars['lang']['ip_addr']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="medium" colspan="2"><div align="center"><?php echo $this->_tpl_vars['info']['ip']; ?>
</div></td>
  </tr>
  <tr>
    <td class="light" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td class="dark" colspan="2"><div align="center"><b><?php echo $this->_tpl_vars['lang']['department']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="medium" colspan="2">
      <div align="center">
      <select name="department">
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['departments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <option value="<?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['name']; ?>
</option>
<?php endfor; endif; ?>
      </select>
      </div>
    </td>
  </tr>
  <tr>
    <td class="light" colspan="3"><div align="center"><input type="submit" name="initiate" value="<?php echo $this->_tpl_vars['lang']['initiate']; ?>
" /></div></td>
  </tr>
</table>
<br /><br />
</form>
</body>
</html>