<?php /* Smarty version 2.6.1, created on 2012-01-23 19:32:55
         compiled from admin_hotpages.tpl */ ?>
<?php if ($this->_tpl_vars['action'] == 'add'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
<?php echo $this->_tpl_vars['lang']['hotpage_note']; ?>
<br /><br />
<table cellpadding="0" cellspacing="5">
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['page']; ?>
:</td>
    <td><input type="text" name="page" size="40" /></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="add" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
" /></td>
  </tr>
</table>
</form>
<?php elseif ($this->_tpl_vars['action'] == 'added'): ?>
<div align="center">
<?php echo $this->_tpl_vars['lang']['hotpage_added']; ?>

</div>
<?php elseif ($this->_tpl_vars['action'] == 'edit'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
<?php echo $this->_tpl_vars['lang']['hotpage_note']; ?>
<br /><br />
<table cellpadding="0" cellspacing="5">
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['page']; ?>
:</td>
    <td><input type="text" name="page" value="<?php echo $this->_tpl_vars['hotpage']['page']; ?>
" size="40" /></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['hotpage']['id']; ?>
" /><input type="submit" name="edit" value="<?php echo $this->_tpl_vars['lang']['edit']; ?>
" /></td>
  </tr>
</table>
</form>
<?php elseif ($this->_tpl_vars['action'] == 'edited'): ?>
<div align="center">
<?php echo $this->_tpl_vars['lang']['hotpage_edited']; ?>

</div>
<?php else: ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" onsubmit="return Misc.confirm_action();">
<div align="center">
<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['hotpages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <tr class="medium" align="center">
    <td><?php echo $this->_tpl_vars['hotpages'][$this->_sections['i']['index']]['page']; ?>
</td>
    <td align="right"><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/hotpages.php?edit&id=<?php echo $this->_tpl_vars['hotpages'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <input type="checkbox" name="<?php echo $this->_tpl_vars['hotpages'][$this->_sections['i']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['hotpages'][$this->_sections['i']['index']]['id']; ?>
" /></td>
  </tr>
<?php endfor; endif; ?>
</table>
<br /><br />
<input type="submit" name="delete" value="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" />
<div>
</form>
<?php endif; ?>