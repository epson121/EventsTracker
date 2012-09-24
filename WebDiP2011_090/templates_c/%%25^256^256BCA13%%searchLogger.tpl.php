<?php /* Smarty version 2.6.6, created on 2012-06-04 21:24:17
         compiled from searchLogger.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = 'sadrzaj'>
			<div> 
			<form name = "searchLogger" method = "post" action = "searchLogger.php">
				<input type = "text" name = "filter"  />&nbsp;&nbsp;&nbsp;
				<input type = "submit" name = 'ok' value = "Pretraži dnevnik"/>
			</form>
			<?php if (( isset ( $this->_tpl_vars['filter'] ) )): ?>
			<div>
				<span class = 'uspjesno' style="font-size:12px;float:left;"><?php echo $this->_tpl_vars['x']; ?>
</span>
			</div>
			<?php endif; ?>
			<?php if (( isset ( $this->_tpl_vars['noFilter'] ) )): ?><span class ='greska'> <?php echo $this->_tpl_vars['noFilter']; ?>
 </span><?php endif; ?>
			<?php if (( isset ( $this->_tpl_vars['noRecord'] ) )): ?><span class = 'greska'> <?php echo $this->_tpl_vars['noRecord']; ?>
</span><?php endif; ?>
			
</div>
			
	
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
