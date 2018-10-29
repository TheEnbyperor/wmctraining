<?php /* Smarty version 2.6.1, created on 2012-01-23 19:04:07
         compiled from chat_end.tpl */ ?>
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
/css/chat.css" rel="stylesheet" type="text/css" />
<?php echo '
<script language="Javascript" type="text/javascript">
<!--
function rate(rating)
{
    for (var i = 1; i < rating+1; i++) {
        document.getElementById(i).checked = \'checked\';
    }
    for (var i = rating+1; i < 6; i++) {
        document.getElementById(i).checked = \'\';
    }
}
//-->
</script>
'; ?>

</head>
<body<?php echo $this->_tpl_vars['onload']; ?>
>
<?php if ($this->_tpl_vars['visitor'] == 'true'): ?>
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
</div>
<div align="center">
<?php if ($this->_tpl_vars['display'] == 'email'): ?>
<table cellspacing="0" cellpadding="0" width="80%">
  <tr>
    <td align="center"><b><?php echo $this->_tpl_vars['lang']['sent_transcript']; ?>
</b></td>
  </tr>
</table>
<br />
<?php endif; ?>
<?php if ($this->_tpl_vars['display'] == 'review'): ?>
<table cellspacing="0" cellpadding="0" width="80%">
  <tr>
    <td align="center"><?php echo $this->_tpl_vars['lang']['review_sent']; ?>
</td>
  </tr>
</table>
<br />
<?php endif; ?>
<div align="center">
<?php if ($this->_tpl_vars['display'] == 'default'): ?>
<?php echo $this->_tpl_vars['end_message']; ?>
<br />
<?php endif; ?>
<?php if ($this->_tpl_vars['display'] == 'print'): ?>
<table cellspacing="10" cellpadding="0" class="large">
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['nick']; ?>
: </td>
    <td><?php echo $this->_tpl_vars['nick']; ?>
</td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['operator']; ?>
: </td>
    <td><?php echo $this->_tpl_vars['operator']; ?>
</td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['department']; ?>
: </td>
    <td><?php echo $this->_tpl_vars['department']; ?>
</td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['email']; ?>
: </td>
    <td><?php echo $this->_tpl_vars['email']; ?>
</td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['time']; ?>
: </td>
    <td><?php echo $this->_tpl_vars['time']; ?>
</td>
  </tr>
</table>
<br />
<table cellspacing="10" cellpadding="0" class="large">
  <tr>
    <td>
      <?php echo $this->_tpl_vars['chat']; ?>

    </td>
  </tr>
</table>
<?php else: ?>
<br />
<br />
<form action="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/end.php?chatid=<?php echo $this->_tpl_vars['chatid']; ?>
" method="post">
<table cellspacing="0" cellpadding="0" width="80%" class="border">
  <tr>
    <td align="center" class="light" style="padding: 5px;"><?php echo $this->_tpl_vars['lang']['email_transcript']; ?>
</td>
  </tr>
  <tr>
    <td style="padding: 10px;" align="center"><?php echo $this->_tpl_vars['lang']['email']; ?>
: <input type="text" name="email" /> <input type="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" name="submit" /></td>
  </tr>
</table>
</form>
<br />
<br />
<a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/end.php?print&chatid=<?php echo $this->_tpl_vars['chatid']; ?>
"><?php echo $this->_tpl_vars['lang']['print_transcript']; ?>
</a>
<br />
<br />
<br />
<form action="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/end.php?chatid=<?php echo $this->_tpl_vars['chatid']; ?>
" method="post">
<table cellspacing="0" cellpadding="0" width="80%" class="border">
  <tr>
    <td  class="light" align="center" style="padding: 5px;"><?php echo $this->_tpl_vars['lang']['write_review']; ?>
</td>
  </tr>
  <tr>
    <td style="padding: 10px;" align="center"><?php echo $this->_tpl_vars['lang']['rating']; ?>
:</td>
  </tr>
  <tr>
    <td style="padding: 10px;" align="center"><?php echo $this->_tpl_vars['lang']['min']; ?>
 - <input type="radio" name="1" vaue="1" id="1" onclick="rate(1);" /> <input type="radio" name="2" vaue="2" id="2" onclick="rate(2);" /> <input type="radio" name="3" vaue="3" id="3" onclick="rate(3);" /> <input type="radio" name="4" vaue="4" id="4" onclick="rate(4);" /> <input type="radio" name="5" vaue="5" id="5" onclick="rate(5);" /> - <?php echo $this->_tpl_vars['lang']['max']; ?>
</td>
  </tr>
  <tr>
    <td style="padding: 10px;" align="center"><?php echo $this->_tpl_vars['lang']['review']; ?>
:</td>
  </tr>
  <tr>
    <td style="padding: 10px;" align="center"><textarea name="message" cols="30" rows="6"></textarea></td>
  </tr>
</table>
<br />
<input type="submit" value="<?php echo $this->_tpl_vars['lang']['send']; ?>
" name="review" />
</form>
<?php endif; ?>
</div>
<?php endif; ?>
</body>
</html>