<?php /* Smarty version 2.6.1, created on 2012-01-23 19:00:34
         compiled from live_operator.tpl */ ?>
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
</head>
<body>
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
<form name="request_live_help" method="post" action="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/request.php?opchat">
<?php if ($this->_tpl_vars['operatorid'] != ''): ?>
<input name="operatorid" type="hidden" value="<?php echo $this->_tpl_vars['operatorid']; ?>
" />
<?php else: ?>
<table width="90%" border="0" cellspacing="1" cellpadding="2" class="border">
  <tr>
    <td class="dark"><div align="center"><?php if ($this->_tpl_vars['retry'] == 'true'): ?><b><?php echo $this->_tpl_vars['lang']['retry_select_operator']; ?>
</b><?php else:  echo $this->_tpl_vars['lang']['select_operator'];  endif; ?></div></td>
  </tr>
    <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['avaliable']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <?php if ($this->_tpl_vars['avaliable'][$this->_sections['i']['index']]['status'] == 'true'): ?>
  <tr class="online">
    <td><div align="left"><input type="radio" name="operatorid" value="<?php echo $this->_tpl_vars['avaliable'][$this->_sections['i']['index']]['id']; ?>
" /> <?php echo $this->_tpl_vars['avaliable'][$this->_sections['i']['index']]['name']; ?>
 - Online</div></td>
  </tr>
        <?php else: ?>
  <tr class="offline">
    <td><div align="left"><input type="radio" name="operatorid" value="<?php echo $this->_tpl_vars['avaliable'][$this->_sections['i']['index']]['id']; ?>
" disabled="disabled" /> <?php echo $this->_tpl_vars['avaliable'][$this->_sections['i']['index']]['name']; ?>
 - Offline</div></td>
  </tr>
        <?php endif; ?>
    <?php endfor; endif; ?>
</table>
<?php endif; ?>
<br />
<br />
<table width="90%" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td><div align="center"><input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['request_chat']; ?>
" /></div></td>
  </tr>
</table>
</form>
</body>
</html>