<?php /* Smarty version 2.6.6, created on 2012-05-13 19:13:05
         compiled from categoriesPaging.tpl */ ?>

<?php echo '<?php'; ?>
 
	require_once ("recaptchalib.php");
	$mailhide_pubkey = '';
	$mailhide_privkey = '';
<?php echo '?>'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = 'sadrzaj'> 
		
			<div class = 'paging_pages'>
				<table class = 'tablica'>
					<tr> 
						<td class = "td"> Naziv kategorije </td> <td class = "td"> Opis kategorije </td> <td class = "td">Autor </td><td class = "td">Uredi</td>
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
						<td class = 'ime_table'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['naziv_kategorije'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['naziv_kategorije']; ?>
 <?php endif; ?></td>
						<td class = 'opis_kategorije_table'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['kratak_opis'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['kratak_opis']; ?>
 <?php endif; ?></td>
					
				
						<td class = 'ime_table'><?php if (( isset ( $this->_tpl_vars['authorList'][$this->_sections['i']['index']]['username'] ) )):  echo $this->_tpl_vars['authorList'][$this->_sections['i']['index']]['username'];  endif; ?></td>
						<td class = 'uredi_table'><a href = "category_management.php?id=<?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['id_kategorija']; ?>
">Uredi kategoriju </a></td>
					<?php endfor; endif; ?>
					</tr>
				</table>
			</div>
			<div class = 'paging_links'>
				<?php if (( isset ( $this->_tpl_vars['prva'] ) )): ?> <?php echo $this->_tpl_vars['prva']; ?>
 
				<span><?php else: ?> <?php echo $this->_tpl_vars['prvaLabel']; ?>
 <?php endif; ?></span>
				<?php if (( isset ( $this->_tpl_vars['trenutna'] ) > 1 )):  echo $this->_tpl_vars['naPocetak']; ?>
 <?php echo $this->_tpl_vars['prethodna'];  endif; ?>
				<?php if (( isset ( $this->_tpl_vars['prev'] ) )): ?> <?php echo $this->_tpl_vars['prev']; ?>
 <?php endif; ?>
				<span><?php if (( isset ( $this->_tpl_vars['trenutna'] ) )): ?> <?php echo $this->_tpl_vars['trenutna']; ?>
 <?php endif; ?></span>
				<?php if (( isset ( $this->_tpl_vars['next'] ) )): ?> <?php echo $this->_tpl_vars['next']; ?>
 <?php endif; ?>
				<span><?php if (( isset ( $this->_tpl_vars['posljednja'] ) )): ?> <?php echo $this->_tpl_vars['posljednja']; ?>
</span>
				<?php else: ?> <?php echo $this->_tpl_vars['posljednjaLabel']; ?>
 <?php endif; ?>
			</div>
	
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>