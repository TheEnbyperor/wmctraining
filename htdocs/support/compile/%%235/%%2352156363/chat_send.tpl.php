<?php /* Smarty version 2.6.1, created on 2012-01-23 19:02:15
         compiled from chat_send.tpl */ ?>
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
</head>
<body<?php echo $this->_tpl_vars['onload']; ?>
>
<div align="center">
<table border="0" cellspacing="0" cellpadding="2" align="center">
<?php if ($this->_tpl_vars['admin'] == 'true' && $this->_tpl_vars['_CHAT']['isoperator'] == 'true' && $this->_tpl_vars['opchat'] == 'false'): ?>
  <tr>
    <td>
      <div align="center">
        <?php echo $this->_tpl_vars['lang']['insert']; ?>
:
        <a href="javascript:parent.window.Chat.insert('nick');">[<?php echo $this->_tpl_vars['lang']['guests_nick']; ?>
]</a>
        <a href="javascript:parent.window.Chat.insert('push');">[<?php echo $this->_tpl_vars['lang']['push']; ?>
]</a>
        <a href="javascript:parent.window.Chat.insert('url');">[<?php echo $this->_tpl_vars['lang']['url']; ?>
]</a>
        <a href="javascript:parent.window.Chat.insert('image');">[<?php echo $this->_tpl_vars['lang']['image']; ?>
]</a>
        <a href="javascript:parent.window.Chat.insert('email');">[<?php echo $this->_tpl_vars['lang']['email']; ?>
]</a>
      </div>
    </td>
  </tr>
<?php endif; ?>
  <tr>
    <td>
      <div align=\"center\">
        <form action="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/send.php?chatid=<?php echo $this->_tpl_vars['chatid']; ?>
&amp;time=<?php echo $this->_tpl_vars['epoch'];  if ($this->_tpl_vars['admin'] == 'true'): ?>&amp;admin<?php endif;  if ($this->_tpl_vars['opchat'] == 'true'): ?>&amp;opchat<?php endif; ?>" method="post" name="chat_form" id="chat_form" onsubmit="return parent.window.Chat.message();">
        <input type="text" autocomplete="off" name="chat_box" id="chat_box" size="30" maxlength="150" onkeypress="parent.window.Chat.typing();" />
        <input type="submit" name="chat_submit" id="chat_submit" value="<?php echo $this->_tpl_vars['lang']['send']; ?>
" /> <a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/end.php?close<?php if ($this->_tpl_vars['admin'] == 'true'): ?>&admin<?php endif; ?>&chatid=<?php echo $this->_tpl_vars['chatid']; ?>
" target="_top">[<?php echo $this->_tpl_vars['lang']['end_chat']; ?>
]</a>
<?php if ($this->_tpl_vars['admin'] !== 'true' || $this->_tpl_vars['opchat'] == 'true'): ?>
        <br /><br /><div align="center">Powered By <a href="http://www.helpcenterlive.com" target="_blank">Help Center Live</a> - &copy; <a href="http://www.helpcenterlive.com" target="_blank">Help Center Live</a>. All Rights Reserved.</div>
<?php endif; ?>
        </form>
      </div>
    </td>
  </tr>
</table>
</div>
</body>
</html>