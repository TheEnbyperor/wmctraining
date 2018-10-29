<?php /* Smarty version 2.6.1, created on 2012-01-23 19:27:31
         compiled from admin_transcripts.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_transcripts.tpl', 56, false),)), $this); ?>
<?php if ($this->_tpl_vars['action'] == 'view'): ?>
<table cellspacing="10" cellpadding="0" class="large">
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['nick']; ?>
: </td>
    <td><?php echo $this->_tpl_vars['transcript']['nick']; ?>
</td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['operator']; ?>
: </td>
    <td><?php echo $this->_tpl_vars['transcript']['operator']; ?>
</td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['department']; ?>
: </td>
    <td><?php echo $this->_tpl_vars['transcript']['department']; ?>
</td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email']; ?>
: </td>
    <td><?php echo $this->_tpl_vars['transcript']['email']; ?>
</td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['time']; ?>
: </td>
    <td><?php echo $this->_tpl_vars['transcript']['time']; ?>
</td>
  </tr>
</table>
<br />
<table cellspacing="10" cellpadding="0" class="large">
  <tr>
    <td>
      <?php echo $this->_tpl_vars['transcript']['chat']; ?>

    </td>
  </tr>
</table>
<br /><br />
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF'];  if ($this->_tpl_vars['admin'] == 'admin'): ?>?admin<?php endif; ?>" method="post" onsubmit="return Misc.confirm_action();">
<div align="center"><input type="hidden" name="<?php echo $this->_tpl_vars['transcript']['id']; ?>
" value="<?php echo $this->_tpl_vars['transcript']['id']; ?>
" /><input type="submit" name="delete" value="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" /></div>
</form>
<?php else: ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF'];  if ($this->_tpl_vars['admin'] == 'admin'): ?>?admin<?php endif; ?>" method="post" onsubmit="return Misc.confirm_action();">
<div align="center">

<?php if (isset($this->_sections['x'])) unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['transcripts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
  <tr class="dark">
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><b><?php echo $this->_tpl_vars['transcripts'][$this->_sections['x']['index']]['name']; ?>
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
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['transcripts'][$this->_sections['x']['index']]['transcript']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
"><td><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/transcripts.php?view<?php if ($this->_tpl_vars['admin'] == 'admin'): ?>&admin<?php endif; ?>&id=<?php echo $this->_tpl_vars['transcripts'][$this->_sections['x']['index']]['transcript'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['transcripts'][$this->_sections['x']['index']]['transcript'][$this->_sections['i']['index']]['time']; ?>
 - <?php echo $this->_tpl_vars['transcripts'][$this->_sections['x']['index']]['transcript'][$this->_sections['i']['index']]['hostname']; ?>
</a></td><td align="right"> <input type="checkbox" name="<?php echo $this->_tpl_vars['transcripts'][$this->_sections['x']['index']]['transcript'][$this->_sections['i']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['transcripts'][$this->_sections['x']['index']]['transcript'][$this->_sections['i']['index']]['id']; ?>
" /></td></tr>
      </table>
    <?php endfor; endif; ?>
    </td>
  </tr>
</table><br /><br />
<?php endfor; endif; ?>

<input type="submit" name="delete" value="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" />
</div>
</form>
<?php endif; ?>