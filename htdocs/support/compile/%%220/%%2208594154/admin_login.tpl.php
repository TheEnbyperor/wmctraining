<?php /* Smarty version 2.6.1, created on 2012-01-23 18:56:06
         compiled from admin_login.tpl */ ?>
<b><?php echo $this->_tpl_vars['login_text']; ?>
</b><br />
<form method="post" action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
">
<table style="padding-left: 50px;">
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['username']; ?>
:</td>
    <td><input type="text" name="username" id="username" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['password']; ?>
:</td>
    <td><input type="password" name="password" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><input type="submit" value="<?php echo $this->_tpl_vars['lang']['login']; ?>
" /></td>
  </tr>
</table>
</form>
<?php echo '
<script language="Javascript" type="text/javascript">
focusElement(\'username\');
</script>
'; ?>