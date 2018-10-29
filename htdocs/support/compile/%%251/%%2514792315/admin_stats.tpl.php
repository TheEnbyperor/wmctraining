<?php /* Smarty version 2.6.1, created on 2012-01-24 09:26:00
         compiled from admin_stats.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_stats.tpl', 8, false),)), $this); ?>
<?php if ($this->_tpl_vars['action'] == 'visitors'): ?>
<div align="center">
<?php echo $this->_tpl_vars['dates']; ?>
<br /><br />
<table cellspacing="0" cellpadding="5" class="border">
  <tr class="dark">
    <td colspan="2" align="center"><b><?php echo $this->_tpl_vars['lang']['visitors']; ?>
</b></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['chat_requests']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['stats']['requests']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['visits']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['stats']['visits']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['hits']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['stats']['hits']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['hits_per_visit']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['stats']['hits_per_visit']; ?>
</td>
  </tr>
</table>
<br /><br />
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
<table cellspacing="0" cellpadding="5" class="border">
  <tr class="dark">
    <td><?php echo $this->_tpl_vars['lang']['from']; ?>
</td>
  </tr>
  <tr class="medium">
    <td>
      <?php echo $this->_tpl_vars['lang']['day']; ?>
:
      <select name="fd">
        <option value="1"<?php if ($this->_tpl_vars['fd'] == '1'): ?> selected="selected"<?php endif; ?>>1</option>
        <option value="2"<?php if ($this->_tpl_vars['fd'] == '2'): ?> selected="selected"<?php endif; ?>>2</option>
        <option value="3"<?php if ($this->_tpl_vars['fd'] == '3'): ?> selected="selected"<?php endif; ?>>3</option>
        <option value="4"<?php if ($this->_tpl_vars['fd'] == '4'): ?> selected="selected"<?php endif; ?>>4</option>
        <option value="5"<?php if ($this->_tpl_vars['fd'] == '5'): ?> selected="selected"<?php endif; ?>>5</option>
        <option value="6"<?php if ($this->_tpl_vars['fd'] == '6'): ?> selected="selected"<?php endif; ?>>6</option>
        <option value="7"<?php if ($this->_tpl_vars['fd'] == '7'): ?> selected="selected"<?php endif; ?>>7</option>
        <option value="8"<?php if ($this->_tpl_vars['fd'] == '8'): ?> selected="selected"<?php endif; ?>>8</option>
        <option value="9"<?php if ($this->_tpl_vars['fd'] == '9'): ?> selected="selected"<?php endif; ?>>9</option>
        <option value="10"<?php if ($this->_tpl_vars['fd'] == '10'): ?> selected="selected"<?php endif; ?>>10</option>
        <option value="11"<?php if ($this->_tpl_vars['fd'] == '11'): ?> selected="selected"<?php endif; ?>>11</option>
        <option value="12"<?php if ($this->_tpl_vars['fd'] == '12'): ?> selected="selected"<?php endif; ?>>12</option>
        <option value="13"<?php if ($this->_tpl_vars['fd'] == '13'): ?> selected="selected"<?php endif; ?>>13</option>
        <option value="14"<?php if ($this->_tpl_vars['fd'] == '14'): ?> selected="selected"<?php endif; ?>>14</option>
        <option value="15"<?php if ($this->_tpl_vars['fd'] == '15'): ?> selected="selected"<?php endif; ?>>15</option>
        <option value="16"<?php if ($this->_tpl_vars['fd'] == '16'): ?> selected="selected"<?php endif; ?>>16</option>
        <option value="17"<?php if ($this->_tpl_vars['fd'] == '17'): ?> selected="selected"<?php endif; ?>>17</option>
        <option value="18"<?php if ($this->_tpl_vars['fd'] == '18'): ?> selected="selected"<?php endif; ?>>18</option>
        <option value="19"<?php if ($this->_tpl_vars['fd'] == '19'): ?> selected="selected"<?php endif; ?>>19</option>
        <option value="20"<?php if ($this->_tpl_vars['fd'] == '20'): ?> selected="selected"<?php endif; ?>>20</option>
        <option value="21"<?php if ($this->_tpl_vars['fd'] == '21'): ?> selected="selected"<?php endif; ?>>21</option>
        <option value="22"<?php if ($this->_tpl_vars['fd'] == '22'): ?> selected="selected"<?php endif; ?>>22</option>
        <option value="23"<?php if ($this->_tpl_vars['fd'] == '23'): ?> selected="selected"<?php endif; ?>>23</option>
        <option value="24"<?php if ($this->_tpl_vars['fd'] == '24'): ?> selected="selected"<?php endif; ?>>24</option>
        <option value="25"<?php if ($this->_tpl_vars['fd'] == '25'): ?> selected="selected"<?php endif; ?>>25</option>
        <option value="26"<?php if ($this->_tpl_vars['fd'] == '26'): ?> selected="selected"<?php endif; ?>>26</option>
        <option value="27"<?php if ($this->_tpl_vars['fd'] == '27'): ?> selected="selected"<?php endif; ?>>27</option>
        <option value="28"<?php if ($this->_tpl_vars['fd'] == '28'): ?> selected="selected"<?php endif; ?>>28</option>
        <option value="29"<?php if ($this->_tpl_vars['fd'] == '29'): ?> selected="selected"<?php endif; ?>>29</option>
        <option value="30"<?php if ($this->_tpl_vars['fd'] == '30'): ?> selected="selected"<?php endif; ?>>30</option>
        <option value="31"<?php if ($this->_tpl_vars['fd'] == '31'): ?> selected="selected"<?php endif; ?>>31</option>
      </select>
      <?php echo $this->_tpl_vars['lang']['month']; ?>
:
      <select name="fm">
        <option value="1"<?php if ($this->_tpl_vars['fm'] == '1'): ?> selected="selected"<?php endif; ?>>1</option>
        <option value="2"<?php if ($this->_tpl_vars['fm'] == '2'): ?> selected="selected"<?php endif; ?>>2</option>
        <option value="3"<?php if ($this->_tpl_vars['fm'] == '3'): ?> selected="selected"<?php endif; ?>>3</option>
        <option value="4"<?php if ($this->_tpl_vars['fm'] == '4'): ?> selected="selected"<?php endif; ?>>4</option>
        <option value="5"<?php if ($this->_tpl_vars['fm'] == '5'): ?> selected="selected"<?php endif; ?>>5</option>
        <option value="6"<?php if ($this->_tpl_vars['fm'] == '6'): ?> selected="selected"<?php endif; ?>>6</option>
        <option value="7"<?php if ($this->_tpl_vars['fm'] == '7'): ?> selected="selected"<?php endif; ?>>7</option>
        <option value="8"<?php if ($this->_tpl_vars['fm'] == '8'): ?> selected="selected"<?php endif; ?>>8</option>
        <option value="9"<?php if ($this->_tpl_vars['fm'] == '9'): ?> selected="selected"<?php endif; ?>>9</option>
        <option value="10"<?php if ($this->_tpl_vars['fm'] == '10'): ?> selected="selected"<?php endif; ?>>10</option>
        <option value="11"<?php if ($this->_tpl_vars['fm'] == '11'): ?> selected="selected"<?php endif; ?>>11</option>
        <option value="12"<?php if ($this->_tpl_vars['fm'] == '12'): ?> selected="selected"<?php endif; ?>>12</option>
      </select>
      <?php echo $this->_tpl_vars['lang']['year']; ?>
:
      <select name="fy">
        <option value="2005"<?php if ($this->_tpl_vars['fy'] == '2005'): ?> selected="selected"<?php endif; ?>>2005</option>
        <option value="2006"<?php if ($this->_tpl_vars['fy'] == '2006'): ?> selected="selected"<?php endif; ?>>2006</option>
        <option value="2007"<?php if ($this->_tpl_vars['fy'] == '2007'): ?> selected="selected"<?php endif; ?>>2007</option>
        <option value="2008"<?php if ($this->_tpl_vars['fy'] == '2008'): ?> selected="selected"<?php endif; ?>>2008</option>
        <option value="2009"<?php if ($this->_tpl_vars['fy'] == '2009'): ?> selected="selected"<?php endif; ?>>2009</option>
        <option value="2010"<?php if ($this->_tpl_vars['fy'] == '2010'): ?> selected="selected"<?php endif; ?>>2010</option>
      </select>
    </td>
  </tr>
  <tr class="dark">
    <td><?php echo $this->_tpl_vars['lang']['to']; ?>
</td>
  </tr>
  <tr class="medium">
    <td>
      <?php echo $this->_tpl_vars['lang']['day']; ?>
:
      <select name="td">
        <option value="1"<?php if ($this->_tpl_vars['td'] == '1'): ?> selected="selected"<?php endif; ?>>1</option>
        <option value="2"<?php if ($this->_tpl_vars['td'] == '2'): ?> selected="selected"<?php endif; ?>>2</option>
        <option value="3"<?php if ($this->_tpl_vars['td'] == '3'): ?> selected="selected"<?php endif; ?>>3</option>
        <option value="4"<?php if ($this->_tpl_vars['td'] == '4'): ?> selected="selected"<?php endif; ?>>4</option>
        <option value="5"<?php if ($this->_tpl_vars['td'] == '5'): ?> selected="selected"<?php endif; ?>>5</option>
        <option value="6"<?php if ($this->_tpl_vars['td'] == '6'): ?> selected="selected"<?php endif; ?>>6</option>
        <option value="7"<?php if ($this->_tpl_vars['td'] == '7'): ?> selected="selected"<?php endif; ?>>7</option>
        <option value="8"<?php if ($this->_tpl_vars['td'] == '8'): ?> selected="selected"<?php endif; ?>>8</option>
        <option value="9"<?php if ($this->_tpl_vars['td'] == '9'): ?> selected="selected"<?php endif; ?>>9</option>
        <option value="10"<?php if ($this->_tpl_vars['td'] == '10'): ?> selected="selected"<?php endif; ?>>10</option>
        <option value="11"<?php if ($this->_tpl_vars['td'] == '11'): ?> selected="selected"<?php endif; ?>>11</option>
        <option value="12"<?php if ($this->_tpl_vars['td'] == '12'): ?> selected="selected"<?php endif; ?>>12</option>
        <option value="13"<?php if ($this->_tpl_vars['td'] == '13'): ?> selected="selected"<?php endif; ?>>13</option>
        <option value="14"<?php if ($this->_tpl_vars['td'] == '14'): ?> selected="selected"<?php endif; ?>>14</option>
        <option value="15"<?php if ($this->_tpl_vars['td'] == '15'): ?> selected="selected"<?php endif; ?>>15</option>
        <option value="16"<?php if ($this->_tpl_vars['td'] == '16'): ?> selected="selected"<?php endif; ?>>16</option>
        <option value="17"<?php if ($this->_tpl_vars['td'] == '17'): ?> selected="selected"<?php endif; ?>>17</option>
        <option value="18"<?php if ($this->_tpl_vars['td'] == '18'): ?> selected="selected"<?php endif; ?>>18</option>
        <option value="19"<?php if ($this->_tpl_vars['td'] == '19'): ?> selected="selected"<?php endif; ?>>19</option>
        <option value="20"<?php if ($this->_tpl_vars['td'] == '20'): ?> selected="selected"<?php endif; ?>>20</option>
        <option value="21"<?php if ($this->_tpl_vars['td'] == '21'): ?> selected="selected"<?php endif; ?>>21</option>
        <option value="22"<?php if ($this->_tpl_vars['td'] == '22'): ?> selected="selected"<?php endif; ?>>22</option>
        <option value="23"<?php if ($this->_tpl_vars['td'] == '23'): ?> selected="selected"<?php endif; ?>>23</option>
        <option value="24"<?php if ($this->_tpl_vars['td'] == '24'): ?> selected="selected"<?php endif; ?>>24</option>
        <option value="25"<?php if ($this->_tpl_vars['td'] == '25'): ?> selected="selected"<?php endif; ?>>25</option>
        <option value="26"<?php if ($this->_tpl_vars['td'] == '26'): ?> selected="selected"<?php endif; ?>>26</option>
        <option value="27"<?php if ($this->_tpl_vars['td'] == '27'): ?> selected="selected"<?php endif; ?>>27</option>
        <option value="28"<?php if ($this->_tpl_vars['td'] == '28'): ?> selected="selected"<?php endif; ?>>28</option>
        <option value="29"<?php if ($this->_tpl_vars['td'] == '29'): ?> selected="selected"<?php endif; ?>>29</option>
        <option value="30"<?php if ($this->_tpl_vars['td'] == '30'): ?> selected="selected"<?php endif; ?>>30</option>
        <option value="31"<?php if ($this->_tpl_vars['td'] == '31'): ?> selected="selected"<?php endif; ?>>31</option>
      </select>
      <?php echo $this->_tpl_vars['lang']['month']; ?>
:
      <select name="tm">
        <option value="1"<?php if ($this->_tpl_vars['tm'] == '1'): ?> selected="selected"<?php endif; ?>>1</option>
        <option value="2"<?php if ($this->_tpl_vars['tm'] == '2'): ?> selected="selected"<?php endif; ?>>2</option>
        <option value="3"<?php if ($this->_tpl_vars['tm'] == '3'): ?> selected="selected"<?php endif; ?>>3</option>
        <option value="4"<?php if ($this->_tpl_vars['tm'] == '4'): ?> selected="selected"<?php endif; ?>>4</option>
        <option value="5"<?php if ($this->_tpl_vars['tm'] == '5'): ?> selected="selected"<?php endif; ?>>5</option>
        <option value="6"<?php if ($this->_tpl_vars['tm'] == '6'): ?> selected="selected"<?php endif; ?>>6</option>
        <option value="7"<?php if ($this->_tpl_vars['tm'] == '7'): ?> selected="selected"<?php endif; ?>>7</option>
        <option value="8"<?php if ($this->_tpl_vars['tm'] == '8'): ?> selected="selected"<?php endif; ?>>8</option>
        <option value="9"<?php if ($this->_tpl_vars['tm'] == '9'): ?> selected="selected"<?php endif; ?>>9</option>
        <option value="10"<?php if ($this->_tpl_vars['tm'] == '10'): ?> selected="selected"<?php endif; ?>>10</option>
        <option value="11"<?php if ($this->_tpl_vars['tm'] == '11'): ?> selected="selected"<?php endif; ?>>11</option>
        <option value="12"<?php if ($this->_tpl_vars['tm'] == '12'): ?> selected="selected"<?php endif; ?>>12</option>
      </select>
      <?php echo $this->_tpl_vars['lang']['year']; ?>
:
      <select name="ty">
        <option value="2005"<?php if ($this->_tpl_vars['ty'] == '2005'): ?> selected="selected"<?php endif; ?>>2005</option>
        <option value="2006"<?php if ($this->_tpl_vars['ty'] == '2006'): ?> selected="selected"<?php endif; ?>>2006</option>
        <option value="2007"<?php if ($this->_tpl_vars['ty'] == '2007'): ?> selected="selected"<?php endif; ?>>2007</option>
        <option value="2008"<?php if ($this->_tpl_vars['ty'] == '2008'): ?> selected="selected"<?php endif; ?>>2008</option>
        <option value="2009"<?php if ($this->_tpl_vars['ty'] == '2009'): ?> selected="selected"<?php endif; ?>>2009</option>
        <option value="2010"<?php if ($this->_tpl_vars['ty'] == '2010'): ?> selected="selected"<?php endif; ?>>2010</option>
      </select>
    </td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="view" value="<?php echo $this->_tpl_vars['lang']['view']; ?>
"></td>
  </tr>
</table>
</form>
</div>
<?php elseif ($this->_tpl_vars['action'] == 'referrers'): ?>
<div align="center">
<table cellspacing="0" cellpadding="5" class="border" width="500">
  <tr class="dark">
    <td colspan="2" align="center"><b><?php echo $this->_tpl_vars['lang']['referrers']; ?>
</b></td>
  </tr>
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['referrers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><a href="<?php echo $this->_tpl_vars['referrers'][$this->_sections['i']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['referrers'][$this->_sections['i']['index']]['title']; ?>
</a></td>
    <td><?php echo $this->_tpl_vars['referrers'][$this->_sections['i']['index']]['count']; ?>
</td>
  </tr>
<?php endfor; endif; ?>
</table>
<br /><br />
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
?referrers" method="post">
<table cellspacing="0" cellpadding="5" class="border">
  <tr class="dark">
    <td><?php echo $this->_tpl_vars['lang']['limit_results']; ?>
: <input type="text" name="limit" value="<?php echo $this->_tpl_vars['limit']; ?>
" size="4" /></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="view" value="<?php echo $this->_tpl_vars['lang']['view']; ?>
"></td>
  </tr>
</table>
</form>
</div>
<?php elseif ($this->_tpl_vars['action'] == 'operators'): ?>
<div align="center">
<table cellspacing="0" cellpadding="5" class="border">
  <tr class="dark">
    <td colspan="2" align="center"><b><?php echo $this->_tpl_vars['operator']['firstname']; ?>
 <?php echo $this->_tpl_vars['operator']['lastname']; ?>
 (<?php echo $this->_tpl_vars['operator']['username']; ?>
)</b></td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['online_time']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['operator']['onlinetime']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['chat_accepted']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['operator']['accepts']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['chat_declined']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['operator']['declines']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['opchat_accepted']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['operator']['accepts_opchat']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['opchat_declined']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['operator']['declines_opchat']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['transfer_accepted']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['operator']['accepts_transfer']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['transfer_declined']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['operator']['declines_transfer']; ?>
</td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['rating']; ?>
:</td>
    <td><?php echo $this->_tpl_vars['operator']['rating']; ?>
 / 5</td>
  </tr>
  <?php if ($this->_tpl_vars['reviews_view'] != 'true'): ?>
  <tr class="<?php echo smarty_function_cycle(array('values' => "medium,light"), $this);?>
">
    <td><?php echo $this->_tpl_vars['lang']['reviews']; ?>
:</td>
    <td><a href="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
?operators&reviews&id=<?php echo $this->_tpl_vars['operator']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['reviews_view']; ?>
</a></td>
  </tr>
  <?php endif; ?>
</table>
<?php if ($this->_tpl_vars['reviews_view'] == 'true'): ?>
<br /><br />
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
?operators&id=<?php echo $this->_tpl_vars['operator']['id']; ?>
&reviews" method="post">
<table cellspacing="0" cellpadding="0" class="border" width="100%">
  <tr class="dark">
    <td colspan="2" align="center"><b><?php echo $this->_tpl_vars['lang']['reviews']; ?>
</b></td>
  </tr>
  <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['reviews']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <tr class="medium">
    <td><?php echo $this->_tpl_vars['lang']['rating']; ?>
: <?php echo $this->_tpl_vars['reviews'][$this->_sections['i']['index']]['rating']; ?>
 / 5 <?php if ($this->_tpl_vars['reviews'][$this->_sections['i']['index']]['transcriptid'] != 0): ?> - <a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/transcripts.php?view&admin&id=<?php echo $this->_tpl_vars['reviews'][$this->_sections['i']['index']]['transcriptid']; ?>
"><?php echo $this->_tpl_vars['lang']['chat_transcript']; ?>
</a><?php endif; ?></td>
    <td align="right"><i><?php echo $this->_tpl_vars['reviews'][$this->_sections['i']['index']]['time']; ?>
</i></td>
  </tr>
  <tr class="light">
    <td colspan="2"><?php echo $this->_tpl_vars['reviews'][$this->_sections['i']['index']]['review']; ?>
</td>
  </tr>
  <?php endfor; endif; ?>
  <tr class="dark">
    <td colspan="2"><?php echo $this->_tpl_vars['lang']['limit_results']; ?>
: <input type="text" name="limit" size="2" value="<?php echo $this->_tpl_vars['limit']; ?>
" /> <input type="submit" value="<?php echo $this->_tpl_vars['lang']['view']; ?>
" /></td>
  </tr>
</table>
</form>
<?php endif; ?>
<br /><br />
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
?operators" method="post">
<table cellspacing="0" cellpadding="5" class="border">
  <tr class="dark">
    <td><?php echo $this->_tpl_vars['lang']['operator']; ?>
:
      <select name="id">
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
        <option value="<?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['id']; ?>
"<?php if ($this->_tpl_vars['operators'][$this->_sections['i']['index']]['id'] == $this->_tpl_vars['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['firstname']; ?>
 <?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['lastname']; ?>
 (<?php echo $this->_tpl_vars['operators'][$this->_sections['i']['index']]['username']; ?>
)</option>
        <?php endfor; endif; ?>
      </select>
    </td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="view" value="<?php echo $this->_tpl_vars['lang']['view']; ?>
"></td>
  </tr>
</table>
</form>
</div>
<?php endif; ?>