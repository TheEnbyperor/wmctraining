<?php /* Smarty version 2.6.1, created on 2012-01-23 18:57:09
         compiled from admin_operators.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_operators.tpl', 7, false),)), $this); ?>
<?php if ($this->_tpl_vars['action'] == 'add'): ?>

<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" enctype="multipart/form-data">
<div align="center">
<?php if ($this->_tpl_vars['error'] !== ''): ?><b><?php echo $this->_tpl_vars['error']; ?>
</b><br /><br /><?php endif; ?>
<table border="0" cellspacing="0" cellpadding="2" class="border">
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['username']; ?>
</td>
    <td><input type="text" name="username" size="20" value="<?php echo $this->_tpl_vars['username']; ?>
" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['new_password']; ?>
</td>
    <td><input type="password" name="new_password" size="20" value="" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['new_password_again']; ?>
</td>
    <td><input type="password" name="new_password_again" size="20" value="" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['first_name']; ?>
</td>
    <td><input type="text" name="firstname" size="20" value="<?php echo $this->_tpl_vars['firstname']; ?>
" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['last_name']; ?>
</td>
    <td><input type="text" name="lastname" size="20" value="<?php echo $this->_tpl_vars['lastname']; ?>
" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['email']; ?>
</td>
    <td><input type="text" name="email" size="20" value="<?php echo $this->_tpl_vars['email']; ?>
" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['admin']; ?>
</td>
    <td>
      <select name="admin">
        <option value="0"<?php if ($this->_tpl_vars['admin'] == '0'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['yes']; ?>
</option>
        <option value="1"<?php if ($this->_tpl_vars['admin'] == '1' || $this->_tpl_vars['admin'] == ''): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['no']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['autosave_transcripts']; ?>
</td>
    <td>
      <select name="autosave">
        <option value="1"<?php if ($this->_tpl_vars['autosave'] == '1' || $this->_tpl_vars['autosave'] == ''): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['yes']; ?>
</option>
        <option value="0"<?php if ($this->_tpl_vars['autosave'] == '0'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['no']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['display_picture']; ?>
</td>
    <td>
      <select name="showpic">
        <option value="1"<?php if ($this->_tpl_vars['showpic'] == '1'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['yes']; ?>
</option>
        <option value="0"<?php if ($this->_tpl_vars['showpic'] == '0' || $this->_tpl_vars['showpic'] == ''): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['no']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['picture']; ?>
</td>
    <td><input type="file" name="picture" /></td>
  </tr>
</table>
<br /><br />
<input type="submit" name="add" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
" />
</div>
</form>

<?php elseif ($this->_tpl_vars['action'] == 'added'): ?>

<div align="center">
<b><?php echo $this->_tpl_vars['lang']['operator_added']; ?>
</b>
</div>

<?php elseif ($this->_tpl_vars['action'] == 'edit'): ?>

<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" enctype="multipart/form-data">
<div align="center">
<table border="0" cellspacing="0" cellpadding="2" class="border">
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['username']; ?>
</td>
    <td><input type="text" name="username" size="20" value="<?php echo $this->_tpl_vars['operator']['username']; ?>
" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['new_password']; ?>
</td>
    <td><input type="password" name="new_password" size="20" value="" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['new_password_again']; ?>
</td>
    <td><input type="password" name="new_password_again" size="20" value="" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['first_name']; ?>
</td>
    <td><input type="text" name="firstname" size="20" value="<?php echo $this->_tpl_vars['operator']['firstname']; ?>
" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['last_name']; ?>
</td>
    <td><input type="text" name="lastname" size="20" value="<?php echo $this->_tpl_vars['operator']['lastname']; ?>
" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['email']; ?>
</td>
    <td><input type="text" name="email" size="20" value="<?php echo $this->_tpl_vars['operator']['email']; ?>
" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['admin']; ?>
</td>
    <td>
      <select name="admin">
        <option value="0"<?php if ($this->_tpl_vars['operator']['level'] == '0'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['yes']; ?>
</option>
        <option value="1"<?php if ($this->_tpl_vars['operator']['level'] == '1'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['no']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['autosave_transcripts']; ?>
</td>
    <td>
      <select name="autosave">
        <option value="1"<?php if ($this->_tpl_vars['operator']['autosave'] == '1'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['yes']; ?>
</option>
        <option value="0"<?php if ($this->_tpl_vars['operator']['autosave'] == '0'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['no']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['display_picture']; ?>
</td>
    <td>
      <select name="showpic">
        <option value="1"<?php if ($this->_tpl_vars['operator']['showpic'] == '1'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['yes']; ?>
</option>
        <option value="0"<?php if ($this->_tpl_vars['operator']['showpic'] == '0'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['no']; ?>
</option>
      </select>
    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['picture']; ?>
</td>
    <td><?php if ($this->_tpl_vars['operator']['picture'] !== ''): ?><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/icon.php?picture&id=<?php echo $this->_tpl_vars['operator']['id']; ?>
" /> <br /><br /><?php endif; ?><input type="file" name="picture" /></td>
  </tr>
</table>
<br /><br />
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['operator']['id']; ?>
" />
<input type="submit" name="edit" value="<?php echo $this->_tpl_vars['lang']['edit']; ?>
" />
</div>
</form>

<?php elseif ($this->_tpl_vars['action'] == 'edited'): ?>

<div align="center">
<b><?php echo $this->_tpl_vars['text']; ?>
</b>
</div>

<?php elseif ($this->_tpl_vars['action'] == 'delete'): ?>

<div align="center">
<b><?php echo $this->_tpl_vars['lang']['operators_deleted']; ?>
</b>
</div>

<?php elseif ($this->_tpl_vars['action'] == 'boot'): ?>

<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
<div align="center">
<b><?php echo $this->_tpl_vars['alert']; ?>
</b><br /><br />
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
" />
<input type="submit" name="boot" value="<?php echo $this->_tpl_vars['lang']['boot']; ?>
" />
</div>
</form>

<?php elseif ($this->_tpl_vars['action'] == 'view'): ?>

<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" onsubmit="return Misc.confirm_action();">
<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['operators']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
">
    <td><?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['firstname']; ?>
 <?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['lastname']; ?>
 (<?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['username']; ?>
)</td>
    <td align="right">
    <?php if ($this->_tpl_vars['operators'][$this->_sections['i']['index']]['monitor_status'] == 'web'): ?>
     | <a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/operators.php?boot&id=<?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['monitor_web']; ?>
</a>
    <?php elseif ($this->_tpl_vars['operators'][$this->_sections['i']['index']]['monitor_status'] == 'client'): ?>
     | <a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/operators.php?boot&id=<?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['monitor_client']; ?>
</a>
    <?php else: ?>
     | <?php echo $this->_tpl_vars['lang']['monitor_none']; ?>

    <?php endif; ?>
     | <a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/stats.php?operators&id=<?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['view_stats']; ?>
</a> | <a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/operators.php?edit&id=<?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <input type="checkbox" name="<?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['id']; ?>
" /></td>
  </tr>
<?php endfor; endif; ?>
</table>
<br /><br />
<div align="center">
<input type="submit" name="delete" value="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" />
<div>
</form>
<br /><br />
<div align="center">
<input type="button" name="boot" value="<?php echo $this->_tpl_vars['lang']['boot_all']; ?>
" onclick="window.location.href='<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/operators.php?boot';" />
<div>

<?php endif; ?>