<?php /* Smarty version 2.6.1, created on 2012-01-23 19:02:14
         compiled from chat_top.tpl */ ?>
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
<form name="timer">
<table width="100%" height="60" align="center" border="0" cellspacing="0" cellpadding="5" class="top_bg">
  <tr>
    <td valign="top" class="<?php if ($this->_tpl_vars['picture'] !== '1'): ?>no_<?php endif; ?>picture">
      <div align="right">
        <table align="right" border="0" cellspacing="0" cellpadding="0" style="padding-right: 5px;">
          <tr>
            <td valign="top">
              <?php echo $this->_tpl_vars['lang']['sounds']; ?>
 : <a href="javascript:parent.window.Chat.sounds('on');"><span class="selected" id="sounds_on"><?php echo $this->_tpl_vars['lang']['status_on']; ?>
</span></a> <a href="javascript:parent.window.Chat.sounds('off');"><span class="not_selected" id="sounds_off"><?php echo $this->_tpl_vars['lang']['status_off']; ?>
</span></a><br />
              <?php echo $this->_tpl_vars['lang']['focus_win']; ?>
 : <a href="javascript:parent.window.Chat.focus('on');"><span class="selected" id="focus_on"><?php echo $this->_tpl_vars['lang']['status_on']; ?>
</span></a> <a href="javascript:parent.window.Chat.focus('off');"><span class="not_selected" id="focus_off"><?php echo $this->_tpl_vars['lang']['status_off']; ?>
</span></a><br />
              <?php echo $this->_tpl_vars['lang']['text_size']; ?>
 : <a href="javascript:parent.window.Chat.font_larger();">[A+]</a> <a href="javascript:parent.window.Chat.font_smaller();">[A-]</a><br>
              <?php echo $this->_tpl_vars['lang']['chat_time']; ?>
 : <span id="time">00:00</span>
            </td>
<?php if ($this->_tpl_vars['showpic'] == '1'): ?>
            <td valign="top">
              <img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/icon.php?picture&id=<?php echo $this->_tpl_vars['_CHAT']['operatorid']; ?>
" alt="<?php echo $this->_tpl_vars['_CHAT']['operator']; ?>
" height="50" />
            </td>
<?php endif; ?>
          </tr>
        </table>
      </div>
    </td>
  </tr>
</table>
</form>
<div id="images"></div>
</body>
</html>