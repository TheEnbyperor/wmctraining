<?php /* Smarty version 2.6.1, created on 2012-01-23 19:03:30
         compiled from chat_admin.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'chat_admin.tpl', 38, false),)), $this); ?>
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

<br />
<div align="center">
<a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/admin.php?info&amp;chatid=<?php echo $this->_tpl_vars['chatid']; ?>
">[<?php echo $this->_tpl_vars['lang']['visitor_info']; ?>
]</a>
<a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/admin.php?canned&amp;chatid=<?php echo $this->_tpl_vars['chatid']; ?>
">[<?php echo $this->_tpl_vars['lang']['canned_messages']; ?>
]</a>
<a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/admin.php?transfer&amp;chatid=<?php echo $this->_tpl_vars['chatid']; ?>
">[<?php echo $this->_tpl_vars['lang']['transfer_chat']; ?>
]</a>
<a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/admin.php?file&amp;chatid=<?php echo $this->_tpl_vars['chatid']; ?>
">[<?php echo $this->_tpl_vars['lang']['transfer_file']; ?>
]</a>
</div>
<br /><br />

<?php if ($this->_tpl_vars['type'] == 'canned'): ?>

<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
  <tr class="dark">
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><b><?php echo $this->_tpl_vars['lang']['canned_all']; ?>
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
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['canned']['all']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
" align="center"><td><?php echo $this->_tpl_vars['canned']['all'][$this->_sections['i']['index']]['message']; ?>
</td><td align="right">[<a href="javascript:parent.window.Chat.canned('<?php echo $this->_tpl_vars['canned']['all'][$this->_sections['i']['index']]['message_js']; ?>
');"><?php echo $this->_tpl_vars['lang']['send']; ?>
</a>]</td></tr>
      </table>
<?php endfor; endif; ?>
    </td>
  </tr>
</table><br /><br />

<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
  <tr class="dark">
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><b><?php echo $this->_tpl_vars['lang']['canned_op']; ?>
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
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['canned']['op']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
" align="center"><td><?php echo $this->_tpl_vars['canned']['op'][$this->_sections['i']['index']]['message']; ?>
</td><td align="right">[<a href="javascript:parent.window.Chat.canned('<?php echo $this->_tpl_vars['canned']['op'][$this->_sections['i']['index']]['message_js']; ?>
');"><?php echo $this->_tpl_vars['lang']['send']; ?>
</a>]</td></tr>
      </table>
<?php endfor; endif; ?>
    </td>
  </tr>
</table><br /><br />

<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
  <tr class="dark">
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><b><?php echo $this->_tpl_vars['lang']['canned_dep']; ?>
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
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['canned']['dep']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
" align="center"><td><?php echo $this->_tpl_vars['canned']['dep'][$this->_sections['i']['index']]['message']; ?>
</td><td align="right">[<a href="javascript:parent.window.Chat.canned('<?php echo $this->_tpl_vars['canned']['dep'][$this->_sections['i']['index']]['message_js']; ?>
');"><?php echo $this->_tpl_vars['lang']['send']; ?>
</a>]</td></tr>
      </table>
<?php endfor; endif; ?>
    </td>
  </tr>
</table><br /><br />

<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
  <tr class="dark">
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><b><?php echo $this->_tpl_vars['lang']['canned_both']; ?>
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
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['canned']['both']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
" align="center"><td><?php echo $this->_tpl_vars['canned']['both'][$this->_sections['i']['index']]['message']; ?>
</td><td align="right">[<a href="javascript:parent.window.Chat.canned('<?php echo $this->_tpl_vars['canned']['both'][$this->_sections['i']['index']]['message_js']; ?>
');"><?php echo $this->_tpl_vars['lang']['send']; ?>
</a>]</td></tr>
      </table>
<?php endfor; endif; ?>
    </td>
  </tr>
</table><br /><br />

<?php elseif ($this->_tpl_vars['type'] == 'transfer'): ?>

<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['transfer']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="border">
  <tr class="dark">
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><b><?php echo $this->_tpl_vars['transfer'][$this->_sections['i']['index']]['name']; ?>
 - <?php echo $this->_tpl_vars['transfer'][$this->_sections['i']['index']]['email']; ?>
</b></td><td align="center">&nbsp;
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
<?php if (isset($this->_sections['n'])) unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['transfer'][$this->_sections['i']['index']]['operators']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
<?php if ($this->_tpl_vars['transfer'][$this->_sections['i']['index']]['operators'][$this->_sections['n']['index']]['status'] == 'true'): ?>
        <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
" align="center"><td><?php echo $this->_tpl_vars['transfer'][$this->_sections['i']['index']]['operators'][$this->_sections['n']['index']]['name']; ?>
</td><td align="right">[<a href="javascript:parent.window.Chat.transfer_chat('<?php echo $this->_tpl_vars['transfer'][$this->_sections['i']['index']]['operators'][$this->_sections['n']['index']]['id']; ?>
', '<?php echo $this->_tpl_vars['transfer'][$this->_sections['i']['index']]['id']; ?>
');"><?php echo $this->_tpl_vars['lang']['transfer']; ?>
</a>]</td></tr>
<?php else: ?>
        <tr class="<?php echo smarty_function_cycle(array('values' => "light,medium"), $this);?>
" align="center"><td><?php echo $this->_tpl_vars['transfer'][$this->_sections['i']['index']]['operators'][$this->_sections['n']['index']]['name']; ?>
</td><td align="right">[<?php echo $this->_tpl_vars['lang']['offline']; ?>
]</td></tr>
<?php endif; ?>
      </table>
<?php endfor; endif; ?>
    </td>
  </tr>
</table><br /><br />
<?php endfor; endif; ?>

<?php elseif ($this->_tpl_vars['type'] == 'file'): ?>

<?php if ($this->_tpl_vars['submit'] == 'true' && $this->_tpl_vars['fail'] == 'true'): ?>
<div align="center"><b><?php echo $this->_tpl_vars['lang']['cannot_transfer_0']; ?>
</b></div><br />
<?php endif; ?>
<?php if ($this->_tpl_vars['request_transfer'] == 'true'): ?>
<div align="center"><b><?php echo $this->_tpl_vars['lang']['request_sent']; ?>
</b></div><br />
<?php endif; ?>
<form name="upload" enctype="multipart/form-data" method="post" action="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/admin.php?file&amp;chatid=<?php echo $this->_tpl_vars['chatid']; ?>
">
<table width="90%" align="center" border="0" cellspacing="1" cellpadding="2" class="border">
  <tr>
    <td class="dark"><div align="center"><b><?php echo $this->_tpl_vars['lang']['send_file']; ?>
</b></div></td>
    <td class="light"><div align="right"><input type="file" name="file" /></div></td>
  </tr>
  <tr>
    <td class="light" colspan="2"><div align="right"><?php echo $this->_tpl_vars['lang']['max_size_is']; ?>
: <?php echo $this->_tpl_vars['max_size']; ?>
&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['transfer']; ?>
" /></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="dark" colspan="2"><div align="center"><b><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/live/chat/admin.php?file&amp;request_transfer&amp;chatid=<?php echo $this->_tpl_vars['chatid']; ?>
"><?php echo $this->_tpl_vars['lang']['request_file']; ?>
</a></b></div></td>
  </tr>
</table></form>
<br /><br />

<?php elseif ($this->_tpl_vars['type'] == 'info'): ?>

<table width="90%" align="center" border="0" cellspacing="1" cellpadding="2" class="border">
  <tr>
    <td class="dark" colspan="2"><div align="center"><b><?php echo $this->_tpl_vars['lang']['hostname']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="light" colspan="2"><div align="center"><?php echo $this->_tpl_vars['info']['hostname']; ?>
</div></td>
  </tr>
  <tr>
    <td class="dark" colspan="2"><div align="center"><b><?php echo $this->_tpl_vars['lang']['ip_addr']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="light" colspan="2"><div align="center"><?php echo $this->_tpl_vars['info']['ip']; ?>
</div></td>
  </tr>
  <tr>
    <td class="dark" colspan="2">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lang']['useragent']; ?>
</b></td>
  </tr>
  <tr>
    <td class="light" colspan="2">&nbsp;&nbsp;<?php echo $this->_tpl_vars['info']['useragent']; ?>
</td>
  </tr>
  <tr>
    <td class="dark" colspan="2">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lang']['referrer']; ?>
</b></td>
  </tr>
  <tr>
    <td class="light" colspan="2">&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['refurl']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['referrer']; ?>
</a></td>
  </tr>
  <tr>
    <td class="dark" colspan="2">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lang']['current_page']; ?>
</b></td>
  </tr>
  <tr>
    <td class="light" colspan="2">&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['page']; ?>
</a></td>
  </tr>
  <tr>
    <td class="dark"><div align="center"><b><?php echo $this->_tpl_vars['lang']['time_page']; ?>
</b></div></td>
    <td class="dark"><div align="center"><b><?php echo $this->_tpl_vars['lang']['time_site']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="light"><div align="center"><?php echo $this->_tpl_vars['info']['page_time']; ?>
</div></td>
    <td class="light"><div align="center"><?php echo $this->_tpl_vars['info']['site_time']; ?>
</div></td>
  </tr>
  <tr>
    <td class="dark"><div align="center"><b><?php echo $this->_tpl_vars['lang']['total_unique_visits']; ?>
</b></div></td>
    <td class="dark"><div align="center"><b><?php echo $this->_tpl_vars['lang']['total_chat_requests']; ?>
</b></div></td>
  </tr>
  <tr>
    <td class="light"><div align="center"><?php echo $this->_tpl_vars['info']['visits']; ?>
</div></td>
    <td class="light"><div align="center"><?php echo $this->_tpl_vars['info']['requests']; ?>
</div></td>
  </tr>
  <tr>
    <td class="dark" colspan="2">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lang']['footprints']; ?>
</b></td>
  </tr>
  <tr>
    <td class="light" colspan="2">
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['info']['footprints']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['hotpage'] == 'true'): ?>
      <b>!</b>&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['page']; ?>
</a> - <?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['time']; ?>
<br />
<?php else: ?>
      &nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['page']; ?>
</a> - <?php echo $this->_tpl_vars['info']['footprints'][$this->_sections['i']['index']]['time']; ?>
<br />
<?php endif; ?>
<?php endfor; endif; ?>
    </td>
  </tr>
<?php if ($this->_tpl_vars['history'] == 'true'): ?>
  <tr>
    <td class="dark" colspan="2">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lang']['history']; ?>
</b></td>
  </tr>
  <tr>
    <td class="light" colspan="2">
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['info']['history']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['hotpage'] == 'true'): ?>
      <b>!</b>&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['page']; ?>
</a> - <?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['time']; ?>
<br />
<?php else: ?>
      &nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['page']; ?>
</a> - <?php echo $this->_tpl_vars['info']['history'][$this->_sections['i']['index']]['time']; ?>
<br />
<?php endif; ?>
<?php endfor; endif; ?>
    </td>
  </tr>
<?php endif; ?>
  <tr>
    <td class="light" colspan="3"><div align="center">[<a href="javascript:window.location.href = window.location.href+'&history';"><?php echo $this->_tpl_vars['lang']['view_history']; ?>
</a>]</div></td>
  </tr>
</table>
<br /><br />

<?php endif; ?>

</body>
</html>