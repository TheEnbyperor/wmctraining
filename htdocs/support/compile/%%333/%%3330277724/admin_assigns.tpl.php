<?php /* Smarty version 2.6.1, created on 2012-01-23 19:01:45
         compiled from admin_assigns.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_assigns.tpl', 5, false),)), $this); ?>
<div align="center">
<?php if ($this->_tpl_vars['text'] !== ''):  echo $this->_tpl_vars['text']; ?>
<br /><br /><?php endif; ?>
<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['assigns']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
" align="center">
    <td><?php echo $this->_tpl_vars['assigns'][$this->_sections['i']['index']]['name']; ?>
</td>
    <td>
      <form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <?php if (isset($this->_sections['x'])) unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['assigns'][$this->_sections['i']['index']]['operators']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <td><input type="checkbox" name="<?php echo $this->_tpl_vars['assigns'][$this->_sections['i']['index']]['operators'][$this->_sections['x']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['assigns'][$this->_sections['i']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['assigns'][$this->_sections['i']['index']]['operators'][$this->_sections['x']['index']]['checked'] == 'true'): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['assigns'][$this->_sections['i']['index']]['operators'][$this->_sections['x']['index']]['firstname']; ?>
 <?php echo $this->_tpl_vars['assigns'][$this->_sections['i']['index']]['operators'][$this->_sections['x']['index']]['lastname']; ?>
 (<?php echo $this->_tpl_vars['assigns'][$this->_sections['i']['index']]['operators'][$this->_sections['x']['index']]['username']; ?>
) - <?php echo $this->_tpl_vars['lang']['priority']; ?>
: <input type="text" name="poll_<?php echo $this->_tpl_vars['assigns'][$this->_sections['i']['index']]['operators'][$this->_sections['x']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['assigns'][$this->_sections['i']['index']]['operators'][$this->_sections['x']['index']]['poll']; ?>
" size="5" /> <?php echo $this->_tpl_vars['lang']['priority_rank']; ?>
</td>
          </tr>
      <?php endfor; endif; ?>
          <tr>
            <td><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['assigns'][$this->_sections['i']['index']]['id']; ?>
" /><input type="submit" name="edit" value="<?php echo $this->_tpl_vars['lang']['edit']; ?>
" /></td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
<?php endfor; endif; ?>
</table>
<div>