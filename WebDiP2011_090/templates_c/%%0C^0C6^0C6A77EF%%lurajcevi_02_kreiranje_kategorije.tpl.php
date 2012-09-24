<?php /* Smarty version 2.6.6, created on 2012-05-13 19:12:31
         compiled from lurajcevi_02_kreiranje_kategorije.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div id = "sadrzaj">
	<form id = 'createCategory' name='createCategory' method='post' action = 'insertCategory.php' enctype="multipart/form-data">
		Autor:<br/>
		<div>
		<input type= "text" readonly = "true" name= "categoryAuthor" id = "categoryAuthor" value = <?php if (( isset ( $this->_tpl_vars['userName'] ) )): ?>"<?php echo $this->_tpl_vars['userName']; ?>
"<?php endif; ?>/>
		</div>
		Naziv kategorije:<br/>
		<div>
		<input type="text"  name = "categoryName" id = "categoryName" />
		</div>
		Kratak opis:<br/>
		<div>
		<textarea name = "categoryDescription" id = "categoryDescription" cols = "40" rows = "4"></textarea>
		</div>
		
		<div>
		<input type = "submit" name = "ok" value = "Dodaj kategoriju!" />
		</div>
		</form>
		<span class = 'err'>
		<?php if (( isset ( $this->_tpl_vars['emptyField'] ) )):  echo $this->_tpl_vars['emptyField'];  endif; ?>
		</span>
	


</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>