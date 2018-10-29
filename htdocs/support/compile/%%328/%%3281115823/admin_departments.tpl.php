<?php /* Smarty version 2.6.1, created on 2012-01-23 18:57:08
         compiled from admin_departments.tpl */ ?>
<?php if ($this->_tpl_vars['action'] == 'add'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
<table cellpadding="0" cellspacing="5">
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['name']; ?>
:</td>
    <td><input type="text" name="name" size="40" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['visible']; ?>
:</td>
    <td><select name="visible"><option value="1"><?php echo $this->_tpl_vars['lang']['true']; ?>
</option><option value="0"><?php echo $this->_tpl_vars['lang']['false']; ?>
</option></select></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['order']; ?>
:</td>
    <td><input type="text" name="order" size="4" /><?php echo $this->_tpl_vars['lang']['priority_rank']; ?>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="main">
    <td colspan="2" align="center"><?php echo $this->_tpl_vars['lang']['email_info']; ?>
</td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email']; ?>
:</td>
    <td><input type="text" name="email" size="40" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email_host']; ?>
:</td>
    <td><input type="text" name="email_host" size="40" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email_port']; ?>
:</td>
    <td><input type="text" name="email_port" size="4" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email_username']; ?>
:</td>
    <td><input type="text" name="email_username" size="40" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email_password']; ?>
:</td>
    <td><input type="password" name="email_password" size="40" /></td>
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
<?php echo $this->_tpl_vars['lang']['department_added']; ?>

</div>
<?php elseif ($this->_tpl_vars['action'] == 'edit'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
<table cellpadding="0" cellspacing="5">
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['name']; ?>
:</td>
    <td><input type="text" name="name" value="<?php echo $this->_tpl_vars['department']['name']; ?>
" size="40" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['visible']; ?>
:</td>
    <td><select name="visible"><option value="1"<?php if ($this->_tpl_vars['department']['visible'] == '1'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['true']; ?>
</option><option value="0"<?php if ($this->_tpl_vars['department']['visible'] == '0'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['false']; ?>
</option></select></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['order']; ?>
:</td>
    <td><input type="text" name="order" value="<?php echo $this->_tpl_vars['department']['order']; ?>
" size="4" /><?php echo $this->_tpl_vars['lang']['priority_rank']; ?>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="main">
    <td colspan="2" align="center"><?php echo $this->_tpl_vars['lang']['email_info']; ?>
</td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email']; ?>
:</td>
    <td><input type="text" name="email" value="<?php echo $this->_tpl_vars['department']['email']; ?>
" size="40" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email_host']; ?>
:</td>
    <td><input type="text" name="email_host" value="<?php echo $this->_tpl_vars['department']['email_host']; ?>
" size="40" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email_port']; ?>
:</td>
    <td><input type="text" name="email_port" value="<?php echo $this->_tpl_vars['department']['email_port']; ?>
" size="4" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email_username']; ?>
:</td>
    <td><input type="text" name="email_username" value="<?php echo $this->_tpl_vars['department']['email_username']; ?>
" size="40" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email_password']; ?>
:</td>
    <td><input type="password" name="email_password" value="<?php echo $this->_tpl_vars['department']['email_password']; ?>
" size="40" /></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['department']['id']; ?>
" /><input type="submit" name="edit" value="<?php echo $this->_tpl_vars['lang']['edit']; ?>
" /></td>
  </tr>
</table>
</form>
<?php elseif ($this->_tpl_vars['action'] == 'edited'): ?>
<div align="center">
<?php echo $this->_tpl_vars['lang']['department_edited']; ?>

</div>
<?php else: ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" onsubmit="return Misc.confirm_action();">
<div align="center">
<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
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
  <tr class="medium" align="center">
    <td><?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['name']; ?>
 (<?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['email']; ?>
)<?php if ($this->_tpl_vars['departments'][$this->_sections['i']['index']]['visible'] == '0'): ?> - hidden<?php endif; ?></td>
    <td align="right"><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/departments.php?edit&id=<?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/icons.php?edit&id=<?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['icons']; ?>
</a> | <input type="checkbox" name="<?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['id']; ?>
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