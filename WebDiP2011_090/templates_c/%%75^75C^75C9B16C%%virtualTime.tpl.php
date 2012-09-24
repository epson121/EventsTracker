<?php /* Smarty version 2.6.6, created on 2012-06-04 19:45:31
         compiled from virtualTime.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = "sadrzaj">

		<div style = "font-size:20px; color:orange;">
		<?php if (( isset ( $this->_tpl_vars['novoVrijeme'] ) )):  echo $this->_tpl_vars['novoVrijeme'];  endif; ?><br/>
		<a href = "virtualTime.php?vt=1" style = "text-decoration:none;color:white;"> Dohvati novo vrijeme </a>
		</div><br/><br/>
		<div style = "font-size:20px; color:green;">
		<?php if (( isset ( $this->_tpl_vars['gotTime'] ) )):  echo $this->_tpl_vars['gotTime'];  endif; ?>
		</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>