<?php /* Smarty version 2.6.1, created on 2012-01-24 09:24:15
         compiled from admin_details.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_details.tpl', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['alert'] !== ''): ?>
<div align="center">
<b><?php echo $this->_tpl_vars['alert']; ?>
</b>
</div>
<?php else: ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" enctype="multipart/form-data">
<div align="center">
<table cellpadding="2" cellspacing="0" class="border">
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['username']; ?>
</td>
    <td><?php echo $this->_tpl_vars['details']['username']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['old_password']; ?>
</td>
    <td><input type="password" name="old_password" size="20" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['new_password']; ?>
</td>
    <td><input type="password" name="new_password" size="20" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['new_password_again']; ?>
</td>
    <td><input type="password" name="new_password_again" size="20" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['first_name']; ?>
</td>
    <td><input type="text" name="firstname" value="<?php echo $this->_tpl_vars['details']['firstname']; ?>
" size="20" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['last_name']; ?>
</td>
    <td><input type="text" name="lastname" value="<?php echo $this->_tpl_vars['details']['lastname']; ?>
" size="20" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['email']; ?>
</td>
    <td><input type="text" name="email" value="<?php echo $this->_tpl_vars['details']['email']; ?>
" size="20" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['picture']; ?>
</td>
    <td><?php if ($this->_tpl_vars['details']['picture'] !== ''): ?><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/icon.php?picture&id=<?php echo $this->_tpl_vars['id']; ?>
" /> <br /><br /><?php endif; ?><input type="file" name="picture" /></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['display_picture']; ?>
</td>
    <td>
      <select name="showpic">
        <option value="1"<?php if ($this->_tpl_vars['details']['showpic'] == '1'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['yes']; ?>
</option>
        <option value="0"<?php if ($this->_tpl_vars['details']['showpic'] == '0'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['no']; ?>
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
        <option value="1"<?php if ($this->_tpl_vars['details']['autosave'] == '1'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['yes']; ?>
</option>
        <option value="0"<?php if ($this->_tpl_vars['details']['autosave'] == '0'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['no']; ?>
</option>
      </select>
    </td>
  </tr>
</table>
<br /><br />
<input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" />
</div>
</form>
<?php endif; ?>