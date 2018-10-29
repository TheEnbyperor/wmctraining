<?php /* Smarty version 2.6.1, created on 2012-01-23 19:02:11
         compiled from chat.tpl */ ?>
<?php if ($this->_tpl_vars['onload'] == ''): ?>
<?php echo '<?'?>
xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['conf']['company']; ?>
 - Live Support Solution (Powered By Help Center Live)</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['lang']['charset']; ?>
" />
<?php if ($this->_tpl_vars['javascript'] != ""): ?>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/class/js/include.php?<?php echo $this->_tpl_vars['javascript']; ?>
&chatid=<?php echo $this->_tpl_vars['chatid'];  if ($this->_tpl_vars['admin'] == 'true'): ?>&admin<?php endif; ?>">
</script>
<?php endif; ?>
</head>
<frameset rows="<?php if ($this->_tpl_vars['admin'] == 'true' && $this->_tpl_vars['opchat'] == 'false'): ?>60,*,30,60,200,0<?php else: ?>60,*,30,70,0<?php endif; ?>" cols="*" framespacing="0" frameborder="0">
  <frame src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/top.php?chatid=<?php echo $this->_tpl_vars['chatid']; ?>
&amp;time=<?php echo $this->_tpl_vars['epoch'];  if ($this->_tpl_vars['admin'] == 'true'): ?>&amp;admin<?php endif; ?>" name="chat_top" scrolling="no" noresize="noresize">
  <frame src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/display.php?chatid=<?php echo $this->_tpl_vars['chatid']; ?>
&amp;time=<?php echo $this->_tpl_vars['epoch'];  if ($this->_tpl_vars['admin'] == 'true'): ?>&amp;admin<?php endif; ?>" name="chat_display" scrolling="yes">
  <frame src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/type.php?chatid=<?php echo $this->_tpl_vars['chatid']; ?>
&amp;time=<?php echo $this->_tpl_vars['epoch'];  if ($this->_tpl_vars['admin'] == 'true'): ?>&amp;admin<?php endif; ?>" name="chat_type" scrolling="no" noresize="noresize">
  <frame src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/send.php?chatid=<?php echo $this->_tpl_vars['chatid']; ?>
&amp;time=<?php echo $this->_tpl_vars['epoch'];  if ($this->_tpl_vars['admin'] == 'true'): ?>&amp;admin<?php endif;  if ($this->_tpl_vars['opchat'] == 'true'): ?>&amp;opchat<?php endif; ?>" name="chat_send" scrolling="no" noresize="noresize">
<?php if ($this->_tpl_vars['admin'] == 'true' && $this->_tpl_vars['opchat'] == 'false'): ?>
  <frame src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/admin.php?info&amp;chatid=<?php echo $this->_tpl_vars['chatid']; ?>
&amp;time=<?php echo $this->_tpl_vars['epoch'];  if ($this->_tpl_vars['admin'] == 'true'): ?>&amp;admin<?php endif; ?>" name="chat_admin" scrolling="yes" noresize="noresize">
<?php endif; ?>
  <frame src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/download.php?chatid=<?php echo $this->_tpl_vars['chatid']; ?>
&amp;time=<?php echo $this->_tpl_vars['epoch'];  if ($this->_tpl_vars['admin'] == 'true'): ?>&amp;admin<?php endif; ?>" name="chat_download" scrolling="no" noresize="noresize">
</frameset>
</html>
<?php else: ?>
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
<?php if ($this->_tpl_vars['javascript'] != ""): ?>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/class/js/include.php?<?php echo $this->_tpl_vars['javascript']; ?>
&chatid=<?php echo $this->_tpl_vars['chatid'];  if ($this->_tpl_vars['admin'] == 'true'): ?>&amp;admin<?php endif; ?>">
</script>
<?php endif; ?>
</head>
<body<?php echo $this->_tpl_vars['onload']; ?>
>
<?php echo $this->_tpl_vars['text']; ?>

</body>
</html>
<?php endif; ?>