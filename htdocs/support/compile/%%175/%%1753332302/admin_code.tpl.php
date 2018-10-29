<?php /* Smarty version 2.6.1, created on 2012-01-23 18:57:04
         compiled from admin_code.tpl */ ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
?<?php if ($this->_tpl_vars['action'] == 'image'): ?>image<?php elseif ($this->_tpl_vars['action'] == 'html'): ?>html<?php elseif ($this->_tpl_vars['action'] == 'text'): ?>text<?php elseif ($this->_tpl_vars['action'] == 'invisible'): ?>invisible<?php endif; ?>" method="post">
<table cellpadding="5" cellspacing="0">
  <tr class="light">
    <td><?php echo $this->_tpl_vars['lang']['select_department']; ?>
</td>
    <td>
      <select name="departmentid">
        <option value="0"><?php echo $this->_tpl_vars['lang']['all_departments']; ?>
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
"<?php if ($this->_tpl_vars['departmentid'] == $this->_tpl_vars['departments'][$this->_sections['i']['index']]['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['departments'][$this->_sections['i']['index']]['name']; ?>
</option>
        <?php endfor; endif; ?>
      </select>
    </td>
  </tr>
  <?php if ($this->_tpl_vars['action'] !== 'html'): ?>
  <tr class="medium">
    <td><?php echo $this->_tpl_vars['lang']['code_cobrowse']; ?>
</td>
    <td><input type="checkbox" name="cobrowse" value="1" <?php if ($this->_tpl_vars['cobrowse'] == '1'): ?>checked="checked"<?php endif; ?>></td>
  </tr>
  <?php endif; ?>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['generate_code']; ?>
"></td>
  </tr>
</table>
</form>
<?php if ($this->_tpl_vars['departmentid'] !== ''): ?>
  <?php if ($this->_tpl_vars['action'] == 'html'): ?>
<textarea name="all" cols="50" rows="5" id="all">
<!-- BEGIN Help Center Live Code, Copyright (c) 2005 Help Center Live. All Rights Reserved -->
<a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/main.php" target="_blank"><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/icon.php<?php if ($this->_tpl_vars['departmentid'] !== '0'): ?>?departmentid=<?php echo $this->_tpl_vars['departmentid'];  endif; ?>" alt="<?php echo $this->_tpl_vars['lang']['click_for_live_help']; ?>
" /></a>
<!-- END Help Center Live Code, Copyright (c) 2005 Help Center Live. All Rights Reserved -->
</textarea>
  <?php else: ?>
<textarea name="all" cols="50" rows="5" id="all">
<!-- BEGIN Help Center Live Code, Copyright (c) 2005 Help Center Live. All Rights Reserved -->
<div id="div_initiate" style="position:absolute; z-index:1; top: 40%; left:40%; visibility: hidden;"><a href="javascript:Live.initiate_accept();"><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/initiate.gif" border="0"></a><br><a href="javascript:Live.initiate_decline();"><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/initiate_close.gif" border="0"></a></div>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/class/js/include.php?live<?php if ($this->_tpl_vars['action'] == 'text'): ?>&text<?php endif;  if ($this->_tpl_vars['action'] == 'invisible'): ?>&invisible<?php endif;  if ($this->_tpl_vars['cobrowse'] == '1'): ?>&cobrowse<?php endif;  if ($this->_tpl_vars['departmentid'] !== '0'): ?>&departmentid=<?php echo $this->_tpl_vars['departmentid'];  endif; ?>"></script>
<!-- END Help Center Live Code, Copyright (c) 2005 Help Center Live. All Rights Reserved -->
</textarea>
  <?php endif; ?>
<?php endif; ?>