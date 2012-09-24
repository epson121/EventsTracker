<?php /* Smarty version 2.6.6, created on 2012-05-29 23:52:08
         compiled from category_management.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = "sadrzaj">

	<div class = "originalData">
		<?php if (( isset ( $this->_tpl_vars['cat'] ) )): ?>
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['cat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<form id = 'category' class = "form1" name= "categoryData" method = "post" action="change_category_data.php?id=<?php echo $this->_tpl_vars['cat'][$this->_sections['i']['index']]['id_kategorija']; ?>
" enctype="multipart/form-data">
			<table class = "management">
				<tr>
					<td style="color:#CC6600;" colspan= 3>Podaci o kategoriji</td>
				</tr>
				<tr>
				
					<td>Naziv kategorije</td>
					<td><input type = "text" cols = 43 name = "naziv_kategorije" value = <?php if (( isset ( $this->_tpl_vars['cat'][$this->_sections['i']['index']]['naziv_kategorije'] ) )): ?>"<?php echo $this->_tpl_vars['cat'][$this->_sections['i']['index']]['naziv_kategorije']; ?>
"<?php endif; ?>/></td>
				</tr>
				<tr>
					<td>Opis</td>
					<td><textarea rows= 4 cols=43  name = "opis_kategorije"><?php if (( isset ( $this->_tpl_vars['cat'][$this->_sections['i']['index']]['kratak_opis'] ) )):  echo $this->_tpl_vars['cat'][$this->_sections['i']['index']]['kratak_opis'];  endif; ?></textarea></td>
				</tr>
				<?php endfor; endif; ?>
				<tr>
					<td>Moderator</td>
					<td><select name = 'mod' id = 'mod'>	
						<option value= 'none'>Odaberite moderatora</option>
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
						<option value= <?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['username']; ?>
 <?php if (( $this->_tpl_vars['users'][$this->_sections['i']['index']]['username'] == $this->_tpl_vars['mod'] )): ?> selected = "selected" <?php endif; ?>><?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['username']; ?>
</option>
						<?php endfor; endif; ?>
						</select>
				</tr>
				<tr>
				<td colspan=3><input type = "submit" name = "ok" value = "Promjeni podatke!" /></td>
				</tr>
			</table>
		<?php endif; ?>
		</form>
		<span class = 'greska'><?php if (( isset ( $this->_tpl_vars['greske'] ) )):  echo $this->_tpl_vars['greske'];  endif; ?></span>
		<span class = 'uspjesno'><?php if (( isset ( $this->_tpl_vars['imDone'] ) )):  echo $this->_tpl_vars['imDone'];  endif; ?></span>
		
		
	</div>
	<div class = "form2">
	</div>


</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

