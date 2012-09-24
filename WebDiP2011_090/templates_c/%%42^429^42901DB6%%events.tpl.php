<?php /* Smarty version 2.6.6, created on 2012-05-31 16:58:23
         compiled from events.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = 'sadrzaj'>
			<div> 
			<form name = "searchEventsForm" method = "post" action = "filterEvents.php">
				<input type = "text" name = "filter"  />&nbsp;&nbsp;&nbsp;
				<select name = "criteria" id = "criteria"><option value ="none" > Odaberite područje pretrage </dan>
						<option value= "01">Autor</option>
						<option value= "02">Naziv događaja</option>
						<option value= "03">Cijena</option>
						<option value= "04">Status događaja( 0 / 1 )</option>
						<option value= "05">Mjesto</option>
				</select>&nbsp;&nbsp;&nbsp;
				<input type = "submit" name = 'ok' value = "Pretraži događaje"/>
			</form>
			<?php if (( isset ( $this->_tpl_vars['filter'] ) )): ?>
			<div class = 'paging_pages'>
				<table class = 'tablica'>
					<tr> 
						<td class = "td"> Naziv događaja </td> 
						<td class = "td"> Vrijeme </td> <td class = "td"> Cijena </td><td class = "td"> Mjesto </td><td class = "td"> Pogledaj! </td>
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
					<tr class="none">
						<td class = 'ime_table'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['naziv_dogadaja'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['naziv_dogadaja']; ?>
 <?php endif; ?></td>
						<td class = 'username_table'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['vrijeme_pocetka'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['vrijeme_pocetka']; ?>
 <?php endif; ?></td>
						<td class = 'email_table'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['cijena_karte'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['cijena_karte']; ?>
 <?php endif; ?></td>
						<td class = 'email_table'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['mjesto'] ) )):  echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['mjesto'];  endif; ?></td>
						<td class = 'uredi_table'><a href = "eventDetails.php?id=<?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['id_dogadaj'] ) )):  echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['id_dogadaj'];  endif; ?>">Pogledaj</a></td>
					</tr>
					<?php endfor; endif; ?>
				</table>
			</div>
			<?php endif; ?>
			<?php if (( isset ( $this->_tpl_vars['noFilter'] ) )): ?><span class ='greska'> <?php echo $this->_tpl_vars['noFilter']; ?>
 </span><?php endif; ?>
			<?php if (( isset ( $this->_tpl_vars['noRecord'] ) )): ?><span class = 'greska'> <?php echo $this->_tpl_vars['noRecord']; ?>
</span><?php endif; ?>
			
</div>
			<?php if (( ! isset ( $this->_tpl_vars['filter'] ) )): ?>
			<div class = 'paging_pages' id = "paging_events">
			</div>
			<?php endif; ?>
	
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
