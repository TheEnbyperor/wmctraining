<?php /* Smarty version 2.6.1, created on 2012-01-23 18:58:18
         compiled from live_divert.tpl */ ?>
<?php echo '<?'?>
xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['conf']['company']; ?>
 - Live Support Solution (Powered By Help Center Live)</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['lang']['charset']; ?>
" />
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/live.css" rel="stylesheet" type="text/css" />
<?php if ($this->_tpl_vars['javascript'] != ""): ?>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/class/js/include.php?<?php echo $this->_tpl_vars['javascript']; ?>
">
</script>
<?php endif; ?>
</head>
<body<?php echo $this->_tpl_vars['onload']; ?>
>
<div align="center">
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/live_top.gif" alt="" /></td>
  </tr>
</table>
<br /><br />

<?php if ($this->_tpl_vars['divert'] == 'offline'): ?>
  <?php echo $this->_tpl_vars['lang']['operators_offline']; ?>

<?php elseif ($this->_tpl_vars['divert'] == 'busy'): ?>
  <?php echo $this->_tpl_vars['lang']['connection_failure']; ?>

  <br /><br />
  <?php echo $this->_tpl_vars['lang']['operators_busy']; ?>

  <br /><br />
<?php elseif ($this->_tpl_vars['divert'] == 'email_sent'): ?>
  <?php echo $this->_tpl_vars['lang']['email_sent']; ?>

<?php else: ?>
  <?php echo $this->_tpl_vars['lang']['error']; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['conf']['modules']['osTicket']['active'] == true): ?>
<b><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/module.php?module=osTicket&file=/modules/osTicket/open.php" target="_blank"><?php echo $this->_tpl_vars['lang']['use_tickets']; ?>
</a></b>
<?php if ($this->_tpl_vars['conf']['forum_show'] == true): ?>
<br/><br/><b><a href="<?php echo $this->_tpl_vars['conf']['forum_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['lang']['forums']; ?>
</a></b>
<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['conf']['forum_show'] == true): ?>
<b><a href="<?php echo $this->_tpl_vars['conf']['forum_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['lang']['forums']; ?>
</a></b><br/><br/>
<?php endif; ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
  <table cellspacing="0" cellpadding="5" class="border">
    <tr class="dark">
      <td colspan="2"><?php echo $this->_tpl_vars['lang']['contact_us']; ?>
</td>
    </tr>
    <?php if ($this->_tpl_vars['departmentid'] == '0'): ?>
    <tr class="medium">
      <td><?php echo $this->_tpl_vars['lang']['department']; ?>
</td>
      <td>
      <select name="departmentid">
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
    <?php endif; ?>
    <tr class="medium">
      <td><?php echo $this->_tpl_vars['lang']['your_name']; ?>
</td>
      <td><input type="text" name="name" value="" size="20" /></td>
    </tr>
    <tr class="medium">
      <td><?php echo $this->_tpl_vars['lang']['your_email']; ?>
</td>
      <td><input type="text" name="email" value="" size="20" /></td>
    </tr>
    <tr class="medium">
      <td><?php echo $this->_tpl_vars['lang']['subject']; ?>
</td>
      <td><input type="text" name="subject" value="" size="20" /></td>
    </tr>
    <tr class="medium">
      <td><?php echo $this->_tpl_vars['lang']['message']; ?>
</td>
      <td><textarea name="message" rows="5" cols="20"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><?php if ($this->_tpl_vars['departmentid'] !== '0'): ?><input type="hidden" name="departmentid" value="<?php echo $this->_tpl_vars['departmentid']; ?>
" /><?php endif; ?><input type="submit" name="email_send" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" /></td>
    </tr>
  </table>
</form>
<?php endif; ?>
</div>
</body>
</html>