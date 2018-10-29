<?php /* Smarty version 2.6.1, created on 2012-01-23 19:32:59
         compiled from admin_icons.tpl */ ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
?id=<?php echo $this->_tpl_vars['id']; ?>
" method="post" enctype="multipart/form-data">
<table cellpadding="5" cellspacing="0" class="border">
  <tr class="dark">
    <td colspan="2" align="center"><?php echo $this->_tpl_vars['name']; ?>
</td>
  </tr>
  <tr class="medium">
    <td><?php echo $this->_tpl_vars['lang']['online']; ?>
:</td>
    <td><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/icon.php?status=online&departmentid=<?php echo $this->_tpl_vars['id']; ?>
" alt="<?php echo $this->_tpl_vars['name']; ?>
" /></td>
  </tr>
  <tr class="medium">
    <td><?php echo $this->_tpl_vars['lang']['use_default_icon']; ?>
:</td>
    <td><input type="checkbox" name="default_online" value="true" /></td>
  </tr>
  <tr class="medium">
    <td><?php echo $this->_tpl_vars['lang']['use_department_icon']; ?>
:</td>
    <td><input type="file" name="online" /></td>
  </tr>
  <tr class="light">
    <td><?php echo $this->_tpl_vars['lang']['offline']; ?>
:</td>
    <td><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/icon.php?status=offline&departmentid=<?php echo $this->_tpl_vars['id']; ?>
" alt="<?php echo $this->_tpl_vars['name']; ?>
" /></td>
  </tr>
  <tr class="light">
    <td><?php echo $this->_tpl_vars['lang']['use_default_icon']; ?>
:</td>
    <td><input type="checkbox" name="default_offline" value="true" /></td>
  </tr>
  <tr class="light">
    <td><?php echo $this->_tpl_vars['lang']['use_department_icon']; ?>
:</td>
    <td><input type="file" name="offline" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
" /><input type="submit" name="edit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
"></td>
  </tr>
</table>
</form>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="get">
<select name="id">
  <option value="0"><?php echo $this->_tpl_vars['lang']['default']; ?>
</option>
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
"<?php if ($this->_tpl_vars['id'] == $this->_tpl_vars['departments'][$this->_sections['i']['index']]['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['name']; ?>
</option>
<?php endfor; endif; ?>
</select>
<input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['edit']; ?>
">
</form>