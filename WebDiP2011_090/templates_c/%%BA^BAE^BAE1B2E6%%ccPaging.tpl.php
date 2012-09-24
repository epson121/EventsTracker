<?php /* Smarty version 2.6.6, created on 2012-06-02 13:26:19
         compiled from ccPaging.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div id = "sadrzaj">
	
	<table id = "tablica" class = "tablica">
			<tr>
				<td class = 'tdAjax'> Kartica </td><td class = 'tdAjax'> Broj kartice </td><td class = 'tdAjax'> Uredi </td>
			</tr>
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<tr>
				<form name = 'ccChange' method = 'post' name = 'from12' action = '<?php echo $this->_tpl_vars['action']; ?>
'>
				<td><input type = "text" name = 'ccName' value = "<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['kreditna_kartica']; ?>
"/>
				<input type = "hidden" name = 'idCc' value = "<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['id_kartica']; ?>
"/>
				<input type = "hidden" name = 'idUser' value = "<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['korisnik_id_korisnika']; ?>
"/></td>
				<td><input type = "text" name = 'ccNum' value = "<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['broj_kartice']; ?>
"/></td>
				<td><input type = "submit" name = "ok"/></td>
				</form>
			</tr>
			<?php endfor; endif; ?>
	</table>
	<br/>
	<br/>
	<?php if (( isset ( $this->_tpl_vars['grantedAccess'] ) )): ?><span class = 'uspjesno'><?php echo $this->_tpl_vars['grantedAccess']; ?>
</span><?php endif; ?>



</div>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>