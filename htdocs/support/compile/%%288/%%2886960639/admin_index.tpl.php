<?php /* Smarty version 2.6.1, created on 2012-01-23 18:56:12
         compiled from admin_index.tpl */ ?>
<?php ob_start(); ?>
<form method="post" action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
">
<table class="border" width="100%">
  <tr class="medium">
    <td>
      <?php echo $this->_tpl_vars['lang']['subject']; ?>

    </td>
    <td>
      <input type="text" name="subject" />
    </td>
  </tr>
  <tr class="medium">
    <td>
      <?php echo $this->_tpl_vars['lang']['message']; ?>

    </td>
    <td>
      <textarea cols="30" rows="5" name="message"></textarea>
    </td>
  </tr>
  <tr class="medium">
    <td>
      &nbsp;
    </td>
    <td>
      <input type="submit" name="add" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" />
    </td>
  </tr>
</table>
</form>
<?php $this->_smarty_vars['capture']['add_note'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
<form method="post" action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
">
<table class="border" width="100%">
  <tr class="medium">
    <td>
      <?php echo $this->_tpl_vars['lang']['subject']; ?>

    </td>
    <td>
      <input type="text" name="subject" value="<?php echo $this->_tpl_vars['subject']; ?>
" />
    </td>
  </tr>
  <tr class="medium">
    <td>
      <?php echo $this->_tpl_vars['lang']['message']; ?>

    </td>
    <td>
      <textarea cols="30" rows="5" name="message"><?php echo $this->_tpl_vars['message']; ?>
</textarea>
    </td>
  </tr>
  <tr class="medium">
    <td>
      &nbsp;
    </td>
    <td>
      <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
" /><input type="submit" name="edit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" />
    </td>
  </tr>
</table>
</form>
<?php $this->_smarty_vars['capture']['edit_note'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
<form method="post" action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
">
<table width="100%">
  <tr>
    <td>
      <?php echo $this->_tpl_vars['lang']['note_confirm_delete']; ?>
 &quot;<i><?php echo $this->_tpl_vars['subject']; ?>
</i>&quot;
    </td>
  </tr>
  <tr>
    <td>
      <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
" /><input type="submit" name="delete" value="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" /><input type="submit" name="cancel" value="<?php echo $this->_tpl_vars['lang']['cancel']; ?>
" />
    </td>
  </tr>
</table>
</form>
<?php $this->_smarty_vars['capture']['delete_note'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
    <?php if ($this->_tpl_vars['notes'] == 'false'): ?>
        <?php echo $this->_tpl_vars['lang']['no_notes']; ?>

    <?php else: ?>
        <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['notes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table class="border" width="100%">
  <tr class="dark">
    <td>
      <table class="border" width="100%">
        <tr>
          <td>
            <?php echo $this->_tpl_vars['notes'][$this->_sections['i']['index']]['subject']; ?>

          </td>
          <td align="right">
            <?php echo $this->_tpl_vars['notes'][$this->_sections['i']['index']]['time']; ?>

          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td class="light">
      <?php echo $this->_tpl_vars['notes'][$this->_sections['i']['index']]['message']; ?>

    </td>
  </tr>
  <tr>
    <td class="medium" align="right">
      <a href="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
?edit=<?php echo $this->_tpl_vars['notes'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <a href="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
?delete=<?php echo $this->_tpl_vars['notes'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lang']['delete']; ?>
</a>
    </td>
  </tr>
</table><br />
        <?php endfor; endif; ?>
    <?php endif; ?>
<?php $this->_smarty_vars['capture']['view_note'] = ob_get_contents(); ob_end_clean(); ?>

<?php if ($this->_tpl_vars['action'] == 'add_note'): ?>
    <?php echo $this->_smarty_vars['capture']['add_note']; ?>

<?php elseif ($this->_tpl_vars['action'] == 'edit_note'): ?>
    <?php echo $this->_smarty_vars['capture']['edit_note']; ?>

<?php elseif ($this->_tpl_vars['action'] == 'delete_note'): ?>
    <?php echo $this->_smarty_vars['capture']['delete_note']; ?>

<?php else: ?>
    <?php echo $this->_smarty_vars['capture']['view_note']; ?>

<?php endif; ?>