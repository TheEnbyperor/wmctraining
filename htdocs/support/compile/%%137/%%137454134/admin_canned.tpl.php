<?php /* Smarty version 2.6.1, created on 2012-01-23 19:01:39
         compiled from admin_canned.tpl */ ?>
<?php if ($this->_tpl_vars['action'] == 'add'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
<table cellpadding="0" cellspacing="5">
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['type']; ?>
</td>
    <td>
      <select name="operator">
        <option value="0"><?php echo $this->_tpl_vars['lang']['public']; ?>
</option>
        <option value="<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['lang']['private']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['department']; ?>
</td>
    <td>
      <select name="department">
        <option value="0">- <?php echo $this->_tpl_vars['lang']['all']; ?>
 -</option>
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
    </td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['subject']; ?>
</td>
    <td><input type="text" name="subject" size="20" maxlength="255" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['message']; ?>
</td>
    <td><textarea name="message" cols="20" rows="5"></textarea></td>
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
<?php echo $this->_tpl_vars['lang']['canned_added']; ?>

</div>
<?php elseif ($this->_tpl_vars['action'] == 'edit'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
<table cellpadding="0" cellspacing="5">
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['type']; ?>
</td>
    <td>
      <select name="operator">
        <option value="0"<?php if ($this->_tpl_vars['canned_message']['operatorid'] == '0'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['public']; ?>
</option>
        <option value="<?php echo $this->_tpl_vars['id']; ?>
"<?php if ($this->_tpl_vars['canned_message']['operatorid'] == $this->_tpl_vars['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['private']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['department']; ?>
</td>
    <td>
      <select name="department">
        <option value="0">- <?php echo $this->_tpl_vars['lang']['all']; ?>
 -</option>
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
"<?php if ($this->_tpl_vars['departments'][$this->_sections['i']['index']]['id'] == $this->_tpl_vars['canned_message']['departmentid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['name']; ?>
</option>
        <?php endfor; endif; ?>
      </select>
    </td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['subject']; ?>
</td>
    <td><input type="text" name="subject" value="<?php echo $this->_tpl_vars['canned_message']['subject']; ?>
" size="20" maxlength="255" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['message']; ?>
</td>
    <td><textarea name="message" cols="20" rows="5"><?php echo $this->_tpl_vars['canned_message']['message']; ?>
</textarea></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['canned_message']['id']; ?>
" /><input type="submit" name="edit" value="<?php echo $this->_tpl_vars['lang']['edit']; ?>
" /></td>
  </tr>
</table>
</form>
<?php elseif ($this->_tpl_vars['action'] == 'edited'): ?>
<div align="center">
<?php echo $this->_tpl_vars['lang']['canned_edited']; ?>

</div>
<?php else: ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" onsubmit="return Misc.confirm_action();">
<div align="center">
<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
  <tr class="dark">
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><b><?php echo $this->_tpl_vars['lang']['canned_all']; ?>
</b></td><td align="center">&nbsp;
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
    <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['canned']['all']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr class="medium" align="center"><td><?php echo $this->_tpl_vars['canned']['all'][$this->_sections['i']['index']]['subject']; ?>
</td><td align="right"><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/canned.php?edit&id=<?php echo $this->_tpl_vars['canned']['all'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <input type="checkbox" name="<?php echo $this->_tpl_vars['canned']['all'][$this->_sections['i']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['canned']['all'][$this->_sections['i']['index']]['id']; ?>
" /></td></tr>
        <tr class="light"><td colspan="2"><?php echo $this->_tpl_vars['canned']['all'][$this->_sections['i']['index']]['message']; ?>
</td></tr>
      </table>
    <?php endfor; endif; ?>
    </td>
  </tr>
</table><br /><br />

<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
  <tr class="dark">
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><b><?php echo $this->_tpl_vars['lang']['canned_op']; ?>
</b></td><td align="center">&nbsp;
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
    <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['canned']['op']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr class="medium" align="center"><td><?php echo $this->_tpl_vars['canned']['op'][$this->_sections['i']['index']]['subject']; ?>
</td><td align="right"><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/canned.php?edit&id=<?php echo $this->_tpl_vars['canned']['op'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <input type="checkbox" name="<?php echo $this->_tpl_vars['canned']['op'][$this->_sections['i']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['canned']['op'][$this->_sections['i']['index']]['id']; ?>
" /></td></tr>
        <tr class="light"><td colspan="2"><?php echo $this->_tpl_vars['canned']['op'][$this->_sections['i']['index']]['message']; ?>
</td></tr>
      </table>
    <?php endfor; endif; ?>
    </td>
  </tr>
</table><br /><br />

<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
  <tr class="dark">
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="center"><b><?php echo $this->_tpl_vars['lang']['canned_dep']; ?>
</b></td><td align="center">&nbsp;
          </td>
        </tr>
      </table>
    </td>
  </tr>
<?php if (isset($this->_sections['x'])) unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['canned']['dep']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['show'] = true;
$this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
$this->_sections['x']['start'] = $this->_sections['x']['step'] > 0 ? 0 : $this->_sections['x']['loop']-1;
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = $this->_sections['x']['loop'];
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
?>
  <tr>
    <td>
      <b><?php echo $this->_tpl_vars['canned']['dep'][$this->_sections['x']['index']]['name']; ?>
</b><br />
    </td>
  </tr>
  <tr>
    <td>
    <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['canned']['dep'][$this->_sections['x']['index']]['messages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr class="medium" align="center"><td><?php echo $this->_tpl_vars['canned']['dep'][$this->_sections['x']['index']]['messages'][$this->_sections['i']['index']]['subject']; ?>
</td><td align="right"><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/canned.php?edit&id=<?php echo $this->_tpl_vars['canned']['dep'][$this->_sections['x']['index']]['messages'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <input type="checkbox" name="<?php echo $this->_tpl_vars['canned']['dep'][$this->_sections['x']['index']]['messages'][$this->_sections['i']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['canned']['dep'][$this->_sections['x']['index']]['messages'][$this->_sections['i']['index']]['id']; ?>
" /></td></tr>
        <tr class="light"><td colspan="2"><?php echo $this->_tpl_vars['canned']['dep'][$this->_sections['x']['index']]['messages'][$this->_sections['i']['index']]['message']; ?>
</td></tr>
      </table>
    <?php endfor; endif; ?>
    </td>
  </tr>
<?php endfor; endif; ?>
</table><br /><br />

<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
  <tr class="dark">
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="center"><b><?php echo $this->_tpl_vars['lang']['canned_both']; ?>
</b></td><td align="center">&nbsp;
          </td>
        </tr>
      </table>
    </td>
  </tr>
<?php if (isset($this->_sections['x'])) unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['canned']['both']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['show'] = true;
$this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
$this->_sections['x']['start'] = $this->_sections['x']['step'] > 0 ? 0 : $this->_sections['x']['loop']-1;
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = $this->_sections['x']['loop'];
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
?>
  <tr>
    <td>
      <b><?php echo $this->_tpl_vars['canned']['both'][$this->_sections['x']['index']]['name']; ?>
</b><br />
    </td>
  </tr>
  <tr>
    <td>
    <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['canned']['both'][$this->_sections['x']['index']]['messages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr class="medium" align="center"><td><?php echo $this->_tpl_vars['canned']['both'][$this->_sections['x']['index']]['messages'][$this->_sections['i']['index']]['subject']; ?>
</td><td align="right"><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/canned.php?edit&id=<?php echo $this->_tpl_vars['canned']['both'][$this->_sections['x']['index']]['messages'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <input type="checkbox" name="<?php echo $this->_tpl_vars['canned']['both'][$this->_sections['x']['index']]['messages'][$this->_sections['i']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['canned']['both'][$this->_sections['x']['index']]['messages'][$this->_sections['i']['index']]['id']; ?>
" /></td></tr>
        <tr class="light"><td colspan="2"><?php echo $this->_tpl_vars['canned']['both'][$this->_sections['x']['index']]['messages'][$this->_sections['i']['index']]['message']; ?>
</td></tr>
      </table>
    <?php endfor; endif; ?>
    </td>
  </tr>
<?php endfor; endif; ?>
</table>
<br /><br />
<input type="submit" name="delete" value="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" />
</div>
</form>
<?php endif; ?>