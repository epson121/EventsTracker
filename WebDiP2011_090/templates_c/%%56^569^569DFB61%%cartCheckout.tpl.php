<?php /* Smarty version 2.6.6, created on 2012-05-28 23:22:34
         compiled from cartCheckout.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = "sadrzaj">
<?php if (( isset ( $this->_tpl_vars['noCart'] ) )): ?><span class = 'greska'><?php echo $this->_tpl_vars['noCart']; ?>
</span><?php endif; ?>
	<?php if (( isset ( $this->_tpl_vars['userList'] ) )): ?>
		<div class = 'paging_pages'>
				<table class = 'tablica'>
					<tr> 
						<td class = "td">Ime događaja </td> <td class = "td"> Broj mjesta </td> <td class = "td"> Prijevoz </td> <td class = "td">Noćenje </td>
					</tr>
					<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['userList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					
					<tr class = "none">
						<td class = 'ime_table'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['ime_eventa'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['ime_eventa']; ?>
 <?php endif; ?></td>
						<td class = 'prezime_table'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['br_mjesta'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['br_mjesta']; ?>
 <?php endif; ?></td>
						<td class = 'username_table'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['prijevoz'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['prijevoz']; ?>
 <?php endif; ?></td>
						<td class = 'email_table'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['nocenje'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['nocenje']; ?>
 <?php endif; ?></td>	
						
					</tr>
					<?php endfor; endif; ?>
					<tr>
					<td colspan = "3" class = 'email_table'>Ukupno </td>
					<td class = 'email_table'><?php if (( isset ( $this->_tpl_vars['ukupno'] ) )):  echo $this->_tpl_vars['ukupno'];  endif; ?></td>
					</tr>
					<tr colspan = "4"><td><button type = "button" id = "purchaseEvents_cart" class = "rateEventButton">Potvrdi kupovinu.</button></td></tr>
				</table>
				
		</div>
	<?php endif; ?>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>