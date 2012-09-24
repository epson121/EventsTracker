<?php /* Smarty version 2.6.6, created on 2012-05-30 00:28:19
         compiled from eventPaging.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div id = "sadrzaj">
	
	<table id = "tablica" class = "tablica">
			<tr>
				<td class = 'tdAjax'> Naziv događaja </td><td class = 'tdAjax'> Vrijeme </td><td class = 'tdAjax'> Cijena </td><td class = 'tdAjax'> Mjesto </td><td class = 'tdAjax'> Pogledaj!</td>
			</tr>
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['events']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<td class = 'ime_table2'> <?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['naziv_dogadaja'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['naziv_dogadaja'];  endif; ?></td>
				<td class = 'ime_table2'> <?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['vrijeme_pocetka'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['vrijeme_pocetka'];  endif; ?></td>
				<td class = 'ime_table2'> <?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['cijena_karte'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['cijena_karte'];  endif; ?></td>
				<td class = 'ime_table2'> <?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['mjesto'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['mjesto'];  endif; ?></td>
				<td class = 'ime_table2'> <a href = 'eventManagement.php?id=<?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['id_dogadaj'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['id_dogadaj'];  endif; ?>'>Uredi događaj</a></td>
			</tr>
			<?php endfor; endif; ?>
	</table>
	



</div>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>